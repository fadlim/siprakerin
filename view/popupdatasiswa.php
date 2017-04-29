<!-- Global styles START -->          
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="../assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- Global styles END --> 
<!-- Theme styles START -->
<link href="../assets/global/css/components.css" rel="stylesheet">
<link href="../assets/frontend/layout/css/style.css" rel="stylesheet">
<link href="../assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
<link href="../assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
<link href="../assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
<link href="../assets/frontend/layout/css/custom.css" rel="stylesheet">
<!-- Theme styles END -->
<!-- picker -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!-- picker --> 

<!-- tableadvance -->  
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" href="../assets/global/plugins/datatables/DT_bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- tableadvance -->
<?php
error_reporting(E_ALL ^ E_NOTICE);
  include "../koneksi.php";

  $query=mysql_query("SELECT * FROM 
                                tbl_dataprakerin
                                ,mst_siswa
                                ,mst_jurusan
                                ,tbl_pembdudi
                              WHERE tbl_dataprakerin.nis=mst_siswa.nis
                              AND mst_siswa.id_jur=mst_jurusan.id_jur
                              AND tbl_dataprakerin.id_dtprakerin = tbl_pembdudi.id_dtprakerin");
  $jum=mysql_num_rows($query);
  $act=$_GET['act'];
?>
  
<html lang="en" class="no-js">
  <!-- BEGIN BODY -->
<style type="text/css">
body{
  font-size: 12px;
  font-family: Time new Roman;
}

td{
  font-size: 12px;
  font-family: Time new Roman;
}
</style>

<SCRIPT LANGUAGE="JavaScript">

function sendValue (s){
  var nis = $(s).attr('nis');
  var nama_siswa = $(s).attr('nama_siswa');
  var nama_jur = $(s).attr('nama_jur');
  var nama_dudi = $(s).attr('nama_dudi'); 
  var nama_pembdudi = $(s).attr('nama_pembdudi'); 
  var id_pembdudi = $(s).attr('id_pembdudi');
  //alert(id_pembdudi);
  window.opener.document.getElementById('nis').value = nis;
  window.opener.document.getElementById('nama_siswa').value = nama_siswa;
  window.opener.document.getElementById('nama_jur').value = nama_jur;
  window.opener.document.getElementById('nama_dudi').value = nama_dudi;
  window.opener.document.getElementById('nama_pembdudi').value = nama_pembdudi;
  window.opener.document.getElementById('id_pembdudi').value = id_pembdudi;
  //alert(selvalue);
  window.close();
}
//  End -->
</script>
<body>
  <!-- BEGIN CONTAINER -->
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
               <div class="caption"><i class="icon-edit"></i>Data Siswa</div>
               <div class="tools">
                <a href="javascript:;" class="reload"></a>
              </div>
            </div>
            <div class="portlet-body">
              <table class="table table-striped table-hover table-bordered" id="sample_1">
                <thead>
                  <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Perusahaan</th>
                    <th>Pembimbing Perusahaan</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                   $batas=7;
                   $page=$_GET['hal'];
                   $offset=$page*$batas;
                   $no=$offset+1;
                   $query=mysql_query("SELECT * FROM 
                                                tbl_dataprakerin
                                                ,mst_siswa
                                                ,mst_jurusan
                                                ,tbl_pembdudi
                                              WHERE tbl_dataprakerin.nis=mst_siswa.nis
                                              AND mst_siswa.id_jur=mst_jurusan.id_jur
                                              AND tbl_dataprakerin.id_dtprakerin = tbl_pembdudi.id_dtprakerin
                                              AND tbl_pembdudi.id_pembdudi NOT IN (SELECT id_pembdudi FROM tbl_nilaidudi)");
                   $jml=0;
                   while ($data=mysql_fetch_array($query)) {
                    $jml++;
                  ?>
                  <tr>
                    <td><?php echo $data["nis"];?></td>
                    <td><?php echo $data["nama_siswa"]; ?></td>
                    <td><?php echo $data["nama_jur"]; ?></td>
                    <td><?php echo $data["nama_dudi"]; ?></td>
                    <td><?php echo $data["nama_pembdudi"]; ?></td>
                    <td align="center">
                    <div class="btn-group">
                      <button type="button" class="btn blue red-stripe" nis="<?php echo $data['nis'];?>" nama_siswa="<?php echo $data['nama_siswa'];?>" nama_jur="<?php echo $data['nama_jur'];?>" nama_dudi="<?php echo $data['nama_dudi'];?>" nama_pembdudi="<?php echo $data['nama_pembdudi'];?>" id_pembdudi="<?php echo $data['id_pembdudi'];?>" onClick="sendValue(this);"><i class="fa fa-check-square-o fa-2x" title="select"></i></button>
                    </div>
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
          <?php
          }
          ?>  
        </div>
      </div>
</body>
    <script src="../assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <!--<script src="../assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>-->
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="../assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <!-- BEGIN RevolutionSlider -->
  
    <script src="../assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
    <script src="../assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
    <!-- END RevolutionSlider -->

    <script src="../assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>

    <!-- picker -->
    <script src="../assets/global/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/clockface/js/clockface.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="../assets/admin/pages/scripts/components-pickers.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- picker -->

     <!-- tableadvance -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/datatables/tabletools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="../assets/global/plugins/datatables/DT_bootstrap.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/admin/pages/scripts/table-advanced.js"></script>
    <!-- tableadvance -->

    <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init();    
            Layout.initOWL();
            RevosliderInit.initRevoSlider();
            Layout.initTwitter();

            Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            Layout.initNavScrolling();
            ComponentsPickers.init();

            TableAdvanced.init();
            
        });
    </script>
<!-- END BODY -->
</html>