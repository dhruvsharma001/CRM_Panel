<?php
include('connection.php');
$id=$_POST['id'];
$sample_name='';
$batch_no='';
$date_of_mfg='';
$exp_delivery_date='';
$sample_quantity='';
$testing_pharmaeopoeia='';
$mfg_lic_no='';
$supplied_by='';
$mfg_by='';
$batch_size='';
$test_description='';
if(isset($_POST['update']))
{	
$sample_name=$_POST['sample_name'];
$batch_no=$_POST['batch_no'];
$date_of_mfg=$_POST['date_of_mfg'];
$exp_delivery_date=$_POST['exp_delivery_date'];
$sample_quantity=$_POST['sample_quantity'];
$testing_pharmaeopoeia=$_POST['testing_pharmaeopoeia'];
$mfg_lic_no=$_POST['mfg_lic_no'];
$supplied_by=$_POST['supplied_by'];
$mfg_by=$_POST['mfg_by'];
$batch_size=$_POST['batch_size'];
$test_description=$_POST['test_description'];
$sql="UPDATE orders set sample_name='$sample_name',batch_no='$batch_no',date_of_mfg='$date_of_mfg',sample_quantity='$sample_quantity',testing_pharmaeopoeia='$testing_pharmaeopoeia',mfg_lic_no='$mfg_lic_no',supplied_by='$supplied_by',mfg_by='$mfg_by',batch_size='$batch_size',test_description='$test_description' where id='$id'";
$result=mysqli_query($conn,$sql);
if($result)
{
$check="UPDATE orders_status set exp_delivery_date='$exp_delivery_date' WHERE orders_status.order_id='$id'";
}
$ans=mysqli_query($conn,$check);
if($ans)
	
{
	header('location:orderslist.php');
}
else
{
	echo "failed";
}
}
?>