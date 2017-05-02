<?php
include('../koneksi.php');

$id_nilaidudi = $_POST['id_nilaidudi'];
$tgl_penilaian = $_POST['tgl_penilaian'];
$id_pembdudi = $_POST['id_pembdudi'];
	$componentkbu1 = $_POST['componentkbu1'];
	$componentkbu2 = $_POST['componentkbu2'];
	$componentkbu3 = $_POST['componentkbu3'];
	$componentkbu4 = $_POST['componentkbu4'];
	$componentkbu5 = $_POST['componentkbu5'];
	$componentkbu6 = $_POST['componentkbu6'];
	$componentkbu7 = $_POST['componentkbu7'];
	$componentkbu8 = $_POST['componentkbu8'];
	$mark1  = $_POST['mark1'];
	$mark2  = $_POST['mark2'];
	$mark3  = $_POST['mark3'];
	$mark4  = $_POST['mark4'];
	$mark5  = $_POST['mark5'];
	$mark6  = $_POST['mark6'];
	$mark7  = $_POST['mark7'];
	$mark8  = $_POST['mark8'];
	$grade1 = $_POST['grade1'];
	$grade2 = $_POST['grade2'];
	$grade3 = $_POST['grade3'];
	$grade4 = $_POST['grade4'];
	$grade5 = $_POST['grade5'];
	$grade6 = $_POST['grade6'];
	$grade7 = $_POST['grade7'];
	$grade8 = $_POST['grade8'];

	$componentku1 = $_POST['componentku1'];
	$componentku2 = $_POST['componentku2'];
	$componentku3 = $_POST['componentku3'];
	$componentku4 = $_POST['componentku4'];
	$marku1  = $_POST['marku1'];
	$marku2  = $_POST['marku2'];
	$marku3  = $_POST['marku3'];
	$marku4  = $_POST['marku4'];
	$gradeu1 = $_POST['gradeu1'];
	$gradeu2 = $_POST['gradeu2'];
	$gradeu3 = $_POST['gradeu3'];
	$gradeu4 = $_POST['gradeu4'];


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
			mysql_query("INSERT INTO tbl_nilaidudi VALUES('$id_nilaidudi','$tgl_penilaian','$id_pembdudi','$mark1','$mark2','$mark3','$mark4','$mark5','$mark6','$mark7','$mark8','$componentkbu1','$componentkbu2','$componentkbu3','$componentkbu4','$componentkbu5','$componentkbu6','$componentkbu7','$componentkbu8','$grade1','$grade2','$grade3','$grade4','$grade5','$grade6','$grade7','$grade8','$marku1','$marku2','$marku3','$marku4','$componentku1','$componentku2','$componentku3','$componentku4','$gradeu1','$gradeu2','$gradeu3','$gradeu4')");
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
