<html>
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
			Order Data
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
		  </ol>
		</section>
		<div class="box box-default">
			<div class="box-header with-border">
				<!-- /.box-header -->
				<form id='formid' action="#" method="POST" enctype="multipart/form-data">
					<div class="col-lg-7 connectedSortable">
						<div class="row">
							<div class="col-md-6">
								<input id='fileid1' type='file' name='filename'  hidden/>
								<button style="display:block; width:120px; height:30px; color: #ffffff; background-color: #3c8dbc; border-color: #357ebd; border-radius: .4em;" onclick="document.getElementById('getFile').click()">Upload Report</button>
								
							</div>
							<div class="col-md-6">
								<button style="display:block; width:120px; height:30px; color: #ffffff; background-color: #3c8dbc; border-color: #357ebd; border-radius: .4em;" onclick="document.getElementById('getFile').click()">Upload Status</button>
								<input type='file' id="getFile" style="display:none">
							</div>
						</div>
					<!-- quick email widget -->
					</div>
					<!-- /.Left col -->
					<!-- right col (We are only adding the ID to make the widgets sortable)-->
					<div class="col-lg-5 connectedSortable">
					  <!-- /.box -->
						<div class="row">
							<div class="col-md-6">
								<button style="display:block; width:120px; height:30px; color: #ffffff; background-color: #3c8dbc; border-color: #357ebd; border-radius: .4em;" onclick="document.getElementById('getFile').click()">Upload Invoice</button>
								<input type='file' id="getFile" style="display:none">
							</div>
							<div class="col-md-6">
								<input type='submit' style="display:block; width:120px; height:30px; color: #ffffff; background-color: #3c8dbc; border-color: #357ebd; border-radius: .4em;" value='Submit' />
							</div>
						</div>
					</div>
				</form>
			<!-- /.col -->
			</div>
        <!-- /.row -->
		</div>
    <!-- /.box-body -->
	</div>
<?php
	include('footer.php');
?>
</body>
</html>