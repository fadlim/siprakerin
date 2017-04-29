<?php
include('../koneksi.php');

$id_jadwal = $_POST['id_jadwal'];
$id_dtprakerin = $_POST['id_dtprakerin'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$tgl_monitor = $_POST['tgl_monitor'];

$proses=$_GET['proses'];
$hapus=$_GET['id_jadwal'];
$view=$_GET['id_jadwal'];

	if($proses=='tambah'){
		$cekid=mysql_query("select id_jadwal from tbl_jadwalmonitoring where id_jadwal in('$id_jadwal')");
		$arrId=mysql_fetch_array($cekid);
		if($id_jadwal == $arrId[0]){
			echo "<script language='javascript'>alert('Maaf ID Sudah Ada');document.location='../home.php?menu=jadwal'</script>";
		}else{
			mysql_query("insert into tbl_jadwalmonitoring values('$id_jadwal','$id_dtprakerin','$start_date','$end_date','$tgl_monitor')");
		}
	}
		
	elseif($proses=='edit'){
		mysql_query("update tbl_jadwalmonitoring set id_dtprakerin='$id_dtprakerin',start_date='$start_date',end_date='$end_date',tgl_monitor='$tgl_monitor' where id_jadwal='$id_jadwal'");
	}
	
	elseif($proses=='hapus'){
		mysql_query("delete from tbl_jadwalmonitoring where id_jadwal='$hapus'");
	}
	elseif($proses=='view'){
		mysql_query("select from tbl_jadwalmonitoring where id_jadwal='$view'");
	}
		header("location:../home.php?menu=jadwal");
?>