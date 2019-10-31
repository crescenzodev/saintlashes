<?php

// TODO remove view->url from all controllers, controller should have access to it's own function in mvc\Controller

use mvc\Dispatcher;
use mvc\http\Request;
use mvc\http\Response;
use mvc\modules\Container;
use mvc\modules\event\Event;
use mvc\modules\event\Manager;
use mvc\modules\PDO;
use mvc\modules\Session;
use mvc\Route;
use mvc\Router;
use mvc\View;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Class auto-loader
spl_autoload_register(function($namespace) {

  $path = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\', '/', $namespace) . '.php';

  if (file_exists($path)) {

    require($path);
  }
});

// Container
$container = new Container();
$container->set(
  'pdo',
  function() {
    return new PDO([
      'host' => '127.0.0.1', 'database' => '', 'user' => 'root', 'password' => ''
    ]);
  },
  true
);
$container->set(
  'session',
  function() {
    $session = new Session();
    $session->start();
    return $session;
  },
  true
);
$container->set(
  'eventManager',
  function() {
    return new Manager();
  },
  true
);
$container->set(
  'router',
  function() {
    return new Router($this);
  },
  true
);
$container->set(
  'dispatcher',
  function(Request $request) {
    return new Dispatcher($request, $this->get('router'), $this);
  },
  false
);
$container->set(
  'request',
  function($uri) {
    return new Request($uri);
  },
  false
);
$container->set(
  'response',
  function() {
    return new Response();
  },
  false
);
$container->set(
  'view',
  function(Dispatcher $dispatcher, Request $request) {
    return new View($dispatcher, $request, $this);
  },
  false
);
$container->set(
  'route',
  function($route) {
    return new Route($route);
  },
  false
);
$container->set(
  'event',
  function($name, $source) {
    return new Event($name, $source);
  },
  false
);

// Events
$eventManager = $container->get('eventManager');
$eventManager->on(
  'dispatcher:notResolved',
  function($e) {

    $dispatcher = $e->getSource();
    $dispatcher->forward(['module' => 'error', 'controller' => 'error', 'action' => 'error404']);
  }
);

// Router
$router = $container->get('router');

$router
  ->addRoute('main', '<controller>(/<action>(/<id>))')
  ->setDefaults([
    'module' => 'index',
    'action' => 'index'
  ]);

$router
  ->addRoute('pages', '(<action>)')
  ->setDefaults([
    'module' => 'index',
    'controller' => 'pages',
    'action' => 'index'
  ]);

// Set up the request
$request = $container->get('request', [$_SERVER['REQUEST_URI']]);
$request->setMethod($_SERVER['REQUEST_METHOD']);
$request->setPost($_POST);
$request->setFiles($_FILES);

// Dispatch the request
$dispatcher = $container->get('dispatcher', [$request]);
$dispatcher->dispatch();