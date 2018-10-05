<?php
include('connection.php');
$role_id=$_POST['role_id'];
$id=$_POST['id'];
$name='';
$email='';
$password='';
$confirm_password='';
if(isset($_POST['update']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
if($confirm_password==$password)
{
$sql="UPDATE users set name='$name',email='$email' where id='$id'";
$result=mysqli_query($conn,$sql);
$check="UPDATE user_details set password='$password',password='$conform_password' WHERE user_id='$id'";
$ans=mysqli_query($conn,$check);
if($result && $ans)
{
	//header('location:dashboard.php');
}
else
{
	echo "failed";
}	
}
}
?>