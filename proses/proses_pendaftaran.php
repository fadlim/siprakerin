<?php
error_reporting(E_ALL ^ E_NOTICE);
include "../koneksi.php";

$id_dtprakerin = $_POST['id_dtprakerin'];
$nis = $_POST['nis'];
$id_pembsek = $_POST['id_pembsek'];
$tgl_daftar = $_POST['tgl_daftar'];
$nama_dudi = $_POST['nama_dudi'];
$alamat_dudi = $_POST['alamat_dudi'];
$no_telp = $_POST['no_telp'];
$nama_pemimpin = $_POST['nama_pemimpin'];
$status = $_POST['status'];

$proses = $_GET['proses'];
$hapus = $_GET['id_dtprakerin'];
$view = $_GET['id_dtprakerin'];
$dtstatus= $_GET['id_dtprakerin'];
$status=$_GET['status'];


if ($proses == 'tambah') {
  $cek=mysql_query("SELECT NIS FROM tbl_dataprakerin where nis in ('$nis') and status = '0'");
  $a = mysql_fetch_array($cek);
  
    if($nis == $a[0]){
      echo "<script language='javascript'>alert('Maaf Statusnya Masih Aktif');document.location='../home.php?menu=daftar&nis=$nis'</script>";
    }else{
      mysql_query("insert into tbl_dataprakerin values('$id_dtprakerin','$nis','$id_pembsek','$tgl_daftar','$nama_dudi','$alamat_dudi','$no_telp','$nama_pemimpin','$status')");
      header("location:../home.php?menu=daftar");
    }
    
} elseif ($proses == 'edit') {
    mysql_query("update tbl_dataprakerin set nis='$nis',id_pembsek='$id_pembsek',tgl_daftar='$tgl_daftar',nama_dudi='$nama_dudi', alamat_dudi='$alamat_dudi', no_telp='$no_telp', nama_pemimpin='$nama_pemimpin',status='$status' where id_dtprakerin='$id_dtprakerin'");
    header("location:../home.php?menu=daftar");
} elseif ($proses == 'hapus') {
    mysql_query("delete from tbl_dataprakerin where id_dtprakerin='$hapus'");
    header("location:../home.php?menu=daftar");
} elseif ($proses == 'view') {
    mysql_query("select * from tbl_dataprakerin where id_dtprakerin='$view'");
}elseif($proses=='nonaktif'){
      $query=("update tbl_dataprakerin set status='1' where id_dtprakerin='$dtstatus'");
      $sql=mysql_query($query); 
    ?><script language="javascript">alert('Data Nonaktif');document.location='../home.php?menu=daftar&status=<?php echo $status?>'</script><?php
       
  }
?>