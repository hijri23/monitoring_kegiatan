<!-- <div class="footer-copyright-area mg-t-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-copy-right">
					<p>Copyright © <?php echo date('Y') ?>. Sistem Informasi Arsip Digital. All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div> -->

<script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/jquery-price-slider.js"></script>
<script src="../assets/js/jquery.meanmenu.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.sticky.js"></script>
<script src="../assets/js/jquery.scrollUp.min.js"></script>
<script src="../assets/js/counterup/jquery.counterup.min.js"></script>
<script src="../assets/js/counterup/waypoints.min.js"></script>
<script src="../assets/js/counterup/counterup-active.js"></script>
<script src="../assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- <script src="../assets/js/scrollbar/mCustomScrollbar-active.js"></script> -->
<script src="../assets/js/metisMenu/metisMenu.min.js"></script>
<script src="../assets/js/metisMenu/metisMenu-active.js"></script>
<script src="../assets/js/morrisjs/raphael-min.js"></script>
<script src="../assets/js/morrisjs/morris.js"></script>
<script src="../assets/js/morrisjs/morris-active.js"></script>
<script src="../assets/js/sparkline/jquery.sparkline.min.js"></script>
<script src="../assets/js/sparkline/jquery.charts-sparkline.js"></script>
<script src="../assets/js/sparkline/sparkline-active.js"></script>
<script src="../assets/js/calendar/moment.min.js"></script>
<script src="../assets/js/calendar/fullcalendar.min.js"></script>
<script src="../assets/js/calendar/fullcalendar-active.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/main.js"></script>

<script src="../assets/js/DataTables/datatables.js"></script>
<script src="../assets/js/pdf/jquery.media.js"></script>
<script src="../assets/js/pdf/pdf-active.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.table-datatable').DataTable();

		Morris.Area({
			element: 'grafik-flow-arsip',
			data: [

				<?php
				$dateBegin = strtotime("first day of this month");
				$dateEnd = strtotime("last day of this month");

				$awal = date("Y/m/d", $dateBegin);
				$akhir = date("Y/m/d", $dateEnd);
				$petugas_id = $_SESSION['id'];

				$arsip = mysqli_query($koneksi, "SELECT * FROM arsip WHERE date(arsip_waktu_upload) >= '$awal' AND date(arsip_waktu_upload) <= '$akhir'");
				while ($p = mysqli_fetch_array($arsip)) {
					$tgl = date('Y/m/d', strtotime($p['arsip_waktu_upload']));
					$jumlah = mysqli_query($koneksi, "select * from arsip where date(arsip_waktu_upload)='$tgl'");
					$j = mysqli_num_rows($jumlah);
				?> {
						period: '<?php echo date('Y-m-d', strtotime($p['arsip_waktu_upload'])) ?>',
						Upload: <?php echo $j ?>,
					},
				<?php
				}
				?>

			],
			xkey: 'period',
			ykeys: ['Upload'],
			labels: ['Upload'],
			xLabels: 'day',
			xLabelAngle: 45,
			pointSize: 3,
			fillOpacity: 0,
			pointStrokeColors: ['#006DF0'],
			behaveLikeLine: true,
			gridLineColor: '#e0e0e0',
			lineWidth: 1,
			hideHover: 'auto',
			lineColors: ['#006DF0'],
			resize: true

		});
	});


	// ==================================================== PETUGAS ====================================================
	var panjang_petugas = document.getElementById('data-chart-panjang-petugas').getAttribute('data-value');

	var daftar_petugas = [];
	for (var i = 0; i < panjang_petugas; i++) {
		var nama_petugas = document.getElementById('data-chart-petugas' + i).getAttribute('data-value');
		daftar_petugas[i] = nama_petugas;
	}

	var jumlah_arsip = [];
	for (var i = 0; i < panjang_petugas; i++) {
		var arsip = document.getElementById('data-chart-petugas-arsip' + i).getAttribute('data-value');
		jumlah_arsip[i] = arsip;
	}

	const chart1 = document.getElementById('arsip-petugas');

	new Chart(chart1, {
		type: 'bar',
		data: {
			labels: daftar_petugas,
			datasets: [{
				label: 'Jumlah Arsip',
				data: jumlah_arsip,
				borderWidth: 2,
				// borderColor: '#FF6384',
				// backgroundColor: '#FFB1C1',
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});


	// ==================================================== KATEGORI ====================================================
	var panjang_kategori = document.getElementById('data-chart-panjang-kategori').getAttribute('data-value');

	var daftar_kategori = [];
	for (var i = 0; i < panjang_kategori; i++) {
		var nama_kategori = document.getElementById('data-chart-kategori' + i).getAttribute('data-value');
		daftar_kategori[i] = nama_kategori;
	}

	var jumlah_arsip = [];
	for (var i = 0; i < panjang_kategori; i++) {
		var arsip = document.getElementById('data-chart-kategori-arsip' + i).getAttribute('data-value');
		jumlah_arsip[i] = arsip;
	}

	const chart2 = document.getElementById('arsip-kategori');

	new Chart(chart2, {
		type: 'bar',
		data: {
			labels: daftar_kategori,
			datasets: [{
				label: 'Jumlah Kategori',
				data: jumlah_arsip,
				borderWidth: 2,
				// borderColor: '#FF6384',
				// backgroundColor: '#FFB1C1',
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>
</body>

</html>