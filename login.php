<?php
include('connection.php');
$role_id='';
$email='';
$password='';
session_start();
	if(isset($_POST['login_submit']))
	{
		$role_id=$_POST['role'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="SELECT * from users where role_id='$role_id' AND email='$email' AND password='$password'";
		$query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($query);
			if ($count)
				{
					while ($row=mysqli_fetch_assoc($query))
					{
					$_SESSION['email']=$row['email'];
					$_SESSION['name']=$row['name'];
					$_SESSION['id']=$row['id'];
					$_SESSION['role']=$row['role_id'];
					}
				// Successful popup message, redirected back to view contacts
				echo "<script type='text/javascript'>alert('Successfully Login'); window.location.href = 'dashboard.php';</script>";
				}
				else
				{
				// Unsuccessful popup message, redirected back to view contacts
				echo "<script type='text/javascript'>alert('ERROR! Your Username & Password is wrong.'); window.location.href = 'index.php';</script>";
				}
	}
?>
