<?php
	$ip="127.0.0.1";
	$pocket="2001";
	$client=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
	$p=socket_connect($client,$ip,$pocket);
	if($p==false)
	{
		echo "contentʧ��!";
		exit(0);
	}
	echo "���ӳɹ���";
	$msg=socket_read($client,1024);
	echo "�Ѿ��յ���Ϣ!".$msg;
	
	$m="���ǿͻ���,!";
	
	socket_write($client,$m);
	
	echo "������Ϣ��˿ڹر�";
	socket_close($client);
?>