<?php
session_start();
if (!isset($_SESSION["login"])){
  header ("Location: ../../login.php");
  exit;
}
require '../../functions.php';

$id = $_GET["id"];

if ( hapusreservasi($id)){
    echo "
      <script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'adopsi.php';
      </script>
    ";
  }else {
    echo "
      <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'adopsi.php';
      </script>
    ";
  }
?>