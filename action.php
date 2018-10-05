<?php
include('connection.php');
include('user.php');
global $user;
global $var;
$user=new user();
//UPLOAD ORDERS CSV FILE IN TABLE
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
                    $row['user_id'] =$_POST['user_id'];
                    $row['customer_id'] =$line[3];
                    $row['sample_name'] =$line[4];
                    $row['testing_pharmaeopoeia'] =$line[5];
                    $ref_date=$line[6];
					$row['ref_date'] =$user->dateFormatChange($ref_date);
                    $row['test_description'] =$line[7];
					$exp_date=$line[8];
                    $row['exp_delivery_date'] = $user->dateFormatChange($exp_date);
                    $row['status'] =$line[9];
					$refExit = $user->checkRefId($row['ref_no']);
					if($refExit)
					{
						$row['message']="already exist";
					}
					else
					{
						$row['message']="success";
					}
					$sqlInsert ="INSERT INTO order_preview(ref_no, user_id, customer_id, sample_name, testing_pharmaeopoeia, ref_date, test_description, exp_delivery_date, status, message) VALUES ('".$row['ref_no']."','".$row['user_id']."','".$row['customer_id']."','".$row['sample_name']."','".$row['testing_pharmaeopoeia']."','".$row['ref_date']."','".$row['test_description']."','".$row['exp_delivery_date']."','".$row['status']."','".$row['message']."')";
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
//UPLOAD ORDER STATUS CSV FILE IN TABLE 
if(isset($_POST["submitStatus"]))
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
                    $row['ref_no'] =$line[0];
					$exp_date=$line[1];
                    $row['exp_delivery_date'] = $user->dateFormatChange($exp_date);
                    $row['status'] =$line[2];
					$insert="INSERT INTO order_preview(ref_no,exp_delivery_date,status) values('".$row['ref_no']."','".$row['exp_delivery_date']."','".$row['status']."')";
					$res=mysqli_query($conn,$insert);
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
		header('location:list_status.php');
	}
//UPLOAD PDF REPORT
if(isset($_POST["submitReport"]))
{
	$fileName=$_FILES['file']['name'];
	$temp = explode(".", $_FILES['file']['name']);
	$checkStatus=$user->chkstatus($temp[0]);
	{
		if($checkStatus)
		{
			if ($_FILES['file']['type'] == "application/pdf")
			{
				if ($_FILES["file"]["size"] > 0)
					{	
						$sql ="INSERT INTO order_report
						(ref_id,file_name) VALUES ('".$temp[0]."','".$fileName."')";
						$result=mysqli_query($conn,$sql);
						$fileNameExist = $user->chkNameExist($temp[0]);
						if($fileNameExsit)
						{
							$update="UPDATE order_report SET file_name='".$fileName."' WHERE ref_no='".$ref_id."'";
							$result=mysqli_query($conn,$update);
						}
						else
						{
							$reportInsert="INSERT INTO order_report
							(ref_id,file_name) VALUES ('".$temp[0]."','".$fileName."')";
							$result=mysqli_query($conn,$reportInsert);
						}
						header('location:upload_file.php');
					}
			}
			else
			{
			echo "<script>alert('File must be uploaded in PDF format!');
						window.location.href='list_report.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Can not upload file until status is not Reporting');
						window.location.href='upload_file.php';</script>";
		}
		
	}
}
//UPLOAD INVOICES
if(isset($_POST["submitInvoice"]))
{
	$fileName=$_FILES['file']['name'];
	$temp = explode(".", $_FILES['file']['name']);
	if ($_FILES['file']['type'] == "application/pdf")
			{
				if ($_FILES["file"]["size"] > 0)
					{	
						$sql ="INSERT INTO order_invoice
						(ref_id,file_name) VALUES ('".$temp[0]."','".$fileName."')";
						$result=mysqli_query($conn,$sql);
						$fileNameExist = $user->chkNameExist($temp[0]);
						if($fileNameExsit)
						{
							$update="UPDATE order_invoice SET file_name='".$fileName."' WHERE ref_no='".$ref_id."'";
							$result=mysqli_query($conn,$update);
						}
						else
						{
							$reportInsert="INSERT INTO order_invoice
							(ref_id,file_name) VALUES ('".$temp[0]."','".$fileName."')";
							$result=mysqli_query($conn,$reportInsert);
						}
						header('location:upload_file.php');
					}
			}
			else
			{
			echo "<script>alert('File must be uploaded in PDF format!');
						window.location.href='order_invoice.php';</script>";
			}
}
?>