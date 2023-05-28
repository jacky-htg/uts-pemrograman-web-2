<?php
session_start();
require_once('../helpers/config.php');
require_once('../helpers/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if ($_POST['token'] != $_SESSION['adddosen']) {
      unset($_SESSION['adddosen']);
      header('Location: ./index.php?error=Invalid Token'); 
      exit();
    } 
    
    $query = 'INSERT INTO dosen (nama, nidn, jenjang_pendidikan) VALUES(?, ?, ?)';
    $stmt = $db->prepare($query);
    $stmt->bind_param('sss', $_POST['nama'], $_POST['nidn'], $_POST['jenjang_pendidikan']);
    $stmt->execute();
    $stmt->close();
    $db -> close();
    unset($_SESSION['addmk']);
    header('Location: ./index.php?message=dosen berhasil ditambahkan');
    exit();

  } catch(Exception $e) {
    unset($_SESSION['adddosen']);
    header('Location: ./index.php?error=dosen gagal ditambahkan: ' . $e->getMessage()); 
    exit();
  }
} 
  
$datetime = new DateTime();
$_SESSION['adddosen'] = $datetime->getTimestamp();

include('add_view.php');