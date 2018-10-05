<?php
include('connection.php');
$id=$_POST['id'];
//print_r($id);die;
$password='';
$confirm_password='';
if(isset($_POST['update']))
{
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
	if($password==$confirm_password)
	{
		$sql="UPDATE users SET password='".$password."',status='1' where id='".$id."'";
		$result=mysqli_query($conn,$sql);
		echo '<script>alert("Password has been successfully changed!");</script>';
		echo '<script>document.location.href="http://localhost/CRM/index.php"</script>';
	}
	else
	{
		echo $_SESSION['error found'];
		header('location:http://localhost/CRM/forget.php');
	}
}
?>