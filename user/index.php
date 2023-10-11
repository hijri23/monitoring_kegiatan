<?php $active = "index"; ?>

<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Dashboard</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="traffice-source-area mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="white-box analytics-info-cs">
                    <h3 class="box-title">Petugas</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right sp-cn-r">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-success">
                                <?php
                                $jumlah_petugas = mysqli_query($koneksi, "select * from petugas");
                                ?>
                                <span class="counter"><?php echo mysqli_num_rows($jumlah_petugas); ?></span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Total Arsip</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right graph-two-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="text">
                                <?php
                                $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                ?>
                                <span class="counter"><?php echo mysqli_num_rows($jumlah_arsip); ?></span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Kategori Arsip</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="text">
                                <?php
                                $jumlah_kategori = mysqli_query($koneksi, "select * from kategori");
                                ?>
                                <span class="counter"><?php echo mysqli_num_rows($jumlah_kategori); ?></span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Jumlah Unduhan</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash4"></div>
                        </li>
                        <li class="text-right graph-four-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                            $jumlah_unduh = 0;
                            $bulan_ini = date('m');
                            $daftar_unduh = mysqli_query($koneksi, "select riwayat_waktu from riwayat");
                            foreach ($daftar_unduh as $daftar) {
                                $bulan_arsip = date("m", strtotime($daftar['riwayat_waktu']));
                                if ($bulan_arsip == $bulan_ini) {
                                    $jumlah_unduh += 1;
                                }
                            }
                            ?>
                            <span class="text">
                                <span class="counter"><?php echo $jumlah_unduh; ?></span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>Grafik flow arsip</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p>Grafik jumlah arsip masuk perhari selama sebulan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline cus-product-sl-rp">
                        <li>
                            <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Jumlah arsip</h5>
                        </li>
                    </ul>
                    <div id="grafik-flow-arsip" style="height: 356px;"></div>


                    <div id="morris-area-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- AMBIL DATA UNTUK CHART PETUGAS -->
<?php
$nama_petugas = [];
$jumlah_arsip = [];
foreach (mysqli_query($koneksi, "SELECT * FROM petugas") as $petugas) {
    $nama_petugas[] = $petugas['petugas_nama'];
    $id_petugas = $petugas['petugas_id'];

    $cari_arsip = mysqli_query($koneksi, "SELECT * FROM arsip WHERE arsip_petugas ='$id_petugas' ");
    $hasil_arsip = mysqli_num_rows($cari_arsip);
    $jumlah_arsip[] = $hasil_arsip;
}
?>

<!-- DIV UNTUK CHART PETUGAS -->
<div id="data-chart-panjang-petugas" data-value="<?php echo count($nama_petugas); ?>"></div>

<?php for ($i = 0; $i < count($nama_petugas); $i++) : ?>
    <div id="data-chart-petugas<?php echo $i; ?>" data-value="<?php echo $nama_petugas[$i]; ?>"></div>
<?php endfor; ?>

<?php for ($i = 0; $i < count($nama_petugas); $i++) : ?>
    <div id="data-chart-petugas-arsip<?php echo $i; ?>" data-value="<?php echo $jumlah_arsip[$i]; ?>"></div>
<?php endfor; ?>

<!-- INI BAGIAN CHART PETUGAS -->
<div class="row">
    <div class="col-12">
        <div class="product-sales-chart">
            <div class="portlet-title">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="caption pro-sl-hd">
                            <span class="caption-subject"><b>Jumlah Arsip Per Petugas</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <canvas id="arsip-petugas"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- AMBIL DATA UNTUK CHART -->
<?php
$nama_kategori = [];
$jumlah_arsip = [];
foreach (mysqli_query($koneksi, "SELECT * FROM kategori") as $kategori) {
    $nama_kategori[] = $kategori['kategori_nama'];
    $id_kategori = $kategori['kategori_id'];

    $cari_arsip = mysqli_query($koneksi, "SELECT * FROM arsip WHERE arsip_kategori ='$id_kategori' ");
    $hasil_arsip = mysqli_num_rows($cari_arsip);
    $jumlah_arsip[] = $hasil_arsip;
}
?>

<!-- DIV UNTUK CHART KATERGORI -->
<div id="data-chart-panjang-kategori" data-value="<?php echo count($nama_kategori); ?>"></div>

<?php for ($i = 0; $i < count($nama_kategori); $i++) : ?>
    <div id="data-chart-kategori<?php echo $i; ?>" data-value="<?php echo $nama_kategori[$i]; ?>"></div>
<?php endfor; ?>

<?php for ($i = 0; $i < count($nama_kategori); $i++) : ?>
    <div id="data-chart-kategori-arsip<?php echo $i; ?>" data-value="<?php echo $jumlah_arsip[$i]; ?>"></div>
<?php endfor; ?>

<!-- INI BAGIAN CHART KATERGORI -->
<div class="row">
    <div class="col-12">
        <div class="product-sales-chart">
            <div class="portlet-title">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="caption pro-sl-hd">
                            <span class="caption-subject"><b>Jumlah Arsip Per Kategori</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <canvas id="arsip-kategori"></canvas>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>