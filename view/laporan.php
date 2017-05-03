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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NILAI PRAKERIN</title>
	<style type="text/css"> 
	.tables { font: 12px/24px Times New Roman; 
	border-collapse: collapse; 
	 
	margin:0 auto; 
	} 
	
	.tht { border: 1px solid #000; 
	text-align: center; } 
	
	.tdt { border: 1px solid #000; 
	padding: 0 0.5em; } 
	
	h1 { color:#003300; 
	font:22px "Trebuchet MS"; 
	text-align:center; }
.tdb {
vertical-align:bottom;text-align:center;border:solid 1px;
}

	</style></head><!--/head-->

<body>
<table class="tables" border=0>
<tr>
<td class="" align="right"><img align="right" src="../images/logo2.png" width=60 height=50/></td>
<td class=""><p><center><b><font size=3>DAFTAR NILAI</font></b>
<br><b><font size=3>HASIL PRAKTIK KERJA INDUSTRI</font></b></center></p></td>
</tr>
<tr><td colspan=2 class="" style="border:2px solid; #000000; padding: 0 0.5em;">
</td></tr>
<tr><td colspan=2>
</td></tr>
<tr><td colspan=2 class="" style="border:1px solid; #000000; padding: 0 0.5em;">
</td></tr>
<tr><td colspan=2 class="">

<table border=0 width=350>
<tr>
<td width="200">NAMA</td><td>:</td><td><?php echo $data['nama_siswa'];?></td>
</tr>
<tr>
<td>NIM</td><td>:</td><td><?php echo $data['nis'];?></td>
</tr>
<tr>
<td>TTL</td><td>:</td><td><?php echo $data['tempat_lahir'];?>, <?php echo $data['tgl_lahir'];?></td>
</tr>
<tr>
<td>PROGRAM KEAHLIAN</td><td>:</td><td><?php echo $data['nama_jur'];?></td>
</tr>
<tr>
<td>TEMPAT PRAKTEK</td><td>:</td><td><?php echo $data['nama_dudi'];?></td>
</tr>
</table>

<br />

<table class="tables" cellpadding=5 cellspacing=5 width=550> 
<p><h3>I. KOMPONEN KOMPETENSI KEAHLIAN</h3></p>
<tr> 
	<th class="tdt">NO</th>
	<th class="tdt">KETERAMPILAN</th>
	<th class="tdt">NILAI</th>
	<th class="tdt">PREDIKAT</th>
</tr>
<?php
for ($i=1; $i <= 8; $i++) {
if($data['component_kbd' . $i . ''] != ''){
?>
<tr> 
	<td class="tdt" align="center"><?php echo $i;?></td>
	<td class="tdt" align="left"><?php echo $data['component_kbd' . $i . ''];?></td>
	<td class="tdt" align="center"><?php echo $data['nilai_kbd' . $i . ''];?></td>
	<td class="tdt" align="center"><?php echo $data['grade' . $i . ''];?></td>
</tr>
<?php }else{
?>
<tr> 
	<td class="tdt" align="center"><?php echo $i;?></td>
	<td class="tdt" align="left"></td>
	<td class="tdt" align="center"></td>
	<td class="tdt" align="center"></td>
</tr>
<?php
}

} ?>
</table>

<br>

<table class="tables" cellpadding=5 cellspacing=5 width=550> 
<p><h3>II. KOMPONEN UMUM</h3></p>
<tr> 
	<th class="tdt">NO</th>
	<th class="tdt">KETERAMPILAN</th>
	<th class="tdt">NILAI</th>
	<th class="tdt">PREDIKAT</th>
</tr>
<?php
for ($i=1; $i <= 4; $i++) {
if($data['component_ku' . $i . ''] != ''){
?>
<tr> 
	<td class="tdt" align="center"><?php echo $i;?></td>
	<td class="tdt" align="left"><?php echo $data['component_ku' . $i . ''];?></td>
	<td class="tdt" align="center"><?php echo $data['nilai_ku' . $i . ''];?></td>
	<td class="tdt" align="center"><?php echo $data['gradeu' . $i . ''];?></td>
</tr>
<?php }else{
?>
<tr> 
	<td class="tdt" align="center"><?php echo $i;?></td>
	<td class="tdt" align="left"></td>
	<td class="tdt" align="center"></td>
	<td class="tdt" align="center"></td>
</tr>
<?php
}

} ?>
</table>
<br>

<table class="tables" cellpadding=5 cellspacing=5 width=550> 
<tr> 
	<th class="tdt">NILAI</th>
	<th class="tdt">KETERANGAN</th>
	<th class="tdt">PREDIKAT</th>
</tr>

<tr> 
	<td class="tdt" align="center">86 - 100</td>
	<td class="tdt" align="center">A</td>
	<td class="tdt" align="center">Amat Baik</td>
</tr>

<tr> 
	<td class="tdt" align="center">76 - 85</td>
	<td class="tdt" align="center">B</td>
	<td class="tdt" align="center">Baik</td>
</tr>

<tr> 
	<td class="tdt" align="center">60 - 75</td>
	<td class="tdt" align="center">C</td>
	<td class="tdt" align="center">Cukup</td>
</tr>

<tr> 
	<td class="tdt" align="center">< 60</td>
	<td class="tdt" align="center">D</td>
	<td class="tdt" align="center">Kurang</td>
</tr>
</table>

<table border=0 align="center">
<tr>
<td align="center"></td>
</tr>
<tr>
<td>
<table border=0 align="center">
<tr>
<td align="right" colspan=3><b>Tanda Tangan Pengesahan</b></td>
</tr>
<tr>
<td width=150 height=80><b></b></td>
<td width=150 height=80><b></b></td>
<td align="center" width=150 height=80><b>Pembimbing</b></td>
</tr>
</table>
</td></tr>
</table><br>
</td></tr></table>
<br>
<center><a href="laporan.php" onClick="window.print();return false"><i class="fa fa-print"></i>CETAK</a></center>
</body>
</html>