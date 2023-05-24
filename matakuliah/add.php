<?php
session_start();
require_once('../helpers/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if ($_POST['token'] != $_SESSION['addmk']) {
      unset($_SESSION['addmk']);
      header('Location: ./index.php?error=Invalid Token'); 
      exit();
    } 
    $db = new mysqli($DB_host,$DB_user,$DB_pass,$DB_dbname);

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
    header('Location: ./index.php?error=Mata kuliah gagal ditambahkan'); 
    exit();
  }
} 
  
$datetime = new DateTime();
$_SESSION['addmk'] = $datetime->getTimestamp();

include('add_view.php');