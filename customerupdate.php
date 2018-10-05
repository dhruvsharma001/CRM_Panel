<?php
include('connection.php');
$role_id=$_POST['role_id'];
$id=$_POST['id'];
$name='';
$email='';
$contact_person='';
$address='';
if(isset($_POST['update']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$contact_person=$_POST['contact_person'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$sql="UPDATE users set name='$name',email='$email' where id='$id'";
$result=mysqli_query($conn,$sql);
$check="UPDATE user_details set contact_person='$contact_person',address='$address',phone='$phone' WHERE user_id='$id'";
$ans=mysqli_query($conn,$check);
if($result && $ans)
{
	header('location:customerlist.php');
}
else
{
	echo "failed";
}
}
?>