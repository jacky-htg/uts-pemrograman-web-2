<html>
  <head>
    <link rel="stylesheet" href="../style.css"/>
  </head>
  <body>
    <?php require_once('../templates/header.php');?>
    <?php require_once('../templates/menu.php');?>
    <section>
      <a href="./">Kembali ke halaman list mahasiswa</a>
      <h2>Edit Mahasiswa</h2>
      <form action="./edit.php" method="POST" class="form">
      <div>
        <label>NIM</label>
        <input name="nim" required value="<?php echo $data['nim'];?>"/>
      </div>  
      <div>
        <label>Nama</label>
        <input name="nama" required value="<?php echo $data['nama'];?>"/>
        <input name="id" type="hidden" value="<?php echo $data['id'];?>"/>
        <input type="hidden" name="token" value="<?php echo $_SESSION['editmhs'];?>"/>
      </div>  
      <div>
        <label>Program Studi</label>
        <input name="program_studi" required value="<?php echo $data['program_studi'];?>"/>
      </div>  
      <div><button type="submit">Submit</button></div>
      </form>
    </section>
    <?php require_once('../templates/footer.php');?>
  </body>
</html>