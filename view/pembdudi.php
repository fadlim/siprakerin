<?php
  session_start();
  include "koneksi.php";

  $act=$_GET['act'];
  $query=mysql_query("SELECT * FROM tbl_pembdudi,tbl_dataprakerin WHERE tbl_pembdudi.id_dtprakerin=tbl_dataprakerin.id_dtprakerin");
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
<script>
    function myFunction() {
        return confirm("Hapus Data Pembimbing Perusahaan ?");
    }
</script>
<!-- BEGIN BODY -->
<style type="text/css">
    .modal-content{
        border-radius: 0;
        border: 5px solid #3498db;
    }
    /* .modal-header{
     background-color: #3498db;
     }*/
    .modal-title{
        color: #458FFF;
    }
</style>
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
           <div class="caption"><i class="icon-edit"></i>Data Pembimbing Perusahaan</div>
           <div class="tools">
              <a href="javascript:;" class="reload"></a>
           </div>
        </div>
        <div class="portlet-body">
           <div class="table-toolbar">
            <?php
                if($_SESSION['level'] == "0"){
            ?>
              <div class="btn-group">
                 <a href="#portlet-config" data-toggle="modal" class="config">
                    <button class="btn green">
                    Add New <i class="icon-plus"></i>
                    </button>
                 </a>
              </div>
            <?php
            }
            ?>
           </div>
           <table class="table table-striped table-hover table-bordered" id="sample_1">
              <thead>
                 <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Perusahaan</th>
                    <th>Pembimbing Perusahaan</th>
                    <th>Alamat Pembimbing</th>
                    <th>Jabatan</th>
                    <th>No Telepon</th>
                    <th nowrap="nowrap">Action</th>
                 </tr>
              </thead>
              <tbody>
                 <?php 
                    $batas=10;
                    $page=$_GET['hal'];
                    $offset=$page*$batas; 
                    $query=mysql_query("SELECT *,tbl_pembdudi.no_telp as nope FROM tbl_pembdudi,tbl_dataprakerin,mst_siswa,mst_jurusan
                                          WHERE tbl_pembdudi.id_dtprakerin=tbl_dataprakerin.id_dtprakerin
                                          AND tbl_dataprakerin.nis=mst_siswa.nis
                                          AND mst_siswa.id_jur=mst_jurusan.id_jur");
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
                    <td><?php echo $data["nama_pembdudi"]; ?></td>
                    <td><?php echo $data["alamat_pembdudi"]; ?></td>
                    <td><?php echo $data["jabatan"]; ?></td>
                    <td><?php echo $data["nope"]; ?></td>
                    <td nowrap="nowrap">
                      <center>
                      <?php
                          if($_SESSION['level'] == "0"){
                      ?>
                      <a href="home.php?menu=pbbdudi&act=edit&id_pembdudi=<?php echo $data["id_pembdudi"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp;
                      <?php } ?>
                      <a href="home.php?menu=pbbdudi&act=view&id_pembdudi=<?php echo $data["id_pembdudi"]; ?>"><i class="fa fa-search-plus fa-lg" title="View"></i></a> &nbsp;
                      <?php
                          if($_SESSION['level'] == "0"){
                      ?>
                      <a href="proses/proses_pembdudi.php?proses=hapus&id_pembdudi=<?php echo $data["id_pembdudi"]; ?>" onclick="return myFunction()"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
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
                       <div class="caption"><i class="icon-reorder"></i>Form Tambah Pembimbing Perusahaan </div>
                       <div class="tools">
                        <a href="javascript:;" class="reload"></a>
                       </div>
                      </div>
                      <div class="portlet-body form">
                       <!-- BEGIN FORM-->
                       <form action="proses/proses_pembdudi.php?proses=tambah" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <input type="hidden" name="id_dtprakerin" id="id_dtprakerin">
                        <input disabled="disabled" name="nama_pembsek" type="hidden" id="nama_pembsek" value="<?php echo $data['nama_pembsek']; ?>" class="form-control"  placeholder="Enter text">
                        <div class="form-body">
                          <div class="form-group">
                            <label  class="col-md-3 control-label">ID Pembimbing</label>
                            <div class="col-md-9">
                             <input required="required" type="text" name="id_pembdudi" class="form-control"  placeholder="PDXXXX">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">NIS</label>
                              <div class="col-md-9">
                                <div class="input-group">
                                  <input disabled="disabled" type="text" name="nis" id="nis" value="<?php echo $data['nis'];?>" class="form-control"  placeholder="Enter text">
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
                             <input type="text" name="nama_pembdudi" class="form-control"  placeholder="Enter text">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Alamat</label>
                            <div class="col-md-9">
                             <input type="text" name="alamat_pembdudi" class="form-control"  placeholder="Enter text">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">Jabatan</label>
                            <div class="col-md-9">
                             <input type="text" name="jabatan" class="form-control"  placeholder="Enter text">
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-md-3 control-label">No Telephone</label>
                            <div class="col-md-9">
                             <input type="text" name="no_telp" class="form-control"  placeholder="Enter text">
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
      $id_pembdudi=$_GET['id_pembdudi'];
      $query=mysql_query("SELECT *,tbl_pembdudi.no_telp as nope FROM tbl_pembdudi,tbl_dataprakerin,mst_siswa,mst_jurusan
                                  WHERE tbl_pembdudi.id_dtprakerin=tbl_dataprakerin.id_dtprakerin
                                  AND tbl_dataprakerin.nis=mst_siswa.nis
                                  AND mst_siswa.id_jur=mst_jurusan.id_jur AND id_pembdudi='$id_pembdudi'");
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
                <div class="caption"><i class="icon-reorder"></i>Form Edit Pembimbing Perusahaan</div>
                <div class="tools">
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="proses/proses_pembdudi.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                  <input type="hidden" name="id_dtprakerin" id="id_dtprakerin" value="<?php echo $data['id_dtprakerin'];?>">
                  <input disabled="disabled" name="nama_pembsek" type="hidden" id="nama_pembsek" value="<?php echo $data['nama_pembsek']; ?>" class="form-control"  placeholder="Enter text">
                  <div class="form-body">
                     <div class="form-group">
                       <label  class="col-md-3 control-label">ID Pembimbing</label>
                       <div class="col-md-9">
                         <input type="text" name="id_pembdudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[id_pembdudi]; ?>" readonly="readonly">
                       </div>
                     </div>
                     <div class="form-group">
                        <label  class="col-md-3 control-label">NIS</label>
                          <div class="col-md-9">
                            <div class="input-group">
                              <input type="text" name="nis" id="nis" value="<?php echo $data['nis'];?>" class="form-control"  placeholder="Enter text">
                              <span class="input-group-btn">
                                <input type="button" name="cari" class="btn btn-default" value="pick" onClick="CariNis();" />
                              </span>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-md-3 control-label">Nama Siswa</label>
                        <div class="col-md-9">
                         <input disabled="disabled" name="nama_siswa" value="<?php echo $data['nama_siswa'];?>" type="text" id="nama_siswa" class="form-control"  placeholder="Enter text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-md-3 control-label">Jurusan</label>
                        <div class="col-md-9">
                          <input disabled="disabled" name="nama_jur" type="text" value="<?php echo $data['nama_jur'];?>" id="nama_jur" class="form-control"  placeholder="Enter text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-md-3 control-label">Perusahaan</label>
                        <div class="col-md-9">
                          <input disabled="disabled" name="nama_dudi" type="text" value="<?php echo $data['nama_dudi'];?>" id="nama_dudi" class="form-control"  placeholder="Enter text">
                        </div>
                      </div> 
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Pembimbing Perusahaan</label>
                       <div class="col-md-9">
                         <input type="text" name="nama_pembdudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_pembdudi]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Alamat</label>
                       <div class="col-md-9">
                         <input type="text" name="alamat_pembdudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[alamat_pembdudi]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Jabatan</label>
                       <div class="col-md-9">
                         <input type="text" name="jabatan" class="form-control"  placeholder="Enter text" value="<?php echo $data[jabatan]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Nomor Telephone</label>
                       <div class="col-md-9">
                         <input type="text" name="no_telp" class="form-control"  placeholder="Enter text" value="<?php echo $data[nope]; ?>">
                       </div>
                     </div>
                     <div class="form-actions right">                           
                        <button name="submit" type="button" class="btn default" onclick="history.back();">Back</button>  
                        <button name="submit" type="submit" class="btn blue">Submit</button>                            
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
      $query=mysql_query("SELECT *,tbl_pembdudi.no_telp as nope FROM tbl_pembdudi,tbl_dataprakerin,mst_siswa,mst_jurusan
                                  WHERE tbl_pembdudi.id_dtprakerin=tbl_dataprakerin.id_dtprakerin
                                  AND tbl_dataprakerin.nis=mst_siswa.nis
                                  AND mst_siswa.id_jur=mst_jurusan.id_jur AND id_pembdudi='$id_pembdudi'");
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
                <div class="caption"><i class="icon-reorder"></i>Form view Pembimbing Perusahaan</div>
                <div class="tools">
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="proses/proses_pembdudi.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                  <div class="form-body">
                     <div class="form-group">
                       <label  class="col-md-3 control-label">ID Pembimbing</label>
                       <div class="col-md-9">
                         <input type="text" name="id_pembdudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[id_pembdudi]; ?>" >
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
                         <input name="nama_siswa" value="<?php echo $data['nama_siswa'];?>" type="text" id="nama_siswa" class="form-control"  placeholder="Enter text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-md-3 control-label">Jurusan</label>
                        <div class="col-md-9">
                          <input name="nama_jur" type="text" value="<?php echo $data['nama_jur'];?>" id="nama_jur" class="form-control"  placeholder="Enter text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-md-3 control-label">Perusahaan</label>
                        <div class="col-md-9">
                          <input name="nama_dudi" type="text" value="<?php echo $data['nama_dudi'];?>" id="nama_dudi" class="form-control"  placeholder="Enter text">
                        </div>
                      </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Pembimbing Perusahaan</label>
                       <div class="col-md-9">
                         <input type="text" name="nama_pembdudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_pembdudi]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Alamat</label>
                       <div class="col-md-9">
                         <input type="text" name="alamat_pembdudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[alamat_pembdudi]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Jabatan</label>
                       <div class="col-md-9">
                         <input type="text" name="jabatan" class="form-control"  placeholder="Enter text" value="<?php echo $data[jabatan]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Nomor Telephone</label>
                       <div class="col-md-9">
                         <input type="text" name="no_telp" class="form-control"  placeholder="Enter text" value="<?php echo $data[nope]; ?>">
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