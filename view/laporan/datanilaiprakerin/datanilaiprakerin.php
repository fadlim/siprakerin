<?php
    session_start();
    include "koneksi.php";
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
      <?php
        if(empty($act)){
      ?>       
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
                <div class="caption"><i class="icon-edit"></i>DATA PRAKERIN <?php echo "$txtCarCat";?></div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href="view/laporan/datanilaiprakerin/datanilaiprakerin_print.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>" onClick="centeredPopup(this.href,'myWindow','900','800','yes');return false" ><i class="fa fa-print"></i> Print Preview</a>&nbsp;
                        <a class="btn btn-default btn-sm" href="view/laporan/datanilaiprakerin/datanilaiprakerin_excel.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>">
                                <i class="fa fa-file-excel-o"></i> Print Ms.Excel </a>&nbsp;
                        <a class="btn btn-default btn-sm" href="view/laporan/datanilaiprakerin/datanilaiprakerin_word.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>">
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
                                    <option value="tbl_tahunajaran.tahun_ajaran">Tahun Ajaran</option>
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
                    if(isset($_POST['txtCarCat'])){
                        $txtCarCat  = $_POST['txtCarCat'];
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
                        if(isset($_POST['cariCat'],$_POST['txtCarCat'])){
                            $cariCat   = $_POST['cariCat'];
                            $txtCarCat  = $_POST['txtCarCat'];
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