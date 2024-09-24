<?php
include '../koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

//$waktu = date('Y-m-d H:i:s');
//$petugas = $_SESSION['id'];
$kegiatan  = $_POST['kegiatan'];
$tim = $_POST['tim'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_berakhir = $_POST['tanggal_berakhir'];
$target  = $_POST['target'];
$realisasi = $_POST['realisasi'];
$satuan = $_POST['satuan'];
$spj = $_POST['spj'];

// $arsip_status = 'belum diverifikasi';
// $arsip_cek = 'perlu pengecekan';


//$rand = rand();



//$filename = $_FILES['file']['name'];
//$jenis = pathinfo($filename, PATHINFO_EXTENSION);



mysqli_query($koneksi, "insert into kegiatan values (NULL,'$kegiatan','$tim','$tanggal_mulai','$tanggal_berakhir','$target','$realisasi','$satuan','$spj')") or die(mysqli_error($koneksi));
	header("location:arsip?alert=tambah_sukses");

//Cek kode arsip unik ===========================================================================
// $cek_kode = mysqli_query($koneksi, "SELECT arsip_kode FROM arsip");
// $kode_unik = true;
// foreach ($cek_kode as $cek) {
// 	if ($cek['arsip_kode'] == $kode) {
// 		$kode_unik = false;
// 	}
// }
// if ($kode_unik == false) {
// 	header("location:arsip_tambah?alert=kode_gagal&tanggal=$tanggal&nama=$nama&kategori=$kategori&keterangan=$keterangan&kode=$kode");
// 	die;
// }


// validasi tanggal upload arsip ================================================================
//$tanggal = Time::now('Asia/Jakarta');
// $tahun_now = date('Y');
// $bulan_now = date('m');
// $tanggal_now = date('d');
// list($tahun_upload, $bulan_upload, $tanggal_upload) = explode('-', $_POST['tanggal']);

// if ($tahun_upload > $tahun_now) {
// 	header("location:arsip_tambah?alert=tanggal_gagal&tanggal=$tanggal&nama=$nama&kategori=$kategori&keterangan=$keterangan&kode=$kode");
// 	die;
// } elseif ($tahun_upload == $tahun_now) {
// 	if ($bulan_upload > $bulan_now) {
// 		header("location:arsip_tambah?alert=tanggal_gagal&tanggal=$tanggal&nama=$nama&kategori=$kategori&keterangan=$keterangan&kode=$kode");
// 		die;
// 	} elseif ($bulan_upload == $bulan_now) {
// 		if ($tanggal_upload > $tanggal_now) {
// 			header("location:arsip_tambah?alert=tanggal_gagal&tanggal=$tanggal&nama=$nama&kategori=$kategori&keterangan=$keterangan&kode=$kode");
// 			die;
// 		}
// 	}
// }


// if ($jenis == "php") {
// 	header("location:arsip?alert=tambah_gagal");
// 	die;
// } else {
// 	move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/' . $rand . '_' . $filename);
// 	$nama_file = $rand . '_' . $filename;
// 	mysqli_query($koneksi, "insert into arsip values (NULL,'$waktu','$petugas','$kode','$nama','$jenis','$kategori','$keterangan','$nama_file','$tanggal', '$arsip_status', '','$arsip_cek')") or die(mysqli_error($koneksi));
// 	header("location:arsip?alert=tambah_sukses");
// }
