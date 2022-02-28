<?php

namespace App\Controllers;

use Resources\View;

class Controller {

  private string $name;
  private View $view;

  public function __construct()
  {
    $className = get_class($this);
    $parts = explode("\\", $className);
    $this->name = $parts[count($parts) - 1];

    $this->view = new View();
  }

  public function render(string $view, $data = []) {

    $this->view->render($view, $data);
  }

  public function post($param) {
    if(!isset($_POST[$param])) {
      return null;
    }

    return $_POST[$param];
  }

  public function get($param) {
    if(!isset($_GET[$param])) {
      return null;
    }

    return $_GET[$param];
  }
}
