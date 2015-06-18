<?php
	$ip="127.0.0.1";
	$pocket="2001";
	$serverce=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
	
	if($serverce==false)
	{
		echo  "服务器创建socket失败！";
		exit(0);
	}
	$p=socket_bind($serverce,$ip,$pocket);
	
	if($p==false)
	{
		echo "绑定失败";
		exit(0);
	}
	$p=socket_listen($serverce,5);
	
	if($p==false)
	{
		echo "监听失败！";
		exit(0);
	}
	$p=socket_set_block($serverce);
	
	if($p==false)
	{		
		echo "监听失败！";
		exit(0);
	}
	
	$date=0;
	
	while(true)
	{
		$client=socket_accept($serverce);
		$date++;
		socket_write($client,"你是第".$date."个发过信息来的人!");
		$msg=socket_read($client,1024);
		echo "已经收到第".$date."个客户端的信息!";
		echo "\r\n";
		echo "收到的信息是".$msg;
		
		if($date=="10")
		{
			echo "将要关闭server_socket";
			echo "-----------------".($date=="10")."----------------------";
			//echo "date is :".$date;
			break;
		}
	}
	
	echo "date is :".$date;
	echo "满了10个了，可以关闭服务器了啊!";
	
	socket_close($serverce);
?>