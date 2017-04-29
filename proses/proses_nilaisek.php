<?php
include('../koneksi.php');

$id_nilaiSek = $_POST['id_nilaiSek'];
$tgl_penilaian = $_POST['tgl_penilaian'];
$id_dtprakerin = $_POST['id_dtprakerin'];
$nilai_teknis = $_POST['nilai_teknis'];
$nilai_nonteknis = $_POST['nilai_nonteknis'];
$nilai_ratarataangka = $_POST['nilai_ratarataangka'];
$nilai_rataratahuruf = $_POST['nilai_rataratahuruf'];

$proses=$_GET['proses'];
$hapus=$_GET['id_nilaiSek'];
$view=$_GET['id_nilaiSek'];

	if($proses=='tambah'){
		/*$a="insert into tbl_nilaisekolah values('$id_nilaiSek','$tgl_penilaian', '$id_dtprakerin','$nilai_teknis','$nilai_nonteknis','$nilai_ratarataangka','$nilai_rataratahuruf')";
		echo "$a";*/
		$cekid=mysql_query("select id_nilaiSek from tbl_nilaisekolah where id_nilaiSek in('$id_nilaiSek')");
		$arrId=mysql_fetch_array($cekid);
		if($id_nilaiSek == $arrId[0]){
			echo "<script language='javascript'>alert('Maaf ID Sudah Ada');document.location='../home.php?menu=jadwal'</script>";
		}else{
			mysql_query("insert into tbl_nilaisekolah values('$id_nilaiSek','$tgl_penilaian', '$id_dtprakerin','$nilai_teknis','$nilai_nonteknis','$nilai_ratarataangka','$nilai_rataratahuruf')");
		}
	}
		
	elseif($proses=='edit'){
		mysql_query("update tbl_nilaisekolah set tgl_penilaian='$tgl_penilaian', id_dtprakerin='$id_dtprakerin',nilai_teknis='$nilai_teknis', nilai_nonteknis='$nilai_nonteknis',nilai_ratarataangka='$nilai_ratarataangka',nilai_rataratahuruf='$nilai_rataratahuruf' where id_nilaiSek='$id_nilaiSek'");
	}
	
	elseif($proses=='hapus'){
		mysql_query("delete from tbl_nilaisekolah where id_nilaiSek='$hapus'");
	}
	elseif($proses=='view'){
		mysql_query("select from tbl_nilaisekolah where id_nilaiSek='$view'");
	}
		header("location:../home.php?menu=nilaisek");
?>