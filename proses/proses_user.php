<?php
error_reporting(E_ALL ^ E_NOTICE);

include('../koneksi.php');

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$level = $_POST['level'];

$proses = $_GET['proses'];
$view = $_GET['id_user'];
$hapus=$_GET['id_user'];

if ($proses == 'tambah') {
    mysql_query("insert into tbl_user values('$id_user','$username','$password','$nama_lengkap','$email','$level')");
} elseif ($proses == 'edit') {
    mysql_query("update tbl_user set username='$username',password='$password',nama_lengkap='$nama_lengkap',email='$email',level='$level' where id_user='$id_user'");
} elseif ($proses == 'hapus') {
    mysql_query("delete from tbl_user where id_user='$hapus'");
} elseif ($proses == 'view') {
    mysql_query("select from tbl_user where id_user='$view'");
}
/*email*/
$to=$email;

$message="From:$nama_lengkap <br /> User Name :".$username."<br /> Password :".$password;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <smkn1kawali@gmail.com>' . "\r\n";
$headers .= 'Cc: adminsmkn1kawali@gmail.com' . "\r\n";
@mail($to,$username,$headers);
if(@mail)
{
	echo "<script language='javascript'>window.location='../home.php?menu=user'</script>";	
}

// header("location:../home.php?menu=user");
?>