<html>
<head>
	<title></title>
</head>
<body>
	<a href="..">Kembali</a><br>
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
	echo $result;
	?>
</body>
</html>