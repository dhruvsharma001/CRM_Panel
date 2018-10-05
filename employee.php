<?php
include('connection.php');
$role_id='';
$name='';
$email='';
$password='';
$address='';
$phone='';
if(isset($_POST['submit']))
{
$role_id='2';
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$sql_e = "SELECT * FROM users WHERE email='$email'";
$res_e = mysqli_query($conn, $sql_e);
if(mysqli_num_rows($res_e) > 0){
		echo "<script type='text/javascript'>alert('Email Already Exist'); window.location.href = 'addcustomer.php';</script>";
  	}else{
$query="insert into users(role_id,name,email,password) values('".$role_id."','".$name."','".$email."','".$password."')";
if(mysqli_query($conn,$query))
{
	$last_id=mysqli_insert_id($conn);
	echo "new record created successfully. last inserted id is: " .$last_id;
}
else
{
	echo "error:" . $query . "<br>" . mysql_error($conn);
}
$query1="insert into user_details(user_id,address,phone) values('".$last_id."','".$address."','".$phone."')";
$result1=mysqli_query($conn,$query1);
if($result1)
{
	header ('location:employeelist.php');
}
else
{
	echo "not entered successfully!try again";
}
}
}
?>