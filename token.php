<?php
	define("SECRET","67%$#AP28");
	function m_token()
	{
		$str = mt_rand(1000,9999);
		$str2 = dechex($_SERVER['REQUEST_TIME']-$str);
		echo $str;
		echo "\r\n";
		echo substr(md5($str.SECRET),0,10);
		echo "\r\n";
		echo $str2;
		echo "\r\n";
		echo $str.substr(md5($str.SECRET),0,10).$str2;
		return $str.substr(md5($str.SECRET),0,10).$str2;
	}
	
	//echo m_token();
	
	echo "\r\n";
	
	function v_token($str,$delay=300)
	{
		$rs=substr($str,0,4);
		$middle=substr($str,0,14);
		$rs2=substr($str,14,8);
		var_dump($_SERVER['REQUEST_TIME']-hexdec($rs2)-$rs);
		return ($middle==$rs.substr(md5($rs.SECRET),0,10))&&($_SERVER['REQUEST_TIME']-hexdec($rs2)-$rs<$delay);
	}
	var_dump(v_token(m_token()));
?>