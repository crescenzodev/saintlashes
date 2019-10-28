<?php

namespace mvc;

use mvc\http\Request;
use mvc\modules\Container;

class View {

  // Constant render levels
  const RENDER_NONE = -1;
  const RENDER_ACTION = 0;
  const RENDER_CONTROLLER = 1;
  const RENDER_MODULE = 2;

  private $dispatcher;
  private $request;
  private $router;
  private $renderPaths;
  private $data;
  private $renderLevel;
  private $output;

  private $session;

  public function __construct(Dispatcher $dispatcher, Request $request, Container $container) {

    $this->dispatcher = $dispatcher;
    $this->request = $request;
    $this->router = $container->get('router');
    $this->session = $container->get('session');

    // Set the default render level as render module
    $this->renderLevel = self::RENDER_MODULE;

    // Set the default view file
    $this->setView($dispatcher->getBaseActionName());
  }

  public function __set($key, $value) {

    $this->data[$key] = $value;
  }

  public function __get($key) {

    if (isset($this->data[$key])) {

      return $this->data[$key];
    }

    return null;
  }

  public function __isset($key) {

    return $this->data != null && array_key_exists($key, $this->data);
  }

  public function __empty($key){

    return empty($this->data[$key]);
  }

  public function setView($filename) {

    // Set the view paths
    $this->renderPaths[self::RENDER_ACTION] = $this->dispatcher->getModuleName() .
        '/views/' . $this->dispatcher->getBaseControllerName() . '/' . $filename;

    $this->renderPaths[self::RENDER_CONTROLLER] = $this->dispatcher->getModuleName() .
        '/views/' . $this->dispatcher->getBaseControllerName() . '/main.tmp';

    $this->renderPaths[self::RENDER_MODULE] = $this->dispatcher->getModuleName() . '/views/main.tmp';
  }

  public function setRenderLevel($renderLevel) {

    $this->renderLevel = $renderLevel;
  }

  public function getOutput() {
   
    return $this->output;
  }

  public function render() {

    for ($i = self::RENDER_ACTION; $i <= $this->renderLevel; ++$i) {

      $output = $this->renderLevel($this->renderPaths[$i]);

      if (!empty($output)) {

        $this->output = $output;
      }
    }
    
    return $this->output;
  }

  public function url($key, Array $vars = []) {

    return $this->router->getRoute($key)->buildUri($vars);
  }

  public function request() {

    return $this->request;
  }

  private function renderLevel($path) {

    ob_start();

    $path = $_SERVER['DOCUMENT_ROOT'] . '/modules/' . $path . '.php';

    if (file_exists($path)) {

      require($path);
    }

    return ob_get_clean();
  }
}