<html>
<head>
	<title>Lentera-Vote - Laporan Pelanggaran</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/animated-menu.js"></script>
</head>
<body>	
	<div id="wrap">
		<div id="topbar">	
			<ul>
				<li class="dgray1">
					<p><a href="../home">Home</a></p>
					<p class="subtext">Halaman Awal</p>
				</li>
				<li class="dgray1">
					<p><a href="../calonpresiden">Calon Presiden</a></p>
					<p class="subtext">Informasi mengenai capres</p>
				</li>
				<li class="dgray1">
					<p><a href="../socmedpemilu">Social Analytics</a></p>
					<p class="subtext">Analitik di sosial media</p>
				</li>
				<li class="dgray1">
					<p><a href="../stamps">Stamps</a></p>
					<p class="subtext">Gambar-gambar</p>
				</li>
				<li class="dgray1">
					<p><a href="../campaignfinance">Keuangan Kampanye</a></p>
					<p class="subtext">Data keuangan kampanye pemilu</p>
				</li>
				<li class="dgray1">
					<p><a href="../laporan_pelanggaran">Laporan Pelanggaran</a></p>
					<p class="subtext">Laporan pelanggaran kedua capres</p>
				</li>
				<li class="dgray1">
					<p><a href="../faq-presiden">FAQ</a></p>
					<p class="subtext">Pertanyaan yang sering ditanyakan</p>
				</li>
				<li class="dgray1">
					<p><a href="../pertanyaan">Peraturan</a></p>
					<p class="subtext">Peraturan umum</p>
				</li>
				<li class="dgray1">
					<p><a href="../berita">Berita</a></p>
					<p class="subtext">Berita mengenai pemilu</p>
				</li>
				<li class="dgray1">
					<p><a href="../about">Tentang Kami</a></p>
					<p class="subtext">Tentang aplikasi</p>
				</li>
			</ul>
		</div>
		<div id="content">
			<?php
			$url = 'http://api.pemiluapi.org/laporan_pelanggaran/api/reports?apiKey=fea6f7d9ec0b31e256a673114792cb17';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json'
				));	
			$result = curl_exec ($ch);
			curl_close ($ch); 
			$arr = json_decode($result,true);
			// echo $result;
			$d_arr = array ();
			$last = "0000-00-00 00:00";
			foreach ($arr['data']['results']['reports'] as $rep) {
				if ($last >= $rep['tanggal_kejadian']) {
					// echo $rep['id']."|".$rep['judul_laporan']."|".$rep['tanggal_kejadian']."<br>";
					$a_arr = array(
						'media' => '',
						'credit' => '',
						'caption' => ''
						);
					$d_elm = array(
						'startDate' => substr($rep['tanggal_kejadian'],0,4).','.substr($rep['tanggal_kejadian'],5,2).','.substr($rep['tanggal_kejadian'],8,2),
						'endDate' => substr($rep['tanggal_kejadian'],0,4).','.substr($rep['tanggal_kejadian'],5,2).','.(substr($rep['tanggal_kejadian'],8,2)+1),
						'headline' => $rep['judul_laporan'],
						'asset' => $a_arr,
						'text' => $rep['keterangan']
						);
					array_push($d_arr, $d_elm);
					if ($last < $rep['tanggal_kejadian'])
						$last = $rep['tanggal_kejadian'];
				}
			} 
			$t_arr = array (
				'headline' => 'Laporan Pelanggaran',
				'type' => 'default',
				'text' => 'People say stuff',
				'date' => $d_arr
				);
			$rep_arr = array (
				'lastupdate' => $last,
				'timeline' => $t_arr
				);
			// echo json_encode($cf_arr);

			file_put_contents('report.json', json_encode($rep_arr));
			file_put_contents('report.arr', serialize($rep_arr));
			// $p = json_decode(file_get_contents('filename.json'));
			// echo $p;
			// foreach ($p['data']['results']['reports'] as $rep) {
			// 	echo $rep['id']."|".$rep['judul_laporan']."|".$rep['tanggal_kejadian']."<br>";
			// }
			?>
			<div id="timeline-embed"></div>
			<script type="text/javascript">
			var timeline_config = {
				width: "100%",
				height: "100%",
				source: 'report.json'
			}
			</script>
			<script type="text/javascript" src="../js/storyjs-embed.js"></script>

		</div>
	</div>


</body>
</html>
