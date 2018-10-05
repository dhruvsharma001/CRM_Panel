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
        All Orders Listing
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
      </ol>
    </section>
    <div class="box box-default">
		<div id="orderList">
			<table id="example" class="table table-bordered">
				<thead>
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
						if($result){
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