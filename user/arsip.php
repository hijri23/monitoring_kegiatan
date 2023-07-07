<?php $active = "arsip"; ?>

<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Arsip</span></li>
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
                            <label>Filter Kategori</label>
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <option value="all">Pilih semua kategori</option>
                                <?php
                                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($k = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option <?php if (isset($_GET['kategori'])) {
                                                if ($_GET['kategori'] == $k['kategori_id']) {
                                                    echo "selected='selected'";
                                                }
                                            } ?> value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col-lg-2">
                        <h1></h1>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Tampilkan">
                    </div> -->

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label>Filter Petugas</label>
                            <select class="form-control" name="petugas" required="required">
                                <option value="">Pilih petugas</option>
                                <option value="all">Pilih semua petugas</option>
                                <?php
                                $petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
                                while ($k = mysqli_fetch_array($petugas)) {
                                ?>
                                    <option <?php if (isset($_GET['petugas'])) {
                                                if ($_GET['petugas'] == $k['petugas_id']) {
                                                    echo "selected='selected'";
                                                }
                                            } ?> value="<?php echo $k['petugas_id']; ?>"><?php echo $k['petugas_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <h1></h1>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Tampilkan">
                    </div>

                </div>

            </form>

        </div>

    </div>



    <div class="panel">

        <div class="panel-heading">
            <!-- <h3 class="panel-title">Semua arsip</h3> -->
        </div>
        <div class="panel-body">

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Upload</th>
                        <th>Arsip</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    if (isset($_GET['kategori'], $_GET['petugas'])) {
                        $kategori = $_GET['kategori'];
                        $petugas = $_GET['petugas'];
                        if ($kategori == "all" && $petugas == "all") {
                            $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id ORDER BY arsip_id DESC");
                        } elseif ($kategori == "all" || $petugas == "all") {
                            if ($kategori == "all") {
                                $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_petugas='$petugas' ORDER BY arsip_id DESC");
                            } elseif ($petugas == "all") {
                                $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_kategori='$kategori' ORDER BY arsip_id DESC");
                            }
                        } elseif ($kategori != "all" && $petugas != "all") {
                            $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_kategori='$kategori' and arsip_petugas='$petugas' ORDER BY arsip_id DESC");
                        }
                    } else
                        $arsip = mysqli_query($koneksi, "SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id ORDER BY arsip_id DESC");
                    while ($p = mysqli_fetch_array($arsip)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('H:i:s  d-m-Y', strtotime($p['arsip_waktu_upload'])) ?></td>
                            <td>

                                <b>Kode</b> : <?php echo $p['arsip_kode'] ?><br>
                                <b>Nama</b> : <?php echo $p['arsip_nama'] ?><br>
                                <b>Tanggal</b> : <?php echo date('d-m-Y', strtotime($p['tanggal_arsip'])) ?><br>

                            </td>
                            <td><?php echo $p['kategori_nama'] ?></td>
                            <td><?php echo $p['petugas_nama'] ?></td>
                            <td><?php echo $p['arsip_keterangan'] ?></td>
                            <td class="text-center">


                                <div class="modal fade" id="exampleModal_<?php echo $p['arsip_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                <a href="arsip_hapus.php?id=<?php echo $p['arsip_id']; ?>" class="btn btn-danger"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="btn-group">
                                    <!-- <a target="_blank" class="btn btn-default" href="../arsip/<?php echo $p['arsip_file']; ?>"><i class="fa fa-download"></i></a> -->
                                    <a class="btn btn-default" href="arsip_download.php?id=<?php echo $p['arsip_id']; ?>" download><i class="fa fa-download"></i></a>
                                    <a target="_blank" class="clickLink btn btn-default" data-toggle="modal" data-target="#myModal" data-name="<?php echo $p['arsip_nama']; ?>" data-file="<?= $p['arsip_file'] ?>"><i class="fa fa-search"></i> Preview</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal_<?php echo $p['arsip_id']; ?>">
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


<script>
    $(document).on('click', '.clickLink', function() {
        var arsip_nama = $(this).data("name");
        let file = $(this).data("file");
        path = "../arsip/" + file;

        $('.modal-body #filename').text(arsip_nama);
        $('.modal-body #myframe').attr("src", path);
    });
</script>

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


<?php include 'footer.php'; ?>