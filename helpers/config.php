<?php
// protect direct access
if (str_contains($_SERVER['REQUEST_URI'], '/helpers/config.php')) {
  header('Location: /');
  exit();
}

$DB_host = 'mysql-cdc';
$DB_user = 'root';
$DB_pass = 'pass';
$DB_dbname = 'siakad';