<?php
session_start();
require_once('../helpers/config.php');
require_once('../helpers/connection.php');

$datetime = new DateTime();
$_SESSION['deletemk'] = $datetime->getTimestamp();

try {
  $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
  $limit = 10;
  $offset = ($page-1) * $limit;

  $where = [];
  if (isset($_GET['search']) && !empty($_GET['search'])) {
    $where['search'] = $_GET['search'];
  }

  $condition  = isset($where['search']) ? 'WHERE nama like ? OR kode_matakuliah LIKE ?' : '';
  $dataCount = getCount($db, $condition, $where);
  $lastPage = ceil($dataCount['jumlah']/$limit);

  $pagination = [
    'start' => $page - 5 > 1 ? $page - 5 : 1, 
    'end'=> $page + 5 <= $lastPage ? $page + 5 : $lastPage
  ];

  if ($pagination['start'] + 9 > $pagination['end']) {
    $pagination['end'] = $pagination['start'] + 9 <= $lastPage ? $pagination['start'] + 9 : $lastPage;
  }

  if ($pagination['end'] - 9 < $pagination['start']) {
    $pagination['start'] = $pagination['end'] - 9 >= 1 ? $pagination['end'] - 9 : 1;
  }

  $sort = [
    'field' => isset($_GET['sort_field']) && in_array($_GET['sort_field'], ['id', 'nama', 'kode_matakuliah']) ? $_GET['sort_field'] : 'id',
    'order' => isset($_GET['sort_order']) && in_array(strtolower($_GET['sort_order']), ['asc', 'desc']) ? $_GET['sort_order'] : 'asc'
  ];
  
  $datas = listData($db, $condition, $where, $sort, $offset, $limit);
  $db -> close();

} catch(Exception $e) {
  echo 'Gaga; mendapatkan data: '. $e->getMessage();
  exit(); 
}

function getCount($db, $condition, $where) {
  $stmt = $db->prepare("SELECT COUNT(*) jumlah FROM matakuliah $condition");
  if ($condition) {
    $search = "%{$where['search']}%";
    $stmt->bind_param("ss", $search, $search);
  }
  $stmt->execute();
    
  $count = $stmt->get_result();
  $stmt->close();
  $dataCount = $count->fetch_assoc();
  $count->free_result();
  return $dataCount;
}
function listData($db, $condition, $where, $sort, $offset, $limit) {
  $query = "SELECT * FROM matakuliah $condition";
  $query .= " ORDER BY {$sort['field']} {$sort['order']}";
  $query .= " LIMIT $offset, $limit";
  $stmt = $db->prepare($query);
  if ($condition) {
    $search = "%{$where['search']}%";
    $stmt->bind_param('ss', $search, $search);
  }
  $stmt->execute();
    
  $result = $stmt->get_result();
  $stmt->close();
  $datas = [];

  while ($row = $result -> fetch_assoc()) {
    $datas[] = $row;
  }
  $result -> free_result();
  return $datas;
}

function getLinkPagination($page, $sort, $where) {
  $params = ['page' => $page];
  $params['sort_field'] = $sort['field'];
  $params['sort_order'] = $sort['order'];
  if (isset($where['search'])) $params['search'] = $where['search'];

  $url = [];
  foreach ($params as $i=>$v) {
    $url[] = $i . '=' . $v;
  }
  
  return './index.php?'.implode('&', $url);
}

include('index_view.php');