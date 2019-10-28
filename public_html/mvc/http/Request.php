<?php

namespace mvc\http;

class Request {

  const POST = 'POST';
  const GET = 'GET';

  private $uri;
  private $path;
  private $method;
  private $queryString;
  private $query;
  private $post;
  private $var;
  private $files;

  public function __construct($uri) {

    $this->uri = $uri;

    // Set the path
    $parts = explode('?', $this->uri);
    $this->path = trim($parts[0], '/');

    // There is a query string
    if (isset($parts[1])) {

      $this->queryString = $parts[1];
      parse_str($this->queryString, $this->query);
    }
  }

  public function getUri() {
    
    return $this->uri;
  }

  public function getPath() {
   
    return $this->path;
  }

  public function setMethod($method) {

    $this->method = $method;
  }

  public function getMethod() {

    return $this->method;
  }

  public function isPost() {

    return $this->getMethod() === self::POST;
  }

  public function isGet() {

    return $this->getMethod() === self::GET;
  }

  public function getQueryString() {

    return $this->queryString;
  }

  public function setQuery(Array $query) {
    
    $this->query = $query;
  }

  public function getQuery($key = false) {
    
    if ($key === false) {
      
      return $this->query;
    }
    
    if (isset($this->query[$key])) {
      
      return $this->query[$key];
    }
    
    return false;
  }

  public function setPost(Array $post) {

    $this->post = $post;
  }

  public function getPost($key = false) {

    if ($key === false) {

      return $this->post;
    }

    if (isset($this->post[$key])) {

      return $this->post[$key];
    }

    return false;
  }

  public function setVar(Array $var) {

    $this->var = $var;
  }

  public function getVar($key = false) {

    if ($key === false) {

      return $this->var;
    }

    if (isset($this->var[$key])) {

      return $this->var[$key];
    }

    return false;
  }

  public function setFiles(Array $var) {

    $this->files = [];

    foreach ($var as $key => $val) {

      $this->files[$key] = new File($val);

      if ($this->files[$key]->isImage()) {

        $this->files[$key] = new Image($val);
      }
    }
  }

  public function getFile($key = false) {

    if ($key === false) {

      return $this->files;
    }

    if (isset($this->files[$key])) {

      return $this->files[$key];
    }

    return false;
  }
}