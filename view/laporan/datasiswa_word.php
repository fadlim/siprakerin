<?php
$act = $_GET['act'];

//if($act != 0){
 header("Expires: Mon, 26 Jul 2001 05:00:00 GMT");
header("Last-Modified:". gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Cache-Control: private");
header("Content-Type: application/vnd.ms-word; name='word'");
 header("Content-disposition: attachment; filename=LapDataSiswa.doc");

 session_start(); 
 include "../../koneksi.php";
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
                                    include "../../header.php";
                                ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption"><i class="icon-edit"></i></div>
                                    </div>
                                    <div class="portlet-body">    
                                        <table class="table table-striped table-hover table-bordered" id="sample_1" border="1">
                                            <caption><b><H4>DATA SISWA</H4></b></caption>
                                            <thead>
                                                <tr><td></td></tr>
                                                <tr style="background-color:Honeydew;">
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>No Telp</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Tahun Ajaran</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(isset($_GET['txtCarCat'])){
                                                    $txtCarCat  = $_GET['txtCarCat'];
                                                }

                                                if(empty($txtCarCat)){
                                                    $query=mysql_query("select * 
                                                                        from mst_siswa,mst_jurusan
                                                                            ,mst_kelas
                                                                            ,tbl_tahunajaran 
                                                                        where 
                                                                            mst_siswa.id_jur=mst_jurusan.id_jur 
                                                                            AND mst_siswa.id_tahunajaran=tbl_tahunajaran.id_tahunajaran 
                                                                            AND mst_siswa.id_kelas=mst_kelas.id_kelas");
                                                }else{
                                                    if(isset($_GET['cariCat'],$_GET['txtCarCat'])){
                                                        $cariCat   = $_GET['cariCat'];
                                                        $txtCarCat  = $_GET['txtCarCat'];
                                                    }
                                                    
                                                    $query = mysql_query("select * from mst_siswa
                                                                            ,mst_jurusan
                                                                            ,mst_kelas
                                                                            ,tbl_tahunajaran 
                                                                        where $cariCat LIKE '%$txtCarCat%'
                                                                            AND mst_siswa.id_jur=mst_jurusan.id_jur 
                                                                            AND mst_siswa.id_tahunajaran=tbl_tahunajaran.id_tahunajaran 
                                                                            AND mst_siswa.id_kelas=mst_kelas.id_kelas order by nis DESC");
                                                }
                                                    while($data = mysql_fetch_array($query)) { 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $data["nis"]; ?></td>
                                                        <td><?php echo $data["nama_siswa"]; ?></td>
                                                        <td><?php echo $data["tempat_lahir"]; ?></td>
                                                        <td><?php echo $data["tgl_lahir"]; ?></td>
                                                        <td><?php echo $data["jeniskelamin"]; ?></td>
                                                        <td><?php echo $data["no_telp"]; ?></td>
                                                        <td><?php echo $data["nama_kelas"]; ?></td>
                                                        <td><?php echo $data["nama_jur"]; ?></td>
                                                        <td><?php echo $data["tahun_ajaran"]; ?></td>
                                                    </tr>
                                                    <?php
                                                }
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