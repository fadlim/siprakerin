<?php

include('../koneksi.php');

$id_tahunajaran = $_POST['id_tahunajaran'];
$tahun_ajaran = $_POST['tahun_ajaran'];
$status = $_POST['status'];

$proses = $_GET['proses'];
$view = $_GET['id_user'];
$hapus=$_GET['id_user'];

if ($proses == 'tambah') {
    mysql_query("insert into tbl_tahunajaran values('$id_tahunajaran','$tahun_ajaran','$status')");
} elseif ($proses == 'edit') {
    mysql_query("update tbl_tahunajaran set tahun_ajaran='$tahun_ajaran',status='$status' where id_tahunajaran='$id_tahunajaran'");
} elseif ($proses == 'hapus') {
    mysql_query("delete from tbl_tahunajaran where id_tahunajaran='$hapus'");
} elseif ($proses == 'view') {
    mysql_query("select from tbl_tahunajaran where id_tahunajaran='$view'");
}
header("location:../home.php?menu=tahunajaran");
?>