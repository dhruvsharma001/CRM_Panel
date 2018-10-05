<?php
include'connection.php';
include 'user.php';
	if (isset($_POST["submit"]))
	{
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
					$row['ref_id'] =$line[2];
					$row['user_id'] =$_POST['user_id'];
					$row['customer_id'] =$line[4];
					$row['sample_name'] =$line[5];
					$row['testing_pharmaeopoeia'] =$line[6];
					$row['ref_date'] =$line[7];
					$row['test_description'] =$line[8];
					$row['exp_delivery_date'] =$line[9];
					$row['status'] =$line[10];
					$row['message'] = check_ref_id();
					$sqlInsert ="INSERT INTO order_preview (ref_no, ref_id, user_id, customer_id, sample_name, testing_pharmaeopoeia, ref_date, test_description, exp_delivery_date, status, message) VALUES ('".$row['ref_no']."','".$row['ref_id']."','".$row['user_id']."','".$row['customer_id']."','".$row['sample_name']."','".$row['testing_pharmaeopoeia']."','".$row['ref_date']."','".$row['test_description']."','".$row['exp_delivery_date']."','".$row['status']."','".$row['message']."')";
					$result = mysqli_query($conn, $sqlInsert);
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
		header('location:button.php');
	}
?>