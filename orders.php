<!DOCTYPE html>
<html>
<head>
<?php
include('connection.php');
?>
<?php
include('header.php');
?>
<?php
include('sidebar.php');
?>
</head>
<body>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>
        Add Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	
	  <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
       <div class="box-body">
	    <?php
		$id=$_SESSION['id']; 
		$query = "SELECT users.id,user_details.user_id
						 FROM users INNER JOIN user_details ON users.id=user_details.user_id where users.id='$id'"; 
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		?>
		<form method="post" action="add_order.php" id="myform">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name of Product</label><span style="color:red"> * </span>
                <input type="text" class="form-control" name="product_name" placeholder="Name of the product" required='true' />
              </div>
             <div class="form-group">
                <label>Batch No.</label><span style="color:red"> * </span>
                <input type="text" class="form-control" name="batch_no" placeholder="Batch number" required='true' />
              </div>
			  <div class="form-group">
                <label>Date of Manufacture</label>
                <input type="text" id="datepicker" class="form-control" name="mfg_date"></input>
              </div>
			  <div class="form-group">
                <label>Date of Expiry</label>
                <input type="text" id="datepicker1" class="form-control" name="exp_delivery_date"></input>
              </div>
			  <div class="form-group">
                <label>Sample Quantity</label>
                <input type="text" class="form-control" name="sample_quantity" placeholder="Sample quantity"/>
              </div>
			  <div class="form-group">
                <label>Testing Pharmaeopoeia</label><span style="color:red"> * </span>
                <textarea class="form-control" name="testing" placeholder="Testing Pharmaeopoeia" rows="4" cols="50" required='true' ></textarea>
               </div>
			<!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Mfg. LIC No.</label>
                <input type="text" class="form-control" name="mfg_lic_no" placeholder="LIC No." style="width: 100%;"/>
               </div>
			   <div class="form-group">
                <label>Supply By</label>
                <input type="text" class="form-control" name="supply_by" placeholder="Supply By" />
               </div>
			   <div class="form-group">
                <label>Manufacture By</label>
                <input type="text" class="form-control" name="mfg_by" placeholder="Manufacture By"/>
              </div>
			  <div class="form-group">
                <label>Batch Size</label>
                <input type="text" class="form-control" name="batch_size" placeholder="Batch Size"  />
              </div>
			  <div class="form-group">
                <label>Test Required</label><span style="color:red"> * </span>
                <textarea class="form-control" name="test_required" placeholder="Test Required" rows="4" cols="50" required='true' ></textarea>
              </div>
            </div>
		    <!-- /.form-group -->
			</div>
            <!-- /.col -->
            <input type="hidden" class="form-control" name="user_id"  value="<?php echo $row['id'];?>" />
			<div class="box-footer">
                <input type="submit" class="btn btn-primary" value="submit" style="float:right" name="submit" />
            </div>
		</form>
       </div>
      <!-- /.row -->
	</div>
    </section>
    <!-- /.content -->
</div>

<?php
  include('footer.php');
?>
<!-- Page script -->
<link rel="stylesheet" href="jquery-ui.css">
  <script src="jquery-1.12.4.js"></script>
  <script src="jquery-ui.js"></script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker({format: 'yy-mm-dd'});
    $( "#datepicker1" ).datepicker({format: 'yy-mm-dd'});
  } );
  </script>
</body>
</html>