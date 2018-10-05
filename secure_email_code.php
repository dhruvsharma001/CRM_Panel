<?php
	if(isset($_POST["submit"])){
		
	if($_POST["vname"]!=""||$_POST["vemail"]!=""||$_POST["sub"]!=""||$_POST["msg"]!=""){
		//print_r($_POST); die;
		require("class.phpmailer.php");
        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com';
        $mailer->Port = 465; //can be 587
        $mailer->SMTPAuth = TRUE;
        $mailer->Username = 'crmtestinglab@gmail.com';  // Change this to your gmail address
        $mailer->Password = 'testinglabcrm';  // Change this to your gmail password
        $mailer->From = $_POST["vemail"];  // Change this to your gmail address
        $mailer->FromName = $_POST["vname"]; // This will reflect as from name in the email to be sent
        $mailer->Body = $_POST["msg"];
        $mailer->Subject = $_POST["sub"];
        $mailer->AddAddress = $_POST["vemail"];  // This is where you want your email to be sent
        if(!$mailer->Send())
        {
           echo "Message was not sent<br/ >";
           echo "Mailer Error: " . $mailer->ErrorInfo;
        }
        else
        {
           echo "Message has been sent";
        }
	}
	}
?>