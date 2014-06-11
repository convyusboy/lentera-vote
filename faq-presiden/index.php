<html>
<head>
	<title></title>
	<style type="text/css">
	.tooltip {
		border-bottom: 1px dotted #000000; color: #000000; outline: none;
		cursor: help; text-decoration: none;
		position: relative;
	}
	.tooltip span {
		margin-left: -999em;
		position: absolute;
	}
	.tooltip:hover span {
		border-radius: 5px 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px; 
		box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1); -webkit-box-shadow: 5px 5px rgba(0, 0, 0, 0.1); -moz-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
		font-family: Calibri, Tahoma, Geneva, sans-serif;
		position: absolute; left: 0; top: 20; z-index: 99;
		margin-left: 0; width: 1000px;
	}
	.tooltip:hover img {
		border: 0; margin: -10px 0 0 -55px;
		float: left; position: absolute;
	}
	.tooltip:hover em {
		font-family: Candara, Tahoma, Geneva, sans-serif; font-size: 1.2em; font-weight: bold;
		display: block; padding: 0.2em 0 0.6em 0;
	}
	.classic { padding: 0.8em 1em; }
	.custom { padding: 0.5em 0.8em 0.8em 2em; }
	* html a:hover { background: transparent; }
	.classic {background: #FFFFAA; border: 1px solid #FFAD33; }
	.critical { background: #FFCCAA; border: 1px solid #FF3334;	}
	.help { background: #9FDAEE; border: 1px solid #2BB0D7;	}
	.info { background: #9FDAEE; border: 1px solid #2BB0D7;	}
	.warning { background: #FFFFAA; border: 1px solid #FFAD33; }
	</style>
</head>
<body>
	<a href="..">Kembali</a><br>
	<?php
	$url = 'http://api.pemiluapi.org/faq-presiden/api/questions?apiKey=fea6f7d9ec0b31e256a673114792cb17';
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
		echo '<h2>'.$q['question'].'</h2>';
		echo '<p>'.$q['answer'].'</p>';
		echo '<h4><a class="tooltip" href="#">Dasar Hukum : '.$q['reference_law'].'<span class="custom warning">'.$q['excerpt_law'].'</span></a></h4>';
	}
	?>
</body>
</html>