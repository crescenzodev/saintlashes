<?php

namespace mvc\http;

class Image extends File {

  public function isSize($w, $h) {

    $arr = getimagesize($this->_temp);

    if ($arr[0] !== $w || $arr[1] !== $h) {

      return false;
    }

    return true;
  }
}