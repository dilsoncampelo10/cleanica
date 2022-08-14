<?php
session_start();

define('HOST','localhost');
define('DB','clinica');
define('USER','root');
define('PASS','');
define('BASE_URL','http://localhost:50/php/cleanica');

$pdo = new PDO("mysql:dbname=".DB.";host=".HOST.";",USER,PASS);
