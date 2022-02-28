<?php

use App\Controllers\AuthController;
use App\Controllers\DocumentsController;
use Bramus\Router\Router as Router;

$router = new Router();

session_start();

$router->before('GET', '/', function() {
  isLogin();
});

$router->set404(function () {
  header('HTTP/1.1 404 Not Found');
  include 'resources/Views/layouts/error.php';
});

//DOCUMENTS

$router->get('/documents', function() {
  isLogin();
  $controller = new DocumentsController;
  $controller->index();
});

$router->get('/documents/create', function() {
  isLogin();
  $controller = new DocumentsController;
  $controller->create();
});

$router->post('/documents/store', function() {
  isLogin();
  $controller = new DocumentsController;
  $controller->store($_POST);
});

$router->get('/documents/edit/{id}', function($id) {
  isLogin();
  $controller = new DocumentsController;
  $controller->edit($id);
});

$router->post('/documents/update', function() {
  isLogin();
  $controller = new DocumentsController;
  $controller->update($_POST);
});

$router->get('/documents/delete/{id}', function($id) {
  isLogin();
  $controller = new DocumentsController;
  $controller->destroy($id);
});

// Inicio de session
$router->get('/login', function() {
  $controller = new AuthController;
  $controller->login();
});

$router->get('/logout', function() {
  session_destroy();
  redirect('success', 'login');
  exit;
});

$router->post('/authenticate', function() {
  $controller = new AuthController;
  $controller->auth($_POST);
});
//DOCUEMNTOS
/*$router->get('/documents/{document}', function($document) {
  echo "Inicio";
});*/

$router->run();

