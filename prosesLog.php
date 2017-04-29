<?php
session_start();
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("dbprakerin");

$user = $_POST['username'];
$pwd = $_POST['password'];
$op = $_GET['op'];


$cek = mysql_query("SELECT * FROM tbl_user WHERE username='$user' AND password='$pwd'");
    if(mysql_num_rows($cek) > 0){//jika berhasil akan bernilai 1
        $_SESSION["login"] = TRUE;
        $c = mysql_fetch_array($cek);
        $_SESSION['nama_lengkap'] = $c['nama_lengkap'];
        $_SESSION['username'] = $c['username'];
        $_SESSION['level'] = $c['level'];
    	if($c['level']=="0"){
    		header("location:home.php");
    	}else if($c['level']=="1"){
    		header("location:home.php");
    	}else if($c['level']=="2"){
    		header("location:home.php");
    	}
    }elseif(empty($user)&& empty($pwd)){
        header("location:index.php");
    }else{
        ?>
        <script type="text/javascript">
            alert("maaf login anda masih gagal");
            window.location='index.php';
        </script>
        <?php
    }

?>