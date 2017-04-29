<?php
include "../koneksi.php";

$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$tgl_lahir = $_POST['tgl_lahir'];
$tempat_lahir = $_POST['tempat_lahir'];
$alamat_siswa = $_POST['alamat_siswa'];
$jeniskelamin = $_POST['jeniskelamin'];
$no_telp = $_POST['no_telp'];
$id_kelas = $_POST['id_kelas'];
$id_jur = $_POST['id_jur'];
$id_tahunajaran = $_POST['id_tahunajaran'];
$proses=$_GET['proses'];
$hapus=$_GET['nis'];
$view=$_GET['nis'];

/*$foto = $_FILES["foto"]["name"];
$locasi="foto/";
$pathfoto=$locasi.$foto;
*/
	if($proses=='tambah'){
		/*if($foto){
			move_uploaded_file($_FILES["foto"]["tmp_name"],$pathfoto);
		}
		else{
			$foto =$locasi.$foto;
		}*/
		mysql_query("insert into mst_siswa values('$nis', '$nama_siswa', '$tgl_lahir', '$tempat_lahir','$alamat_siswa', '$jeniskelamin','$no_telp', '$id_kelas','$id_jur','$id_tahunajaran')");
		header("location:../home.php?menu=siswa");
	}
		
	elseif($proses=='edit'){
		/*if($foto){
			move_uploaded_file($_FILES["foto"]["tmp_name"],$pathfoto);
		}
		else{
			$foto =$locasi.$foto;
		}*/
		mysql_query("update mst_siswa set nama_siswa='$nama_siswa', tgl_lahir='$tgl_lahir', tempat_lahir='$tempat_lahir',alamat_siswa='$alamat_siswa', jeniskelamin='$jeniskelamin', no_telp='$no_telp', id_kelas='$id_kelas', id_jur='$id_jur',id_tahunajaran='$id_tahunajaran' where nis='$nis'");
		header("location:../home.php?menu=siswa");
	}
	
	elseif($proses=='hapus'){
		mysql_query("delete from mst_siswa where nis='$hapus'");
		header("location:../home.php?menu=siswa");
	}
	
	elseif($proses=='view'){
		mysql_query("select * from mst_siswa where nis='$view'");	
	}
?>