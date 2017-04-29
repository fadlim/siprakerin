<?php
include "koneksi.php";

$act = $_GET['act'];
$query = mysql_query("select * from tbl_tahunajaran");
$jum = mysql_num_rows($query);
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
            return confirm("Hapus Data Tahun Ajaran ?");
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
                                    <div class="caption"><i class="icon-edit"></i>Data Tahun Ajaran</div>
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
                                                <th>Tahun Ajaran</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $batas = 2;
                                            $page = $_GET['hal'];
                                            $offset = $page * $batas;
                                            $nmr = $offset + 1;
                                            $query = mysql_query("select * from tbl_tahunajaran");
                                            $jml = 0;
                                            while ($data = mysql_fetch_array($query)) {
                                                $jml++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $nmr++; ?></td>
                                                    <td><?php echo $data["tahun_ajaran"]; ?></td>
                                                    <?php
                                                    if($data[status] == 0){
                                                                echo "<td style='align:center;'><span class='label label-sm label-success'>Aktif</span></td>";
                                                            }else{
                                                                echo "<td><span class='label label-sm label-default'>Tidak Aktif </span></td>";
                                                            }
                                                    ?>
                                                    <td>
                                                        <a href="home.php?menu=tahunajaran&act=edit&id_tahunajaran=<?php echo $data["id_tahunajaran"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp;
                                                        <a href="home.php?menu=tahunajaran&act=view&id_tahunajaran=<?php echo $data["id_tahunajaran"]; ?>"><i class="fa fa-search-plus fa-lg" title="View"></i></a> &nbsp;
                                                        <a href="proses/proses_tahunajaran.php?proses=hapus&id_tahunajaran=<?php echo $data["id_tahunajaran"]; ?>" onclick="return myFunction()"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
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
                                            <form action="proses/proses_tahunajaran.php?proses=tambah" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="">
                                                    <input type="hidden" name="id_tahunajaran" class="form-control"  placeholder="Enter text">
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Tahun Ajaran</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="tahun_ajaran" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Status</label>
                                                        <div class="col-md-9">
                                                            <select name="status"  class="form-control">
                                                                <option value="0">Aktif</option>
                                                                <option value="1">Tidak Aktif</option> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right"> 
                                                        <button name="submit" type="submit" class="btn blue">Submit</button> 
                                                        <button name="submit" type="reset" class="btn default">Reset</button>                        
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
                    $id_tahunajaran = $_GET['id_tahunajaran'];
                    $query = mysql_query("select * from tbl_tahunajaran where id_tahunajaran='$id_tahunajaran'");
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
                                            <div class="caption"><i class="icon-reorder"></i>Form Ubah Tahun Ajaran</div>
                                            <div class="tools">
                                                <!-- <a href="javascript:;" class="collapse"></a> -->
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_tahunajaran.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <input type="hidden" name="id_tahunajaran" class="form-control"  placeholder="Enter text" value="<?php echo $data[id_tahunajaran]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Tahun Ajaran</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="tahun_ajaran" class="form-control"  placeholder="Enter text" value="<?php echo $data[tahun_ajaran]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Status</label>
                                                    <div class="col-md-9">
                                                        <select name="status"  class="form-control">
                                                            <?php
                                                            if ($data[status] == '0') {
                                                                echo "<option value='0' selected>Aktif</option>";
                                                                echo "<option value='1'>Tidak Aktif</option>";
                                                            } else {
                                                                echo "<option value='0'>Aktif</option>";
                                                                echo "<option value='1' selected>Tidak Aktif</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-actions right">                           
                                                    <button name="submit" type="button" class="btn default" onclick="history.back();">Back</button>  
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
            } elseif ($act == 'view') {
                $id_tahunajaran = $_GET['id_tahunajaran'];
                $query = mysql_query("select * from tbl_tahunajaran where id_tahunajaran='$id_tahunajaran'");
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
                                        <div class="caption"><i class="icon-reorder"></i>Form View Tahun Ajaran</div>
                                        <div class="tools">
                                            <!-- <a href="javascript:;" class="collapse"></a> -->
                                            <a href="javascript:;" class="reload"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form action="proses/proses_tahunajaran.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Tahun Ajaran</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="tahun_ajaran" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[tahun_ajaran]; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Status</label>
                                                    <div class="col-md-9">
                                                        <select name="status"  class="form-control" readonly="readonly">
                                                            <?php
                                                            if ($data[status] == '0') {
                                                                echo "<option value='0' selected>Aktif</option>";
                                                                echo "<option value='1'>Tidak Aktif</option>";
                                                            } else {
                                                                echo "<option value='0'>Aktif</option>";
                                                                echo "<option value='1' selected>Tidak Aktif</option>";
                                                            }
                                                            ?>
                                                        </select>
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