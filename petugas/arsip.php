<?php $active = "tim"; ?>

<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Kegiatan</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Kegiatan</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="panel">

        <div class="panel-body">

            <form method="get" action="">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Filter Tim</label>
                            <select class="form-control" name="tim" required="required">
                                <option value="">Pilih Tim</option>
                                <option value="all">Pilih Semua Tim</option>
                                <?php
                                $tim = mysqli_query($koneksi, "SELECT * FROM tim");
                                while ($k = mysqli_fetch_array($tim)) {
                                ?>
                                    <option <?php if (isset($_GET['tim'])) {
                                                if ($_GET['tim'] == $k['tim_id']) {
                                                    echo "selected='selected'";
                                                }
                                            } ?> value="<?php echo $k['tim_id']; ?>"><?php echo $k['tim_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Filter Bulan</label>
                            <select class="form-control" name="bulan" required="required">
                                <option value="">Pilih Bulan</option>
                                <option value="all">Pilih Semua Bulan</option>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>

                                <!-- <?php
                                $kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan");
                                while ($k = mysqli_fetch_array($kegiatan)) {
                                ?>
                                    <option <?php if (isset($_GET['kegiatan'])) {
                                                if ($_GET['kegiatan'] == $k['petugas_id']) {
                                                    echo "selected='selected'";
                                                }
                                            } ?> value="<?php echo $k['petugas_id']; ?>"><?php echo $k['petugas_nama']; ?></option>
                                <?php
                                }
                                ?> -->
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Filter Tahun</label>
                            <select class="form-control" name="tahun" required="required">
                                <option value="">Pilih Tahun</option>
                                <option value="all">Pilih Semua Tahun</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                
                                <!-- <?php
                                $kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan");
                                while ($k = mysqli_fetch_array($kegiatan)) {
                                ?>
                                    <option <?php if (isset($_GET['kegiatan'])) {
                                                if ($_GET['kegiatan'] == $k['petugas_id']) {
                                                    echo "selected='selected'";
                                                }
                                            } ?> value="<?php echo $k['petugas_id']; ?>"><?php echo $k['petugas_nama']; ?></option>
                                <?php
                                }
                                ?> -->
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col-lg-2">
                <h1></h1>
                <br>
                <input type="submit" class="btn btn-primary" value="Tampilkan">
            </div> -->


                    <div class="col-lg-2">
                        <h1></h1>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Tampilkan">
                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="panel panel">

        <!-- <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div> -->
        <div class="panel-body">

            <div class="pull-right">
                <a href="arsip_tambah" class="btn btn-primary"><i class="fa fa-cloud"></i> Tambah Kegiatan</a>
            </div>


            <br>
            <br>
            <br>


            <?php
            if (isset($_GET['alert'])) {
                if ($_GET['alert'] == "tambah_sukses") {
                    echo "<div class='alert alert-success'>Berhasil Menambah Kegiatan!</div>";
                }
                if ($_GET['alert'] == "tambah_gagal") {
                    echo "<div class='alert alert-success'>Gagal Menambah Kegiatan!</div>";
                }
                if ($_GET['alert'] == "hapus_sukses") {
                    echo "<div class='alert alert-success'>Berhasil Menghapus Kegiatan!</div>";
                }
                if ($_GET['alert'] == "hapus_gagal") {
                    echo "<div class='alert alert-success'>Gagal Menghapus Kegiatan!</div>";
                }
                if ($_GET['alert'] == "edit_sukses") {
                    echo "<div class='alert alert-success'>Berhasil Mengedit Kegiatan!</div>";
                }
                if ($_GET['alert'] == "edit_gagal") {
                    echo "<div class='alert alert-success'>Gagal mengedit Kegiatan!</div>";
                }
            }
            ?>

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <!-- <th>Kegiatan</th> -->
                        <th width="25%">Kegiatan</th>
                        <th width="20%">Tim Kerja</th>
                        <th width="10%">Mulai</th>
                        <th width="10%">Berakhir</th>
                        <th width="6%">Target</th>
                        <th width="6%">Realisasi</th>
                        <th width="15%">Satuan</th>
                        <!-- <th>Status Arsip</th> -->
                        <th class="text-center" width="6%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    function tgl_indo($tanggal){
                        $bulan=array(
                            0=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Juli','Agustus','September','Oktober','November','Desember'

                        );
                        $pecahkan=explode('-',$tanggal);
                        return $pecahkan[2]. ' ' .$bulan[(int)$pecahkan[1]].' '.$pecahkan[0];
                    }

                    $no = 1;

                    // if (isset($_GET['tim'], $_GET['bulan'], $_GET['tahun'])) {
                    //     $tim = $_GET['tim'];
                    //     $bulan = $_GET['bulan'];
                    //     $tahun = $_GET['tahun'];


                        
                    //     if ($tim == "all" && $bulan == "Agustus" ) {
                    //         $kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan LIKE kegiatan_mulai= 2024-08 ORDER BY kegiatan_mulai ASC, kegiatan_id DESC");
                    //     } else {
                    //         $kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY kegiatan_mulai ASC, kegiatan_id DESC");
                    // while ($p = mysqli_fetch_array($kegiatan)) {
                    //     }}
                        
                    //     elseif ($kategori == "all" || $petugas == "all") {
                    //         if ($kategori == "all") {
                    //             $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_petugas='$petugas' ORDER BY arsip_cek ASC,arsip_id DESC");
                    //         } elseif ($petugas == "all") {
                    //             $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_kategori='$kategori' ORDER BY arsip_cek ASC,arsip_id DESC");
                    //         }
                    //     } elseif ($kategori != "all" && $petugas != "all") {
                    //         $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_kategori='$kategori' and arsip_petugas='$petugas' ORDER BY arsip_cek ASC,arsip_id DESC");
                    //     }
                    // }


                    //$kegiatan = $_SESSION['id'];
                    // if (isset($_GET['kegiatan'])) {
                    //     $kegiatan = $_GET['kegiatan'];
                    //     if ($kegiatan == "all") {
                    //         $tim = mysqli_query($koneksi, "SELECT * FROM tim,kegiatan WHERE tim_nama=kegiatan_tim ORDER BY kegiatan_mulai ASC, kegiatan_id DESC");
                    //     } elseif ($kegiatan == "all") {
                    //         if ($kegiatan == "all") {
                    //             $tim = mysqli_query($koneksi, "SELECT * FROM tim,kegiatan WHERE tim_nama=kegiatan_tim ORDER BY kegiatan_mulai ASC, kegiatan_id DESC");
                    //         }
                    //     } elseif ($kegiatan != "all") {
                    //         $tim = mysqli_query($koneksi, "SELECT * FROM tim,kegiatan WHERE tim_nama=kegiatan_tim and tim_nama='$kegiatan' ORDER BY kegiatan_mulai ASC, kegiatan_id DESC");
                    //     }
                    // } else
                        //$tim = mysqli_query($koneksi, "SELECT * FROM tim,kegiatan WHERE tim_nama=kegiatan_tim ORDER BY kegiatan_mulai ASC, kegiatan_id DESC");

                        $kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY kegiatan_mulai ASC, kegiatan_id DESC");
                    while ($p = mysqli_fetch_array($kegiatan)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <!-- <td><?php echo date('H:i:s  d-m-Y', strtotime($p['arsip_waktu_upload'])) ?></td> -->
                            <td>
                           
                            <?php echo $p['kegiatan_nama'] ?>

                            <?php
                            $persentase1 = $p['kegiatan_realisasi']/$p['kegiatan_target'];
                            $persentase = round($persentase1, 2);

                            // if ($persentase >= 0 && $persentase <= 50) {
                            //     $warna = 'progress-bar-danger';
                            // } elseif ($persentase > 50 && $persentase <= 80) {
                            //     $warna = 'progress-bar-warning';
                            // } elseif ($persentase > 80 && $persentase <= 100) {
                            //     $warna = 'progress-bar-info';
                            // }
                            ?>
                            <ul></ul>
                            
                                <a>Progres Realisasi</a>
                                <div class="progress" style="height: 18px">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: <?php echo $persentase*100 ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    <?php echo $persentase*100 ?>%
                                    </div>
                                </div>

                                <?php
                            //$persentase2 = $p['kegiatan_mulai']-$p['kegiatan_berakhir'];
                            $tanggal1= new DateTime($p['kegiatan_mulai']);
                            $tanggal2= new DateTime($p['kegiatan_berakhir']);
                            $tanggal3= new DateTime();
                            // $tanggal1= date_create($p['kegiatan_mulai']);
                            // $tanggal2= date_create($p['kegiatan_berakhir']);
                            // $tanggal3= date_create();
                            $selisih1 = date_diff($tanggal1, $tanggal2);
                            $selisih2 = date_diff($tanggal1, $tanggal3);
                            $selisih_akhir = $selisih1->format("%a");
                            $selisih_skrng = $selisih2->format("%a");
                            //$selisih_akhir = strftime($selisih1);
                            //$selisih_skrng = strftime($selisih2);
                            
                            // if ($selisih_akhir = 0){
                            //     $selisih_akhir = 1;
                            // } elseif ($selisih_akhir != 0){
                            //     $selisih_akhir = $selisih_akhir;
                                
                            // }
                            $pembagian = $selisih_skrng/$selisih_akhir;
                           
                            //$pembagian = $selisih1/$selisih2;
                            $persentase2 = round($pembagian, 2);

                            if ($persentase2 > 1){
                                $persentase2 = 1;
                            }
                            //$persentase_tanggal = round($persentase2, 2);

                            // if ($persentase_tanggal >= 0 && $persentase_tangggal <= 50) {
                            //     $warna2 = 'progress-bar-danger';
                            // } elseif ($persentase_tanggal > 50 && $persentase_tanggal <= 80) {
                            //     $warna2 = 'progress-bar-warning';
                            // } elseif ($persentase_tanggal > 80 && $persentase_tanggal <= 100) {
                            //     $warna2 = 'progress-bar-info';
                            // }
                            ?>

                            <ul></ul>
                            <a>Persentase Hari</a>
                            <div class="progress" style="height: 18px">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: <?php echo $persentase2*100 ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    <?php echo $persentase2*100 ?>%
                                    </div>
                                </div>


                            
                            </td>
                            <!-- <td>

                                <b>Kode</b> : <?php echo $p['kegiatan_nama'] ?><br>
                                <b>Nama</b> : <?php echo $p['kegiaan_nama'] ?><br>
                                <b>Tanggal</b> : <?php echo date('d-m-Y', strtotime($p['tanggal_arsip'])) ?><br>

                            </td> -->
                            <td><?php echo $p['kegiatan_tim'] ?></td>
                            <td><?php echo tgl_indo($p['kegiatan_mulai']) ?></td>
                            <td><?php echo tgl_indo($p['kegiatan_berakhir']) ?></td>
                            <td><?php echo $p['kegiatan_target'] ?></td>
                            <td><?php echo $p['kegiatan_realisasi'] ?></td>
                            <td><?php echo $p['kegiatan_satuan'] ?></td>
                            <!-- <td><?php echo $p['kegiatan_spj'] ?></td> -->
                           
                           <!-- <?php
                            if ($p['kegiatan_mulai'] == 'belum diverifikasi') {
                                $warna = 'btn-info';
                            }
                            if ($p['kegiatan_mulai'] == 'sudah disetujui') {
                                $warna = 'btn-success';
                            }
                            if ($p['kegiatan_mulai'] == 'perlu perbaikan') {
                                $warna = 'btn-warning';
                            }
                            ?> -->

                            <!-- <td><a class="clickLink btn <?php echo $warna; ?>" data-toggle="modal" data-target="#status<?php echo $p['kegiatan_id']; ?>"><?php echo $p['kegiatan_mulai'] ?></a></td> -->
                            <td class="text-center">



                                <div class="modal fade" id="exampleModal_<?php echo $p['kegiatan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus kegiatan ini? <br> Kegiatan yang dihapus tidak dapat dikembalikan lagi.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                <a href="arsip_hapus.php?id=<?php echo $p['kegiatan_id']; ?>" class="btn btn-danger"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="btn-group">
                                    <!-- <a class="btn btn-default" href="../tim/<?php echo $p['arsip_file']; ?>" download><i class="fa fa-download"></i></a> -->
                                    <!-- <a target="_blank" class="clickLink btn btn-default" data-toggle="modal" data-target="#myModal" data-name="<?php echo $p['arsip_nama']; ?>" data-file="<?= $p['arsip_file'] ?>"><i class="fa fa-search"></i> Preview</a> -->
                                    <a href="arsip_edit?id=<?php echo $p['kegiatan_id']; ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal_<?php echo $p['kegiatan_id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>

    </div>
</div>

<!-- <script>
    $(document).on('click', '.clickLink', function() {
        var arsip_nama = $(this).data("name");
        let file = $(this).data("file");
        path = "../tim/" + file;

        $('.modal-body #filename').text(arsip_nama);
        $('.modal-body #myframe').attr("src", path);
    });
</script> -->

<!--  Modal Preview Arsip -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <b> <span name="filename" id="filename"></span> </b>

                <iframe src="" width="100%" height="500px" id="myframe"></iframe>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- <?php foreach ($tim as $p) : ?>
    <div class="modal" id="status<?php echo $p['kegiatan_id']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content"> -->

                <!-- Modal Header -->
                <!-- <div class="modal-header">
                    <h5 class="modal-title text-center">PESAN</h5>
                </div> -->

                <!-- Modal Body -->
                <!-- <div class="modal-body">
                    <h6 class="text-center"><?php echo ($p['arsip_pesan'] == '') ? 'belum ada pesan...' : $p['arsip_pesan'] ?></h6>
                </div> -->

                <!-- Modal Footer -->
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->

            <!-- </div>
        </div>
    </div> -->
<!-- <?php endforeach; ?> -->


<?php include 'footer.php'; ?>