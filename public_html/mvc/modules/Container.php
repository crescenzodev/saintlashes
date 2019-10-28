<?php

namespace mvc\modules;

class Container {

  private $closures = [];

  public function set($key, \Closure $closure, $isShared) {

    if ($isShared) {

      $closure = $closure->bindTo($this);
      $this->closures[$key] = [$closure];

    } else {

      $this->closures[$key] = $closure->bindTo($this);
    }
  }

  public function get($name, Array $args = []) {

    // Is an instance dependency
    if ($this->closures[$name] instanceof \Closure) {

      return call_user_func_array($this->closures[$name], $args);
    }

    // Is a shared dependency which has not been instantiated
    if (!isset($this->closures[$name][1])) {

      $this->closures[$name][1] = $this->closures[$name][0]();
    }

    return $this->closures[$name][1];
  }
}