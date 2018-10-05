<?php
include ('connection.php');
//global $user;
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
                    $row['message'] =$line[11];
					
					$check=mysqli_query($conn,"SELECT COUNT(*) FROM orders WHERE ref_id ='".$row['ref_id']."'");
				
					if(!$check)
					{
						//die('Invalid query: ' .mysqli_error());
						$row['message'] ="ALREADY EXIST";
					}
					if(mysqli_num_rows($check) == 0)
					{
						$row['message'] ="SUCCESS";
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
        header('location:upload_file.php');
    }
	/*$id=$row['ref_id'];
	function checkRefId($id){
        $query="SELECT * FROM order_preview where ref_id=$id";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        if($row['ref_id'])
            {
            $row['message']="ALREADY EXIST";
            }
        else
            {
            $row['message']="SUCCESS";
            }
		}*/
	}
?>