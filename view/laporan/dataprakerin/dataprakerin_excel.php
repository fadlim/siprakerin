<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$act = $_GET['act'];

//if($act != 0){
 header("Expires: Mon, 26 Jul 2001 05:00:00 GMT");
 header("Last-Modified:". gmdate("D, d M Y H:i:s") . "GMT");
 header("Cache-Control: no-store, no-cache, must-revalidate");
 header("Cache-Control: post-check=0, pre-check=0", false);
 header("Pragma: no-cache");
 header("Cache-Control: private");
 header("Content-Type: application/vnd.ms-excel; name='excel'");
 header("Content-disposition: attachment; filename=LapDataPrakerin.xls");

 session_start(); 
 include "../../../koneksi.php";
//}
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
                                <?php
                                    include "../../../header.php";
                                ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption"><i class="icon-edit"></i></div>
                                    </div>
                                    <div class="portlet-body">    
                                        <table class="table table-striped table-hover table-bordered" id="sample_1" border="1">
                                            <caption><b><H4>DATA PRAKERIN</H4></b></caption>
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
                                                    if(isset($_GET['txtCarCat'])){
                                                        $txtCarCat  = $_GET['txtCarCat'];
                                                    }

                                                    if(empty($txtCarCat)){
                                                        $query=mysql_query("SELECT *,tbl_dataprakerin.no_telp as nope FROM tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek WHERE mst_siswa.id_jur=mst_jurusan.id_jur AND mst_siswa.nis=tbl_dataprakerin.nis AND tbl_dataprakerin.id_pembsek=mst_pembsek.id_pembsek");
                                                    }else{
                                                        if(isset($_GET['cariCat'],$_GET['txtCarCat'])){
                                                            $cariCat   = $_GET['cariCat'];
                                                            $txtCarCat  = $_GET['txtCarCat'];
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
                        
    <?php
}
?>  
                </div>
            </div>
    </body>
    <!-- END BODY -->
</html>