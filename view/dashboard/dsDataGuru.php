<html lang="en" class="no-js">
    <!-- BEGIN BODY -->
    <body>
        <!-- BEGIN CONTAINER -->
        <div>
            <div>
                <!-- BEGIN PAGE -->       
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="icon-edit"></i>DATA GURU PEMBIMBING</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="reload"></a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Pembimbing Sekolah</th>
                                                <th>Pengajar</th>
                                                <th>Jabatan</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $batas = 10;
                                            $page = $_GET['hal'];
                                            $offset = $page * $batas;
                                            $query = mysql_query("select * from mst_pembsek");
                                            $nmr = $offset + 1;
                                            $jml = 0;
                                            while ($data = mysql_fetch_array($query)) {
                                                $jml++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $nmr++; ?></td>
                                                    <td><?php echo $data["nip"]; ?></td>
                                                    <td><?php echo $data["nama_pembsek"]; ?></td>
                                                    <td><?php echo $data["pengajar"]; ?></td>
                                                    <td><?php echo $data["jabatan"]; ?></td>
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
                    <!-- END PAGE -->
            </div>
        </div>
    </body>
    <!-- END BODY -->
</html>