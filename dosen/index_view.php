<html>
  <head>
    <link rel="stylesheet" href="../style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php require_once('../templates/header.php');?>
    <?php require_once('../templates/menu.php');?>
    <section>
    <?php require_once('../templates/toast.php');?>

      <h2>Dosen</h2>
      
      <div style="display:flex">
        <a href="./add.php"><button>Tambah Dosen Baru</button></a> &nbsp; &nbsp;
        <div class="search">
          <input type="text" id="search" placeholder="Search.." name="search" value="<?php echo isset($where['search']) ? $where['search']: '' ;?>">
          <button type="submit" onclick="window.location.href='./index.php?search='+document.getElementById('search').value+'&strata='+document.getElementById('strata').value"><i class="fa fa-search"></i></button>
        </div>
        <div>
          <label>&nbsp; Jenjang Pendidikan</label>
          <select id="strata" name="strata" onchange="window.location.href='./index.php?search='+document.getElementById('search').value+'&strata='+document.getElementById('strata').value">
            <option <?php echo !isset($where['strata']) ? 'selected' : ($where['strata'] == 'all' || empty($where['strata'])  ? 'selected' : '');?> value="all">All</option>
            <option <?php echo (isset($where['strata']) && $where['strata'] == 'S2') ? 'selected' :  '';?> value="S2">S2</option>
            <option <?php echo (isset($where['strata']) && $where['strata'] == 'S3') ? 'selected' :  '';?> value="S3">S3</option>
          </select>
        </div>
      </div>
      <table>
        <tr>
          <th>
            <a class="header" href="./index.php?sort_field=id&search=<?php echo isset($where['search'])?$where['search'] : '';?>&strata=<?php echo isset($where['strata']) ? $where['strata'] : '';?>&sort_order=<?php echo $sort['field'] == 'id' && $sort['order'] == 'asc' ? 'desc' : 'asc';?>">
              ID 	<?php echo $sort['field'] == 'id' ? ($sort['order'] == 'asc' ? '&uarr;': '&darr;') : '';?>
            </a>
          </th>
          <th>
            <a class="header" href="./index.php?sort_field=nidn&search=<?php echo isset($where['search'])?$where['search'] : '';?>&strata=<?php echo isset($where['strata']) ? $where['strata'] : '';?>&sort_order=<?php echo $sort['field'] == 'nidn' && $sort['order'] == 'asc' ? 'desc' : 'asc';?>">
              NIDN 	<?php echo $sort['field'] == 'nidn' ? ($sort['order'] == 'asc' ? '&uarr;': '&darr;') : '';?>
            </a>
          </th>
          <th>
            <a class="header" href="./index.php?sort_field=nama&search=<?php echo isset($where['search'])?$where['search'] : '';?>&strata=<?php echo isset($where['strata']) ? $where['strata'] : '';?>&sort_order=<?php echo $sort['field'] == 'nama' && $sort['order'] == 'asc' ? 'desc' : 'asc';?>">
              NAMA 	<?php echo $sort['field'] == 'nama' ? ($sort['order'] == 'asc' ? '&uarr;': '&darr;') : '';?>
            </a>
          </th>
          <th>
            <a class="header" href="./index.php?sort_field=jenjang_pendidikan&search=<?php echo isset($where['search'])?$where['search'] : '';?>&strata=<?php echo isset($where['strata']) ? $where['strata'] : '';?>&sort_order=<?php echo $sort['field'] == 'jenjang_pendidikan' && $sort['order'] == 'asc' ? 'desc' : 'asc';?>">
              JENJANG PENDIDIKAN 	<?php echo $sort['field'] == 'jenjang_pendidikan' ? ($sort['order'] == 'asc' ? '&uarr;': '&darr;') : '';?>
            </a>
          </th>
          <th>Action</th>
        </tr>
        <?php foreach($datas as $data) : ?>
          <tr>
            <td><?php echo $data['id'];?></td>
            <td><?php echo $data['nidn'];?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['jenjang_pendidikan'];?></td>
            <td style="display:flex;">
              <a href="./edit.php?id=<?php echo $data['id'];?>"><button>Update</button></a>
              &nbsp; &nbsp; 
              <form action="./delete.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
                <input type="hidden" name="token" value="<?php echo $_SESSION['deletedosen'];?>"/>
                <button type="button" onclick="if(confirm('Yakin ingin menghapus data <?php echo $data['id'];?>?')) this.parentElement.submit()">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <?php require_once('../templates/pagination.php');?>
    </section>
    <?php require_once('../templates/footer.php');?>
  </body>
</html>