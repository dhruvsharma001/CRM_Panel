<?php
include('connection.php');
print_r($_POST);
$role_id=$_POST['role_id'];
$id=$_POST['id'];
$name='';
$email='';
$address='';
$phone='';
if(isset($_POST['update']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$sql="UPDATE users set name='$name',email='$email' where id='$id'";
$result=mysqli_query($conn,$sql);
$check="UPDATE user_details set address='$address',phone='$phone' WHERE user_id='$id'";
$ans=mysqli_query($conn,$check);
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