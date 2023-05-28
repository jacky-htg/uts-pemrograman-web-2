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

if ($_POST['token'] != $_SESSION['deletemhs']) {
  unset($_SESSION['deletemhs']);
  header('Location: ./index.php?error=Invalid Token'); 
  exit();
} 

try {
  $query = 'DELETE FROM mahasiswa WHERE id=?';
  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $_POST['id']);
  $stmt->execute();
  $stmt->close();
  $db -> close();
  unset($_SESSION['deletemhs']);
  header('Location: ./index.php?message=mahasiswa berhasil dihapus');
  exit();

} catch(Exception $e) {
  unset($_SESSION['deletemhs']);
  header('Location: index.php?error=Mahasiswa gagal dihapus: ' . $e->getMessage());
  exit();
}