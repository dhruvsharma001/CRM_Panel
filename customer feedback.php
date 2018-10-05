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
			Customer Feedback
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
		  </ol>
		</section>
		<div class="box box-default">
			<div class="box-header with-border">
			<!-- /.box-header -->
				<div class="box-body">
					<form method="post" action="employee.php">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Title</label>
									<input type="text" class="form-control" placeholder="title" name="title"></input>
								</div>
								<div class="form-group">
									<label>Description</label>
									<input type="text" class="form-control" placeholder="description" name="description"></input>
								</div>
								<div class="form-group">
									<label>Rating</label>
									<input type="text" class="form-control" placeholder="*****" name="rating"></input>
								</div>
								<div class="box-footer">				
									<button type="submit" class="btn btn-primary" style="float:right" name="submit" value="submit">Submit</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	include('footer.php');
	?>
</body>
</html>