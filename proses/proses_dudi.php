<?php
include('../koneksi.php');

$id_dudi = $_POST['id_dudi'];
$nama_dudi = $_POST['nama_dudi'];
$alamat_dudi = $_POST['alamat_dudi'];
$no_telp = $_POST['no_telp'];
$nama_pemimpin = $_POST['nama_pemimpin'];
$proses=$_GET['proses'];
$hapus=$_GET['id_dudi'];
$view=$_GET['id_dudi'];

	if($proses=='tambah'){
		mysql_query("insert into mst_dudi values('$id_dudi', '$nama_dudi', '$alamat_dudi', '$no_telp', '$nama_pemimpin')");
	}
		
	elseif($proses=='edit'){
		mysql_query("update mst_dudi set nama_dudi='$nama_dudi', alamat_dudi='$alamat_dudi', no_telp='$no_telp', nama_pemimpin='$nama_pemimpin' where id_dudi='$id_dudi'");
	}
	
	elseif($proses=='hapus'){
		mysql_query("delete from mst_dudi where id_dudi='$hapus'");
	}
	elseif($proses=='view'){
		mysql_query("select from mst_dudi where id_dudi='$view'");
	}
		header("location:../home.php?menu=dudi");
?>