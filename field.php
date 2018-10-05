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
        Employee Registration
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
        <li><a href="#">Employee</a></li>
        <li class="active">Add Employee</li>
      </ol>
    </section>
		<div class="box box-default">
        <div class="box-header with-border">
        <!-- /.box-header -->
        <div class="box-body">
		<form method="post" action="employee.php">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control select2"name="name" placeholder="eg.John Doe" style="width: 100%;"/>
              </div>
			  <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control select2" name="email" placeholder="john@example.com" style="width: 100%;"/>
               </div>
			   <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control select2" name="phone" placeholder="9876543210" style="width: 100%;"/>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
			  <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control select2" name="address" placeholder="Address" style="width: 100%;"/>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control select2" name="pwd" placeholder="******" style="width: 100%;"/>
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