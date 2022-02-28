<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;


$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'database'  => 'registros_documentos',
  'username'  => 'root',
  'password'  => 123456,
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'    => '',
]);

$capsule->bootEloquent();


