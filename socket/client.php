<?php
	$ip="127.0.0.1";
	$pocket="2001";
	$client=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
	$p=socket_connect($client,$ip,$pocket);
	if($p==false)
	{
		echo "content失败!";
		exit(0);
	}
	echo "链接成功！";
	$msg=socket_read($client,1024);
	echo "已经收到信息!".$msg;
	
	$m="我是客户端,!";
	
	socket_write($client,$m);
	
	echo "发送消息后端口关闭";
	socket_close($client);
?>