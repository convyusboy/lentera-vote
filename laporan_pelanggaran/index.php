<html>
<head>
	<title></title>
</head>
<body>
	<a href="..">Kembali</a><br>
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
	foreach ($arr['data']['results']['reports'] as $rep) {
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
	}
	$t_arr = array (
		'headline' => 'Campaign Finance',
		'type' => 'default',
		'text' => 'People say stuff',
		'date' => $d_arr
		);
	$rep_arr = array (
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

</body>
</html>
