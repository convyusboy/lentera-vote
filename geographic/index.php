<html>
<head>
	<title></title>
</head>
<body>
	<a href="..">Kembali</a><br>
	<?php
	$url = 'api.pemiluapi.org/geographic/api/caleg?apiKey=fea6f7d9ec0b31e256a673114792cb17&long=116.817627&lat=0.329588&lembaga=DPR';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json'
		));	
	$result = curl_exec ($ch);
	curl_close ($ch); 
	$arr = json_decode($result,true);
	echo $result;
	?>
</body>
</html>