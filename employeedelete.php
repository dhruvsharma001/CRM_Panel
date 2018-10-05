<?php
include('connection.php');
$id = ''; 
if( isset( $_GET['id']))
{
$id = $_GET['id'];
$check="delete from user_details WHERE user_id='$id'";
$ans=mysqli_query($conn,$check);  
$sql="delete from users where id='$id'";
$result=mysqli_query($conn,$sql);
if($result && $ans)
{
	header('location:employeelist.php');
}
else
{
	echo "failed";
}
}
?>