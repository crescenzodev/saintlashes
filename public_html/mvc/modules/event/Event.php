<?php

namespace mvc\modules\event;

class Event {

  private $name;
  private $source;

  public function __construct($name, $source) {

    $this->name = $name;
    $this->source = $source;
  }

  public function getName() {

    return $this->name;
  }

  public function getSource() {

    return $this->source;
  }
}