<?php
error_reporting(E_ALL ^ E_NOTICE);
include "koneksi.php";

$act = $_GET['act'];
$query = mysql_query("select * from tbl_user");
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
            return confirm("Hapus Data User ?");
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
                                    <div class="caption"><i class="icon-edit"></i>Data User</div>
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
    <!--                                                <th>ID User</th>-->
                                                <th>User Name</th>
                                                <th>Password</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $batas = 2;
                                            $page = $_GET['hal'];
                                            $offset = $page * $batas;
                                            $nmr = $offset + 1;
                                            $query = mysql_query("select * from tbl_user");
                                            $jml = 0;
                                            while ($data = mysql_fetch_array($query)) {
                                                $jml++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $nmr++; ?></td>
        <!--                                                    <td><?php echo $data["id_user"]; ?></td>-->
                                                    <td><?php echo $data["username"]; ?></td>
                                                    <td><?php echo $data["password"]; ?></td>
                                                    <td><?php echo $data["nama_lengkap"]; ?></td>
                                                    <td><?php echo $data["email"]; ?></td>
                                                    <?php
                                                    if ($data[level] == '0') {
                                                        echo "<td>Admin</td>";
                                                    } else {
                                                        echo "<td>User</td>";
                                                    }
                                                    ?>
                                                    <td>
                                                        <a href="home.php?menu=user&act=edit&id_user=<?php echo $data["id_user"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp;
                                                        <a href="home.php?menu=user&act=view&id_user=<?php echo $data["id_user"]; ?>"><i class="fa fa-search-plus fa-lg" title="View"></i></a> &nbsp;
                                                        <a href="proses/proses_user.php?proses=hapus&id_user=<?php echo $data["id_user"]; ?>" onclick="return myFunction()"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
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
                                            <div class="caption"><i class="icon-reorder"></i>Form Tambah User</div>
                                            <div class="tools">
                                                <!-- <a href="javascript:;" class="collapse"></a> -->
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_user.php?proses=tambah" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="">
                                                    <input type="hidden" name="id_user" class="form-control"  placeholder="Enter text">
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">User Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="username" required="required" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" name="password" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Nama Lengkap</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nama_lengkap" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="email" class="form-control"  placeholder="Enter text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Level</label>
                                                        <div class="col-md-9">
                                                            <select name="level"  class="form-control">
                                                                <option value="0">Admin</option>
                                                                <option value="1">User</option> 
                                                            </select>
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
                    $id_user = $_GET['id_user'];
                    $query = mysql_query("select * from tbl_user where id_user='$id_user'");
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
                                            <div class="caption"><i class="icon-reorder"></i>Form Ubah User</div>
                                            <div class="tools">
                                                <!-- <a href="javascript:;" class="collapse"></a> -->
                                                <a href="javascript:;" class="reload"></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <!-- BEGIN FORM-->
                                            <form action="proses/proses_user.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                <div class="form-body">
                                                    <input type="hidden" name="id_user" class="form-control"  placeholder="Enter text" value="<?php echo $data[id_user]; ?>">                                 
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">User Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="username" required="required" class="form-control"  placeholder="Enter text" value="<?php echo $data[username]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" name="password" class="form-control"  placeholder="Enter text" value="<?php echo $data[password]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Nama Lengkap</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nama_lengkap" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_lengkap]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="email" class="form-control"  placeholder="Enter text" value="<?php echo $data[email]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Level</label>
                                                        <div class="col-md-9">
                                                            <select name="level"  class="form-control">
                                                                <?php
                                                                if ($data[level] == '0') {
                                                                    echo "<option value='0' selected>Admin</option>";
                                                                    echo "<option value='1'>User</option>";
                                                                } else {
                                                                    echo "<option value='0'>Admin</option>";
                                                                    echo "<option value='1' selected>User</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">                             
                                                        <button name="submit" type="submit" class="btn blue">Ubah</button>   
                                                        <button name="submit" type="submit" onclick="history.back();" class="btn default">Back</button>                            
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
                    $id_user = $_GET['id_user'];
                    $query = mysql_query("select * from tbl_user where id_user='$id_user'");
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
                                            <div class="caption"><i class="icon-reorder"></i>Form View User</div>
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
                                                        <label  class="col-md-3 control-label">ID User</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="id_user" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[id_user]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">User Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="username" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[username]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" name="password" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[password]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Nama lengkap</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="nama_lengkap" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_lengkap]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="email" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[email]; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-md-3 control-label">Level</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="level" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[level]; ?>">
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