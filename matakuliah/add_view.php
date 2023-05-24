<html>
<head>
    <link rel="stylesheet" href="../style.css"/>
  </head>
  
  <body>
    <?php require_once('../templates/header.php');?>
    <?php require_once('../templates/menu.php');?>
    
    <section>
      <h1>Tambah Mata Kuliah Baru</h1>
      <form action="./add.php" method="POST" class="form">
      <div>
        <label>Nama</label>
        <input name="nama" required />
        <input type="hidden" name="token" value="<?php echo $_SESSION['addmk'];?>"/>
      </div>
      <div>
        <label>Kode Mata Kuliah</label>
        <input name="kode_matakuliah" required />
      </div>  
      <div>
        <label>Deskripsi</label>
        <textarea name="deskripsi"></textarea>
      </div>  
      <div><button type="submit">Submit</button></div>
      </form>
    </section>
    <?php require_once('../templates/footer.php');?>
  </body>
</html>