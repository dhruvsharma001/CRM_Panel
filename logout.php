<?php
	$logout=$_GET['logout'];
	if ($logout=='true')
	{
		session_destroy();
		header("location:index.php");
	}
	else
	{
		$_session['msg']="error";
	}
?>