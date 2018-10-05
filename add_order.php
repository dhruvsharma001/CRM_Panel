<?php
include('connection.php');
include('user.php');
$product_name='';
$batch_no='';
$mfg_date='';
$exp_date='';
$batch_size='';
$sample_quantity='';
$mfg_lic_no='';
$supply_by='';
$mfg_by='';
$testing_pharmaeopoeia='';
$test_required='';
$last_id='';
$user_id='';
if(isset($_POST['submit']))
{
    $product_name=$_POST['product_name'];
    $batch_no=$_POST['batch_no'];
    $mfg=$_POST['mfg_date'];
    $mfg_date=$user->dateFormatChange($mfg);
    $exp=$_POST['exp_delivery_date'];
    $exp_date=$user->dateFormatChange($exp);
    $batch_size=$_POST['batch_size'];
    $sample_quantity=$_POST['sample_quantity'];
    $mfg_lic_no=$_POST['mfg_lic_no'];
    $supply_by=$_POST['supply_by'];
    $mfg_by=$_POST['mfg_by'];
    $testing_pharmaeopoeia=$_POST['testing'];
    $test_required=$_POST['test_required'];
    $user_id=$_POST['user_id'];
    $status='Booking';
    $sql="INSERT INTO orders(user_id,sample_name,testing_pharmaeopoeia,test_description,batch_no,date_of_mfg,exp_delivery_date,status,batch_size,
          sample_quantity,mfg_lic_no,supplied_by,mfg_by)
          values('".$user_id."','".$product_name."','".$testing_pharmaeopoeia."','".$test_required."','".$batch_no."','".$mfg_date."','".$exp_date."','".$status."','".$batch_size."','".$sample_quantity."','".$mfg_lic_no."','".$supply_by."','".$mfg_by."')";
    if(mysqli_query($conn,$sql)) 
    {
        $last_id = mysqli_insert_id($conn);
        $sql1="INSERT INTO orders_status(order_id,exp_delivery_date,status)values('".$last_id."','".$exp_date."','".$status."')"; 
        $result=mysqli_query($conn,$sql1);
        
        if($result)
        {
            header('location:orderslist.php');
        }
        else
        {
            echo "Not entered sucessfully!Try Again";
        }
	}
}
?>