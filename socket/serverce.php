<?php
	$ip="127.0.0.1";
	$pocket="2001";
	$serverce=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
	
	if($serverce==false)
	{
		echo  "����������socketʧ�ܣ�";
		exit(0);
	}
	$p=socket_bind($serverce,$ip,$pocket);
	
	if($p==false)
	{
		echo "��ʧ��";
		exit(0);
	}
	$p=socket_listen($serverce,5);
	
	if($p==false)
	{
		echo "����ʧ�ܣ�";
		exit(0);
	}
	$p=socket_set_block($serverce);
	
	if($p==false)
	{		
		echo "����ʧ�ܣ�";
		exit(0);
	}
	
	$date=0;
	
	while(true)
	{
		$client=socket_accept($serverce);
		$date++;
		socket_write($client,"���ǵ�".$date."��������Ϣ������!");
		$msg=socket_read($client,1024);
		echo "�Ѿ��յ���".$date."���ͻ��˵���Ϣ!";
		echo "\r\n";
		echo "�յ�����Ϣ��".$msg;
		
		if($date=="10")
		{
			echo "��Ҫ�ر�server_socket";
			echo "-----------------".($date=="10")."----------------------";
			//echo "date is :".$date;
			break;
		}
	}
	
	echo "date is :".$date;
	echo "����10���ˣ����Թرշ������˰�!";
	
	socket_close($serverce);
?>