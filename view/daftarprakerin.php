<?php
include "koneksi.php";

$query = mysql_query("SELECT * FROM tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek WHERE mst_siswa.id_jur=mst_jurusan.id_jur AND mst_siswa.nis=tbl_dataprakerin.nis AND tbl_dataprakerin.id_pembsek=mst_pembsek.id_pembsek");
$jum = mysql_num_rows($query);
$act = $_GET['act'];
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
        return confirm("Hapus Data Prakerin ?");
    }
    </script>
    <body>
        <!-- BEGIN CONTAINER -->
        <div>
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
                                        <div class="caption"><i class="icon-edit"></i>Data Prakerin</div>
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
                                                    <th>Nama</th>
                                                    <th>Jurusan</th>
                                                    <th>Guru Pembimbing</th>
                                                    <th>Tanggal Daftar</th>
                                                    <th>Perusahaan</th>
                                                    <th>Alamat Perusahaan</th>
                                                    <th>No Telepon</th>
                                                    <th>Nama Pemimpin</th>
                                                    <th>Status</th>
                                                    <th><center>
                                                &nbsp;&nbsp;Action&nbsp;&nbsp;
                                            </center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $batas = 7;
                                                $page = $_GET['hal'];
                                                $offset = $page * $batas;
                                                $no = $offset + 1;
                                                $query = mysql_query("SELECT *,tbl_dataprakerin.no_telp as nope FROM tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek WHERE mst_siswa.id_jur=mst_jurusan.id_jur AND mst_siswa.nis=tbl_dataprakerin.nis AND tbl_dataprakerin.id_pembsek=mst_pembsek.id_pembsek order by status asc");
                                                $jml = 0;
                                                while ($data = mysql_fetch_array($query)) {
                                                    $jml++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $data["nis"]; ?></td>
                                                        <td nowrap="nowrap"><?php echo $data["nama_siswa"]; ?></td>
                                                        <td><?php echo $data["nama_jur"]; ?></td>
                                                        <td><?php echo $data["nama_pembsek"]; ?></td>
                                                        <td nowrap="nowrap"><?php echo $data["tgl_daftar"]; ?></td>
                                                        <td><?php echo $data["nama_dudi"]; ?></td>
                                                        <td><?php echo $data["alamat_dudi"]; ?></td>
                                                        <td><?php echo $data["nope"]; ?></td>
                                                        <td><?php echo $data["nama_pemimpin"]; ?></td>
                                                            <?php
                                                            if($data[status] == 0){
                                                                echo "<td style='align:center;'><span class='label label-sm label-success'>Aktif</span></td>";
                                                            }else{
                                                                echo "<td><span class='label label-sm label-default'>Tidak Aktif </span></td>";
                                                            }
                                                            ?>
                                                        <td align="center" nowrap="nowrap">
                                                            <?php
                                                                if($_SESSION['level'] == "0"){
                                                            ?>
                                                            <a href="home.php?menu=daftar&act=edit&id_dtprakerin=<?php echo $data["id_dtprakerin"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp; 
                                                            <?php
                                                                }
                                                            ?>
                                                            <a href="home.php?menu=daftar&act=view&id_dtprakerin=<?php echo $data["id_dtprakerin"]; ?>"><i class="fa fa-search-plus fa-lg" title="View"></i></a> &nbsp; 
                                                            <?php
                                                                if($_SESSION['level'] == "0"){
                                                            ?>
                                                            <a href="proses/proses_pendaftaran.php?proses=nonaktif&id_dtprakerin=<?php echo $data["id_dtprakerin"]; ?>"><i class="fa fa-lock fa-lg" title="Lock"></i></a> 
                                                            &nbsp;
                                                            <a href="proses/proses_pendaftaran.php?proses=hapus&id_dtprakerin=<?php echo $data["id_dtprakerin"]; ?>" onclick="return myFunction()"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
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
                        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->              
                        <div class="modal fade bs-example-modal-lg" id="portlet-config"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <!-- BEGIN FORM-->
                                    <form action="proses/proses_pendaftaran.php?proses=tambah" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                        <!-- <input type="hidden" name="id_dtprakerin"> -->
                                        <div class="modal-header default">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title"><center><b><font style="font-family:Time New Roman;">Form Data Prakerin</font></b></center></h4>
                                        </div>
                                        <div class="modal-body">  
                                            <!-- BEGIN PAGE CONTENT-->   
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Nama Siswa</label>
                                                    <div class="col-md-9">
                                                        <select name="nis" class="form-control">
                                                            <option disabled="disabled" selected="selected">--Pilih--</option>
                                                            <?php
                                                            $p = mysql_query("SELECT * FROM mst_siswa");
                                                            while ($a = mysql_fetch_array($p)) {
                                                                echo "<option value=$a[nis]>$a[nama_siswa]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Guru Pembimbing</label>
                                                    <div class="col-md-9">
                                                        <select name="id_pembsek"  class="form-control">
                                                            <option disabled="disabled" selected="selected">--Pilih--</option>
                                                            <?php
                                                            $p = mysql_query("select * from mst_pembsek");
                                                            while ($a = mysql_fetch_array($p)) {
                                                                echo "<option value=$a[id_pembsek]>$a[nama_pembsek]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Tanggal Daftar</label>
                                                    <div class="col-md-3 ">
                                                        <div class="input-group input-sm">
                                                            <input  data-date-format="yyyy-mm-dd" name="tgl_daftar" class="form-control form-control-inline input-medium date-picker" size="16" type="text"/>
                                                            <span class="input-group-btn">
                                                                <a href="#" class="btn default"><i class="fa fa-calendar"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Perusahaan</label>
                                                    <div class="col-md-9">
                                                        <input name="nama_dudi" type="text" class="form-control"  placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Alamat Perusahaan</label>
                                                    <div class="col-md-9">
                                                        <textarea name="alamat_dudi" class="form-control" rows="3" placeholder="Enter text"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">No Telepon</label>
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
                                                <!-- END PAGE CONTENT--> 
                                            </div> 
                                            <input type="hidden" name="status" value="0">
                                            <div class="modal-footer">
                                                <button name="submit" type="reset" class="btn default">Reset</button>  
                                                <button name="submit" type="submit" class="btn blue">Submit</button>
                                            </div>     
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                        } elseif ($act == 'edit') {
                            $id_dtprakerin = $_GET['id_dtprakerin'];
                            $query = mysql_query("SELECT * FROM tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek WHERE mst_siswa.id_jur=mst_jurusan.id_jur AND mst_siswa.nis=tbl_dataprakerin.nis AND tbl_dataprakerin.id_pembsek=mst_pembsek.id_pembsek AND tbl_dataprakerin.id_dtprakerin='$id_dtprakerin'");
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
                                                    <div class="caption"><i class="icon-reorder"></i>Form Edit Data Prakerin</div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="reload"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="proses/proses_pendaftaran.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                        <input type="hidden" name="id_dtprakerin" value="<?php echo $data['id_dtprakerin'];?>">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Nama Siswa</label>
                                                                <div class="col-md-9">
                                                                    <input name="nis" type="hidden" class="form-control" value="<?php echo $data[nis]; ?>" readonly="readonly">
                                                                    <input name="nis" type="text" class="form-control" value="<?php echo $data[nama_siswa]; ?>" disabled="disabled">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Guru Pembimbing</label>
                                                                <div class="col-md-9">
                                                                    <select name="id_pembsek"  class="form-control">
                                                                        <option disabled="disabled">--Pilih--</option>
                                                                        <?php
                                                                        $p = mysql_query("select * from mst_pembsek");
                                                                        while ($a = mysql_fetch_array($p)) {
                                                                            if($data[id_pembsek] == $a[id_pembsek]){
                                                                                echo "<option value='$a[id_pembsek]' selected>$a[nama_pembsek]</option>";    
                                                                            }else{
                                                                                echo "<option value='$a[id_pembsek]'>$a[nama_pembsek]</option>";    
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Tanggal Daftar</label>
                                                                <div class="col-md-3 ">
                                                                    <div class="input-group input-sm">
                                                                        <input  data-date-format="yyyy-mm-dd" name="tgl_daftar" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php echo $data[tgl_daftar]; ?>"/>
                                                                        <span class="input-group-btn">
                                                                            <a href="#" class="btn default"><i class="fa fa-calendar"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Perusahaan</label>
                                                                <div class="col-md-9">
                                                                    <input name="nama_dudi" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_dudi]; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Alamat Perusahaan</label>
                                                                <div class="col-md-9">
                                                                    <textarea name="alamat_dudi" class="form-control" rows="3" placeholder="Enter text"><?php echo $data[alamat_dudi]; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">No Telp</label>
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
                                                            <input type="hidden" name="status" value="<?php echo $data['status'];?>"> 
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
                            $id_dtprakerin = $_GET['id_dtprakerin'];
                            $query = mysql_query("SELECT * FROM tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek WHERE mst_siswa.id_jur=mst_jurusan.id_jur AND mst_siswa.nis=tbl_dataprakerin.nis AND tbl_dataprakerin.id_pembsek=mst_pembsek.id_pembsek AND tbl_dataprakerin.id_dtprakerin='$id_dtprakerin'");
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
                                                    <div class="caption"><i class="icon-reorder"></i>Form View Data Prakerin</div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="reload"></a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="proses/proses_pendaftaran.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">NIS</label>
                                                                <div class="col-md-9">
                                                                    <input name="nis" type="text" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[nis]; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Nama Siswa</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="nis" value="<?php echo $data[nama_siswa]; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Guru Pembimbing</label>
                                                                <div class="col-md-9">
                                                                       <input type="text" name="id_pembsek" value="<?php echo $data[nama_pembsek]; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Tanggal Daftar</label>
                                                                <div class="col-md-3 ">
                                                                    <input  data-date-format="yyyy-mm-dd" name="tgl_daftar" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php echo $data[tgl_daftar]; ?>"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Perusahaan</label>
                                                                <div class="col-md-9">
                                                                    <input name="nama_dudi" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_dudi]; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Alamat Perusahaan</label>
                                                                <div class="col-md-9">
                                                                    <textarea name="alamat_dudi" class="form-control" rows="3" placeholder="Enter text"><?php echo $data[alamat_dudi]; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">No Telp</label>
                                                                <div class="col-md-9">
                                                                    <input name="no_telp" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[no_telp]; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Nama Pemimpin</label>
                                                                <div class="col-md-9">
                                                                    <input name="nama_pemimpin" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_dudi]; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label  class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-9">
                                                                        <?php
                                                                        if ($data[status] == '1') {
                                                                            echo "<input name='status' type='text' class='form-control' value='Tidak Aktif'>";
                                                                        }else{
                                                                            echo "<input name='status' type='text' class='form-control' value='Aktif'>";
                                                                        }
                                                                        ?>
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