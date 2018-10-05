<!DOCTYPE html>
<html>
<?php
include('header.php');
?>
<?php
include('sidebar.php');
?>
<?php
include('connection.php');
?>
<div class="wrapper">
<!-- Left side column. contains the logo and sidebar -->
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Main content -->
		<section class="content" style="background: url(dist/img/dashboard.jpg); height: 85vh; background-size: cover;">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h1>
							<?php 
							$select ="select * FROM orders";
							$result=mysqli_query($conn,$select);
							$count=mysqli_num_rows($result);
							echo $count;?>
							</h1> 
							<h5>Shift Timining</h5>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<?php if($_SESSION['role']=='1' OR $_SESSION['role']=='2') { ?>
						<a href="allorders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-green">
							<div class="inner">
							<h1>
							<?php 
							$select ="select * FROM users where role_id='2'";
							$result=mysqli_query($conn,$select);
							$count=mysqli_num_rows($result);
							echo $count;?>
							</h1>
							<h5>Employee Registered</h5>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<?php if($_SESSION['role']=='1' OR $_SESSION['role']=='2') { ?>
							<a href="employeelist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							<?php } ?>
					 </div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h1>
							<?php 
							$result=mysqli_query($conn,$select);
							$count=mysqli_num_rows($result);
							echo $count;?>
							</h1>
							<h5>Customer Registered</h5>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<?php if($_SESSION['role']=='1' OR $_SESSION['role']=='2') { ?>
						<a href="customerlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
			   </div>
			   <!-- ./col -->
        <!-- ./col -->
		</div>
      <!-- /.row -->
      <!-- Main row -->      
      <!-- /.row (main row) -->
	  </section>
	  <!-- Slideshow container -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
include('footer.php');
?>
