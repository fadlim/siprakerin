<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if ($_SESSION["login"] == TRUE) {
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->

    <!-- Head BEGIN -->
    <head>
        <meta charset="utf-8">
        <title>SIPRAKERIN [Sistem Praktek Kerja Industri]</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta content="Metronic Shop UI description" name="description">
        <meta content="Metronic Shop UI keywords" name="keywords">
        <meta content="keenthemes" name="author">

        <meta property="og:site_name" content="-CUSTOMER VALUE-">
        <meta property="og:title" content="-CUSTOMER VALUE-">
        <meta property="og:description" content="-CUSTOMER VALUE-">
        <meta property="og:type" content="website">
        <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
        <meta property="og:url" content="-CUSTOMER VALUE-">


        <!-- Fonts START -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
        <!-- Fonts END -->

        <!-- Global styles START -->          
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Global styles END --> 

        <!-- Page level plugin styles START -->
        <link href="assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
        <link href="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
        <!-- Page level plugin styles END -->

        <!-- Theme styles START -->
        <link href="assets/global/css/components.css" rel="stylesheet">
        <link href="assets/frontend/layout/css/style.css" rel="stylesheet">
        <link href="assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
        <link href="assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
        <link href="assets/frontend/layout/css/themes/blue.css" rel="stylesheet" id="style-color">
        <link href="assets/frontend/layout/css/custom.css" rel="stylesheet">
        <!-- Theme styles END -->
        <!-- picker -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/clockface/css/clockface.css"/>
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <!-- picker --> 

        <!-- tableadvance -->  
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
        <link rel="stylesheet" href="assets/global/plugins/datatables/DT_bootstrap.css"/>
        <!-- END PAGE LEVEL STYLES -->
        <!-- tableadvance -->
    </head>
    <!-- Head END -->
    <style type="text/css">
        body{
            font-size: 14px;
            font-family: Time new Roman;
        }
    </style>


    <!-- Body BEGIN -->
    <body class="corporate">
        <?php
        $menu = $_GET[menu];
        switch ($menu) {
            default : $namafile = "dashboard.php";
                break;
            case "dashboard" : $namafile = "dashboard.php";
                break;
            case "user" : $namafile = "view/mst_user.php";
                break;
            case "siswa" : $namafile = "view/mst_siswa.php";
                break;
            case "mstJur" : $namafile = "view/mst_jur.php";
                break;
            case "pemSek" : $namafile = "view/mst_pemsek.php";
                break;
            case "tahunajaran" : $namafile = "view/mst_tahunajaran.php";
                break;
            case "daftar" : $namafile = "view/daftarprakerin.php";
                break;
            case "pbbdudi" : $namafile = "view/pembdudi.php";
                break;
            case "jadwal" : $namafile = "view/jadwalmonitoring.php";
                break;
            case "nilaisek" : $namafile = "view/nilai_sekolah.php";
                break;
            case "nilaidudi" : $namafile = "view/nilai_dudi.php";
                break;
            case "nilaigab" : $namafile = "view/nilai_gabungan.php";
                break;
            case "dtPrakerin" : $namafile = "view/laporan/dataprakerin/dataprakerin.php";
                break;
            case "dtnilaiprakerin" : $namafile = "view/laporan/datanilaiprakerin/datanilaiprakerin.php";
                break;
            case "log" : $namafile = "logout.php";
                break;
        }
        ?>

        <!-- BEGIN STYLE CUSTOMIZER --> 
        <!-- BEGIN TOP BAR -->
        <div class="pre-header">
            <div class="container">
                <div class="row">
                    <!-- BEGIN TOP BAR LEFT PART -->
                    <div class="col-md-6 col-sm-6 additional-shop-info">
                        <ul class="list-unstyled list-inline">
                            <li><i class="glyphicon glyphicon-calendar"></i><span style="font-family:san serif;" id="para1"></span></li>
                            <script>
                                document.getElementById("para1").innerHTML = formatAMPM();

                                function formatAMPM() {
                                    var d = new Date(),
                                    minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
                                    hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
                                    ampm = d.getHours() >= 12 ? 'pm' : 'am',
                                    months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                                    days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
                                    return days[d.getDay()]+' '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+' '+hours+':'+minutes+ ampm;
                                }
                            </script>

                            <li> <i class="fa fa-user"></i><font style="font-family:san serif;"> Welcome </font><?php echo"<span style='font-family:san serif;''>" . $_SESSION['nama_lengkap'] . "</span>" ?></li>
                        </ul>
                    </div>
                    <!-- END TOP BAR LEFT PART -->
                    <!-- BEGIN TOP BAR MENU -->
                    <div class="col-md-6 col-sm-6 additional-nav">
                        <ul class="list-unstyled list-inline pull-right">
                            <li><a href="#"><i class="fa fa-home "></i><font style="font-family:san serif;"> SMKN 1 Kawali </font></a></li>
                            <li><a href="logout.php"><font style="font-family:san serif;">Logout<i class="fa fa-sign-out "></i></font></a></li>
                        </ul>
                    </div>
                    <!-- END TOP BAR MENU -->
                </div>
            </div>        
        </div>
        <!-- END TOP BAR -->
        <!-- BEGIN HEADER -->
        <div class="header">
            <div class="container">
                <a class="site-logo" href="index.html"><img src="images/logo2.png" height="39px" width="39px"> <img src="images/siprakerin.png" alt="Metronic FrontEnd"></a>

                <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

                <!-- BEGIN NAVIGATION -->
                <div class="header-navigation pull-right font-transform-inherit">
                    <ul>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="?menu=dashboard">
                              <span class="fa fa-th-large"></span>Dashboard 
                            </a>

                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                                <span class="fa fa-file-o"></span>Data Master 
                                <i class="fa fa-angle-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="?menu=siswa">Data Siswa</a></li>
                                <li><a href="?menu=pemSek">Data Guru Pembimbing</a></li>         
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">
                               <span class="fa fa-list-alt"></span>Data Prakerin 
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="?menu=daftar">Data Prakerin</a></li>
                                <li><a href="?menu=pbbdudi">Data Pembimbing Perusahaan</a></li>
                                <!-- <li><a href="?menu=jadwal">Jadwal Monitoring</a></li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="?menu=jadwal">
                                <span class="fa fa fa-tag"></span>Jadwal Prakerin 
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                               <span class="fa fa-align-left"></span>Nilai Prakerin 
                                <i class="fa fa-angle-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- <li><a href="?menu=param">Parameter Penilaian</a></li> -->
                                <li><a href="?menu=nilaisek">Nilai Sekolah</a></li>
                                <li><a href="?menu=nilaidudi">Nilai Perusahaan</a></li>
                                <li><a href="?menu=nilaigab">Nilai Prakerin</a></li>
                            </ul>
                        </li>
                         <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                               <span class="fa fa-align-left"></span>Nilai Perusahaan
                                <i class="fa fa-angle-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- <li><a href="?menu=param">Parameter Penilaian</a></li> -->
                                <li><a href="?menu=nilaidudi&jur=6017">Nilai TKJ</a></li>
                                <li><a href="?menu=nilaidudi&jur=6018">Nilai Akuntansi</a></li>
                            </ul>
                        </li>
                        <?php
                            if($_SESSION['level'] == "0"){
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                               <span class="fa fa-gear"></span>Setting 
                                <i class="fa fa-angle-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="?menu=user">Data User</a></li>  
                                <li><a href="?menu=mstJur">Data Jurusan</a></li>  
                                <li><a href="?menu=tahunajaran">Tahun Ajaran</a></li>          
                            </ul>
                        </li>
                        <li><a href="shop-index.html" target="_blank"><span class="fa fa-print"></span>Laporan</a>
                            <ul class="dropdown-menu">
                                <!-- <li><a href="?menu=param">Parameter Penilaian</a></li> -->
                                <li><a href="?menu=dtPrakerin">Data Prakerin</a></li>
                                <li><a href="?menu=dtnilaiprakerin">Nilai Prakerin</a></li>
                                <!-- <li><a href="?menu=nilaigab"></a></li> -->
                            </ul>
                        </li>
                        <?php
                            }
                        ?>
                        <!-- BEGIN TOP SEARCH -->
                        <!-- <li class="menu-search">
                            <span class="sep"></span>
                            <i class="fa fa-search search-btn"></i>
                            <div class="search-box">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" placeholder="Search" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div> 
                        </li> -->
                        <!-- END TOP SEARCH -->
                    </ul>
                </div>
                <!-- END NAVIGATION -->
            </div>
        </div>
        <!-- Header END -->

        <div class="main">
            <div class="container-fluid">
                <?php include $namafile; ?>
            </div>
        </div>
        <!-- BEGIN FOOTER -->
        <div class="page-footer footer navbar-fixed-bottom"><!-- navbar-fixed-bottom -->
            <div class="page-footer-inner" style="bgcolor:blue;">
                2017 &copy; <a href="http://smkislamiyahkramat.blogspot.com">smknu1islamiyahkramat</a>.
            </div>
            <div class="page-footer-tools">
                <span class="go-top">
                <!-- <i class="fa fa-angle-up"></i> -->
                </span>
            </div>
        </div>
        <!-- END FOOTER -->

        <!-- Load javascripts at bottom, this will reduce page load time -->
        <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <![endif]-->
        <script src="assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
        <script src="assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        
        <!-- END CORE PLUGINS -->
        <script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
        <script src="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

        <!-- BEGIN RevolutionSlider -->

        <script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
        <script src="assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
        <!-- END RevolutionSlider -->

        <script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>

        <!-- picker -->
        <script src="assets/global/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/clockface/js/clockface.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="assets/admin/pages/scripts/components-pickers.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- picker -->

        <!-- tableadvance -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/datatables/tabletools/js/dataTables.tableTools.min.js"></script>
        <script type="text/javascript" src="assets/global/plugins/datatables/DT_bootstrap.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/admin/pages/scripts/table-advanced.js"></script>
        <!--<script src="assets/global/plugins/bootstrap-sessiontimeout/jquery.sessionTimeout.min.js" type="text/javascript"></script>-->
        <!-- tableadvance -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/global/plugins/jquery-idle-timeout/jquery.idletimeout.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-idle-timeout/jquery.idletimer.js" type="text/javascript"></script>
        <script src="assets/admin/pages/scripts/ui-idletimeout.js"></script>
        <script src="assets/admin/pages/scripts/form-validation.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <script type="text/javascript">
            jQuery(document).ready(function() {
                Metronic.init(); // init metronic core components
                Layout.init();    
                // initialize session timeout settings
                UIIdleTimeout.init();
                // initialize session timeout settings
               //$.sessionTimeout({
               //  title: 'Session Timeout Notification',
               //  message: 'Your session is about to expire.',
               //  keepAliveUrl: 'demo/timeout-keep-alive.php',
               //  redirUrl: 'prosesLog.php?op=out',
               //  logoutUrl: 'prosesLog.php?op=out',
               //  warnAfter: 5000, //warn after 5 seconds
               //  redirAfter: 10000, //redirect after 10 secons
               // });

                Layout.initOWL();
                RevosliderInit.initRevoSlider();
                Layout.initTwitter();

                Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
                Layout.initNavScrolling();
                ComponentsPickers.init();

                TableAdvanced.init();
                FormValidation.init();
            
            });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>
<?php 
} else{
    ?>
    <script type="text/javascript">
            // alert("Maaf Harus Login Terlebih Dahulu");
            window.location='index.php';
        </script>
<?php
}
?>