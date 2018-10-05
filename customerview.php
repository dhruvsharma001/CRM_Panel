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
			Customer Preview
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
			<li><a href="#">Customer</a></li>
			<li class="active">Customer Preview</li>
		  </ol>
		</section>
		<div class="box box-default">
			<div class="box-header with-border">
				<!-- /.box-header -->
				<div class="box-body">
						<?php
						include('connection.php');
						$id=$_GET['id'];
						$query="SELECT users.role_id,users.id,users.name,users.email,user_details.contact_person,user_details.address,user_details.phone
												FROM users INNER JOIN user_details ON users.id = user_details.user_id where users.id='$id'";
						
						$result = mysqli_query($conn,$query);
						$row=mysqli_fetch_assoc($result);
						?>
									<form method="post" action="#">
										<div class="row">
											<div class="col-md-6">
											  <div class="form-group">
												<label>Name: </label>
												<label><?php echo ucwords($row['name']);?></label>
											  </div>
											  <div class="form-group">
												<label>E-mail: </label>
												<label><?php echo $row['email'];?></label>
											   </div>
											   <div class="form-group">
												<label>Contact No.: </label>
												<label><?php echo $row['phone'];?></label>
											  </div>
											  <!-- /.form-group -->
											</div>
											<!-- /.col -->
											<div class="col-md-6">
											  <div class="form-group">
												<label>Contact Person: </label>
												<label><?php echo ucwords($row['contact_person']);?></label>
											  </div>
											  <div class="form-group">
												<label>Address: </label>
												<label><?php echo ucwords($row['address']);?></label>
											  </div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div> 
				<!-- /.form-group -->
				</div>
			<!-- /.col -->
			</div>
		<!-- /.col -->
		</div>
	<!-- /.row -->
	</div>
<?php
	include('footer.php');
?>
</body>
</html>