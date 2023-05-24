<?php
// protect direct access
if (str_contains($_SERVER['REQUEST_URI'], '/templates/header.php')) {
  header('Location: /');
  exit();
}
?>
    <header>
      <h1>Sistem Informasi Akademik</h1>
    </header>