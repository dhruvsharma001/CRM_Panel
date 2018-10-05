<?php
include('connection.php');
$id = ''; 
if( isset( $_GET['id']))
{
$id = $_GET['id']; 
$check="delete from orders_status WHERE order_id=$id";
$ans=mysqli_query($conn,$check); 
$sql="delete from orders where id=$id";
$result=mysqli_query($conn,$sql);
if($result && $ans)
{
	header('location:orderslist.php');
}
else
{
	echo "failed";
}
}
?>