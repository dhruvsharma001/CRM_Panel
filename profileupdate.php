<?php
include('connection.php');
$role_id=$_POST['role_id'];
$id=$_POST['id'];
$name='';
$email='';
$contact_person='';
$address='';
$phone='';
$imgdata='';
if(isset($_POST['update']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$contact_person=$_POST['contact_person'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$imgdata=$_POST['imgdata'];
$check="UPDATE user_details set contact_person='$contact_person',address='$address',phone='$phone' WHERE user_details.user_id='$id'";
$ans=mysqli_query($conn,$check);
$sql="UPDATE users set name='$name',email='$email',imgdata='$imgdata' where users.id='$id'";
$result=mysqli_query($conn,$sql);
if($result && $ans)
{
	header('location:dashboard.php');
}
else
{
	echo "failed";
}
}
?>