<html>
  <head>
    <link rel="stylesheet" href="../style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/d6889eb6eb.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php require_once('./templates/header.php');?>
    <?php require_once('./templates/menu.php');?>
    <section>
      <h2>Selamat Datang di Sistem Informasi Akademik Universitas Siber Asia</h2>
      
      <div style="display:flex">
        <div class="box">
          <a href="./mahasiswa"><i class="fa-solid fa-graduation-cap fa-2xl"></i><div style="padding-top:30px;">Mahasiswa</div></a>
        </div>
        <div class="box"><a href="./dosen"><i class="fa-solid fa-person-chalkboard fa-2xl"></i><div style="padding-top:30px;">Dosen</div></a></div>
        <div class="box"><a href="./matakuliah"><i class="fa-solid fa-school fa-2xl"></i><div style="padding-top:30px;">Mata Kuliah</div></a></div>
      </div>
    </section>
    <?php require_once('./templates/footer.php');?>
  </body>
</html>