<html>
<head>
	<title>Lentera-Vote - Pendidikan</title>
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
			$url = 'http://api.pemiluapi.org/pendidikan/api/pertanyaan?apiKey=fea6f7d9ec0b31e256a673114792cb17';
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
			foreach ($arr['data']['results']['questions'] as $q) {
				?>
				<div id="faq">
					<div id="question"><?php echo $q['question'] ?></div>
					<div id="answer">
						<?php echo $q['answer'] ?>
					</div>
					<br>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</body>
</html>