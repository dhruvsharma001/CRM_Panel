<?php
include('connection.php');
$role_id='';
$email='';
$password='';
if(isset($_POST['login']))
{
$role_id=$_POST['role_id'];
$email=$_POST['email'];
$password=$_POST['pwd'];
$query="insert into users(role_id,email) values('".$role_id."','".$email."','".$password."')";
if(mysqli_query($conn,$query))
{
	$last_id=mysqli_insert_id($conn);
	echo "new record created successfully. last inserted id is: " .$last_id;
}
else
{
	echo "error:" . $query . "<br>" . mysql_error($conn);
}
$query1="insert into user_details(user_id,address) values('".$last_id."','".$address."')";
$result1=mysqli_query($conn,$query1);
if($result1)
{
	header ('location:dashboard.php');
}
else
{
	echo "not entered successfully!try again";
}
}
?>