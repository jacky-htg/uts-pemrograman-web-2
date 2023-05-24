<html>
  <head>
    <link rel="stylesheet" href="../style.css"/>
  </head>
  <body>
    <?php require_once('../templates/header.php');?>
    <?php require_once('../templates/menu.php');?>
    <section>
      <a href="./">Kembali ke halaman list dosen</a>
      <h2>Edit Dosen</h2>
      <form action="./edit.php" method="POST" class="form">
      <div>
        <label>NIDN</label>
        <input name="nidn" required value="<?php echo $data['nidn'];?>"/>
      </div>  
      <div>
        <label>Nama</label>
        <input name="nama" required value="<?php echo $data['nama'];?>"/>
        <input name="id" type="hidden" value="<?php echo $data['id'];?>"/>
        <input type="hidden" name="token" value="<?php echo $_SESSION['editdosen'];?>"/>
      </div>  
      <div>
        <label>Jenjang Pendidikan</label>
        <select name="jenjang_pendidikan">
          <option value="S2" <?php echo $data['jenjang_pendidikan'] == 'S2' ? 'selected' : '';?> >S2</option>
          <option value="S3" <?php echo $data['jenjang_pendidikan'] == 'S3' ? 'selected' : '';?> >S3</option>
        </select>
      </div>  
      <div><button type="submit">Submit</button></div>
      </form>
    </section>
    <?php require_once('../templates/footer.php');?>
  </body>
</html>