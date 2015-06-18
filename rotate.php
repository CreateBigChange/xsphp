<?php
	function retate($filename,$angle)
	{
		$image=imagecreatefromjpeg($filename);
		$image_two=imagerotate($image,$angle,0);
		
		header("Content-type:image/jpeg");
		imagejpeg($image_two);
	}
	retate("Penguins.jpg",180);
?>