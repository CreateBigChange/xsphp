<?php
int function sub(int $n)
{

	if($n==1)
		return 1;
	if($n==0)
		return 1;
	for($i=0;$i<$n;$i++)
	{
		$sun+=sub($i);
	}
}
function main()
{
	 $sum=0;
	 $n0=1;
	 $n1=0;
	
}
?>