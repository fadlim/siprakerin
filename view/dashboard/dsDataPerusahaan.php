<?php
include "koneksi.php";
?>

<html lang="en" class="no-js">
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
                                        <div class="caption"><i class="icon-edit"></i>DATA PERUSAHAAN</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="reload"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                        </div>
                                        <table class="table table-striped table-hover table-bordered" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Perusahaan</th>
                                                    <th>Alamat Perusahaan</th>
                                                    <th>Nama Pemimpin</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $batas = 7;
                                                $page = $_GET['hal'];
                                                $offset = $page * $batas;
                                                $no = $offset + 1;
                                                $query = mysql_query("SELECT *,tbl_dataprakerin.no_telp as nope FROM tbl_dataprakerin,mst_siswa,mst_jurusan,mst_pembsek WHERE mst_siswa.id_jur=mst_jurusan.id_jur AND mst_siswa.nis=tbl_dataprakerin.nis AND tbl_dataprakerin.id_pembsek=mst_pembsek.id_pembsek order by status asc");
                                                $jml = 0;
                                                while ($data = mysql_fetch_array($query)) {
                                                    $jml++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $data["nama_dudi"]; ?></td>
                                                        <td><?php echo $data["alamat_dudi"]; ?></td>
                                                        <td><?php echo $data["nama_pemimpin"]; ?></td>
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