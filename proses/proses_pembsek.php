<?php
include('../koneksi.php');

$id_pembsek = $_POST['id_pembsek'];
$nip = $_POST['nip'];
$nama_pembsek = $_POST['nama_pembsek'];
$pengajar = $_POST['pengajar'];
$jabatan = $_POST['jabatan'];
$proses=$_GET['proses'];
$hapus=$_GET['id_pembsek'];
$view=$_GET['id_pembsek'];

	if($proses=='tambah'){
		$cekid=mysql_query("select id_pembsek from mst_pembsek where id_pembsek in('$id_pembsek')");
		$arrId=mysql_fetch_array($cekid);
		if($id_pembsek == $arrId[0]){
			echo "<script language='javascript'>alert('Maaf ID Sudah Ada');document.location='../home.php?menu=pemSek'</script>";
		}else{
			mysql_query("insert into mst_pembsek values('$id_pembsek','$nip','$nama_pembsek','$pengajar','$jabatan')");
		}
	}
		
	elseif($proses=='edit'){
		mysql_query("update mst_pembsek set nip='$nip',nama_pembsek='$nama_pembsek',pengajar='$pengajar',jabatan='$jabatan' where id_pembsek='$id_pembsek'");
	}
	
	elseif($proses=='hapus'){
		mysql_query("delete from mst_pembsek where id_pembsek='$hapus'");
	}
	elseif($proses=='view'){
		mysql_query("delete from mst_pembsek where id_pembsek='$view'");
	}
	
		header("location:../home.php?menu=pemSek");
?>