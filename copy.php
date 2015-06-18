<?php
	function thumb($filename,$width,$height)
	{
		list($org_width,$org_height,$org_type)=getimagesize($filename);
		
		if($width&&$org_width>$org_height)
		{
			$height=($width/$org_width)*$org_height;
		}
		else
		{
			$width=($height/$org_height)*$org_width;
		}
		
		$org_img=imagecreatefromjpeg($filename);
		
		$img=imagecreatetruecolor($width,$height);
		
		imagecopyresampled($img,$org_img,0,0,0,0,$width,$height,$org_width,$org_height);
		
		
		
		header("Content-type:image/jpeg");
		
		imagejpeg($img);
		//imagejpeg($org_img);
	}
	thumb("Penguins.jpg",200,200);
?>