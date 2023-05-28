<?php
session_start();
require_once('../helpers/config.php');
require_once('../helpers/connection.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  die('method is not allowed');
}

if (!isset($_POST['id']) || empty($_POST['id'])) {
  die('please suplly valid id');
}

if ($_POST['token'] != $_SESSION['deletemk']) {
  unset($_SESSION['deletemk']);
  header('Location: ./index.php?error=Invalid Token'); 
  exit();
} 

try {
  $query = 'DELETE FROM matakuliah WHERE id=?';
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $_POST['id']);
  $stmt->execute();
  $stmt->close();
  $db -> close();
  unset($_SESSION['deletemk']);
  header('Location: ./index.php?message=mata kuliah berhasil dihapus');
  exit();

} catch(Exception $e) {
  unset($_SESSION['deletemk']);
  header('Location: index.php?error=Mata kuliah gagal dihapus: ' . $e->getMessage());
  exit();
}