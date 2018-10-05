<?php
include('connection.php');
if(isset($_GET['cancel']))
{
	$truncate ="TRUNCATE TABLE order_preview";
	$result=mysqli_query($conn,$truncate);
	if($result)
	{
		header('location:upload_file.php');
	}
}
?>