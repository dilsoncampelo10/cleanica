<?php

define('HOST','localhost');
define('DB','clinica');
define('USER','root');
define('PASS','');

$pdo = new PDO("mysql:dbname=".DB.";host=".HOST.";",USER,PASS);
