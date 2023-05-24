<html>
  <head>
    <link rel="stylesheet" href="../style.css"/>
  </head>
  <body>
    <?php require_once('../templates/header.php');?>
    <?php require_once('../templates/menu.php');?>
    <section>
      <a href="./">Kembali ke halaman list mata kuliah</a>
      <h2>Edit Mata Kuliah</h2>
      <form action="./edit.php" method="POST" class="form">
      <div>
        <label>Kode Mata Kuliah</label>
        <input name="kode_matakuliah" required value="<?php echo $data['kode_matakuliah'];?>"/>
      </div>  
      <div>
        <label>Nama</label>
        <input name="nama" required value="<?php echo $data['nama'];?>"/>
        <input name="id" type="hidden" value="<?php echo $data['id'];?>"/>
        <input type="hidden" name="token" value="<?php echo $_SESSION['editmk'];?>"/>
      </div>  
      <div>
        <label>Deskripsi</label>
        <textarea name="deskripsi"><?php echo $data['deskripsi'];?></textarea>
      </div>  
      <div><button type="submit">Submit</button></div>
      </form>
    </section>
    <?php require_once('../templates/footer.php');?>
  </body>
</html>