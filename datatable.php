<?php
$con = mysqli_connect("localhost","root","","crm");
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
                <th>Position</th>
                <th>Office</th>
                
                
            </tr>
        </thead>
        <tbody>
		<?php
		$getlist="select * from users limit 20";
		$query=mysqli_query($con,$getlist);
		//print_r($query);die;
		$rowList=mysqli_fetch_assoc($query);
		while($rowList=mysqli_fetch_assoc($query)){
			//echo '<pre>';print_r($rowList);die;
		?>
            <tr>
                <td><?php echo $rowList['name']; ?></td>
                <td><?php echo $rowList['email']; ?></td>
                <td><?php echo $rowList['address']; ?></td>
                
            </tr>
		<?php  } ?>
        </tfoot>
    </table>
	
<!--<script src=" https://code.jquery.com/jquery-1.12.4.js"  ></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js
  "></script>-->
  
  
  
  <!-- jQuery 3 -->
<!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
<script src="bower_components/jquery/dist/jquery-3.1.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js
  "></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>


	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script src=" https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"></script>
	<script  src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
   
   <script>
	$(document).ready(function() {
    $('#example').DataTable();
} );</script>