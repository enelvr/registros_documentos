<?php

namespace App\Controllers;

class AuthController
{

  public function login()
  {
    include 'resources/Views/login.php';
  }

  public function auth()
  {
    try {

      if (isset($_POST['submit'])) redirect('errors', '/login', 'Usuario y/o Password son requeridos');

      $data = (object) $_POST;

      $user = (object) [
        'username' => 'enel',
        'password' => 123456
      ];

      if (empty($data->username) || empty($data->password)) redirect('errors', '/login', 'Usuario y/o Password son requeridos');

      if (($data->username != $user->username)) redirect('errors', '/login', 'Usuario y/o Password Incorrecto');

      if (comparePassword(intval($user->password), intval($data->password)) == false) {

        redirect('errors', '/login', 'Usuario y/o Password Incorrecto');
      } else {

        $_SESSION['user'] = serialize($user->username);

        redirect('success', '/documents', 'Bienvenid@' . $user->username);
      }
    } catch (\Throwable $th) {
      error_log(500, 'AuthController - auth', $th->getMessage());
      redirect('errors', '/login', $th->getMessage());
    }
  }
}
?>
