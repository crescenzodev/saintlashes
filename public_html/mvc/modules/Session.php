<?php

namespace mvc\modules;

class Session implements \ArrayAccess {

  public function start() {

    session_start();
  }

  public function regenerateID($deleteOldSession = true) {

    session_regenerate_id($deleteOldSession);
  }

  public function offsetExists($offset) {

    return array_key_exists($offset, $_SESSION);
  }

  public function offsetGet($offset) {

    if (isset($_SESSION[$offset])) {

      return $_SESSION[$offset];
    }

    return null;
  }

  public function offsetSet($offset, $value) {

    $_SESSION[$offset] = $value;
  }

  public function offsetUnset($offset) {

    unset($_SESSION[$offset]);
  }

  public function destroy() {

    session_destroy();
  }
}