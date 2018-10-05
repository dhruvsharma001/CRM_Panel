<html>
<body>
	<?php
	include('header.php');
	?>
	<?php
	include('sidebar.php');
	?>
	<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
      </ol>
    </section>
		<div class="box box-default">
        <div class="box-header with-border">
        <!-- /.box-header -->
        <div class="box-body">
		<?php
		include('connection.php');
		$id=$_SESSION['id'];
		$query="SELECT id from users where id='$id'";
		$result = mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		?>
		<form method="post" action="update.php">
          <div class="row">
            <div class="col-md-6">
			  <div class="form-group">
                <label>New Password</label>
				<input type="password" class="form-control" placeholder="******" name="password" required />
               </div>
			   </div>
			   <div class="col-md-6">
              <div class="form-group">
                <label>Confirm Password</label>
				<input type="password" class="form-control" placeholder="******" name="confirm_password" required />	
              </div>
            </div>
			<div class="box-footer">
				<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                <button type="update" class="btn btn-primary" style="float:right" name="update" value="update">Update</button>
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