<?php
$conn = mysqli_connect("localhost","root","","crm");
//print_r($con);die("HI");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
 <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
		
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                
                
            </tr>
        </thead>
        <tbody>
		<?php
		$getlist="select * from users limit 20";
		$query=mysqli_query($conn,$getlist);
		//print_r($query);die;
		$rowList=mysqli_fetch_assoc($query);
		while($rowList=mysqli_fetch_assoc($query)){
			//echo '<pre>';print_r($rowList);die;
		?>
            <tr>
                <td><?php echo $rowList['name']; ?></td>
                <td><?php echo $rowList['email']; ?></td>
                <td><?php echo $rowList['status']; ?></td>
                
            </tr>
		<?php  } ?>
        </tfoot>
    </table>
	
<script src="
    https://code.jquery.com/jquery-1.12.4.js"  ></script>
	<script src="
     https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js
  "></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script src=" https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>
	<script  src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
   
   <script>
	$(document).ready(function() {
    $('#example').DataTable();
} );</script>