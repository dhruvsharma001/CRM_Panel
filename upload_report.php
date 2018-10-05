z<?php
include('connection.php');
global $user;
global $var;
$user=new user();
    if (isset($_POST["submit"]))
    {
		$refExit = $user->checkRefId($row['ref_id']);
		if($refExit)
		{	$check="SELECT * FROM order_status";
			$res=mysqli_query($conn,$check);
			$new=mysqli_fetch_assoc($result);
			return $new['order_id'];	
			$fileName = $_FILES["file"]["tmp_name"];
			if ($_FILES["file"]["size"] > 0)
			{
				$file = fopen($fileName, "r");
				$header=true;
				while (($line = fgetcsv($file, 10000, ",")) !== FALSE)
				{
					if($header){$header=false;}
					else
					{
						$row['ref_no'] =$line[1];
						$row['exp_delivery_date'] =$line[2];
						$row['status'] ='Booking';
						$sqlInsert="INSERT INTO order_status(ref_no,exp_delivery_date,status) values('".$row['ref_no']."','".$row['exp_delivery_date']."','".$row['status']."')";
						$result = mysqli_query($conn,$sqlInsert);
					}
					if (! empty($result))
					{
						$type = "success";
						$message = "CSV Data Imported into the Database";
					}
					else
					{
						$type = "error";
						$message = "Problem in Importing CSV Data";
					}
				}
			}
			header('location:upload_file.php');
		}
	}
	class user
		{
			function checkRefId($id)
			{
			$conn=mysqli_connect('localhost','root','','crm_testing');
			$select="SELECT * FROM orders where ref_id=$id";
			$result=mysqli_query($conn,$select);
			$row=mysqli_fetch_assoc($result);
			$rowsCount = mysqli_num_rows($result);
			return $rowsCount;
			}
		}
?>