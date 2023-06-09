<?php
session_start();
require_once('../helpers/config.php');
require_once('../helpers/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if ($_POST['token'] != $_SESSION['addmk']) {
      unset($_SESSION['addmk']);
      header('Location: ./index.php?error=Invalid Token'); 
      exit();
    } 
    $query = 'INSERT INTO matakuliah (nama, kode_matakuliah, deskripsi) VALUES(?, ?, ?)';
    $stmt = $db->prepare($query);
    $stmt->bind_param('sss', $_POST['nama'], $_POST['kode_matakuliah'], $_POST['deskripsi']);
    $stmt->execute();
    $stmt->close();
    $db -> close();
    unset($_SESSION['addmk']);
    header('Location: ./index.php?message=mata kuliah berhasil ditambahkan');
    exit();

  } catch(Exception $e) {
    unset($_SESSION['addmk']);
    header('Location: ./index.php?error=Mata kuliah gagal ditambahkan: ' . $e->getMessage()); 
    exit();
  }
} 
  
$datetime = new DateTime();
$_SESSION['addmk'] = $datetime->getTimestamp();

include('add_view.php');