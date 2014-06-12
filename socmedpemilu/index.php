<html>
<head>
	<title>Lentera-Vote - Social Analytics</title>
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
			<script type="text/javascript">
			var socmed = [];
			var username = [];
			var avatar = [];
			var message = [];
			var created_at = [];
			<?php
			foreach ($arr['items'] as $item) {
				?>
				socmed.push('on '+<?php echo json_encode($item["social_media"]); ?>);
				username.push('by '+<?php echo json_encode($item["user"]["username"]); ?>);
				avatar.push(<?php echo json_encode($item["user"]["avatar_url"]); ?>);
				message.push(<?php echo json_encode($item["post"]["message"]); ?>);
				created_at.push('at '+<?php echo json_encode($item["post"]["created_at"]); ?>);
				<?php
			}
			?>
			// alert(text.length);
			var counter = 0;
			setInterval(change, 3000);
			function change() {
				document.getElementById("socmed").innerHTML = socmed[counter];
				document.getElementById("username").innerHTML = username[counter];
				document.getElementById("avatar").src = avatar[counter];
				document.getElementById("message").innerHTML = message[counter];
				document.getElementById("created_at").innerHTML = created_at[counter];
				counter++;
				if(counter >= socmed.length) { counter = 0; }
			}
			</script>
			<div class="socmed-group">
				<img id="avatar" src="" width="150" height="150">
				<div id="message"></div>
				<div id="socmed"></div><br>
				<div id="username"></div><br>
				<div id="created_at"></div>
			</div>
		</div>
	</div>
</body>
</html>