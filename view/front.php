<?php
include "../koneksi.php";
$id_nilaidudi=$_GET['id_nilaidudi'];
$q = mysql_query("SELECT tbl_nilaidudi.*,tbl_pembdudi.*,tbl_dataprakerin.*,mst_siswa.*,mst_jurusan.*
                                          FROM 
                                          tbl_nilaidudi
                                          ,tbl_pembdudi
                                          ,tbl_dataprakerin
                                          ,mst_siswa
                                          ,mst_jurusan
                                          WHERE 
                                          tbl_nilaidudi.id_pembdudi=tbl_pembdudi.id_pembdudi
                                          AND tbl_dataprakerin.id_dtprakerin = tbl_pembdudi.id_dtprakerin 
                                          AND mst_siswa.nis = tbl_dataprakerin.nis
                                          AND mst_siswa.id_jur = mst_jurusan.id_jur
                                          AND tbl_nilaidudi.id_nilaidudi = '$id_nilaidudi'") or die(mysql_error());
$data = mysql_fetch_array($q);
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sertifikat</title>
  
  
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      body {
  background: rgb(204,204,204); 
}
page {
  background: url(bingkai.jpg);;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  background-size:cover;
  background-size:100%;
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="portrait"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="portrait"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

#content {
  width: 250px;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  top: 10%;
  transform: translateY(-50%);
}
p {
  color:#000;
  text-align:center;
  font-size: 1.2em;
  padding:0;
  margin: 0;
  text-align:center;
  margin:auto;
}
.ket{
  margin-top: 50%;
}
.spacing {
  letter-spacing:.4em;
}
.left{
  text-align: left;
  margin-left: 10%;
}
.spacing-large {
  letter-spacing:0.9em;
  text-align: center;
  text-indent: 0.9em;
}
    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <page size="A4">
  <div id="content">
    <img align="right" src="../images/logo2.png" width=250 height=200/>    <br>    
  </div>  
</div>
<div>
  <p class="spacing ket">- SERTIFIKAT -</p><br>
  <p class="left">Pemegang surat ini yaitu:</p><br>
  <table class="left">
    <tr>
      <td width="150">NIS</td>
      <td>:</td>
      <td><?php echo $data['nis'];?></td>
    </tr>
    <tr>
      <td width="150">Nama</td>
      <td>:</td>
      <td><?php echo $data['nama_siswa'];?></td>
    </tr>
    <tr>
      <td width="150">TTL</td>
      <td>:</td>
      <td><?php echo $data['tempat_lahir'];?>, <?php echo $data['tgl_lahir'];?></td>
    </tr>
    <tr>
      <td width="150">Program Keahlian</td>
      <td>:</td>
      <td><?php echo $data['nama_jur'];?></td>
    </tr>
  </table>
  <p class="left">Telah melaksanakan Pendidikan Sistem Ganda (PSG)</p>
</div>

</page>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
</body>
</html>
