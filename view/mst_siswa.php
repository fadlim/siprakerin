<?php
error_reporting(E_ALL ^ E_NOTICE);
include "koneksi.php";


$query = mysql_query("select * from mst_siswa,mst_jurusan, mst_kelas,tbl_tahunajaran where mst_siswa.id_jur=mst_jurusan.id_jur and mst_siswa.id_kelas=mst_kelas.id_kelas and mst_siswa.id_tahunajaran=tbl_tahunajaran.id_tahunajaran");
$jum = mysql_num_rows($query);
$act = $_GET['act'];
$CariNama = $_POST['CariNama'];
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
            return confirm("Hapus Data Siswa ?");
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
                                        <div class="caption"><i class="icon-edit"></i>Data Siswa</div>
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
                                        <?php
                                            }
                                        ?>
                                        <table class="table table-striped table-hover table-bordered" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>No Telp</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th><center>Action</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $batas = 7;
                                                $page = $_GET['hal'];
                                                $offset = $page * $batas;
                                                $no = $offset + 1;
                                                $query = mysql_query("select * from mst_siswa,mst_jurusan, mst_kelas,tbl_tahunajaran where mst_siswa.id_jur=mst_jurusan.id_jur and mst_siswa.id_tahunajaran=tbl_tahunajaran.id_tahunajaran and mst_siswa.id_kelas=mst_kelas.id_kelas");
                                                $jml = 0;
                                                while ($data = mysql_fetch_array($query)) {
                                                    $jml++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $data["nis"]; ?></td>
                                                        <td><?php echo $data["nama_siswa"]; ?></td>
                                                        <td><?php echo $data["tempat_lahir"]; ?></td>
                                                        <td><?php echo $data["tgl_lahir"]; ?></td>
                                                        <td><?php echo $data["jeniskelamin"]; ?></td>
                                                        <td><?php echo $data["no_telp"]; ?></td>
                                                        <td><?php echo $data["nama_kelas"]; ?></td>
                                                        <td><?php echo $data["nama_jur"]; ?></td>
                                                        <td><?php echo $data["tahun_ajaran"]; ?></td>
                                                        <td align="center">
                                                        <?php
                                                            if($_SESSION['level'] == "0"){
                                                        ?>
                                                            <a href="home.php?menu=siswa&act=edit&nis=<?php echo $data["nis"]; ?>"><i class="fa fa-pencil-square-o fa-lg" title="Update"></i></a> &nbsp;
                                                        <?php
                                                            }
                                                        ?>    
                                                            <a href="home.php?menu=siswa&act=view&nis=<?php echo $data["nis"]; ?>"><i class="fa fa-search-plus fa-lg" title="View"></i></a> &nbsp;
                                                        <?php
                                                            if($_SESSION['level'] == "0"){
                                                        ?>
                                                            <a href="proses/proses_siswa.php?proses=hapus&nis=<?php echo $data["nis"]; ?>" onclick="return myFunction()"><i class="fa fa-trash-o fa-lg" title="Delete"></i></a>
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
                                    <form action="proses/proses_siswa.php?proses=tambah" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                        <div class="modal-header default">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title"><center><b><font style="font-family:Time New Roman;">Form Tambah Data Siswa</font></b></center></h4>
                                        </div>
                                        <div class="modal-body">	
                                            <!-- BEGIN PAGE CONTENT-->   
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">NIS</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nis" class="form-control" required="required"  placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Nama Siswa</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nama_siswa" class="form-control" required="required" placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Tanggal Lahir</label>
                                                    <div class="col-md-3 ">
                                                        <div class="input-group input-sm">
                                                            <input  data-date-format="yyyy-mm-dd" name="tgl_lahir" class="form-control form-control-inline input-medium date-picker" size="16" type="text"/>
                                                            <span class="input-group-btn">
                                                                <a href="#" class="btn default"><i class="fa fa-calendar"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Tempat Lahir</label>
                                                    <div class="col-md-9">
                                                        <input name="tempat_lahir" type="text" class="form-control"  placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Alamat</label>
                                                    <div class="col-md-9">
                                                        <textarea name="alamat_siswa" class="form-control" rows="3" placeholder="Enter text"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Jenis Kelamin</label>
                                                    <div class="col-md-9">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="jeniskelamin" value="Laki-laki" id="optionsRadios4"> Laki-laki
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="jeniskelamin" value="Perempuan" id="optionsRadios5" > Perempuan
                                                        </label>  
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">No Telp</label>
                                                    <div class="col-md-9">
                                                        <input name="no_telp" type="text" class="form-control"  placeholder="Enter text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Kelas</label>
                                                    <div class="col-md-9">
                                                        <?php
                                                        $kel = "select * from mst_kelas";
                                                        $query_kel = mysql_query($kel) or die("Maaf kelas tidak Kebuka");
                                                        $hasil_kel = mysql_fetch_array($query_kel);
                                                        ?>
                                                        <select name="id_kelas"  class="form-control">
                                                            <option disabled="disabled" selected="selected">--Pilih--</option>
                                                            <?php do { ?>
                                                                <option value="<?php echo $hasil_kel['id_kelas']; ?>"><?php echo $hasil_kel['nama_kelas']; ?></option>
                                                            <?php } while ($hasil_kel = mysql_fetch_array($query_kel)); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php
                                                $jur = "select * from mst_jurusan";
                                                $query_jur = mysql_query($jur) or die("Maaf Jurusan tidak Kebuka");
                                                $hasil_jur = mysql_fetch_array($query_jur);
                                                ?>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Jurusan</label>
                                                    <div class="col-md-9">
                                                        <select name="id_jur"  class="form-control">
                                                            <option disabled="disabled" selected="selected">--Pilih--</option>
                                                            <?php do { ?>
                                                                <option value="<?php echo $hasil_jur['id_jur']; ?>"><?php echo $hasil_jur['nama_jur']; ?></option>
                                                            <?php } while ($hasil_jur = mysql_fetch_array($query_jur)); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php
                                                $thnajar = "select * from tbl_tahunajaran";
                                                $query_thnajar = mysql_query($thnajar) or die("Maaf Jurusan tidak Kebuka");
                                                $hasil_thnajar = mysql_fetch_array($query_thnajar);
                                                ?>
                                                <div class="form-group">
                                                    <label  class="col-md-3 control-label">Tahun Ajaran</label>
                                                    <div class="col-md-9">
                                                        <select name="id_tahunajaran"  class="form-control">
                                                            <option disabled="disabled" selected="selected">--Pilih--</option>
                                                            <?php do { ?>
                                                                <option value="<?php echo $hasil_thnajar['id_tahunajaran']; ?>"><?php echo $hasil_thnajar['tahun_ajaran']; ?></option>
                                                            <?php } while ($hasil_thnajar = mysql_fetch_array($query_thnajar)); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>  
                                            <!-- END PAGE CONTENT--> 
                                        </div> 
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
                        $nis = $_GET['nis'];
                        $query = mysql_query("select * from mst_siswa,mst_jurusan, mst_kelas,tbl_tahunajaran where mst_siswa.id_tahunajaran=tbl_tahunajaran.id_tahunajaran and mst_siswa.id_jur=mst_jurusan.id_jur and mst_siswa.id_kelas=mst_kelas.id_kelas and mst_siswa.nis='$nis'");
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
                                                <div class="caption"><i class="icon-reorder"></i>Form Ubah Data Siswa</div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="reload"></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="proses/proses_siswa.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">NIS</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="nis" class="form-control" required="required"  placeholder="Enter text" value="<?php echo $data[nis]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Nama Siswa</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="nama_siswa" class="form-control" required="required"  placeholder="Enter text" value="<?php echo $data[nama_siswa]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tanggal Lahir</label>
                                                            <div class="col-md-3 ">
                                                                <div class="input-group input-sm">
                                                                    <input  data-date-format="yyyy-mm-dd" name="tgl_lahir" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php echo $data[tgl_lahir]; ?>"/>
                                                                    <span class="input-group-btn">
                                                                        <a href="#" class="btn default"><i class="fa fa-calendar"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Tempat Lahir</label>
                                                            <div class="col-md-9">
                                                                <input name="tempat_lahir" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[tempat_lahir]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Alamat</label>
                                                            <div class="col-md-9">
                                                                <textarea name="alamat_siswa" class="form-control" rows="3" placeholder="Enter text"><?php echo $data[alamat_siswa]; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Jenis Kelamin</label>
                                                            <?php
                                                            $jk = $data[jeniskelamin];
                                                            $L = "";
                                                            $P = "";
                                                            if ($jk == "Laki-laki")
                                                                $L = "checked"; else
                                                                $P = "checked";
                                                            ?>
                                                            <div class="col-md-9 radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="jeniskelamin" value="Laki-laki" id="optionsRadios4" <?php echo $L ?>> Laki-laki
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="jeniskelamin" value="Perempuan" id="optionsRadios5" <?php echo $P ?>> Perempuan
                                                                </label>  
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">No Telp</label>
                                                            <div class="col-md-9">
                                                                <input name="no_telp" type="text" class="form-control"  placeholder="Enter text" value="<?php echo $data[no_telp]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Kelas</label>
                                                            <div class="col-md-9">
                                                                <select name="id_kelas"  class="form-control">
                                                                    <option disabled="disabled">--Pilih--</option>
                                                                    <?php
                                                                    $p = mysql_query("select * from mst_kelas");
                                                                    while ($a = mysql_fetch_array($p)) {
                                                                        if ($data[id_kelas] == $a[id_kelas]) {
                                                                            echo "<option value='$a[id_kelas]' selected>$a[nama_kelas]</option>";
                                                                        } else {
                                                                            echo "<option value=$a[id_kelas]>$a[nama_kelas]</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Jurusan</label>
                                                            <div class="col-md-9">
                                                                <select name="id_jur"  class="form-control">
                                                                    <option disabled="disabled">--Pilih--</option>
                                                                    <?php
                                                                    $p = mysql_query("select * from mst_jurusan");
                                                                    while ($a = mysql_fetch_array($p)) {
                                                                        if ($data[id_jur] == $a[id_jur]) {
                                                                            echo "<option value='$a[id_jur]' selected>$a[nama_jur]</option>";
                                                                        } else {
                                                                            echo "<option value=$a[id_jur]>$a[nama_jur]</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Tahun Ajaran</label>
                                                            <div class="col-md-9">
                                                                <select name="id_tahunajaran"  class="form-control">
                                                                    <option disabled="disabled">--Pilih--</option>
                                                                    <?php
                                                                    $p = mysql_query("select * from tbl_tahunajaran");
                                                                    while ($a = mysql_fetch_array($p)) {
                                                                        if ($data[id_tahunajaran] == $a[id_tahunajaran]) {
                                                                            echo "<option value='$a[id_tahunajaran]' selected>$a[tahun_ajaran]</option>";
                                                                        } else {
                                                                            echo "<option value=$a[id_tahunajaran]>$a[tahun_ajaran]</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
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
    $nis = $_GET['nis'];
    $query = mysql_query("select * from mst_siswa,mst_jurusan, mst_kelas where mst_siswa.id_jur=mst_jurusan.id_jur and mst_siswa.id_kelas=mst_kelas.id_kelas and mst_siswa.nis='$nis'");
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
                                                <div class="caption"><i class="icon-reorder"></i>Form View Siswa</div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="reload"></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="proses/proses_siswa.php?proses=edit" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">NIS</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="nis" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[nis]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Nama Siswa</label>
                                                            <div class="col-md-9">
                                                                <input type="text" readonly name="nama_siswa" class="form-control"  placeholder="Enter text" value="<?php echo $data[nama_siswa]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tanggal Lahir</label>
                                                            <div class="col-md-3 ">
                                                                <input readonly data-date-format="yyyy-mm-dd" name="tgl_lahir" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php echo $data[tgl_lahir]; ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Tempat Lahir</label>
                                                            <div class="col-md-9">
                                                                <input name="tempat_lahir" type="text" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[tempat_lahir]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Alamat</label>
                                                            <div class="col-md-9">
                                                                <textarea name="alamat_siswa" readonly class="form-control" rows="3" placeholder="Enter text"><?php echo $data[alamat_siswa]; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Jenis Kelamin</label>
                                                            <?php
                                                            $jk = $data[jeniskelamin];
                                                            $L = "";
                                                            $P = "";
                                                            if ($jk == "Laki-laki")
                                                                $L = "checked"; else
                                                                $P = "checked";
                                                            ?>
                                                            <div class="col-md-6 radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="jeniskelamin" value="Laki-laki" id="optionsRadios4" <?php echo $L ?> disabled> Laki-laki
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="jeniskelamin" value="Perempuan" id="optionsRadios5" <?php echo $P ?> disabled> Perempuan
                                                                </label>  
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">No Telp</label>
                                                            <div class="col-md-9">
                                                                <input name="no_telp" type="text" readonly class="form-control"  placeholder="Enter text" value="<?php echo $data[no_telp]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Kelas</label>
                                                            <div class="col-md-9">
                                                                    <?php
                                                                    $p = mysql_query("select * from mst_kelas");
                                                                    $a = mysql_fetch_array($p);
                                                                        if ($data[id_kelas] == $a[id_kelas]) {
                                                                            echo "<input class='form-control' type='text' name='id_kelas' value='$a[nama_kelas]' readonly>";
                                                                        } else {
                                                                            echo "<input class='form-control' type='text' name='id_kelas' value='$a[nama_kelas]' readonly>";
                                                                        }
                                                                    ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-md-3 control-label">Jurusan</label>
                                                            <div class="col-md-9">
                                                                <?php
                                                                $p = mysql_query("select * from mst_jurusan");
                                                                $a = mysql_fetch_array($p);
                                                                    if ($data[id_jur] == $a[id_jur]) {
                                                                        echo "<input class='form-control' type='text' name='id_jur' value='$a[nama_jur]' readonly>";
                                                                    } else {
                                                                        echo "<input class='form-control' type='text' name='id_jur' value='$a[nama_jur]' readonly>";
                                                                    }
                                                                ?>
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