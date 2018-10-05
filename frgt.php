<?php
include('connection.php');
//if user has clicked forgot password 
if(isset($_POST['forgot'])) { 

// set the value to the variable 
$email = mysqli_real_escape_string($_POST['email']); 

// check the user entered thier email address 
if(empty($email)) { 
echo 'Please enter your email address'; 
exit; 
} else { 

// check the email address is in the correct format 
if(!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$/i", $email)) { 
echo "<font color='red'><center><b>Please use a valid email address.</b></center></font>"; 
}else{ 

// check database for the email address 
$sql = mysqli_query("SELECT * FROM users WHERE email='$email' LIMIT 1") or die (mysqli_error()); 

// check there is a user with this email address 
$count = mysqli_num_rows($sql); 

// if no user with email address echo error or continue 
if($count != 1) { 
echo 'No user with this email was found'; 
exit; 
} else { 

// fetch the details 
$rows = mysqli_fetch_array($sql); 

// set the email variables 
$to = $rows['email']; 
$subject = 'Your password for website.com'; 
$msg = 'Your password is '.$rows['password']; 

// send the email 
mail($to,$subject,$msg); 

// echo complete msg 
echo 'An email with your password has been sent to'.$rows['email']; 

} // end no user with this email address 
} // end email format 
} // end check if value is empty 
} // end user forgot  
?>