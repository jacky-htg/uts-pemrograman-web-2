<?php
// protect direct access
if (str_contains($_SERVER['REQUEST_URI'], '/helpers/connection.php')) {
  header('Location: /');
  exit();
}

try {
  $db = new mysqli($DB_host,$DB_user,$DB_pass,$DB_dbname);
} catch(Exception $e) {
  echo $e->getMessage();
  exit(); 
}