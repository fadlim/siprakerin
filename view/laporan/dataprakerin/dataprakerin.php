<?php
session_start();
include "koneksi.php";
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
    <script language="javascript">
            var popupWindow = null;
            function centeredPopup(url,winName,w,h,scroll){
            LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
            TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
            settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
            popupWindow = window.open(url,winName,settings)
            }
    </script>

    <body>
        <!-- BEGIN CONTAINER -->
        <div>
            <div>
                <div>
                    <!-- BEGIN PAGE -->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <?php
                                    $cariCat   = $_POST['cariCat'];
                                    $txtCarCat  = $_POST['txtCarCat'];
                                    ?>
                                    <div class="caption"><i class="icon-edit"></i>DATA PRAKERIN </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" href="view/laporan/dataprakerin/dataprakerin_print.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>" onClick="centeredPopup(this.href,'myWindow','900','800','yes');return false" ><i class="fa fa-print"></i> Print Preview</a>&nbsp;
                                            <a class="btn btn-default btn-sm" href="view/laporan/dataprakerin/dataprakerin_excel.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>">
                                                    <i class="fa fa-file-excel-o"></i> Print Ms.Excel </a>&nbsp;
                                            <a class="btn btn-default btn-sm" href="view/laporan/dataprakerin/dataprakerin_word.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>">
                                                    <i class="fa fa-file-word-o"></i> Print Ms.Word </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" name="myForm" autocomplete="off">
                                    <div class="table-toolbar">
                                        <div class="btn-group">
                                            <table>
                                                <tr>
                                                    <td>Cari Berdasarkan :</td>
                                                    <td><div class="input-group input-sm">
                                                <select name="cariCat" class="form-control">
                                                    <option value="" disabled="disabled" selected="selected">.:: Jenis Kategori ::.</option>
                                                    <option value="mst_siswa.nis">NIS</option>
                                                    <option value="mst_siswa.nama_siswa">Siswa</option>
                                                    <option value="mst_jurusan.nama_jur">Jurusan</option>
                                                </select>
                                            </div></td>
                                                <td>Masukan Keyword :</td>
                                                <td><div class="input-group input-sm">
                                                <input type="text" name="txtCarCat" class="form-control" placeholder="kategori">
                                                <span class="input-group-btn">
                                                <button class="btn blue" type="submit">Search</button>
                                                </span>
                                            </div></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="btn-group pull-right">
                                        </div>
                                    </div>
                                    </form>
                                    <table class="table table-striped table-hover table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    if(isset($_POST['txtCarCat'])){
                                                        $txtCarCat  = $_POST['txtCarCat'];
                                                    }

                                                    if(empty($txtCarCat)){
                                                        $query=mysql_query("SELECT *,tbl_dataprakerin.no_telp as nope FROM tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek WHERE mst_siswa.id_jur=mst_jurusan.id_jur AND mst_siswa.nis=tbl_dataprakerin.nis AND tbl_dataprakerin.id_pembsek=mst_pembsek.id_pembsek");
                                                    }else{
                                                        if(isset($_POST['cariCat'],$_POST['txtCarCat'])){
                                                            $cariCat   = $_POST['cariCat'];
                                                            $txtCarCat  = $_POST['txtCarCat'];
                                                        }
                                                        
                                                        $query = mysql_query("SELECT *,tbl_dataprakerin.no_telp as nope FROM tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek WHERE mst_siswa.id_jur=mst_jurusan.id_jur AND mst_siswa.nis=tbl_dataprakerin.nis AND tbl_dataprakerin.id_pembsek=mst_pembsek.id_pembsek
                                                            AND $cariCat LIKE '%$txtCarCat%'");
                                                    }
                                                    while ($data = mysql_fetch_array($query)) {
                                                ?>
                                                <tr>
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
                                                        echo "<td><span class='label label-sm label-success'>Aktif </span></td>";
                                                    }else{
                                                        echo "<td><span class='label label-sm label-default'>Tidak Aktif </span></td>";
                                                    }
                                                    ?>
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
                </div>
            </div>
            </body>
            <!-- END BODY -->
            </html>