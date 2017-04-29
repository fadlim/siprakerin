<?php
   include "koneksi.php";

   $act=$_GET['act'];
   $query=mysql_query("select * from mst_dudi");
   $jum=mysql_num_rows($query);
?>
<html lang="en" class="no-js">
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
                     <div class="caption"><i class="icon-edit"></i>Data Perusahaan</div>
                     <div class="tools">
                        <a href="javascript:;" class="reload"></a>
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-toolbar">
                        <div class="btn-group">
                           <a href="#portlet-config" data-toggle="modal" class="config">
                              <button class="btn green">
                              Add New <i class="icon-plus"></i>
                              </button>
                           </a>
                        </div>
                     </div>
                     <table class="table table-striped table-hover table-bordered" id="sample_1">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Nama Perusahaan</th>
                              <th>Alamat</th>
                              <th>No Telp</th>
                              <th>Nama Pemimpin</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $batas=5;
                              $page=$_GET['hal'];
                              $offset=$page*$batas; 
                              $nmr=$offset+1;
                                $query=mysql_query("select * from mst_dudi");
                              $jml=0;
                              while ($data=mysql_fetch_array($query)) {
                              $jml++;
                           ?>
                           <tr>
                              <td><?php echo $nmr++;?></td>
                              <td><?php echo $data["nama_dudi"]; ?></td>
                              <td><?php echo $data["alamat_dudi"]; ?></td>
                              <td><?php echo $data["no_telp"]; ?></td>
                              <td><?php echo $data["nama_pemimpin"]; ?></td>
                              <td>
                                <a href="home.php?menu=dudi&act=edit&id_dudi=<?php echo $data["id_dudi"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp;
                               <a href="home.php?menu=dudi&act=view&id_dudi=<?php echo $data["id_dudi"]; ?>"><i class="fa fa-search-plus fa-lg" title="View"></i></a> &nbsp;                                 
                                <a href="proses/proses_dudi.php?proses=hapus&id_dudi=<?php echo $data["id_dudi"]; ?>"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
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
        <div class="modal-dialog modal-lg ">
			<div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                  </div>
				          <div class="modal-body">
					         <!-- BEGIN PAGE CONTENT-->   
                       <!-- BEGIN PORTLET-->   
                       <div class="portlet box blue">
                        <div class="portlet-title">
                         <div class="caption"><i class="icon-reorder"></i>Form Tambah Siswa</div>
                         <div class="tools">
                          <a href="javascript:;" class="reload"></a>
                         </div>
                        </div>
                        <div class="portlet-body form">
                         <!-- BEGIN FORM-->
                         <form action="proses/proses_dudi.php?proses=tambah" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                          <div class="form-body">
                            <div class="form-group">
                              <label  class="col-md-3 control-label">ID DUDI</label>
                              <div class="col-md-9">
                               <input type="text" name="id_dudi" class="form-control"  placeholder="Enter text">
                              </div>
                             </div>
                             <div class="form-group">
                              <label  class="col-md-3 control-label">Nama Perusahaan</label>
                              <div class="col-md-9">
                               <input type="text" name="nama_dudi" class="form-control"  placeholder="Enter text">
                              </div>
                             </div>
                             <div class="form-group">
                              <label  class="col-md-3 control-label">Alamat</label>
                              <div class="col-md-9">
                               <textarea name="alamat_dudi" class="form-control" rows="3"></textarea>
                              </div>
                             </div>
                             <div class="form-group">
                              <label  class="col-md-3 control-label">No Telp</label>
                              <div class="col-md-9">
                               <input name="no_telp" type="text" class="form-control"  placeholder="Enter text">
                              </div>
                             </div>
                             <div class="form-group">
                              <label  class="col-md-3 control-label">Nama Pemimpin</label>
                              <div class="col-md-9">
                               <input name="nama_pemimpin" type="text" class="form-control"  placeholder="Enter text">
                              </div>
                             </div>
                             <div class="form-actions right">                           
                               <button name="submit" type="button" class="btn default">Back</button>  
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
      $id_dudi=$_GET['id_dudi'];
      $query=mysql_query("select * from mst_dudi where id_dudi='$id_dudi'");
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
                <div class="caption"><i class="icon-reorder"></i>Form Edit Perusahaan</div>
                <div class="tools">
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="proses/proses_dudi.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                  <div class="form-body">
                     <div class="form-group">
                       <label  class="col-md-3 control-label">ID DUDI</label>
                       <div class="col-md-9">
                         <input type="text" name="id_dudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[id_dudi]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Nama Perusahaan</label>
                       <div class="col-md-9">
                         <input type="text" name="nama_dudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_dudi]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                                  <label  class="col-md-3 control-label">Alamat</label>
                                  <div class="col-md-9">
                                   <textarea name="alamat_dudi" class="form-control" rows="3"><?php echo $data[alamat_dudi]; ?></textarea>
                                  </div>
                                 </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">NO Telp</label>
                       <div class="col-md-9">
                         <input name="no_telp" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[no_telp]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Nama Pemimpin</label>
                       <div class="col-md-9">
                         <input name="nama_pemimpin" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_pemimpin]; ?>">
                       </div>
                     </div>
                     <div class="form-actions right">                           
                        <button name="submit" type="button" class="btn default" onclick="back();">Back</button>  
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
      $id_dudi=$_GET['id_dudi'];
      $query=mysql_query("select * from mst_dudi where id_dudi='$id_dudi'");
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
                <div class="caption"><i class="icon-reorder"></i>Form View Perusahaan</div>
                <div class="tools">
                  <a href="javascript:;" class="reload"></a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="proses/proses_dudi.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                  <div class="form-body">
                     <div class="form-group">
                       <label  class="col-md-3 control-label">ID DUDI</label>
                       <div class="col-md-9">
                         <input type="text" name="id_dudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[id_dudi]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Nama Perusahaan</label>
                       <div class="col-md-9">
                         <input type="text" name="nama_dudi" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_dudi]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                                  <label  class="col-md-3 control-label">Alamat</label>
                                  <div class="col-md-9">
                                   <textarea name="alamat_dudi" class="form-control" rows="3"><?php echo $data[alamat_dudi]; ?></textarea>
                                  </div>
                                 </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">NO Telp</label>
                       <div class="col-md-9">
                         <input name="no_telp" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[no_telp]; ?>">
                       </div>
                     </div>
                     <div class="form-group">
                       <label  class="col-md-3 control-label">Nama Pemimpin</label>
                       <div class="col-md-9">
                         <input name="nama_pemimpin" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_pemimpin]; ?>">
                       </div>
                     </div>
                     <div class="form-actions right">                           
                        <button name="submit" type="button" class="btn default" onclick="back();">Back</button>                        
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