<?php
session_start();
require_once('../helpers/config.php');
require_once('../helpers/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if ($_POST['token'] != $_SESSION['editmk']) {
      unset($_SESSION['editmk']);
      header('Location: ./index.php?error=Invalid Token'); 
      exit();
    } 

    $query = 'UPDATE matakuliah SET nama=?, kode_matakuliah=?, deskripsi=? WHERE id=?';
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $_POST['nama'], $_POST['kode_matakuliah'], $_POST['deskripsi'], $_POST['id']);
    $stmt->execute();
    $stmt->close();
    $db -> close();
    unset($_SESSION['editmk']);
    header('Location: ./index.php?message=Mata kuliah berhasil diupdate');
    exit();

  } catch(Exception $e) {
    unset($_SESSION['editmk']);
    header('Location: ./index.php?error=Mata kuliah gagal diupdate:' . $e->getMessage());
    exit();
  }
} else {
  try {
    $query = 'SELECT * FROM matakuliah WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $_GET['id']);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $stmt->close();
    $data = $result -> fetch_assoc();
    if (!$data) {
      unset($_SESSION['editmk']);
      header('Location: ./index.php?error=Invalid ID mata kuliah');
      exit();
    }
    $result -> free_result();
    $db -> close();

  } catch(Exception $e) {
    unset($_SESSION['editmk']);
    header('Location: ./index.php?error=Invalid ID Mata Kuliah'); 
    exit();
  }
}

$datetime = new DateTime();
$_SESSION['editmk'] = $datetime->getTimestamp();

include('edit_view.php');