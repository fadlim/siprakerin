<?php
$act = $_GET['act'];

//if($act != 0){
 header("Expires: Mon, 26 Jul 2001 05:00:00 GMT");
 header("Last-Modified:". gmdate("D, d M Y H:i:s") . "GMT");
 header("Cache-Control: no-store, no-cache, must-revalidate");
 header("Cache-Control: post-check=0, pre-check=0", false);
 header("Pragma: no-cache");
 header("Cache-Control: private");
 header("Content-Type: application/vnd.ms-excel; name='excel'");
 header("Content-disposition: attachment; filename=LapDataNilaiPrakerin.xls");

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
                                        <table width="100%" class="table table-striped table-hover table-bordered" id="sample_1" border="1">
                                            <caption><b><H4>DATA NILAI PRAKERIN</H4></b></caption>
                                            <thead>
                                              <tr>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Perusahaan</th>
                                                <th>Nilai Prakerin</th>
                                                <th>Grade</th>
                                                <th>Sakit</th>
                                                <th>Izin</th>
                                                <th>Tanpa Keterangan</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                                if(isset($_GET['txtCarCat'])){
                                                    $txtCarCat  = $_GET['txtCarCat'];
                                                }

                                                if(empty($txtCarCat)){
                                                    $query=mysql_query("SELECT DISTINCT
                                                          mst_siswa.nis
                                                          ,mst_siswa.nama_siswa
                                                          ,mst_kelas.nama_kelas                      
                                                          ,mst_jurusan.nama_jur 
                                                          ,tbl_tahunajaran.tahun_ajaran
                                                          ,tbl_dataprakerin.nama_dudi 
                                                          ,((tbl_nilaisekolah.nilai_ratarataangka + tbl_nilaidudi.nilai_ratarataangka)/2) AS nilai_prakerin
                                                          ,tbl_nilaidudi.sakit  
                                                          ,tbl_nilaidudi.izin 
                                                          ,tbl_nilaidudi.tanpa_keterangan 
                                                        FROM 
                                                          tbl_nilaidudi
                                                          ,tbl_nilaisekolah
                                                          ,tbl_dataprakerin
                                                          ,tbl_pembdudi
                                                          ,mst_siswa
                                                          ,mst_jurusan
                                                          ,tbl_tahunajaran
                                                          ,mst_kelas
                                                        WHERE 
                                                          tbl_nilaisekolah.id_dtprakerin 
                                                          IN (
                                                            SELECT tbl_dataprakerin.id_dtprakerin FROM tbl_nilaidudi,tbl_pembdudi,tbl_dataprakerin
                                                            WHERE tbl_nilaidudi.id_pembdudi = tbl_pembdudi.id_pembdudi
                                                            AND tbl_pembdudi.id_dtprakerin = tbl_dataprakerin.id_dtprakerin
                                                          )
                                                        AND tbl_nilaisekolah.id_dtprakerin = tbl_dataprakerin.id_dtprakerin
                                                        AND mst_siswa.nis = tbl_dataprakerin.nis
                                                        AND tbl_nilaidudi.id_pembdudi = tbl_pembdudi.id_pembdudi
                                                        AND tbl_dataprakerin.id_dtprakerin = tbl_pembdudi.id_dtprakerin
                                                        AND mst_siswa.id_jur = mst_jurusan.id_jur
                                                        AND mst_siswa.id_kelas = mst_kelas.id_kelas
                                                        AND mst_siswa.id_tahunajaran = tbl_tahunajaran.id_tahunajaran
                                                        GROUP BY 
                                                          tbl_dataprakerin.nis
                                                        ORDER BY 
                                                          tbl_dataprakerin.nis ASC");
                                                }else{
                                                    if(isset($_GET['cariCat'],$_GET['txtCarCat'])){
                                                        $cariCat   = $_GET['cariCat'];
                                                        $txtCarCat  = $_GET['txtCarCat'];
                                                    }
                                                    
                                                    $query = mysql_query("SELECT DISTINCT
                                                            mst_siswa.nis
                                                            ,mst_siswa.nama_siswa
                                                            ,mst_kelas.nama_kelas
                                                            ,mst_jurusan.nama_jur 
                                                            ,tbl_tahunajaran.tahun_ajaran
                                                            ,tbl_dataprakerin.nama_dudi 
                                                            ,((tbl_nilaisekolah.nilai_ratarataangka + tbl_nilaidudi.nilai_ratarataangka)/2) AS nilai_prakerin
                                                            ,tbl_nilaidudi.sakit  
                                                            ,tbl_nilaidudi.izin 
                                                            ,tbl_nilaidudi.tanpa_keterangan 
                                                          FROM 
                                                            tbl_nilaidudi
                                                            ,tbl_nilaisekolah
                                                            ,tbl_dataprakerin
                                                            ,tbl_pembdudi
                                                            ,mst_siswa
                                                            ,mst_jurusan
                                                            ,tbl_tahunajaran
                                                            ,mst_kelas
                                                          WHERE 
                                                            tbl_nilaisekolah.id_dtprakerin 
                                                            IN (
                                                              SELECT tbl_dataprakerin.id_dtprakerin FROM tbl_nilaidudi,tbl_pembdudi,tbl_dataprakerin
                                                              WHERE tbl_nilaidudi.id_pembdudi = tbl_pembdudi.id_pembdudi
                                                              AND tbl_pembdudi.id_dtprakerin = tbl_dataprakerin.id_dtprakerin
                                                            )
                                                          AND tbl_nilaisekolah.id_dtprakerin = tbl_dataprakerin.id_dtprakerin
                                                          AND mst_siswa.nis = tbl_dataprakerin.nis
                                                          AND tbl_nilaidudi.id_pembdudi = tbl_pembdudi.id_pembdudi
                                                          AND tbl_dataprakerin.id_dtprakerin = tbl_pembdudi.id_dtprakerin
                                                          AND mst_siswa.id_jur = mst_jurusan.id_jur
                                                          AND mst_siswa.id_kelas = mst_kelas.id_kelas
                                                          AND mst_siswa.id_tahunajaran = tbl_tahunajaran.id_tahunajaran
                                                          AND $cariCat LIKE '%$txtCarCat%'
                                                          GROUP BY 
                                                            tbl_dataprakerin.nis
                                                          ORDER BY 
                                                            tbl_dataprakerin.nis ASC");
                                                }
                                                while ($data = mysql_fetch_array($query)) {
                                            ?>
                                              <tr>
                                                <td><?php echo $data["nis"];?></td>
                                                <td><?php echo $data["nama_siswa"]; ?></td>
                                                <td><?php echo $data["nama_kelas"]; ?></td>
                                                <td><?php echo $data["nama_jur"]; ?></td>
                                                <td><?php echo $data["tahun_ajaran"]; ?></td>
                                                <td><?php echo $data["nama_dudi"]; ?></td>
                                                <td><?php echo $data["nilai_prakerin"]; ?></td>
                                                <?php
                                                    if($data[nilai_prakerin] >= 90 && $data[nilai_prakerin] <= 100){
                                                      echo "<td>A</td>";
                                                    }elseif ($data[nilai_prakerin] >= 70 && $data[nilai_prakerin] <= 89.9) {
                                                      echo "<td>B</td>";
                                                    }elseif ($data[nilai_prakerin] >= 50 && $data[nilai_prakerin] <= 69.9) {
                                                      echo "<td>C</td>";
                                                    }else{
                                                      echo "<td>D</td>";
                                                    }
                                                ?> 
                                                <td><?php echo $data["sakit"]; ?></td>
                                                <td><?php echo $data["izin"]; ?></td>
                                                <td><?php echo $data["tanpa_keterangan"]; ?></td>
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