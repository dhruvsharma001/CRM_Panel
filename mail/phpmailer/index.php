<?php
$conn=mysqli_connect('localhost','root','','crm');
	if(isset($_POST["submit"])){
		if($_POST["email"]!=""){
			//print_r($_POST["email"]);die;
			$select="SELECT users.id,users.name FROM users where email='".$_POST["email"]."'";
			$result=mysqli_query($conn,$select);
			while($row=mysqli_fetch_assoc($result))
			{
				$name=$row['name'];
				$Name=ucwords($name);
				$id=$row['id'];
			}
			//$user = strstr($_POST["email"], '@', true);
			require("class.phpmailer.php");
			$mailer = new PHPMailer();
			$mailer->IsSMTP();
			$mailer->Host = 'ssl://smtp.gmail.com';
			$mailer->Port = 465; //can be 587
			$mailer->SMTPAuth = TRUE;
			$mailer->Username = 'crmtestinglab@gmail.com'; 
			$mailer->Password = 'testinglabcrm'; 
			$mailer->From = 'crmtestinglab@gmail.com';  
			$mailer->FromName = 'CRM'; 
			$mailer->Body = "Hi,$Name
			The request of forget password for your CRM Testing Lab Account was approved.
			Regards
			CRM Testing Lab team
			http://localhost/CRM/rstpwd.php?id=$id";
			$mailer->Subject = 'Request for forgot password.';
			$mailer->AddAddress($_POST["email"]);  // This is where you want your email to be sent
			if(!$mailer->Send())
			{
			   echo '<script>alert("Message was not sent,Try again!");</script>';
			   echo "Mailer Error: " . $mailer->ErrorInfo;
			   echo '<script>document.location.href="http://localhost/CRM/forget.php"</script>';
			}
			else
			{
			   echo '<script>alert("Message has been sent successfully!");</script>';
			   echo '<script>document.location.href="https://www.gmail.com/"</script>';
			}
		}
	}
?>