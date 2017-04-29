<?php
  include "koneksi.php";

  $query=mysql_query("SELECT DISTINCT
                      mst_siswa.nis
                      ,mst_siswa.nama_siswa
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
                    WHERE 
                      tbl_nilaisekolah.nis 
                      IN (
                        SELECT tbl_dataprakerin.nis FROM tbl_nilaidudi,tbl_pembdudi,tbl_dataprakerin
                        WHERE tbl_nilaidudi.id_pembdudi = tbl_pembdudi.id_pembdudi
                        AND tbl_pembdudi.nis = tbl_dataprakerin.nis
                      )
                    AND tbl_nilaisekolah.nis = tbl_dataprakerin.nis
                    AND mst_siswa.nis = tbl_dataprakerin.nis
                    AND tbl_nilaidudi.id_pembdudi = tbl_pembdudi.id_pembdudi
                    AND tbl_dataprakerin.nis = tbl_pembdudi.nis
                    AND mst_siswa.id_jur = mst_jurusan.id_jur
                    AND mst_siswa.id_tahunajaran = tbl_tahunajaran.id_tahunajaran
                    GROUP BY 
                      tbl_dataprakerin.nis
                    ORDER BY 
                      tbl_dataprakerin.nis ASC");
  $jum=mysql_num_rows($query);
  $act=$_GET['act'];
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
        if(empty($act)){
      ?>       
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box blue">
            <div class="portlet-title">
               <div class="caption"><i class="icon-edit"></i>Nilai Prakerin</div>
               <div class="tools">
                <a href="javascript:;" class="reload"></a>
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-toolbar">
                <!-- <div class="btn-group">
                  <a href="#portlet-config" data-toggle="modal" class="config">
                    <button class="btn green">
                        Add New <i class="icon-plus"></i>
                    </button>
                  </a>
                </div> -->
              </div>
              <table class="table table-striped table-hover table-bordered" id="sample_1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th nowrap="nowrap">Nama</th>
                    <th>Jurusan</th>
                    <th>Tahun Ajaran</th>
                    <th nowrap="nowrap">Perusahaan</th>
                    <th>Nilai Prakerin</th>
                    <th>Grade</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Tanpa Keterangan</th>
                    <th></th>
                  </tr>
                </thead>
                 <?php 
                   $batas=7;
                   $page=$_GET['hal'];
                   $offset=$page*$batas;
                   $no=$offset+1;
                   $query=mysql_query("SELECT DISTINCT
                                      mst_siswa.nis
                                      ,mst_siswa.nama_siswa
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
                                    WHERE 
                                      tbl_nilaisekolah.nis 
                                      IN (
                                        SELECT tbl_dataprakerin.nis FROM tbl_nilaidudi,tbl_pembdudi,tbl_dataprakerin
                                        WHERE tbl_nilaidudi.id_pembdudi = tbl_pembdudi.id_pembdudi
                                        AND tbl_pembdudi.nis = tbl_dataprakerin.nis
                                      )
                                    AND tbl_nilaisekolah.nis = tbl_dataprakerin.nis
                                    AND mst_siswa.nis = tbl_dataprakerin.nis
                                    AND tbl_nilaidudi.id_pembdudi = tbl_pembdudi.id_pembdudi
                                    AND tbl_dataprakerin.nis = tbl_pembdudi.nis
                                    AND mst_siswa.id_jur = mst_jurusan.id_jur
                                    AND mst_siswa.id_tahunajaran = tbl_tahunajaran.id_tahunajaran
                                    GROUP BY 
                                      tbl_dataprakerin.nis
                                    ORDER BY 
                                      tbl_dataprakerin.nis ASC");
                   $jml=0;
                   while ($data=mysql_fetch_array($query)) {
                    $jml++;
                  ?>
                  <tbody>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data["nis"];?></td>
                    <td nowrap="nowrap"><?php echo $data["nama_siswa"]; ?></td>
                    <td><?php echo $data["nama_jur"]; ?></td>
                    <td><?php echo $data["tahun_ajaran"]; ?></td>
                    <td nowrap="nowrap"><?php echo $data["nama_dudi"]; ?></td>
                    <td><?php echo $data["nilai_prakerin"]; ?></td>
                    <td>
                       <?php
                        if($data[nilai_prakerin] >= 90 && $data[nilai_prakerin] <= 100){
                          echo "A";
                        }elseif ($data[nilai_prakerin] >= 70 && $data[nilai_prakerin] <= 89.9) {
                          echo "B";
                        }elseif ($data[nilai_prakerin] >= 50 && $data[nilai_prakerin] <= 69.9) {
                          echo "C";
                        }else{
                          echo "D";
                        }
                       ?> 
                    <td>
                    <td><?php echo $data["sakit"]; ?></td>
                    <td><?php echo $data["izin"]; ?></td>
                    <td><?php echo $data["tanpa_keterangan"]; ?></td>
                  </tr>
                  </tbody>
                  <?php
                    }//tutup while
                    ?>
                  
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