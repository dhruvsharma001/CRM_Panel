<?php
include('connection.php');
include('user.php');

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
//STATUS SAVE
if(isset($_GET['saveStatus']))
{
    $getAllOrderPreview="SELECT * FROM order_preview";
    $array=mysqli_query($conn,$getAllOrderPreview);
    foreach($array as $key=>$val)
	{
		$ref_no=$val['ref_no'];  
		$exp_delivery_date=$val['exp_delivery_date'];
		$status=$val['status'];
		$refIdExit = $user->chkrefNoExist($val['ref_no']);
		//print_r(implode('',$refIdExit)); die;
		$id=implode('',$refIdExit);
		if($refIdExit)
		{
			$order_id=$id;
			//print_r($order_id);die;
		}
			$Query="UPDATE orders SET status='".$status."' WHERE id='".$order_id."'";
			$result=mysqli_query($conn,$Query);
			if($result)
				{
				$query1="insert into orders_status(order_id,exp_delivery_date,status) values('".$order_id."','".$exp_delivery_date."','".$status."')";
				$result1=mysqli_query($conn,$query1);
				$truncate = "TRUNCATE TABLE order_preview";
				$res=mysqli_query($conn,$truncate);
			}
		
	}
	header('location:list_status.php');
}
?>