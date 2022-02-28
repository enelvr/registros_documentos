<?php

require '../vendor/autoload.php';
require '../config/database.php';

try {

  $documents = App\Models\DocDocumento::get();
  include "../resources/Views/index.php";

} catch (\Throwable $th) {
  print($th);
}
