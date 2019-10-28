<?php

namespace mvc;

use mvc\modules\Container;

class Router {

  const CONTROLLER_SUFFIX = 'Controller';
  const ACTION_POST_SUFFIX = 'Post';
  const ACTION_SUFFIX = 'Action';

  private $container;
  private $routes;

  public function __construct(Container $container) {

    $this->container = $container;
  }

  public function addRoute($key, $route) {
    
    $this->routes[$key] = $this->container->get('route', [$route]);
    return $this->routes[$key];
  }

  public function getRoute($key) {
    
    return $this->routes[$key];
  }

  public function getMatchedRoutes($path) {

    $matchedRoutes = [];

    foreach ($this->routes as $route) {

      $matches = $route->matches($path);

      if (is_array($matches) && isset($matches['action']) && isset($matches['controller']) && isset($matches['module'])) {

        // Add the controller and action suffixes
        $matches['controller'] = ucfirst($matches['controller']);
        $matches['controller'] .= self::CONTROLLER_SUFFIX;
        $matches['action'] .= self::ACTION_SUFFIX;

        $matchedRoutes[] = $matches;
      }
    }

    return $matchedRoutes;
  }
}