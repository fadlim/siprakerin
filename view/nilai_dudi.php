<?php
   include "koneksi.php";

   $act=$_GET['act'];
   $query=mysql_query("SELECT * 
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
                        AND mst_siswa.id_jur = mst_jurusan.id_jur");
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
      window.open('view/popupdatasiswa.php','popuppage','width=580,resizable=1,scrollbars=yes,height=450,top=100,left=370');
    //}
  }
</script>
<script>
    function myFunction() {
        return confirm("Hapus Data Nilai Perusahaan ?");
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
           <div class="caption"><i class="icon-edit"></i>Data Nilai Perusahaan</div>
           <div class="tools">
              <a href="javascript:;" class="reload"></a>
           </div>
        </div>
        <div class="portlet-body">
          <?php
              if($_SESSION['level'] == "0"){
          ?>
           <div class="table-toolbar">
              <div class="btn-group">
                 <a href="#portlet-config" data-toggle="modal" class="config">
                    <button class="btn green">
                    Add New <i class="icon-plus"></i>
                    </button>
                 </a>
              </div>
           </div>
           <?php } ?>
           <table class="table table-striped table-hover table-bordered" id="sample_1">
              <thead>
                 <tr>
                    <th>No</th>
                    <th>Tanggal Penilaian</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Perusahaan</th>
                    <th>Pembimbing Perusahaan</th>
                    <th>Nilai Teknis</th>
                    <th>Nilai Non Teknis</th>
                    <th>Rata Rata Nilai</th>
                    <th>Grade</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Absent</th>
                    <th>Action</th>
                 </tr>
              </thead>
              <tbody>
                 <?php 
                    $batas=10;
                    $page=$_GET['hal'];
                    $offset=$page*$batas; 
                    $query=mysql_query("SELECT * 
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
                                          AND mst_siswa.id_jur = mst_jurusan.id_jur");
                    $nmr=$offset+1;
                    $jml=0;
                    while ($data=mysql_fetch_array($query)) {
                    $jml++;
                 ?>
                 <tr>
                    <td><?php echo $nmr++;?></td>
                    <td><?php echo $data["tgl_penilaian"]; ?></td>
                    <td><?php echo $data["nis"]; ?></td>
                    <td><?php echo $data["nama_siswa"]; ?></td>
                    <td><?php echo $data["nama_jur"]; ?></td>
                    <td><?php echo $data["nama_dudi"]; ?></td>
                    <td><?php echo $data["nama_pembdudi"]; ?></td>
                    <td><?php echo $data["nilai_teknis"]; ?></td>
                    <td><?php echo $data["nilai_nonteknis"]; ?></td>
                    <td><?php echo $data["nilai_ratarataangka"]; ?></td>
                    <td><?php echo $data["nilai_rataratahuruf"]; ?></td>
                    <td><?php echo $data["sakit"]; ?></td>
                    <td><?php echo $data["izin"]; ?></td>
                    <td><?php echo $data["tanpa_keterangan"]; ?></td>
                    <td nowrap="nowrap">
                      <center>
                      <?php
                          if($_SESSION['level'] == "0"){
                      ?>
                      <a href="home.php?menu=nilaidudi&act=edit&id_nilaidudi=<?php echo $data["id_nilaidudi"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp;
                      <?php } ?>
                      <a href="home.php?menu=nilaidudi&act=view&id_nilaidudi=<?php echo $data["id_nilaidudi"]; ?>"><i class="fa fa-search-plus fa-lg" title="View"></i></a> &nbsp;
                      <?php
                          if($_SESSION['level'] == "0"){
                      ?>
                      <a href="proses/proses_nilaidudi.php?proses=hapus&id_nilaidudi=<?php echo $data["id_nilaidudi"]; ?>" onclick="return myFunction()"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
                      <?php } ?>
                      </center>
                    </td>
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
   
<script language="JavaScript">
  function angka(e) {
     if (!/^[0-9]+$/.test(e.value)) {
        e.value = e.value.substring(0,e.value.length-1);
     }
  }

  function jml()
  {
  nilai1=document.formJml.nilai_nonteknis.value;
  nilai2=document.formJml.nilai_teknis.value;
  hasil=parseInt(nilai1)+parseInt(nilai2);
  rata_rata=parseInt(hasil)/parseInt(2);
  document.getElementById('nilai_ratarataangka').value = rata_rata;

  var A = "A";
  var B = "B";
  var C = "C";
  var D = "D";
  if (rata_rata >= 90 && rata_rata <= 100){
    document.getElementById('nilai_hurufdudi').value = A;
  }
  else if(rata_rata >= 70 && rata_rata <= 89.9){
    document.getElementById('nilai_hurufdudi').value = B;
  }
  else if(rata_rata >= 50 && rata_rata <= 69.9){
    document.getElementById('nilai_hurufdudi').value = C;
  }else{
    document.getElementById('nilai_hurufdudi').value = D;
  }
}
</script>

  <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
    <div class="modal fade bs-example-modal-lg" id="portlet-config"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          </div>
          <div class="modal-body">
              <!-- BEGIN PAGE CONTENT-->   
                     <!-- BEGIN PORTLET-->   
                     <div class="portlet box blue">
                      <div class="portlet-title">
                       <div class="caption"><i class="icon-reorder"></i>Form Tambah Nilai Perusahaan </div>
                       <div class="tools">
                        <a href="javascript:;" class="reload"></a>
                       </div>
                      </div>
                      <div class="portlet-body form">
                       <!-- BEGIN FORM-->
                       <form action="proses/proses_nilaidudi.php?proses=tambah" name="formJml" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <input type="hidden" name="id_pembdudi" id="id_pembdudi" class="form-control"  placeholder="Enter text">
                        <div class="form-body">
                          <div class="form-group">
                            <label  class="col-md-3 control-label">ID Nilai</label>
                            <div class="col-md-9">
                             <input type="text" name="id_nilaidudi" required="required" class="form-control"  placeholder="NPXXXX">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Tanggal Penilaian</label>
                            <div class="col-md-3">
                              <div class="input-group input-sm">
                                  <input  data-date-format="yyyy-mm-dd" required="required" name="tgl_penilaian" class="form-control form-control-inline input-medium date-picker" size="16" type="text"/>
                                  <span class="input-group-btn">
                                      <a href="#" class="btn default"><i class="fa fa-calendar"></i></a>
                                  </span>
                              </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">NIS</label>
                              <div class="col-md-9">
                                <div class="input-group">
                                  <input type="text" name="nis" id="nis" required="required" value="<?php echo $data['nis'];?>" class="form-control"  placeholder="Enter text">
                                  <span class="input-group-btn">
                                    <input type="button" name="cari" class="btn btn-default" value="pick" onClick="CariNis();" />
                                  </span>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Nama Siswa</label>
                            <div class="col-md-9">
                             <input disabled="disabled" name="nama_siswa" type="text" id="nama_siswa" class="form-control"  placeholder="Enter text">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Jurusan</label>
                            <div class="col-md-9">
                              <input disabled="disabled" name="nama_jur" type="text" id="nama_jur" class="form-control"  placeholder="Enter text">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Perusahaan</label>
                            <div class="col-md-9">
                              <input disabled="disabled" name="nama_dudi" type="text" id="nama_dudi" class="form-control"  placeholder="Enter text">
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Pembimbing Perusahaan</label>
                            <div class="col-md-9">
                             <input disabled="disabled" type="text" name="nama_pembdudi" id="nama_pembdudi" class="form-control"  placeholder="Enter text">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Nilai Teknis</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_teknis" class="form-control" onblur="jml()" onkeyup="angka(this);"  placeholder="Enter Numeric">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Nilai Non Teknis</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_nonteknis" class="form-control" onblur="jml()" onkeyup="angka(this);"  placeholder="Enter Numeric">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Rata Rata Nilai</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_ratarataangka" id="nilai_ratarataangka" onblur="jml()" class="form-control"  placeholder="Enter Numeric">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Grade</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_rataratahuruf" id="nilai_hurufdudi" class="form-control"  placeholder="Enter text">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Sakit</label>
                            <div class="col-md-9">
                             <input type="text" name="sakit" class="form-control" onkeyup="angka(this);"  placeholder="Enter Numeric">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Izin</label>
                            <div class="col-md-9">
                             <input type="text" name="izin" class="form-control" onkeyup="angka(this);"  placeholder="Enter Numeric">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Absent</label>
                            <div class="col-md-9">
                             <input type="text" name="tanpa_keterangan" class="form-control" onkeyup="angka(this);"  placeholder="Enter Numeric">
                            </div>
                           </div>
                           <div class="form-actions right">                           
                             <button name="submit" type="reset" class="btn default">Reset</button>  
                             <button name="submit" type="submit" class="btn blue">Submit</button>                            
                          </div>
                        </div>
                       </form>
                       <!-- END FORM-->  
                      </div>
                     </div>
                     <!-- END PORTLET-->
            <!-- END PAGE CONTENT--> 
          </div>
      </div>
               <!-- /.modal-content -->
        </div>
            <!-- /.modal-dialog -->
    </div>
         <!-- /.modal -->
     <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->  
      <?php
      }elseif($act=='edit'){ 
      $id_nilaidudi=$_GET['id_nilaidudi'];
      $query=mysql_query("SELECT * 
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
                                  AND tbl_nilaidudi.id_nilaidudi='$id_nilaidudi'");
      $data=mysql_fetch_array($query);
      ?>

      <div class="page-container">
       <!-- BEGIN PAGE CONTENT-->
       <div class="row col-md-12">

      <script type="text/javascript">
        function angka(e) {
           if (!/^[0-9]+$/.test(e.value)) {
              e.value = e.value.substring(0,e.value.length-1);
           }
        }
        function Updatejml()
          {
          nilai1=document.formJml2.nilai_nonteknis.value;
          nilai2=document.formJml2.nilai_teknis.value;
          hasil=parseInt(nilai1)+parseInt(nilai2);
          rata_rata=parseInt(hasil)/parseInt(2);
          document.getElementById('nilai_ratarataangka').value = rata_rata;

          var A = "A";
          var B = "B";
          var C = "C";
          var D = "D";
          if (rata_rata >= 90 && rata_rata <= 100){
            document.getElementById('nilai_hurufdudi').value = A;
          }
          else if(rata_rata >= 70 && rata_rata <= 89.9){
            document.getElementById('nilai_hurufdudi').value = B;
          }
          else if(rata_rata >= 50 && rata_rata <= 69.9){
            document.getElementById('nilai_hurufdudi').value = C;
          }else{
            document.getElementById('nilai_hurufdudi').value = D;
          }
        }
      </script>
         <center>
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <!-- BEGIN PORTLET-->   
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Form Ubah Nilai Perusahaan</div>
                <div class="tools">
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="proses/proses_nilaidudi.php?proses=edit" name="formJml2" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <input type="hidden" name="id_pembdudi" id="id_pembdudi" value="<?php echo $data['id_pembdudi'];?>" class="form-control"  placeholder="Enter text">
                        <div class="form-body">
                          <div class="form-group">
                            <label  class="col-md-3 control-label" required="required">ID Nilai</label>
                            <div class="col-md-9">
                             <input type="text" name="id_nilaidudi" class="form-control" value="<?php echo $data[id_nilaidudi];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Tanggal Penilaian</label>
                            <div class="col-md-3">
                              <div class="input-group input-sm">
                                  <input  data-date-format="yyyy-mm-dd" required="required" name="tgl_penilaian" class="form-control form-control-inline input-medium date-picker" value="<?php echo $data['tgl_penilaian'];?>" size="16" type="text"/>
                                  <span class="input-group-btn">
                                      <a href="#" class="btn default"><i class="fa fa-calendar"></i></a>
                                  </span>
                              </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">NIS</label>
                              <div class="col-md-9">
                                  <input type="text" name="nis" required="required" id="nis" value="<?php echo $data['nis'];?>" class="form-control"  placeholder="Enter text">
                              </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Nama Siswa</label>
                            <div class="col-md-9">
                             <input disabled="disabled" name="nama_siswa" type="text" id="nama_siswa" class="form-control" value="<?php echo $data['nama_siswa'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Jurusan</label>
                            <div class="col-md-9">
                              <input disabled="disabled" name="nama_jur" type="text" id="nama_jur" class="form-control" value="<?php echo $data['nama_jur'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Perusahaan</label>
                            <div class="col-md-9">
                              <input disabled="disabled" name="nama_dudi" type="text" id="nama_dudi" class="form-control" value="<?php echo $data['nama_dudi'];?>">
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Pembimbing Perusahaan</label>
                            <div class="col-md-9">
                             <input disabled="disabled" type="text" name="nama_pembdudi" id="nama_pembdudi" class="form-control"value="<?php echo $data['nama_pembdudi'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Nilai Teknis</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_teknis" class="form-control" onblur="Updatejml()" value="<?php echo $data['nilai_teknis'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Nilai Non Teknis</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_nonteknis" class="form-control" onblur="Updatejml()" value="<?php echo $data['nilai_nonteknis'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Rata Rata Nilai</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_ratarataangka" id="nilai_ratarataangka" onblur="Updatejml()" class="form-control" value="<?php echo $data['nilai_ratarataangka'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Grade</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_rataratahuruf" id="nilai_hurufdudi" class="form-control" value="<?php echo $data['nilai_rataratahuruf'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Sakit</label>
                            <div class="col-md-9">
                             <input type="text" name="sakit" class="form-control" onkeyup="angka(this);" value="<?php echo $data['sakit'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Izin</label>
                            <div class="col-md-9">
                             <input type="text" name="izin" class="form-control" onkeyup="angka(this);" value="<?php echo $data['izin'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Absent</label>
                            <div class="col-md-9">
                             <input type="text" name="tanpa_keterangan" class="form-control" onkeyup="angka(this);" value="<?php echo $data['tanpa_keterangan'];?>">
                            </div>
                           </div>
                           <div class="form-actions right">                           
                             <button name="submit" type="submit" class="btn default" onclick="history.back()">Back</button>  
                             <button name="submit" type="submit" class="btn blue">Ubah</button>                            
                          </div>
                        </div>
                       </form>
                <!-- END FORM-->  
              </div>
            </div>
            <!-- END PORTLET-->
         </div>
            </center>
       </div>
      <!-- END PAGE CONTENT--> 
      </div>
      <?php
      }elseif($act=='view'){ 
      $id_pembdudi=$_GET['id_pembdudi'];
      $query=mysql_query("SELECT * 
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
                        AND mst_siswa.id_jur = mst_jurusan.id_jur");
      $data=mysql_fetch_array($query);
      ?>

      <div class="page-container">
       <!-- BEGIN PAGE CONTENT-->
       <div class="row col-md-12">
         <center>
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <!-- BEGIN PORTLET-->   
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Form view Nilai Monitoring Sekolah</div>
                <div class="tools">
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="proses/proses_nilaisek.php?proses=edit" name="formJml2" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                  <div class="form-body">
                     <div class="form-group">
                            <label  class="col-md-3 control-label">ID Nilai</label>
                            <div class="col-md-9">
                             <input type="text" name="id_nilaidudi" class="form-control" value="<?php echo $data[id_nilaidudi];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Tanggal Penilaian</label>
                            <div class="col-md-3">
                             <input  data-date-format="yyyy-mm-dd" name="tgl_penilaian" class="form-control form-control-inline input-medium date-picker" value="<?php echo $data['tgl_penilaian'];?>" size="16" type="text"/>
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">NIS</label>
                              <div class="col-md-9">
                                  <input type="text" name="nis" id="nis" value="<?php echo $data['nis'];?>" class="form-control"  placeholder="Enter text">
                              </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Nama Siswa</label>
                            <div class="col-md-9">
                             <input disabled="disabled" name="nama_siswa" type="text" id="nama_siswa" class="form-control" value="<?php echo $data['nama_siswa'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Jurusan</label>
                            <div class="col-md-9">
                              <input disabled="disabled" name="nama_jur" type="text" id="nama_jur" class="form-control" value="<?php echo $data['nama_jur'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-md-3 control-label">Perusahaan</label>
                            <div class="col-md-9">
                              <input disabled="disabled" name="nama_dudi" type="text" id="nama_dudi" class="form-control" value="<?php echo $data['nama_dudi'];?>">
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Pembimbing Perusahaan</label>
                            <div class="col-md-9">
                             <input disabled="disabled" type="text" name="nama_pembdudi" id="nama_pembdudi" class="form-control"value="<?php echo $data['nama_pembdudi'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Nilai Teknis</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_teknis" class="form-control" onblur="Updatejml()" value="<?php echo $data['nilai_teknis'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Nilai Non Teknis</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_nonteknis" class="form-control" onblur="Updatejml()" value="<?php echo $data['nilai_nonteknis'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Rata Rata Nilai</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_ratarataangka" id="nilai_ratarataangka" onblur="Updatejml()" class="form-control" value="<?php echo $data['nilai_ratarataangka'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Grade</label>
                            <div class="col-md-9">
                             <input type="text" name="nilai_rataratahuruf" id="nilai_hurufdudi" class="form-control" value="<?php echo $data['nilai_rataratahuruf'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Sakit</label>
                            <div class="col-md-9">
                             <input type="text" name="sakit" class="form-control" value="<?php echo $data['sakit'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Izin</label>
                            <div class="col-md-9">
                             <input type="text" name="izin" class="form-control" value="<?php echo $data['izin'];?>">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Absent</label>
                            <div class="col-md-9">
                             <input type="text" name="tanpa_keterangan" class="form-control" value="<?php echo $data['tanpa_keterangan'];?>">
                            </div>
                           </div>
                     <div class="form-actions right">                           
                        <button name="submit" type="button" class="btn default" onclick="history.back();">Back</button>                          
                     </div>
                  </div>
                </form>
                <!-- END FORM-->  
              </div>
            </div>
            <!-- END PORTLET-->
         </div>
            </center>
       </div>
      <!-- END PAGE CONTENT--> 
      </div>
      <?php
        }
      ?>
      </div>
   </div>
</body>
<!-- END BODY -->
</html>