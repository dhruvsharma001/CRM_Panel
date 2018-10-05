<?php
include('connection.php');
$title='';
$description='';
$rating='';
if(isset($_POST['submit']))
{
$title=$_POST['title'];
$description=$_POST['description'];
$rating=$_POST['rating'];
$query="insert into tutorial(title,description,rating) values('".$title."','".$description."','".$rating."')";
if(mysqli_query($conn,$query))
{
	header ('location:index3.php');
	echo "new record created successfully. last inserted id is: " .$last_id;
}
else
{
	echo "error:" . $query . "<br>" . mysql_error($conn);
}
}
?>