<?php

namespace mvc;

use mvc\modules\Container;

abstract class Model {

  protected $container;
  protected $session;

  private $pdo;
  private $errors;

  public function __construct(Container $container) {

    $this->container = $container;
    $this->session = $container->get('session');
  }

  public function hasErrors() {

    return !empty($this->errors);
  }

  public function getErrors() {

    return $this->errors;
  }

  protected function pdo() {

    if ($this->pdo == null) {

      $this->pdo = $this->container->get('pdo');
    }

    return $this->pdo;
  }

  protected function isEmpty($string) {

    return !(isset($string) && $string !== '');
  }

  protected function addError($message) {

    $this->errors[] = $message;
  }
}