<html>
<style>
.thBorder{border-bottom:1px solid white !important;}
.thtop{border-top:1px solid white !important;}
</style>
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
					Orders List
				</h1>
				<ol class="breadcrumb">
					<li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
					<li><a href="http://localhost/CRM/orders.php"><i class="fa fa-edit"></i>Add Orders</a></li>
					<li class="active">Orders List</li>
				</ol>
		</section>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
					<!-- /.box-header -->
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
							</br>
								<tr>
									<th class="thBorder">Name of Product</th>
									<th class="thBorder">Batch No.</th>
									<th class="thBorder">Test Required</th>
									<th class="thBorder">Status</th>
									<th class="thBorder nosort">Action</th>		
								</tr>
							</thead>
							<tbody>
							<?php
							$role_id=$_SESSION['role'];
							if($role_id=='1' || $role_id=='2')
							{
								$select="SELECT orders.*,orders_status.* FROM orders INNER JOIN orders_status ON orders.id=orders_status.order_id where orders.user_id!='71'";
								$result=mysqli_query($conn,$select);
								while($row=mysqli_fetch_assoc($result)){ 
								?>
							   <tr>
							 		<td><?php echo $row['sample_name'];?></td>
									<td><?php echo $row['batch_no'];?></td>
									<td><?php echo $row['test_description'];?></td>
									<td><?php echo $row['status'];?></td>
									<td>
									<a href="order_view.php?id=<?php echo $row['order_id'];?>"><i class="fa fa-eye" style="font-size:24px;color:black"></a></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="orderedit.php?id=<?php echo $row['order_id'];?>"><i class="fa fa-edit" style="font-size:24px;color:#337ab7"></a></i>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="orderdelete.php?id=<?php echo $row['order_id']?>" class="deleteRecord"><i class="fa fa-trash-o" style="font-size:24px;color:#FF0000"></a></i></td>
							
								<?php } ?>
								</tr>
							<?php  } elseif($role_id=='3')
							 {
								 $id=$_SESSION['id'];
								$select="SELECT orders.*,orders_status.* FROM orders INNER JOIN orders_status ON orders.id=orders_status.order_id 	where orders.user_id=$id";
								$result=mysqli_query($conn,$select);
								while($row=mysqli_fetch_assoc($result)){ 
								?>
							  <tr>
							 		<td><?php echo $row['sample_name'];?></td>
									<td><?php echo $row['batch_no'];?></td>
									<td><?php echo $row['test_description'];?></td>
									<td><?php echo $row['status'];?></td>
									<td>
									<a href="order_view.php?id=<?php echo $row['order_id'];?>"><i class="fa fa-eye" style="font-size:24px;color:black"></a></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="orderedit.php?id=<?php echo $row['order_id'];?>"><i class="fa fa-edit" style="font-size:24px;color:#337ab7"></a></i>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="orderdelete.php?id=<?php echo $row['order_id']?>" class="deleteRecord"><i class="fa fa-trash-o" style="font-size:24px;color:#FF0000"></a></i></td>
								<?php } ?>
								</tr>
					<?php } ?>	
						<tfoot>
							<tr>
								<th class="thtop"></th>
								<th class="thtop"></th>
								<th class="thtop"></th>
								<th class="thtop"></th>
								<th class="thtop"></th>				
							</tr>
						</tfoot>
							
					</table>
						
				</div>
			<!-- /.box -->
			</div>
		<!-- /.col -->
		</div>
	<!-- /.row -->
	</div>
</div>
<?php

	include('footer.php');
?>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
	<!--<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
	<!--<script src=" https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>-->
   

<script>
   	$(document).ready(function()
	{
	$('.example1').hide();	
    $('#example').DataTable();
	} );
</script>
</body>
</html>