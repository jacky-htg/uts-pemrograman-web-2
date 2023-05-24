<?php
session_start();
require_once('../helpers/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if ($_POST['token'] != $_SESSION['addmhs']) {
      unset($_SESSION['addmhs']);
      header('Location: ./index.php?error=Invalid Token'); 
      exit();
    } 
    $db = new mysqli($DB_host,$DB_user,$DB_pass,$DB_dbname);

    $query = 'INSERT INTO mahasiswa (nama, nim, program_studi) VALUES(?, ?, ?)';
    $stmt = $db->prepare($query);
    $stmt->bind_param('sss', $_POST['nama'], $_POST['nim'], $_POST['program_studi']);
    $stmt->execute();
    $stmt->close();
    $db -> close();
    unset($_SESSION['addmhs']);
    header('Location: ./index.php?message=mahasiswa berhasil ditambahkan');
    exit();

  } catch(Exception $e) {
    unset($_SESSION['addmhs']);
    header('Location: ./index.php?error=Mahasiswa gagal ditambahkan: ' . $e->getMessage()); 
    exit();
  }
} 
  
$datetime = new DateTime();
$_SESSION['addmhs'] = $datetime->getTimestamp();

include('add_view.php');