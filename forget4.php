<?php
session_start();

//============= Variables for Database ===================
$hostname = "localhost";
$username = "root";
$password = " ";
$database = "project";
//========================================================

//Connection…
$link = mysqli_connect($hostname, $username, $password);

//Set Database
mysqli_select_db($database,$link);

//Read Form Data from Page1
$u = $_POST['email'];

$query = "select * from users where email='".$u."'";
$result = mysqli_query($query);

$row = mysql_fetch_array($result);
$toemailaddress=$row['email'];
$password=$row['password'];

ini_set('display_errors', 1);
error_reporting(~0);

$toemailaddress = "kartikghangas3@gmail.com";
$subjectline = "Check email for Your Password";
$body ="Your Password is :".$password.";

ob_start();
require_once('./class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet='UTF-8';
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'you@gmail.com';
$mail->Password = 'gmailpassword';
$mail->SMTPAuth = true;

$mail->From = 'From Email Address';
$mail->FromName = 'From Name';
$mail->AddAddress(".$toemailaddress.");

$mail->IsHTML(true);
$mail->Subject    = ".$subjectline.";
$mail->Body    = ".$body.";

$t = $mail->Send();
//echo $t;
$_SESSION['msg']="Check email for password";
header('Location: forget3.php');

?>