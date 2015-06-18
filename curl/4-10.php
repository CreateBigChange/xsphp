<?php
	header("Content-type:image/png");
	$ch=curl_init();	
	curl_setopt($ch,CURLOPT_URL,"http://img1.gtimg.com/11/1187/118791/11879178_980x1200_0.png");
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	//curl_setopt($ch,CURLOPT_HEADER,1);
	$out=curl_exec($ch);
	$info=curl_getinfo($ch);
	curl_close($ch);
	echo $out;
	file_put_contents("./test.png",$out);
	$size=filesize("./test.png");
	if($info["size_download"]==$size)
	{
		echo "下载完整！";
	}
	else
	{
		echo "下载不完整！";
	}
?>