<?php
include('../koneksi.php');

$id_nilai = $_POST['id_nilai'];
$id_siswa = $_POST['id_siswa'];
$id_nilaiSek = $_POST['id_nilaiSek'];
$id_nilaiDudi = $_POST['id_nilaiDudi'];
$nilai_sekdu = $_POST['nilai_sekdu'];
$nilai_gradesekdu = $_POST['nilai_gradesekdu'];

$proses=$_GET['proses'];
$hapus=$_GET['id_nilai'];
$view=$_GET['id_nilai'];

	if($proses=='tambah'){
		mysql_query("insert into tbl_nilaisek values('$id_nilai', '$id_siswa', '$id_nilaiSek', '$id_nilaiDudi','$nilai_sekdu','$nilai_gradesekdu')");
	}
		
	elseif($proses=='edit'){
		mysql_query("update tbl_nilaisek set id_siswa='$id_siswa', id_nilaiSek='$id_nilaiSek', id_nilaiDudi='$id_nilaiDudi',nilai_sekdu='$nilai_sekdu',nilai_gradesekdu='$nilai_gradesekdu' where id_nilai='$id_nilai'");
	}
	
	elseif($proses=='hapus'){
		mysql_query("delete from tbl_nilaisek where id_nilai='$hapus'");
	}
	elseif($proses=='view'){
		mysql_query("select from tbl_nilaisek where id_nilai='$view'");
	}
		header("location:../home.php?menu=nilaigab");
?>