<html>
<head>
	<title>Lentera-Vote</title>
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/animated-menu.js"></script>
</head>
<body>
	<div id="wrap">
		<div id="topbar">	
			<ul>
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
					<p class="subtext">Data keuangan kampanye calon</p>
				</li>
				<li class="dgray1">
					<p><a href="../laporan_pelanggaran">Laporan Pelanggaran</a></p>
					<p class="subtext">Laporan pelanggaran kedua capres</p>
				</li>
				<li class="dgray1">
					<p><a href="../faq-presiden">FAQ Presiden</a></p>
					<p class="subtext">Pertanyaan yang sering ditanyakan</p>
				</li>
				<li class="dgray1">
					<p><a href="../pertanyaan">Peraturan</a></p>
					<p class="subtext">Peraturan umum</p>
				</li>
				<li class="dgray1">
					<p><a href="../pendidikan">Pendidikan</a></p>
					<p class="subtext">Pendidikan keduanya</p>
				</li>
				<li class="dgray1">
					<p><a href="../berita">Berita</a></p>
					<p class="subtext">Berita mengenai pemilu</p>
				</li>
				<li class="dgray1">
					<p><a href="../about">Tentang Kami</a></p>
					<p class="subtext">Pembuat aplikasi</p>
				</li>
			</ul>
		</div>
		<div id="content">
			<?php
			$url = 'http://api.pemiluapi.org/socmedpemilu?apiKey=7b532e4991f255b768a77dbd68915939&r=post';
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
			?>
			<div id="socmed">
				<script type="text/javascript">
				var text = ["Welcome", "Hi", "Sup dude"];
				var counter = 0;
				var elem = document.getElementById("socmed");
				setInterval(change, 1000);
				function change() {
					elem.innerHTML = text[counter];
					counter++;
					if(counter >= text.length) { counter = 0; }
				}
				</script>
			</div>
		</div>
	</div>
</body>
</html>