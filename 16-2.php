<?php
	class Vcode
	{
		private $width;//验证码的宽度
		private $height;//验证码的高度
		private $codeNum;//验证码的字符个数;
		private $disturbColorNum;//干扰元素的数量；
		private $checkcode;//验证码字符；
		private $image;//验证码
		/*
		*$width:验证码的宽度
		*height:验证码的高度
		*$codeNum:验证码的字母数量
		*/
		function __construct($width,$height,$codeNum=4)
		{
			$this->width=$width;
			$this->height=$height;
			$this->codeNum=$codeNum;
			if(floor($width*$height/15)<240-$codeNum)
			{
				$this->disturbColorNum=240-$codeNum;
			}
			else
			{
				$this->disturbColorNum=floor($width*$height/15);
			}
			$this->checkcode=$this->createCheckcode();
		}
		//把验证码加到session里面去
		//前台直接输出类就可以了
		function __toString()
		{
			$_SESSION["code"]=MD5(implode('',$this->checkcode));
			$this->outImg();
			return '';
		}
		//输出图像
		private function outImg()
		{
			$this->getCreateImage();
			$this->setDisturbColor();
			$this->outputText();
			$this->outputImage();
		}
		//创建图像资源并且初始化背影
		 function getCreateImage()
		{
			$this->image=imagecreate($this->width,$this->height);
			$bgcolor=imagecolorallocate($this->image,rand(0,125),rand(0,125),rand(0,125));
			
		}	
		//使用内部方法生成用户指定的字符串
		 function createCheckcode()
		{
			$str="0123456789qwertyuiopasdfghjklzxcvbnm";
			for($i=0;$i<4;$i++)
			{
				$ch_code=$str[rand(0,strlen($str)-1)];
				$this->checkcode.=$ch_code;
			}
			
			//echo $this->checkcode;
			$this->checkcode = str_split($this->checkcode);
			return $this->checkcode;
			//var_dump($this->checkcode);
			//echo $this->disturbColorNum;
		}
		//使用内部方法设置干扰元素
		 function setDisturbColor()
		{
			
			for($i=0;$i<240;$i++)
			{
					$point_color=imagecolorallocate($this->image,rand(0,255),rand(0,255),rand(0,255));
					imagesetpixel($this->image,rand(0,$this->width),rand(0,$this->height),$point_color);
			}
		}
		//生成随机摆放的，颜色随机的，随机字符串像图中输出
		 function outputText()
		{

			for($i=0;$i<4;$i++)
			{
			
				$x=20;
				$y=$this->height/2;
				$font_size=rand(50,100);
				$font_color=imagecolorallocate($this->image,rand(225,255),rand(225,255),rand(225,255));
				
				if(imagechar($this->image,5,$i*($this->width/4),$y,$this->checkcode[$i],$font_color))
					;//echo "yes";
				else
					echo "no";
				
			}
		}
		//使用内部方法输入图像
		 function outputImage()
		{
			header("Content-type:image/png");
			imagepng($this->image);
			
		}
		//析构方法
		function __destruct()
		{
			imagedestroy($this->image);
		}
	}
	$demo = new Vcode(150,150,4);
	echo $demo; 

?>