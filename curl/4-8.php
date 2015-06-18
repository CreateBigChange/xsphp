<?php
	$ch=curl_init();
	
	curl_setopt($ch,CURLOPT_URL,"http://www.baidu.com");
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,1);
	$out=curl_exec($ch);
	curl_close($ch);
	$file=fopen("./baidu.txt","w+");
	fwrite($file,$out);
	echo $out;
?>