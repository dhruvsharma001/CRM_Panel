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
		  Order View
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
			<li><a href="#">Order</a></li>
			<li class="active">Order View</li>
		  </ol>
		</section>
		<div class="box box-default">
			<div class="box-header with-border">
				<!-- /.box-header -->
				<div class="box-body">
					<?php
					include('connection.php');
					$id=$_GET['id'];
					$select="SELECT orders.*,orders_status.* FROM orders INNER JOIN orders_status ON orders.id=orders_status.order_id where orders.id='$id'";
					$result = mysqli_query($conn,$select);
					$row=mysqli_fetch_assoc($result);
					?>
					<form>
						<div class="row">
							<div class="col-md-6">
							  <div class="form-group">
								<label>Name of Product</label><br/>
								<?php echo $row['sample_name'];?>
							  </div>
							  <div class="form-group">
								<label>Batch No.</label><br/>
								<?php echo $row['batch_no'];?>
							  </div>
							  <div class="form-group">
								<label>Date of Manufacture</label><br/>
								<?php echo $row['date_of_mfg'];?>
							   </div>
							   <div class="form-group">
								<label>Date of Expiry</label><br/>
								<?php echo $row['exp_delivery_date'];?>
							  </div>
							  <div class="form-group">
								<label>Sample Quantity</label><br/>
								<?php echo $row['sample_quantity'];?>
							  </div>
							   <div class="form-group">
								<label>Testing Pharmaeopoeia</label><br/>
								<?php echo $row['testing_pharmaeopoeia'];?>
							  </div>
							  <!-- /.form-group -->
						  </div>
						  <!-- /.col -->
						  <div class="col-md-6">
							  <div class="form-group">
								<label>Mfg Lic No.</label><br/>
								<?php echo $row['mfg_lic_no'];?>
							  </div>
							  <div class="form-group">
								<label>Supply By</label><br/>
								<?php echo $row['supplied_by'];?>
							  </div>
							  <div class="form-group">
								<label>Mfg By</label><br/>
								<?php echo $row['mfg_by'];?>
							  </div>
							  <div class="form-group">
								<label>Batch Size</label><br/>
								<?php echo $row['batch_size'];?>
							  </div>
							  <div class="form-group">
								<label>Test Required</label><br/>
								<?php echo $row['test_description'];?>
							  </div>
						 </div>
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
<?php
include('footer.php');
?>
<script>
 $(function() 
 { $("#datepicker").datepicker({format: 'yy-mm-dd'}); });
 $(function() 
 { $( "#datepicker1" ).datepicker({format: 'yy-mm-dd'}); });
 </script>
</body>
</html>