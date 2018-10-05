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
				Customer List
				</h1>
				<ol class="breadcrumb">
					<li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
					<li><a href="http://localhost/CRM/addcustomer.php"><i class="fa fa-edit"></i>Add Customer</a></li>
					<li class="active">Customer List</li>
				</ol>
		</section>
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Contact Person</th>
									<th>Phone</th>
									<th>Action</th>	
								</tr>
							</thead>
							<tbody>
							<?php
							$getlist="SELECT users.role_id,users.id,users.name,users.email,user_details.contact_person,user_details.address,user_details.phone
													FROM users INNER JOIN user_details ON users.id = user_details.user_id where users.role_id='3'";
							$result=mysqli_query($conn,$getlist);
							while($row=mysqli_fetch_assoc($result)){
							?>
								<tr>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['contact_person']; ?></td>
									<td><?php echo $row['phone']; ?></td>
									<td><a href="customeredit.php?id='.$row['id'].'"><i class="fa fa-edit" style="font-size:24px;color:#337ab7"></i></td>
									<td><a href="customerdelete.php?id='.$row['id'].'" id="deleteRecord"><i class="fa fa-trash-o" style="font-size:24px;color:#FF0000"></i></td>
								</tr>
							<?php  } ?>
							</tbody>
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
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src=" https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>
<script>
	$(document).ready(function() {
    $('#example').DataTable();
	} );
</script>
</body>
</html>