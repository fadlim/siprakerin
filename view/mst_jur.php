<?php
include "koneksi.php";

$act = $_GET['act'];
$query = mysql_query("select * from mst_jurusan");
$jum = mysql_num_rows($query);
$cariJur = $_POST['cariJur'];
?>
<html lang="en" class="no-js">
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
    <script>
    function myFunction() {
        return confirm("Hapus Data Jurusan ?");
    }
</script>
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
                                    <div class="caption"><i class="icon-edit"></i>Data Jurusan</div>
                                    <div class="tools">
                                        <!-- <a href="javascript:;" class="collapse"></a> -->
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
                                                <th>ID Jurusan</th>
                                                <th>Jurusan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $batas = 2;
                                            $page = $_GET['hal'];
                                            $offset = $page * $batas;
                                            $nmr = $offset + 1;
                                            $query = mysql_query("select * from mst_jurusan");
                                            $jml = 0;
                                            while ($data = mysql_fetch_array($query)) {
                                                $jml++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $nmr++; ?></td>
                                                    <td><?php echo $data["id_jur"]; ?></td>
                                                    <td><?php echo $data["nama_jur"]; ?></td>
                                                    <td>
                                                        <a href="home.php?menu=mstJur&act=edit&id_jur=<?php echo $data["id_jur"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp;
                                                        <a href="home.php?menu=mstJur&act=view&id_jur=<?php echo $data["id_jur"]; ?>"><i class="fa fa-search-plus fa-lg" title="View"></i></a> &nbsp;
                                                        <a href="proses/proses_jur.php?proses=hapus&id_jur=<?php echo $data["id_jur"]; ?>" onclick="return myFunction()"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
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
                                            <div class="caption"><i class="icon-reorder"></i>Form Tambah Jurusan</div>
                                            <div class="tools">
                                                <!-- <a href="javascript:;" class="collapse"></a> -->
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_jur.php?proses=tambah" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="">
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">ID Jurusan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="id_jur" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Jurusan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nama_jur" class="form-control"  placeholder="Enter text">
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
                    $id_jur = $_GET['id_jur'];
                    $query = mysql_query("select * from mst_jurusan where id_jur='$id_jur'");
                    $data = mysql_fetch_array($query);
                    ?>

                    <div class="page-container">
                        <!-- BEGIN PAGE CONTENT-->
                        <div class="row col-md-12">
                            <center>
                                <div class="col-md-2"></div>
                                <div class="col-md-9">
                                    <!-- BEGIN PORTLET-->   
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption"><i class="icon-reorder"></i>Form Ubah Jurusan</div>
                                            <div class="tools">
                                                <!-- <a href="javascript:;" class="collapse"></a> -->
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_jur.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">ID Jurusan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="id_jur" class="form-control"  placeholder="Enter text" value="<?php echo $data[id_jur]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Nama Jurusan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nama_jur" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_jur]; ?>">
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
                    $id_jur = $_GET['id_jur'];
                    $query = mysql_query("select * from mst_jurusan where id_jur='$id_jur'");
                    $data = mysql_fetch_array($query);
                    ?>

                    <div class="page-container">
                        <!-- BEGIN PAGE CONTENT-->
                        <div class="row col-md-12">
                            <center>
                                <div class="col-md-2"></div>
                                <div class="col-md-9">
                                    <!-- BEGIN PORTLET-->   
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption"><i class="icon-reorder"></i>Form View Jurusan</div>
                                            <div class="tools">
                                                <!-- <a href="javascript:;" class="collapse"></a> -->
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_jur.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">ID Jurusan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="id_jur" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[id_jur]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Nama Jurusan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nama_jur" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_jur]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">                           
                                                        <button name="submit" type="button" class="btn blue" onclick="history.back();">Back</button>                            
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