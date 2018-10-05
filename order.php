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
        Order Form
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/index.php"><i class="fa fa-laptop"></i>Home</a></li>
      </ol>
    </section>
		<div class="box box-default">
        <div class="box-header with-border">
        <!-- /.box-header -->
        <div class="box-body">
		<?php
		include('connection.php');
		$id=$_SESSION['id']; 
		$query = "SELECT users.id,user_details.user_id
						 FROM users INNER JOIN user_details ON users.id=user_details.user_id where users.id='$id'"; 
		
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		?>
		<form method="post" action="orderupdate.php">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name of Product</label>
                <input type="text" class="form-control select2" name="sample_name" style="width: 100%;" required />
              </div>
			  <div class="form-group">
                <label>Date of Mfg.</label>
                <input type="text" class="form-control select2" name="date_of_mfg" id="datepicker" style="width: 100%;">
               </div>
			   <div class="form-group">
                <label>Batch Size</label>
                <input type="text" class="form-control select2" name="batch_size" style="width: 100%;">
               </div>
			  <div class="form-group">
                <label>Mfg Lic No.</label>
                <input type="text" class="form-control select2" name="mfg_lic_no" style="width: 100%;">
              </div>
			  <div class="form-group">
                <label>Mfg By</label>
                <input type="text" class="form-control select2" name="mfg_by" style="width: 100%;">
              </div>
			  <div class="form-group">
                <label>Test Required</label>
				<textarea rows="4" cols="20" class="form-control select2" name="test_description" required /></textarea>
			  </div> 
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
			  <div class="form-group">
                <label>Batch No.</label>
                <input type="text" class="form-control select2" name="batch_no" style="width: 100%;">
              </div>
			  <div class="form-group">
                <label>Date of Expiry</label>
                <input type="text" class="form-control select2" name="exp_delivery_date" id="datepicker1" style="width: 100%;">
              </div>
			  <div class="form-group">
                <label>Sample Quantity</label>
                <input type="text" class="form-control select2" name="sample_quantity" style="width: 100%;">
              </div>
			  <div class="form-group">
                <label>Supplied By</label>
                <input type="text" class="form-control select2" name="supplied_by" style="width: 100%;">
              </div>
			  <div class="form-group">
                <label>Testing Pharmaeopoeia</label>
				<textarea rows="4" cols="20" class="form-control select2" name="testing_pharmaeopoeia" required /></textarea>
			  </div>
            </div>
			<div class="box-footer">
				<input type="hidden" class="form-control select2" name="user_id"  value="<?php echo $row['id'];?>"/>
                <button type="submit" class="btn btn-primary" style="float:right" name="submit" value="submit">Add</button>
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
	<script>
	$(function()
    { $( "#datepicker" ).datepicker(); });
	$(function()
    { $( "#datepicker1" ).datepicker(); });
	</script>
</body>
</html>