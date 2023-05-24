<?php
// protect direct access
if (str_contains($_SERVER['REQUEST_URI'], '/templates/footer.php')) {
  header('Location: /');
  exit();
}
?>
    <footer>
      copyright &copy; 2023 - Rijal Asepnugroho
    </footer>