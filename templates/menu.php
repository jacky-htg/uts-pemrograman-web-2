<?php
  // protect direct access
  if (str_contains($_SERVER['REQUEST_URI'], '/templates/menu.php')) {
    header('Location: /');
    exit();
  }
  
  $menu = 'home';
  if (str_contains($_SERVER['REQUEST_URI'], 'mahasiswa')) {
    $menu = 'mahasiswa';
  } elseif (str_contains($_SERVER['REQUEST_URI'], 'dosen')) {
    $menu = 'dosen';
  } elseif (str_contains($_SERVER['REQUEST_URI'], 'matakuliah')) {
    $menu = 'matakuliah';
  }
?>
  <nav>
    <ul>
      <li><a class="<?php echo $menu == 'home' ? 'active': '';?>" href="<?php echo $menu == 'home' ? '#': '/';?>">Home</a></li>
      <li><a class="<?php echo $menu == 'mahasiswa' ? 'active': '';?>" href="<?php echo $menu == 'mahasiswa' ? '#': '/mahasiswa';?>">Mahasiswa</a></li>
      <li><a class="<?php echo $menu == 'dosen' ? 'active': '';?>" href="<?php echo $menu == 'dosen' ? '#': '/dosen';?>">Dosen</a></li>
      <li><a class="<?php echo $menu == 'matakuliah' ? 'active': '';?>" href="<?php echo $menu == 'matakuliah' ? '#': '/matakuliah';?>">Mata Kuliah</a></li>
    </ul>
  </nav>