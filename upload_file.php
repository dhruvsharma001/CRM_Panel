<html>
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
      </ol>
    </section>
    <div class="box box-default">
        <div class="box-header with-border">
            <!-- /.box-header -->
            <div id="btn">
                <?php if($_SESSION['role']=='1'){?>
                <div class="connectedSortable">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="list_order.php" id='order' type='button' class="btn btn-primary" onclick="upload('order')" value='Order'>Upload Orders</a>
                        </div>
                        <div class="col-md-3">
							<a href="list_status.php" id='uploadstatus' type='button' class="btn btn-primary" onclick="upload('uploadstatus')" value='Upload Status'> Upload Status</a>
                        </div>
						<div class="col-md-3">
                            <a href="list_report.php" id='uploadreport' type='button' class="btn btn-primary" onclick="upload('uploadreport')" value='Upload Report'>Upload Reports</a> 
                        </div>
                        <div class="col-md-3">
                            <a href="list_invoice.php" id='uploadinvoice' type='button' class="btn btn-primary" onclick="upload('uploadinvoice')" value='Upload Invoice'>Upload Invoices</a>
                        </div>
                    </div>
                <!-- quick email widget -->
                </div>
			</div>
                <?php }else{ ?>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <div class="connectedSortable">
                  <!-- /.box -->
                    <div class="row">
                        <div class="col-md-4">
							<a href="list_status.php" id='uploadstatus' type='button' class="btn btn-primary" onclick="upload('uploadstatus')" value='Upload Status'> Upload Status</a>
                        </div>
						<div class="col-md-3">
                            <a href="list_report.php" id='uploadreport' type='button' class="btn btn-primary" onclick="upload('uploadreport')" value='Upload Report'>Upload Reports</a> 
                        </div>
                        <div class="col-md-3">
                            <a href="list_invoice.php" id='uploadinvoice' type='button' class="btn btn-primary" onclick="upload('uploadinvoice')" value='Upload Invoice'>Upload Invoices</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
		<div id="orderList">
			<table id="example" class="table table-bordered">
				<thead>
					<h3>Orders Data Listing</h3>
					<tr>
						<th class="thBorder">Sample Name</th>
						<th class="thBorder">Testing Pharmaeopoeia</th>
						<th class="thBorder">Ref Date</th>
						<th class="thBorder">Test Description</th>
						<th class="thBorder nosort">Status</th>
						<th class="thBorder nosort">Action</th>
					</tr>
				</thead>
				<?php
					$query="SELECT * FROM orders";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_assoc($result))
					{
						if($row['customer_id']!=0){
							?>
							
							<tr>
							<td><?php echo $row['sample_name'];?></td>
							<td><?php echo $row['testing_pharmaeopoeia'];?></td>
							<td><?php echo $row['ref_date'];?></td>
							<td><?php echo $row['test_description'];?></td>
							<td><?php echo $row['status'];?></td>
							<td><a href="currentStatus.php?id=<?php echo $row['id'];?>"><i class="fa fa-eye" style="font-size:24px;color:black"></a></i></td>
								<?php } ?>
								
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
		</div>
	</div>
</div></div>
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
</body>
</html>