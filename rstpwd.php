<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRM LAB</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="./css/jquery.dataTables.css" type="text/css" rel="stylesheet">	
	<link href="./css/bootstrap.css" type="text/css" rel="stylesheet">	
	<link href="./css/style.css" type="text/css" rel="stylesheet">
	<link href="./css/custom.css" type="text/css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">
	<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap-3.3.2.min.js"></script>
	<script type="text/javascript" src="./js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="./js/jquery.validations.js"></script>
	<script type="text/javascript" src="./js/jquery.blockUI.js"></script>
	<script type="text/javascript" src="./js/js_actions.js"></script>
	<script type="text/javascript" src="./js/js_csv.js"></script>
	<script type="text/javascript" src="./js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="dist\js/login.js"></script>
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>

<body id="login_body" style="background: url(dist/img/lab1.jpg); height: 100vh; background-size: cover;">
<section id="login-page">
	<div class="container" style="position: absolute; top: 0px; left: 0; right: 0; bottom: 0; margin: auto; overflow: hidden; width: 100%; height: 100%;">
		<section id="Main_text"><h1 class="text-center">CRM Testing LAB</h1></section>
			<section id="login">
				<div class="row">
					<div class="col-md-4  col-sm-8 col-sm-offset-2 col-md-offset-4">
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color: #3c8dbc"> <strong class="">Change Password</strong>
							</div>
							<div class="panel-body">
								<form method="post" id="loginForm" class="form-horizontal" role="form" action="updatePwd.php">
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-9">
											<input type="password" class="form-control" placeholder="******" name="password" required />
											<input type="hidden" name="id"  value="<?php $id=$_GET['id']; echo $id;?>"/>
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-3 control-label">Confirm Password</label>
										<div class="col-sm-9">
											<input type="password" class="form-control" placeholder="******" name="confirm_password" required />
										</div>
									</div>
									<div class="form-group last">
										<div class="col-sm-12 text-center">
											<button type="update" class="btn btn-primary" style="background-color: #3c8dbc" name="update" value="update">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>  
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>
		
