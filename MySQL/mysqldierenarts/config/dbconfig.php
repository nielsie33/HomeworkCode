<?php
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'dierenarts');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '12345');
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
$database = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD,
    $pdoOptions
);
?>