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
        Edit Employee
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
        <li><a href="#">Employee</a></li>
        <li class="active">Edit Employee</li>
      </ol>
    </section>
		<div class="box box-default">
        <div class="box-header with-border">
        <!-- /.box-header -->
        <div class="box-body">
		<?php
		include('connection.php');
		$id=$_GET['id'];
		$query="SELECT users.role_id,users.id,users.name,users.email,user_details.address,user_details.phone
								FROM users INNER JOIN user_details ON users.id = user_details.user_id where users.id='$id'";
		
		$result = mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		?>
		<form method="post" action="employeeupdate.php">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label><span style="color:red"> * </span>
                <input type="text" class="form-control select2" name="name" placeholder="eg.John Doe" style="width: 100%;" value="<?php echo $row['name'];?>"/>
              </div>
			  <div class="form-group">
                <label>E-mail</label><span style="color:red"> * </span>
                <input type="email" class="form-control select2" name="email" placeholder="john@example.com" style="width: 100%;" value="<?php echo $row['email'];?>"/>
               </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
			  <div class="form-group">
                <label>Address</label><span style="color:red"> * </span>
                <input type="text" class="form-control select2" name="address" placeholder="Address" style="width: 100%;" value="<?php echo $row['address'];?>"/>
              </div>
			  <div class="form-group">
                <label>Contact No.</label><span style="color:red"> * </span>
                <input type="text" class="form-control select2" name="phone" placeholder="9876543210" style="width: 100%;" value="<?php echo $row['phone'];?>"/>
              </div>
            </div>
			<div class="box-footer">
				<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>	
                <button type="submit" class="btn btn-primary" style="float:right" name="update" value="update">Update</button>
			</div>
			</form>
			<!-- /.form-group -->
            </div>
          <!-- /.col -->
          </div>
          <!-- /.col -->
          </div>
        <!-- /.row -->
        </div>
      <!-- /.box-body -->
      </div>
	
	<?php
	include('footer.php');
	?>
</body>
</html>