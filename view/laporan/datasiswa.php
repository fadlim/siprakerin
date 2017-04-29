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
                    <?php
                    if (empty($act)) {
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
                                        <div class="caption"><i class="icon-edit"></i>Data Siswa <?php echo "$txtCarCat";?></div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn btn-default btn-sm" href="view/laporan/print_datasiswa.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>" onClick="centeredPopup(this.href,'myWindow','900','800','yes');return false" ><i class="fa fa-print"></i> Print Preview</a>&nbsp;
                                                <a class="btn btn-default btn-sm" href="view/laporan/datasiswa_excel.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>">
                                                        <i class="fa fa-file-excel-o"></i> Print Ms.Excel </a>&nbsp;
                                                <a class="btn btn-default btn-sm" href="view/laporan/datasiswa_word.php?txtCarCat=<?php echo "$txtCarCat";?>&cariCat=<?php echo "$cariCat";?>">
                                                        <i class="fa fa-file-word-o"></i> Print Ms.Word </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" name="myForm" autocomplete="off">
                                    <div class="table-toolbar">
                                        <div class="btn-group">
                                            <div class="input-group input-sm">
                                                <select name="cariCat" class="form-control">
                                                    <option value="" disabled="disabled" selected="selected">.:: Jenis Kategori ::.</option>
                                                    <option value="nama_jur">Jurusan</option>
                                                    <option value="jeniskelamin">Jenis Kelamin</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-sm">
                                                <input type="text" name="txtCarCat" class="form-control" placeholder="kategori">
                                                <span class="input-group-btn">
                                                <button class="btn blue" type="submit">Search</button>
                                                </span>
                                            </div>
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
                                                if(isset($_POST['txtCarCat'])){
                                                    $txtCarCat  = $_POST['txtCarCat'];
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
                                                    if(isset($_POST['cariCat'],$_POST['txtCarCat'])){
                                                        $cariCat   = $_POST['cariCat'];
                                                        $txtCarCat  = $_POST['txtCarCat'];
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