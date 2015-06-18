<html>
<script>
	function changecode(obj,url)
	{
		obj.src=url+"?time="+new Date().getTime();
	}
</script>
	<img src="16-2.php"  onclick="javascript:changecode(this,this.src)"/>
	
</html>