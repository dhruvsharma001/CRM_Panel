<html>
<link rel="stylesheet" href="choose.css">
<link rel="text/javascript" href="choose.js">
<style>
th.thBorder.nosort.sorting {
    background-image: none;
}

.thBorder{border-bottom:1px solid white !important;}
.thtop{border-top:1px solid white !important;}
 
</style>
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
        Orders Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
		<li><a href="http://localhost/CRM/upload_file.php"><i class="fa fa-arrow-left"></i>Orders Data</a></li>
		<li class="active">Orders Preview</li>
      </ol>
    </section>
    <div class="box box-default">
        <div class="box-header with-border">
		    <div>
                <form method="post" action="action.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="file-upload">
								<div class="file-select">
									<div class="file-select-button" id="fileName">Choose File</div>
									<div class="file-select-name" id="noFile">No file chosen...</div> 
									<input type="file" name="file" id="chooseFile">
								</div>
							</div>
                        </div>      
                        <div class="col-md-4">
                            <input type="hidden" name="user_id"  value="<?php echo $_SESSION['id'];?>"/>
                            <button class="btn btn-primary" name="submit" value="Submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
			<div>
					<table  id="example" class="table table-bordered">
						<thead>
							
								<h3>Orders Data Preview</h3>
							<tr>
								<th class="thBorder">Sample Name</th>
								<th class="thBorder">Testing Pharmaeopoeia</th>
								<th class="thBorder">Ref Date</th>
								<th class="thBorder">Test Description</th>
								<th class=" thBorder nosort">Status</th>
								<th class=" thBorder nosort">Message</th>
							</tr>
						</thead>
						<?php
							$preview="SELECT * FROM order_preview";
							$result1=mysqli_query($conn,$preview);
							while($row=mysqli_fetch_assoc($result1)){
						?>
						 <tr>
							<td><?php echo $row['sample_name'];?></td>
							<td><?php echo $row['testing_pharmaeopoeia'];?></td>
							<td><?php echo $row['ref_date'];?></td>
							<td><?php echo $row['test_description'];?></td>
							<td><?php echo $row['status'];?></td>
							<td><?php echo $row['message'];?></td>
								<?php } ?>
						</tr>
						<tfoot>
						<tr>
							<th class="thtop"></th>
							<th class="thtop"></th>
							<th class="thtop"></th>
							<th class="thtop"></th>
							<th class="thtop"></th>				
						</tr>
					</tfoot>
							
					</table>
					<div class="btn-toolbar" id="button1">
							<input type="hidden" name="id"  value="<?php echo $_row['id'];?>"/>
							<input type="hidden" name="ref_id"  value="<?php echo $_row['ref_id'];?>"/>
							<a href="orderListSave.php?saveOrder=true" class="btn btn-primary" style="float:right" name="saveOrder" value="Save"  onclick="return confirm('Are you sure to Save')">Save</a>
							<a href="list_cancel.php?cancel=true" class="btn btn-primary" style="float:right" name="cancel" value="cancel" onclick="return confirm('Are you sure to Cancel')">Cancel</a>
					</div>
			</div>
		</div>
	</div>
</div>
<?php
    include('footer.php');
?>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script>
				$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
</html>