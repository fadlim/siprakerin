<?php

include('../koneksi.php');

$id_jur = $_POST['id_jur'];
$nama_jur = $_POST['nama_jur'];
$proses = $_GET['proses'];
$hapus = $_GET['id_jur'];
$view = $_GET['id_jur'];

if ($proses == 'tambah') {
    mysql_query("insert into mst_jurusan values('$id_jur', '$nama_jur')");
} elseif ($proses == 'edit') {
    mysql_query("update mst_jurusan set nama_jur='$nama_jur' where id_jur='$id_jur'");
} elseif ($proses == 'hapus') {
    mysql_query("delete from mst_jurusan where id_jur='$hapus'");
} elseif ($proses == 'view') {
    mysql_query("select from mst_jurusan where id_jur='$view'");
}
header("location:../home.php?menu=mstJur");
?>