<?php
	var_dump($_FILES);
	
	$file = fopen($_FILES["myfile"]["tmp_name"],"rb");
	
	$copefile=fopen("./upload.jpg","wb");
	
	for(;!feof($file);)
	{
		$str=fgets($file);
		fwrite($copefile,$str);
	}
	fclose($file);
	fclose($copefile);
	
?>