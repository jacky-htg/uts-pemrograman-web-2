<?php
session_start();
require_once('../helpers/config.php');
require_once('../helpers/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    if ($_POST['token'] != $_SESSION['editdosen']) {
      unset($_SESSION['editdosen']);
      header('Location: ./index.php?error=Invalid Token'); 
      exit();
    } 

    $query = 'UPDATE dosen SET nama=?, nidn=?, jenjang_pendidikan=? WHERE id=?';
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $_POST['nama'], $_POST['nidn'], $_POST['jenjang_pendidikan'], $_POST['id']);
    $stmt->execute();
    $stmt->close();
    $db -> close();
    unset($_SESSION['editdosen']);
    header('Location: ./index.php?message=Dosen berhasil diupdate');
    exit();

  } catch(Exception $e) {
    unset($_SESSION['editdosen']);
    header('Location: ./index.php?error=Dosen gagal diupdate: ' . $e->getMessage());
    exit();
  }
} else {
  try {
    $query = 'SELECT * FROM dosen WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $_GET['id']);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $stmt->close();
    $data = $result -> fetch_assoc();
    if (!$data) {
      unset($_SESSION['editdosen']);
      header('Location: ./index.php?error=Invalid ID dosen');
      exit();
    }
    $result -> free_result();
    $db -> close();

  } catch(Exception $e) {
    unset($_SESSION['editdosen']);
    header('Location: ./index.php?error=Invalid ID dosen'); 
    exit();
  }
}

$datetime = new DateTime();
$_SESSION['editdosen'] = $datetime->getTimestamp();

include('edit_view.php');