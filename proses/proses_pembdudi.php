<?php
include('../koneksi.php');

$id_pembdudi = $_POST['id_pembdudi'];
$id_dtprakerin = $_POST['id_dtprakerin'];
$nama_pembdudi = $_POST['nama_pembdudi'];
$alamat_pembdudi = $_POST['alamat_pembdudi'];
$jabatan = $_POST['jabatan'];
$no_telp = $_POST['no_telp'];

$proses=$_GET['proses'];
$hapus=$_GET['id_pembdudi'];
$view=$_GET['id_pembdudi'];

	if($proses=='tambah'){
	/*$a="insert into tbl_pembdudi values('$id_pembdudi','$id_dtprakerin','$nama_pembdudi','$alamat_pembdudi','$jabatan','$no_telp')";
		echo "$a";*/
	  $cekid=mysql_query("SELECT id_pembdudi FROM tbl_pembdudi where id_pembdudi in ('$id_pembdudi')");
	  $acekid =mysql_fetch_array($cekid);
	  if($id_pembdudi = $acekid[0]){
	  	echo "<script language='javascript'>alert('Maaf ID Sudah Ada');document.location='../home.php?menu=pbbdudi&id_pembdudi=$id_pembdudi'</script>";
	  }else{
		$id_pembdudi = $_POST['id_pembdudi'];
	  mysql_query("insert into tbl_pembdudi values('$id_pembdudi','$id_dtprakerin','$nama_pembdudi','$alamat_pembdudi','$jabatan','$no_telp')");	
	  }
	}
		
	elseif($proses=='edit'){
		mysql_query("update tbl_pembdudi set id_dtprakerin='$id_dtprakerin',nama_pembdudi='$nama_pembdudi',alamat_pembdudi='$alamat_pembdudi',jabatan='$jabatan',no_telp='$no_telp' where id_pembdudi='$id_pembdudi'");
	}
	
	elseif($proses=='hapus'){
		mysql_query("delete from tbl_pembdudi where id_pembdudi='$hapus'");
	}
	elseif($proses=='view'){
		mysql_query("select from tbl_pembdudi where id_pembdudi='$view'");
	}
		header("location:../home.php?menu=pbbdudi");
?>