<?php
	header("Ccontent-type:text/html;charset=utf-8");
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,"http://3g.qq.com");
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$h=array(
		'HTTP_VAL:HTTP/1.1 SNAX-PS-WAP-GW21(infoX-WISG,Huawei Technologies)',
		'HTTP_ACCEPT:application/vnd.wap.wmlscript,text/vnd.wap.xhtml+xml,application/xhtml+xml,text/html,multipart/mixed,*/*',
		'HTTP_ACCEPT_CHARSET:IOS-8859-1,US-ASCII,UTF-8;Q=0.8,IOS-8859-15;Q=0.8,IOS-10646-UCS-2;Q=0.6,UTF-16;Q=0.6'
		);
	curl_setopt($ch,CURLOPT_HTTPHEADER.$ch);
	$output=curl_exec($ch);
	echo $output;
	curl_close();
?>