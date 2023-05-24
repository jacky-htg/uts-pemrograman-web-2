<?php
session_start();
require_once('../helpers/config.php');

try {
  $db = new mysqli($DB_host,$DB_user,$DB_pass,$DB_dbname);
} catch(Exception $e) {
  echo $e->getMessage();
  exit(); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if ($_POST['token'] != $_SESSION['editmhs']) {
      unset($_SESSION['editmhs']);
      header('Location: ./index.php?error=Invalid Token'); 
      exit();
    } 

    $query = 'UPDATE mahasiswa SET nama=?, nim=?, program_studi=? WHERE id=?';
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $_POST['nama'], $_POST['nim'], $_POST['program_studi'], $_POST['id']);
    $stmt->execute();
    $stmt->close();
    $db -> close();
    unset($_SESSION['editmhs']);
    header('Location: ./index.php?message=Mahasiswa berhasil diupdate');
    exit();

  } catch(Exception $e) {
    unset($_SESSION['editmhs']);
    header('Location: ./index.php?error=Mahasiswa gagal diupdate:' . $e->getMessage());
    exit();
  }
} else {
  try {
    $query = 'SELECT * FROM mahasiswa WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $_GET['id']);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $stmt->close();
    $data = $result -> fetch_assoc();
    if (!$data) {
      unset($_SESSION['editmhs']);
      header('Location: ./index.php?error=Invalid ID mahasiswa');
      exit();
    }
    $result -> free_result();
    $db -> close();

  } catch(Exception $e) {
    unset($_SESSION['editmk']);
    header('Location: ./index.php?error=Invalid ID Mahasiswa'); 
    exit();
  }
}

$datetime = new DateTime();
$_SESSION['editmhs'] = $datetime->getTimestamp();

include('edit_view.php');