<?php
include('connection.php');
$id=$_POST['id'];
$password='';
$confirm_password='';
if(isset($_POST['update']))
{
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
if($password==$confirm_password)
{
	$sql="UPDATE users SET password='$password' where id='$id'";
	$result=mysqli_query($conn,$sql);
	header('location:dashboard.php');
}
else
{
	echo $_SESSION['error found'];
}
}
?>