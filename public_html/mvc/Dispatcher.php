<?php

namespace mvc;

use mvc\http\Request;
use mvc\modules\Container;

class Dispatcher {

  private $request;
  private $router;
  private $container;
  private $eventManager;
  private $dispatched;
  private $dispatching;
  private $wasForwarded;
  private $controllerWasForwarded;

  public function __construct(Request $request, Router $router, Container $container) {

    $this->request = $request;
    $this->router = $router;
    $this->container = $container;
    $this->eventManager = $container->get('eventManager');
  }

  public function getRequest() {

    return $this->request;
  }

  public function getRouter() {

    return $this->router;
  }

  public function getModuleName() {
    
    return $this->dispatched['module'];
  }

  public function getFullControllerName() {
    
    return $this->dispatched['controller'];
  }

  public function getBaseControllerName() {

    return str_replace(Router::CONTROLLER_SUFFIX, '', $this->dispatched['controller']);
  }

  public function getFullActionName() {
    
    return $this->dispatched['action'];
  }

  public function getBaseActionName() {

    $ret = $this->dispatched['action'];

    if ($this->request->isPost()) {

      $ret = preg_replace('/' . Router::ACTION_POST_SUFFIX . '$/', '', $ret);
    }

    return $ret = preg_replace('/' . Router::ACTION_SUFFIX . '$/', '', $ret);
  }

  public function forward(Array $dispatching) {

    $this->wasForwarded = true;
    $this->controllerWasForwarded = true;

    // The module name has been set to a matched route - disable switching between modules
    if (!empty($this->getModuleName())) {

      $dispatching['module'] = $this->getModuleName();
    }

    // Add the controller and action suffixes to the dispatching array
    $dispatching['controller'] = ucfirst(strtolower($dispatching['controller'])) . Router::CONTROLLER_SUFFIX;
    $dispatching['action'] .= Router::ACTION_SUFFIX;

    array_unshift($this->dispatching, $dispatching);
  }

  public function wasForwarded() {

    return $this->wasForwarded;
  }

  public function dispatch() {

    // Get all matching routes of the request if they have not been set
    if ($this->dispatching == null) {

      $this->dispatching = $this->router->getMatchedRoutes($this->request->getPath());
    }

    // Dispatch array is not empty
    while (!empty($this->dispatching)) {

      // Get the next available dispatch
      $dispatching = array_shift($this->dispatching);

      // Get the controller namespace
      $namespace = '\modules\\' . $dispatching['module'] . '\controllers\\' . $dispatching['controller'];

      // The controller does not exist
      if (class_exists($namespace) === false) {

        continue;
      }

      // Set the request vars
      $this->request->setVar(array_diff_key($dispatching, array_flip(['module', 'controller', 'action'])));
      // Set the dispatcher dispatched values
      $this->dispatched = array_intersect_key($dispatching, array_flip(['module', 'controller', 'action']));

      $controller = new $namespace($this->request, $this, $this->container);

      // We have a POST action defined
      if ($this->request->isPost() &&
          method_exists($controller, $this->getBaseActionName() . Router::ACTION_POST_SUFFIX)) {

        // Set the correct dispatching/dispatched action
        $dispatching['action'] = $this->dispatched['action'] = $this->getBaseActionName() . Router::ACTION_POST_SUFFIX;

      // A default controller action cannot be found
      } else if ($this->request->isGet() && method_exists($controller, $dispatching['action']) === false) {

        continue;
      }

      // Set the controller was forwarded to false
      $this->controllerWasForwarded = false;

      // The controller has a pre method defined
      if (method_exists($controller, 'pre')) {

        $controller->pre();
      }

      // The controller was forwarded
      if ($this->controllerWasForwarded === true) {

        continue;
      }

      $controller->{$dispatching['action']}();

      // The action was forwarded
      if ($this->controllerWasForwarded === true) {

        continue;
      }

      // The controller has a post method defined
      if (method_exists($controller, 'post')) {

        $controller->post();
      }

      // The action was forwarded
      if ($this->controllerWasForwarded === true) {

        continue;
      }

      // Render the view and set the response body
      $controller->getResponse()->setBody($controller->getView()->render());

      return;
    }

    // Empty the dispatched array so dispatcher not resolved event can switch to a different module if needed
    $this->dispatched = ['module' => '', 'controller' => '', 'action' => ''];

    $this->eventManager->emit($this->container->get('event', ['dispatcher:notResolved', $this]));
    $this->dispatch();
  }
}