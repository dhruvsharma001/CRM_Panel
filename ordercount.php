<?Php
include('connection.php');

$select="SELECT COUNT(*) FROM orders WHERE user_id = ".$_SESSION['id'];
$result=mysqli_query($conn,$select);
$count=mysqli_num_rows($result);
return $count;
{
  echo "No of records : ".$count."<br>";
}
?>