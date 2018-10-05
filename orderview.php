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
			Order Preview
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
			<li><a href="#">Order</a></li>
			<li><a href="http://localhost/CRM/orderslist.php">Order Listing</li>
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
					<form method="post" action="orderupdate1.php">
						<div class="row">
							<div class="col-md-6">
							  <div class="form-group">
								<label>Name of Product: </label>
								<label><?php echo ucwords($row['sample_name']);?></label>
							  </div>
							  <div class="form-group">
								<label>Batch No.: </label>
								<label><?php echo ucwords($row['batch_no']);?></label>
							  </div>
							  <div class="form-group">
								<label>Date of Manufacture: </label>
								<label><?php echo ucwords($row['date_of_mfg']);?></label>
							   </div>
							   <div class="form-group">
								<label>Date of Expiry: </label>
								<label><?php echo ucwords($row['exp_delivery_date']);?></label>
							  </div>
							  <div class="form-group">
								<label>Sample Quantity: </label>
								<label><?php echo ucwords($row['sample_quantity']);?></label>
							  </div>
							   <div class="form-group">
								<label>Testing Pharmaeopoeia: </label>
								<label><?php echo ucwords($row['testing_pharmaeopoeia']);?></label>
							  </div>
							  <!-- /.form-group -->
						  </div>
						  <!-- /.col -->
						  <div class="col-md-6">
							  <div class="form-group">
								<label>Mfg Lic No.: </label>
								<label><?php echo ucwords($row['mfg_lic_no']);?></label>
							  </div>
							  <div class="form-group">
								<label>Supply By: </label>
								<label><?php echo ucwords($row['supplied_by']);?></label>
							  </div>
							  <div class="form-group">
								<label>Mfg By: </label>
								<label><?php echo ucwords($row['mfg_by']);?></label>
							  </div>
							  <div class="form-group">
								<label>Batch Size: </label>
								<label><?php echo ucwords($row['batch_size']);?></label>
							  </div>
							  <div class="form-group">
								<label>Test Required: </label>
								<label><?php echo ucwords($row['test_description']);?></label>
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