<?php

error_reporting(E_ALL); //Error/Exception.

header('Content-Type: text/html; charset=UTF-8');

ini_set('ignore_repeated_errors', TRUE);

ini_set('display_errors', TRUE); //Error/Exception display.

ini_set('log_errors', TRUE); // Error/Exception file

ini_set('error_log', '/php-error.log');
error_log('Inicializando App, 200, Index!');
require 'vendor/autoload.php';
require 'config/database.php';
require 'routes/web.php';
