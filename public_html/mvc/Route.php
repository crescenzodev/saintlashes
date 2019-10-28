<?php

namespace mvc;

use mvc\modules\Regex;

class Route {

  private $route;
  private $regexes = [];
  private $defaults = [];
  private $regex;

  public function __construct($route) {

    $this->route = $route;
  }

  public function setRegexes(Array $regexes) {

    $this->regexes = $regexes;
    return $this;
  }

  public function setRegex($key, $regex) {

    $this->regexes[$key] = $regex;
    return $this;
  }

  public function setDefaults($defaults) {

    $this->defaults = $defaults;
    return $this;
  }

  public function setDefault($key, $default) {

    $this->defaults[$key] = $default;
    return $this;
  }

  public function buildUri(Array $vars = []) {

    // Apply the var defaults
    $vars = array_merge($this->defaults, $vars);

    // Optional vars array
    $optionalVars = [];

    // Anonymous function to recursively compile the route into a uri
    $compile = function ($uri, $isGroup) use (&$compile, &$optionalVars, $vars) {

      // Group index
      $groupIndex = strpos($uri, '(');

      // A group was found within the route
      if ($groupIndex !== false) {

        // Extract the group
        $group = substr($uri, $groupIndex + 1, strrpos($uri, ')') - $groupIndex - 1);
        // Compile the group
        $compiledGroup = $compile($group, true);
        // Replace the initial group with the compiled group
        $uri = str_replace('(' . $group . ')', $compiledGroup, $uri);
      }

      // Replace all vars within the route/group
      while (($varIndex = strpos($uri, '<')) !== false) {

        // Extract the var key
        $key = substr($uri, $varIndex + 1, strpos($uri, '>') - $varIndex - 1);

        // Is a group and we have a value for the placeholder
        if ($isGroup && isset($vars[$key])) {

          // Add optional var key/value
          $optionalVars[$key] = $vars[$key];
        }

        // A regex exists for the var and the value is not a match
        if (isset($vars[$key]) && isset($this->regexes[$key]) && !preg_match('#' . $this->regexes[$key] . '#', $vars[$key])) {

          return false;
        }

        // Replace the placeholder with the var if it is set or an empty string if not
        $uri = str_replace('<' . $key . '>', isset($vars[$key]) ? $vars[$key] : '', $uri);
      }

      return $uri;
    };

    // Compile the route into a uri
    $uri = $compile($this->route, false);

    // Remove default optional vars from the uri
    $uri = str_replace(array_values(array_intersect($this->defaults, $optionalVars)), '', $uri);

    // Ensure that // does not occur within the uri and trim the trailing slash
    return '/' . trim(str_replace('//', '/', $uri), '/');
  }

  public function matches($path) {

    // Compile the route regex
    $this->_compile();

    // The route is not a match
    if (!preg_match($this->regex, $path, $matches)) {

      return false;
    }

    // Set the return with any defined defaults
    $ret = $this->defaults;

    // For each regex match
    foreach ($matches as $key => $value) {

      // The key is a string (a named capturing group) and the value is not empty
      if (is_string($key) && !empty($value)) {

        // Set the parameter
        $ret[$key] = $value;
      }
    }

    return $ret;
  }

  private function _compile() {

    // Escape all reserved regex characters except < > ( )
    $regex = preg_quote($this->route);
    $regex = str_replace(['\<', '\>', '\(', '\)'], ['<', '>', '(', ')'], $regex);

    // The route has optional items
    if (strpos($regex, '(') !== false) {

      // Set the regex optional items as non-capturing groups
      $regex = str_replace(['(', ')'], ['(?:', ')?'], $regex);
    }

    // Set the route var keys as named capturing groups
    $regex = str_replace(['<', '>'], ['(?P<', '>' . Regex::SEGMENT . ')'], $regex);

    // There are user defined regexes - replace them into the regex
    if ($this->regexes) {

      $search = $replace = [];

      foreach ($this->regexes as $key => $value) {

        $search[] = '<' . $key . '>' . Regex::SEGMENT;
        $replace[] = '<' . $key . '>' . $value;
      }

      $regex = str_replace($search, $replace, $regex);
    }

    // Set the route regex
    $this->regex = '#^' . $regex . '$#uD';
  }
}