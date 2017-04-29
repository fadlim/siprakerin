<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption"><i class="icon-edit"></i>DATA SISWA</div>
        <div class="tools">
            <a href="javascript:;" class="reload"></a>
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-hover table-bordered" id="sample_1">
            <thead>
                <tr>
                    <th>No</th>
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
                $batas = 7;
                $page = $_GET['hal'];
                $offset = $page * $batas;
                $no = $offset + 1;
                $query = mysql_query("select * from mst_siswa,mst_jurusan, mst_kelas,tbl_tahunajaran where mst_siswa.id_jur=mst_jurusan.id_jur and mst_siswa.id_tahunajaran=tbl_tahunajaran.id_tahunajaran and mst_siswa.id_kelas=mst_kelas.id_kelas");
                $jml = 0;
                while ($data = mysql_fetch_array($query)) {
                    $jml++;
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
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
                }//tutup while
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->