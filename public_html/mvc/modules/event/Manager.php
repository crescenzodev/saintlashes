<?php

namespace mvc\modules\event;

class Manager {

  private $closures = [];

  public function on($name, \Closure $closure) {

    $this->closures[$name] = $closure;
  }

  public function emit(Event $event) {

    $name = $event->getName();

    if (!isset($this->closures[$name])) {

      return false;
    }

    $this->closures[$name]($event);

    return true;
  }
}