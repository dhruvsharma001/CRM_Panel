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
        Customer Registration
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
        <li><a href="#">Customer</a></li>
        <li class="active">Add Customer</li>
      </ol>
    </section>
		<div class="box box-default">
        <div class="box-header with-border">
        <!-- /.box-header -->
        <div class="box-body">
		<form method="post" action="customer.php">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label><span style="color:red"> * </span>
				<input type="name" class="form-control" placeholder="eg.John Doe" name="name" required />
              </div>
			  <div class="form-group">
                <label>E-mail</label><span style="color:red"> * </span>
				<input type="email" class="form-control" placeholder="john@example.com" name="email" required />
               </div>
			   <div class="form-group">
                <label>Address</label><span style="color:red"> * </span>
				<input type="address" class="form-control" placeholder="Address" name="address" required />
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
			  <div class="form-group">
                <label>Contact Person</label><span style="color:red"> * </span>
				<input type="contact_person" class="form-control" placeholder="eg.John Doe" name="contact_person" required />
              </div>
              <div class="form-group">
                <label>Password</label><span style="color:red"> * </span>
				<input type="password" class="form-control" placeholder="******" name="password" required />
               </div>
			   <div class="form-group">
                <label>Contact No.</label><span style="color:red"> * </span>
				<input type="tel" maxlength="10" class="form-control" placeholder="9876543210" name="phone" required />
              </div>
            </div>
			<div class="box-footer">
                <button type="submit" class="btn btn-primary" style="float:right" name="submit" value="submit">Submit</button>
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