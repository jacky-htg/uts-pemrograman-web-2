<html>
<head>
    <link rel="stylesheet" href="../style.css"/>
  </head>
  
  <body>
    <?php require_once('../templates/header.php');?>
    <?php require_once('../templates/menu.php');?>
    
    <section>
      <a href="./">Kembali ke halaman list mahasiswa</a>
      <h2>Tambah Mahasiswa Baru</h2>
      <form action="./add.php" method="POST" class="form">
      <div>
        <label>NIM</label>
        <input name="nim" required />
      </div>  
      <div>
        <label>Nama</label>
        <input name="nama" required />
        <input type="hidden" name="token" value="<?php echo $_SESSION['addmhs'];?>"/>
      </div>
      <div>
        <label>Program Studi</label>
        <input name="program_studi" required/>
      </div>  
      <div><button type="submit">Submit</button></div>
      </form>
    </section>
    <?php require_once('../templates/footer.php');?>
  </body>
</html>