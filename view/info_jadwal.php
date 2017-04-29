<?php
   include "koneksi.php";

   $act=$_GET['act'];
   $query=mysql_query("SELECT * FROM tbl_jadwalmonitoring,tbl_dataprakerin WHERE tbl_jadwalmonitoring.nis=tbl_dataprakerin.nis");
   $jum=mysql_num_rows($query);
?>
<html lang="en" class="no-js">
<script type="text/javascript">

  function CariNis(){
    // var tanggal = document.getElementById('datepicker');
    // if(tanggal.value.trim().length == 0){
    //   alert("Tanggal harus diisi");
    //   tanggal.focus();
    //   return false;
    // }else{
      window.open('view/popupdtprakerin.php','popuppage','width=500,resizable=1,scrollbars=yes,height=450,top=100,left=420');
    //}
  }
</script>
<!-- BEGIN BODY -->
<body>
   <!-- BEGIN CONTAINER -->
   <div>
      <div>
      <!-- BEGIN PAGE -->
	 <?php
		if(empty($act)){
	 ?>  
         <!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
     <!-- BEGIN EXAMPLE TABLE PORTLET-->
     <div class="portlet box blue">
        <div class="portlet-title">
           <div class="caption"><i class="icon-edit"></i>Data Jadwal Monitoring</div>
           <div class="tools">
              <a href="javascript:;" class="reload"></a>
           </div>
        </div>
        <div class="portlet-body">
           <table class="table table-striped table-hover table-bordered" id="sample_1">
              <thead>
                 <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Perusahaan</th>
                    <th>Guru Pembimbing</th>
                    <th>Start Prakerin</th>
                    <th>Finish Prakerin</th>
                    <th>Tanggal Monitoring</th>
                 </tr>
              </thead>
              <tbody>
                 <?php 
                    $batas=10;
                    $page=$_GET['hal'];
                    $offset=$page*$batas; 
                    $query=mysql_query("SELECT * FROM tbl_jadwalmonitoring,tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek
                                          WHERE tbl_jadwalmonitoring.nis=tbl_dataprakerin.nis
                                          AND tbl_dataprakerin.nis=mst_siswa.nis
                                          AND mst_siswa.id_jur=mst_jurusan.id_jur
                                          AND mst_pembsek.id_pembsek= tbl_dataprakerin.id_pembsek");
                    $nmr=$offset+1;
                    $jml=0;
                    while ($data=mysql_fetch_array($query)) {
                    $jml++;
                 ?>
                 <tr>
                    <td><?php echo $nmr++;?></td>
                    <td><?php echo $data["nis"]; ?></td>
                    <td><?php echo $data["nama_siswa"]; ?></td>
                    <td><?php echo $data["nama_jur"]; ?></td>
                    <td><?php echo $data["nama_dudi"]; ?></td>
                    <td><?php echo $data["nama_pembsek"]; ?></td>
                    <td><?php echo $data["start_date"]; ?></td>
                    <td><?php echo $data["end_date"]; ?></td>
                    <td><?php echo $data["tgl_monitor"]; ?></td>
                 </tr>
                  <?php
                    }//tutup while
                  ?>
              </tbody>
           </table>
        </div>
     </div>
     <!-- END EXAMPLE TABLE PORTLET-->
  </div>
</div>
 <!-- END PAGE CONTENT -->
<!-- END PAGE -->
      <?php
        }
      ?>
      </div>
   </div>
</body>
<!-- END BODY -->
</html>