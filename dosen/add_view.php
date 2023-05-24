<html>
<head>
    <link rel="stylesheet" href="../style.css"/>
  </head>
  
  <body>
    <?php require_once('../templates/header.php');?>
    <?php require_once('../templates/menu.php');?>
    
    <section>
      <a href="./">Kembali ke halaman list dosen</a>
      <h2>Tambah Dosen Baru</h2>
      <form action="./add.php" method="POST" class="form">
      <div>
        <label>NIDN</label>
        <input name="nidn" required />
      </div>  
      <div>
        <label>Nama</label>
        <input name="nama" required />
        <input type="hidden" name="token" value="<?php echo $_SESSION['adddosen'];?>"/>
      </div>
      <div>
        <label>Jenjang Pendidikan</label>
        <select name="jenjang_pendidikan">
          <option value="S2">S2</option>
          <option value="S3">S3</option>
        </select>
      </div>  
      <div><button type="submit">Submit</button></div>
      </form>
    </section>
    <?php require_once('../templates/footer.php');?>
  </body>
</html>