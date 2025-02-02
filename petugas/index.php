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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Total Kegiatan</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-info">
                                <?php
                                $petugas_id = $_SESSION['id'];
                                $jumlah_arsip = mysqli_query($koneksi, "SELECT * FROM arsip WHERE arsip_petugas = $petugas_id");
                                ?>
                                <span class="counter"><?php echo mysqli_num_rows($jumlah_arsip); ?></span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Kategori Kegiatan</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash4"></div>
                        </li>
                        <li class="text-right graph-four-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="text-purple">
                                <?php
                                $jumlah_kategori = mysqli_query($koneksi, "select * from kategori");
                                ?>
                                <span class="counter"><?php echo mysqli_num_rows($jumlah_kategori); ?></span>
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
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>Grafik flow kegiatan</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p>Grafik jumlah kegiatan selama sebulan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline cus-product-sl-rp">
                        <li>
                            <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Jumlah Kegiatan Berjalan</h5>
                        </li>
                    </ul>
                    <div id="extra-area-chart" style="height: 356px;"></div>


                    <div id="morris-area-chart"></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">

                <?php
                $id = $_SESSION['id'];
                $saya = mysqli_query($koneksi, "select * from petugas where petugas_id='$id'");
                $s = mysqli_fetch_assoc($saya);
                ?>
                <div class="single-cards-item">
                    <div class="single-product-image">
                        <a href="#">
                            <img src="../assets/img/product/profile-bg.jpg" alt="">
                        </a>
                    </div>

                    <div class="single-product-text">
                        <?php
                        if ($s['petugas_foto'] == "") {
                        ?>
                            <img class="img-user" src="../gambar/sistem/user.png">
                        <?php
                        } else {
                        ?>
                            <img class="img-user" src="../gambar/petugas/<?php echo $s['petugas_foto']; ?>">
                        <?php
                        }
                        ?>

                        <h4><a class="cards-hd-dn" href="#"><?php echo $s['petugas_nama']; ?></a></h4>
                        <h5>Petugas</h5>
                        <p class="ctn-cards">Monitoring Kegiatan jadi lebih mudah dengan sistem informasi monitoring kegiatan.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>