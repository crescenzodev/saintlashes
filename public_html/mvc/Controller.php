<?php

namespace mvc;

use mvc\http\Request;
use mvc\modules\Container;

abstract class Controller {

  protected $request;
  protected $dispatcher;
  protected $response;
  protected $view;
  protected $session;
  protected $container;

  public function __construct(Request $request, Dispatcher $dispatcher, Container $container) {

    $this->request = $request;
    $this->dispatcher = $dispatcher;
    $this->response = $container->get('response');
    $this->view = $container->get('view', [$dispatcher, $request]);
    $this->session = $container->get('session');
    $this->container = $container;
  }

  public function getRequest() {

    return $this->request;
  }

  public function getDispatcher() {

    return $this->dispatcher;
  }

  public function getResponse() {

    return $this->response;
  }

  public function getView() {

    return $this->view;
  }

  public function getSession() {

    return $this->session;
  }

  public function getModel($name) {

    $namespace = '\modules\\' . $this->dispatcher->getModuleName() . '\models\\' . ucfirst(strtolower($name)) . 'Model';
    return new $namespace($this->container);
  }
}