<?php
include('../koneksi.php');

$id_nilaidudi = $_POST['id_nilaidudi'];
$tgl_penilaian = $_POST['tgl_penilaian'];
$id_pembdudi = $_POST['id_pembdudi'];
$nilai_teknis = $_POST['nilai_teknis'];
$nilai_nonteknis = $_POST['nilai_nonteknis'];
$nilai_ratarataangka = $_POST['nilai_ratarataangka'];
$nilai_rataratahuruf = $_POST['nilai_rataratahuruf'];
$sakit = $_POST['sakit'];
$izin = $_POST['izin'];
$tanpa_keterangan = $_POST['tanpa_keterangan'];

$proses=$_GET['proses'];
$hapus=$_GET['id_nilaidudi'];
$view=$_GET['id_nilaidudi'];

	if($proses=='tambah'){
		/*$a="insert into tbl_nilaidudi values('$id_nilaidudi','$tgl_penilaian','$id_pembdudi','$nilai_teknis','$nilai_nonteknis','$nilai_ratarataangka','$nilai_rataratahuruf','$sakit','$izin','$tanpa_keterangan')";
		echo "$a";*/
		$cekid=mysql_query("select id_nilaidudi from tbl_nilaidudi where id_nilaidudi in('$id_nilaidudi')");
		$arrId=mysql_fetch_array($cekid);
		if($id_nilaidudi == $arrId[0]){
			echo "<script language='javascript'>alert('Maaf ID Sudah Ada');document.location='../home.php?menu=nilaidudi'</script>";
		}else{
			mysql_query("insert into tbl_nilaidudi values('$id_nilaidudi','$tgl_penilaian','$id_pembdudi','$nilai_teknis','$nilai_nonteknis','$nilai_ratarataangka','$nilai_rataratahuruf','$sakit','$izin','$tanpa_keterangan')");
		}
		
	}
		
	elseif($proses=='edit'){
		mysql_query("UPDATE tbl_nilaidudi SET tgl_penilaian='$tgl_penilaian',id_pembdudi='$id_pembdudi',nilai_teknis='$nilai_teknis',nilai_nonteknis='$nilai_nonteknis',nilai_ratarataangka='$nilai_ratarataangka',nilai_rataratahuruf='$nilai_rataratahuruf',sakit='$sakit',izin='$izin',tanpa_keterangan='$tanpa_keterangan' WHERE id_nilaidudi='$id_nilaidudi'");
	}
	
	elseif($proses=='hapus'){
		mysql_query("delete from tbl_nilaidudi where id_nilaidudi='$hapus'");
	}
	elseif($proses=='view'){
		mysql_query("select from tbl_nilaidudi where id_nilaidudi='$view'");
	}
		 header("location:../home.php?menu=nilaidudi");
?>
