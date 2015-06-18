<?php
	
	function turnY($filename)
	{
		$org_image=imagecreatefromjpeg($filename);
	list($width,$height)=getimagesize($filename);
		$image=imagecreatetruecolor($width,$height);

		for($i=0;$i<$width;$i++)
		{
			for($j=0;$j<$height;$j++)
			{
				imagecopyresampled($image,$org_image,$width-1-$i,$j,$i,$j,1,1,1,1);
			}
		}
		header("Content-type:image/jpeg");
		imagejpeg($image);
	}
	turnY("Penguins.jpg");
?>