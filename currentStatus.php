<html>
<body>
<?php
include('header.php');
?>
<?php
include('sidebar.php');
?>
<?php
include('connection.php');
?>
<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Current Status View
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
       <li><a href="http://localhost/CRM/upload_file.php"><i class="fa fa-arrow-left"></i>Order Data</a></li>
        <li class="active">Status View</li>
      </ol>
    </section>
	<div class="box box-default">
        <div class="box-header with-border">
			<div id="orderList">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Sample Name</th>
							<th>Exp Delivery Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<?php
					$id=$_GET['id'];
					$query="SELECT orders_status.order_id,orders_status.status ,orders_status.exp_delivery_date,orders.id,orders.sample_name FROM orders_status INNER JOIN orders ON orders_status.order_id=orders.id where orders_status.order_id=$id";
					$result=mysqli_query($conn,$query);
					while($rowList=mysqli_fetch_assoc($result))
					{
					echo "<tbody>";
						echo "<tr>";
							echo "<td>".$rowList['sample_name']."</td>";
							echo "<td>".$rowList['exp_delivery_date']."</td>";
							echo "<td>".$rowList['status']."</td>";
						echo "</tr>";
					echo "</tbody>";
					}
					?>
				</table>
			</div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>
</body>
</html>