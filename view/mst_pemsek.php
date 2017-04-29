<?php
include "koneksi.php";
$act = $_GET['act'];
$query = mysql_query("select * from mst_pembsek");
$jum = mysql_num_rows($query);
$pembSe = $_POST['pembSe'];

?>
<html lang="en" class="no-js">
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
    <script>
        function myFunction() {
            return confirm("Hapus Data Pembimbing Sekolah ?");
        }
    </script>
    <!-- BEGIN BODY -->
    <body>
        <!-- BEGIN CONTAINER -->
        <div>
            <div>
                <!-- BEGIN PAGE -->
                <?php
                if (empty($act)) {
                    ?>       
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="icon-edit"></i>Data Guru Pembimbing Sekolah</div>
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
                                                <th>NIP</th>
                                                <th>Pembimbing Sekolah</th>
                                                <th>Pengajar</th>
                                                <th>Jabatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $batas = 10;
                                            $page = $_GET['hal'];
                                            $offset = $page * $batas;
                                            $query = mysql_query("select * from mst_pembsek");
                                            $nmr = $offset + 1;
                                            $jml = 0;
                                            while ($data = mysql_fetch_array($query)) {
                                                $jml++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $nmr++; ?></td>
                                                    <td><?php echo $data["nip"]; ?></td>
                                                    <td><?php echo $data["nama_pembsek"]; ?></td>
                                                    <td><?php echo $data["pengajar"]; ?></td>
                                                    <td><?php echo $data["jabatan"]; ?></td>
                                                    <td>
                                                    <?php
                                                        if($_SESSION['level'] == "0"){
                                                    ?>
                                                        <a href="home.php?menu=pemSek&act=edit&id_pembsek=<?php echo $data["id_pembsek"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp;
                                                    <?php
                                                        }
                                                    ?>
                                                        <a href="home.php?menu=pemSek&act=view&id_pembsek=<?php echo $data["id_pembsek"]; ?>"><i class="fa fa-search-plus fa-lg" title="Update"></i></a> &nbsp;
                                                    <?php
                                                        if($_SESSION['level'] == "0"){
                                                    ?> 
                                                        <a href="proses/proses_pembsek.php?proses=hapus&id_pembsek=<?php echo $data["id_pembsek"]; ?>" onclick="return myFunction()"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
                                                    <?php
                                                        }
                                                    ?>
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
                                            <div class="caption"><i class="icon-reorder"></i>Form Tambah Guru Pembimbing </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_pembsek.php?proses=tambah" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">ID Pembimbing Sekolah</label>
                                                        <div class="col-md-9">
                                                            <input required="required" type="text" name="id_pembsek" class="form-control"  placeholder="PSXXX">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">NIP</label>
                                                        <div class="col-md-9">
                                                            <input required="required" type="text" name="nip" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Pembimbing Sekolah</label>
                                                        <div class="col-md-9">
                                                            <input required="required" type="text" name="nama_pembsek" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Pengajar</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="pengajar" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Jabatan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="jabatan" class="form-control"  placeholder="Enter text">
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
                } elseif ($act == 'edit') {
                    $id_pembsek = $_GET['id_pembsek'];
                    $query = mysql_query("select * from mst_pembsek where id_pembsek='$id_pembsek'");
                    $data = mysql_fetch_array($query);
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
                                            <div class="caption"><i class="icon-reorder"></i>Form Edit Guru Pembimbing</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_pembsek.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">ID Pembsek</label>
                                                        <div class="col-md-9">
                                                            <input required="required" type="text" name="id_pembsek" class="form-control"  placeholder="Enter text" value="<?php echo $data[id_pembsek]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">NIP</label>
                                                        <div class="col-md-9">
                                                            <input required="required" type="text" name="nip" class="form-control"  placeholder="Enter text" value="<?php echo $data[nip]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Pembimbing Sekolah</label>
                                                        <div class="col-md-9">
                                                            <input required="required" type="text" name="nama_pembsek" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_pembsek]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Pengajar</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="pengajar" class="form-control"  placeholder="Enter text" value="<?php echo $data[pengajar]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Jabatan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="jabatan" class="form-control"  placeholder="Enter text" value="<?php echo $data[jabatan]; ?>">
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
                } elseif ($act == 'view') {
                    $id_pembsek = $_GET['id_pembsek'];
                    $query = mysql_query("select * from mst_pembsek where id_pembsek='$id_pembsek'");
                    $data = mysql_fetch_array($query);
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
                                            <div class="caption"><i class="icon-reorder"></i>Form View Pembimbing Sekolah</div>
                                            <div class="tools">
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_pembsek.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">ID Pembsek</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="id_pembsek" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[id_pembsek]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">NIP</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nip" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[nip]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Pembimbing Sekolah</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nama_pembsek" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_pembsek]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Pengajar</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="pengajar" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[pengajar]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Jabatan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="jabatan" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[jabatan]; ?>">
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