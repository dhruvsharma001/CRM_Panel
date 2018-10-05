<?php
include('connection.php');
//ORDER SAVE
$ref_id='';
$user_id='';
$customer_id='';
$sample_name='';
$testing_pharmaeopoeia='';
$ref_date='';
$test_description='';
$exp_delivery_date='';
$status='';
$order_id='';
if(isset($_GET['save']))
{
    $getAllOrderPreview="SELECT * FROM order_preview";
    $array=mysqli_query($conn,$getAllOrderPreview);
    foreach($array as $key=>$val)
        { 
		$order_id=$val['id'];
        $ref_id=$val['ref_id'];
		$ref_no=$val['ref_no'];
        $user_id=$val['user_id'];
        $customer_id=$val['customer_id'];
        $sample_name=$val['sample_name'];
        $testing_pharmaeopoeia=$val['testing_pharmaeopoeia'];
        $ref_date=$val['ref_date'];
        $test_description=$val['test_description'];
        $exp_delivery_date=$val['exp_delivery_date'];
        $status=$val['status'];
		$msg=$val['message'];
		if($msg=='success')
		{
			$query="INSERT INTO orders(ref_id,ref_no,user_id,customer_id,sample_name,testing_pharmaeopoeia,ref_date,test_description,exp_delivery_date,status) values('".$ref_id."','".$ref_no."','".$user_id."','".$customer_id."','".$sample_name."','".$testing_pharmaeopoeia."','".$ref_date."','".$test_description."','".$exp_delivery_date."','".$status."')";
			   // echo'<pre>';print_r($query);  
		    $result=mysqli_query($conn,$query);
			if($result)
			{
				$query1="insert into orders_status(order_id,exp_delivery_date,status) values('".$order_id."','".$exp_delivery_date."','".$status."')";
				$result1=mysqli_query($conn,$query1);
				if($result1)
				{
				$truncate = "TRUNCATE TABLE order_preview";
				$res=mysqli_query($conn,$truncate);
				}
			}
		}
		else
		{
			$get="DELETE * FROM order_preview where message='already exists'";
			$del=mysqli_query($conn,$get);
		}
		header('location:upload_file.php');
        }
}
//STATUS SAVE



?>