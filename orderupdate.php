<?php
include('connection.php');
$sample_name='';
$date_of_mfg='';
$batch_size='';
$mfg_lic_no='';
$mfg_by='';
$test_description='';
$batch_no='';
$exp_delivery_date='';
$sample_quantity='';
$supplied_by='';
$testing_pharmaeopoeia='';
$user_id='';
$last_id='';
if(isset($_POST['submit']))
{
$sample_name=$_POST['sample_name'];
$date_of_mfg=$_POST['date_of_mfg'];
$batch_size=$_POST['batch_size'];
$mfg_lic_no=$_POST['mfg_lic_no'];
$mfg_by=$_POST['mfg_by'];
$test_description=$_POST['test_description'];
$batch_no=$_POST['batch_no'];
$exp_delivery_date=$_POST['exp_delivery_date'];
$sample_quantity=$_POST['sample_quantity'];
$supplied_by=$_POST['supplied_by'];
$testing_pharmaeopoeia=$_POST['testing_pharmaeopoeia'];
$user_id=$_POST['user_id'];
$status="Booking";
$query="insert into orders(user_id,sample_name,testing_pharmaeopoeia,test_description,exp_delivery_date,status,batch_no,date_of_mfg,batch_size,sample_quantity,mfg_lic_no,supplied_by,mfg_by) 
values('".$user_id."','".$sample_name."','".$testing_pharmaeopoeia."','".$test_description."','".$exp_delivery_date."','".$status."','".$batch_no."','".$date_of_mfg."','".$batch_size."','".$sample_quantity."','".$mfg_lic_no."','".$supplied_by."','".$mfg_by."')";
if(mysqli_query($conn,$query))
{
	$last_id=mysqli_insert_id($conn);
}
$query1="insert into orders_status(order_id,exp_delivery_date,status) values('".$last_id."','".$exp_delivery_date."','".$status."')";
$result=mysqli_query($conn,$query1);
if($result)
{
	header ('location:dashboard.php');
}
else
{
	echo "not entered successfully!try again";
}
}
?>