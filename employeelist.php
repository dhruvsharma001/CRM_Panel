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
				Employees List
				</h1>
				<ol class="breadcrumb">
					<li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
					<li><a href="http://localhost/CRM/addemployee.php"><i class="fa fa-user-o"></i>Add Employee</a></li>
					<li class="active">Employees List</li>
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
									<th class="thBorder">Name</th>
									<th class="thBorder">Email </th>
									<th class="thBorder">Address</th>
									<th class="thBorder">Phone</th>
									<th class="thBorder nosort">Action</th>		
								</tr>
							</thead>
							<tbody>
							<?php
							$role_id=$_SESSION['role'];
							if($role_id=='1'){
							$getlist="SELECT users.id,users.name,users.email,user_details.address,user_details.phone
									FROM users INNER JOIN user_details ON users.id = user_details.user_id where users.role_id='2' ";
							$result=mysqli_query($conn,$getlist);
							while($row=mysqli_fetch_assoc($result)){
								//echo '<pre>';print_r();
							?>
								<tr>
									<td><?php echo $row['name'];?></td>
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['address'];?></td>
									<td><?php echo $row['phone'];?></td>
									<td><a href="employeeview.php?id=<?php echo $row['id'];?>"><i class="fa fa-eye" style="font-size:24px;color:black"></a></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="employeeedit.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit" style="font-size:24px;color:#337ab7"></a></i>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="employeedelete.php?id=<?php echo $row['id']?>" class="deleteRecord"><i class="fa fa-trash-o" style="font-size:24px;color:#FF0000"></a></i></td>
									<?php } ?>
								</tr>
							<?php  } elseif($role_id=='2'){
								
								$getlist="SELECT users.id,users.name,users.email,user_details.address,user_details.phone
										FROM users INNER JOIN user_details ON users.id = user_details.user_id  WHERE users.role_id='2' ";
								$result=mysqli_query($conn,$getlist);
								while($row=mysqli_fetch_assoc($result)){
							?>
								<tr>
									<td><?php echo $row['name'];?></td>
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['address'];?></td>
									<td><?php echo $row['phone'];?></td>
									<td><a href="employeeview.php?id=<?php echo $row['id'];?>"><i class="fa fa-eye" style="font-size:24px;color:black"></a></i>
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