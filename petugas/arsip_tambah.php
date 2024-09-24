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
                                <h4 style="margin-bottom: 0px">Tambah Kegiatan</h4>
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


    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Kegiatan</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">
                        <a href="arsip" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>
                    <br>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "kode_gagal") {
                            echo "<div class='alert alert-danger'>Kode arsip sudah terdaftar!</div>";
                        }
                        if ($_GET['alert'] == "tanggal_gagal") {
                            echo "<div class='alert alert-danger'>Tanggal arsip tidak valid!</div>";
                        }
                    }
                    ?>

                    <form method="post" action="arsip_aksi.php" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input type="text" class="form-control" name="kegiatan" value="<?php echo isset($_GET['kegiatan'])  ? $_GET['kegiatan'] : '' ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>Tim Kerja</label>
                            <select class="form-control" name="tim" required="required">
                                <option value="">Pilih Tim Kerja</option>
                                <?php
                                $tim = mysqli_query($koneksi, "SELECT * FROM tim");
                                while ($k = mysqli_fetch_array($tim)) {
                                ?>
                                    <option value="<?php echo $k['tim_nama']; ?>" <?php echo (isset($_GET['tim']) && ($_GET['tim'] == $k['tim_nama']))  ? "selected='selected'" : '' ?>><?php echo $k['tim_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" value="<?php echo isset($_GET['tanggal_mulai'])  ? $_GET['tanggal_mulai'] : '' ?>" required="required">
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Tanggal Berakhir</label>
                            <input type="date" class="form-control" name="tanggal_berakhir" value="<?php echo isset($_GET['tanggal_berakhir'])  ? $_GET['tanggal_berakhir'] : '' ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>Target</label>
                            <input type="text" class="form-control" name="target" value="<?php echo isset($_GET['target'])  ? $_GET['target'] : '' ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>Realisasi</label>
                            <input type="text" class="form-control" name="realisasi" value="<?php echo isset($_GET['realisasi'])  ? $_GET['realisasi'] : '' ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan" value="<?php echo isset($_GET['satuan'])  ? $_GET['satuan'] : '' ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>SPJ</label>
                            <textarea class="form-control" name="spj" required="required"><?php echo isset($_GET['keterangan'])  ? $_GET['keterangan'] : '' ?></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <?php
                                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($k = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $k['kategori_id']; ?>" <?php echo (isset($_GET['kategori']) && ($_GET['kategori'] == $k['kategori_id']))  ? "selected='selected'" : '' ?>><?php echo $k['kategori_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" required="required"><?php echo isset($_GET['keterangan'])  ? $_GET['keterangan'] : '' ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file">
                        </div> -->

                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>