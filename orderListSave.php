<?php
include('connection.php');
include('user.php');
//ORDER SAVE
$ref_id='';
$ref_no='';
$user_id='';
$customer_id='';
$sample_name='';
$testing_pharmaeopoeia='';
$ref_date='';
$test_description='';
$exp_delivery_date='';
$status='';
$order_id='';
if(isset($_GET['saveOrder']))
{
    $getAllOrderPreview="SELECT * FROM order_preview";
	$array=mysqli_query($conn,$getAllOrderPreview);
	foreach($array as $key=>$val)
        { 
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
				$query="INSERT INTO orders(ref_no,user_id,customer_id,sample_name,testing_pharmaeopoeia,ref_date,test_description,exp_delivery_date,status) values('".$ref_no."','".$user_id."','".$customer_id."','".$sample_name."','".$testing_pharmaeopoeia."','".$ref_date."','".$test_description."','".$exp_delivery_date."','".$status."')";
				if (mysqli_query($conn, $query))
				{
					$last_id = mysqli_insert_id($conn);
					$insert="insert into orders_status(order_id,exp_delivery_date,status) values('".$last_id."','".$exp_delivery_date."','".$status."')";
					$result=mysqli_query($conn,$insert);
					$truncate = "TRUNCATE TABLE order_preview";
					$res=mysqli_query($conn,$truncate);
				}
			}
			
				
		}
		header('location:list_order.php');
}

?>