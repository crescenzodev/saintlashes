<?php

namespace mvc\http;

class Response {

  private $body;

  public function setBody($body) {

    $this->body = $body;
  }
  
  public function getBody() {

    return $this->body;
  }

  public function setHttpCode($code) {

    http_response_code($code);
  }

  public function redirect($url, $query = '') {

    header('Location: ' . $url . (!empty($query) ? '?' . $query : ''));
    exit;
  }

  public function setHeader($header) {

    header($header);
  }

  public function __destruct() {

    echo $this->body;
  }
}