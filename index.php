<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CRM Panel</title>
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
	<body id="login_body">
	<div style="position:relative;width:100%;height:100vh;float:left;">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<style>
			.mySlides img{max-height:100vh;}
			* {box-sizing: border-box;}
			body {font-family: Verdana, sans-serif;}
			.mySlides {display: none;}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container {
			  max-width: 1349px;
			  max-height: 50vh;
			  position: relative;
			  margin: auto;
			}

			/* Caption text */
			.text {
			  color: #f2f2f2;
			  font-size: 15px;
			  padding: 8px 12px;
			  position: absolute;
			  bottom: 8px;
			  width: 100%;
			  text-align: center;
			}

			/* The dots/bullets/indicators */
			.dot {
			  height: 15px;
			  width: 15px;
			  margin: 0 2px;
			  background-color: #bbb;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}

			.active {
			  background-color: #717171;
			}

			/* Fading animation */
			.fade {
			  -webkit-animation-name: fade;
			  -webkit-animation-duration: 2.5s;
			  animation-name: fade;
			  animation-duration: 2.5s;
			}

			@-webkit-keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}

			@keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}

			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			  .text {font-size: 11px}
			}
			</style>
			<div class="slideshow-container">
				<div class="mySlides fade">
				  <img src="dist/img/slider1.jpg" style="width:100%">
				</div>
				<div class="mySlides fade">
				  <img src="dist/img/slider2.jpg" style="width:100%">
				</div>
				<div class="mySlides fade">
				  <img src="dist/img/slider3.jpg" style="width:100%">
				</div>
				<div class="mySlides fade">
				  <img src="dist/img/slider4.jpg" style="width:100%">
				</div>
			</div>
			<br>
			<div style="text-align:center">
			  <span class="dot"></span> 
			  <span class="dot"></span> 
			  <span class="dot"></span>
			  <span class="dot"></span> 
			</div>
			<script>
				var slideIndex = 0;
				showSlides();

				function showSlides() {
					var i;
					var slides = document.getElementsByClassName("mySlides");
					var dots = document.getElementsByClassName("dot");
					for (i = 0; i < slides.length; i++) {
					   slides[i].style.display = "none";  
					}
					slideIndex++;
					if (slideIndex > slides.length) {slideIndex = 1}    
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}
					slides[slideIndex-1].style.display = "block";  
					dots[slideIndex-1].className += " active";
					setTimeout(showSlides, 2000); // Change image every 2 seconds
				}
			</script>
			<div class="container" style="position: absolute; top: 0px; left: 0; right: 0; bottom: 0; margin: auto; overflow: hidden; width: 100%; height: 100%;">
				<section id="Main_text"><h1 class="text-center">CRM Panel</h1>
				</section>
					<section id="login">
						<div class="row">
							<div class="col-md-4  col-sm-8 col-sm-offset-2 col-md-offset-4">
								<div class="panel panel-default">
									<div class="panel-heading" style="background-color: #3c8dbc"> <strong class="">Login</strong>
									</div>
									<div class="panel-body">
										<form method="post" id="loginForm" class="form-horizontal" role="form" action="login.php">
											<div class="radio_btns">
												<label class="radio-inline">
													<input class="required" type="radio" name="role" value="1">Admin
												</label>
												<label class="radio-inline">
													<input type="radio" name="role" value="2">Employee
												</label>
											</div>
											<div class="form-group">
												<label for="username" class="col-sm-3 control-label">Username</label>
												<div class="col-sm-9">
													<input class="required form-control" type="text" name="email" class="form-control" id="username" placeholder="Username">
												</div>
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
												<div class="col-sm-9">
													<input class="required form-control" type="password" name="password"  class="form-control" id="password" placeholder="Password">
												</div>
											</div>
											<div class="form-group last">
												<div class="col-sm-12 text-center">
												   <input type="submit" name="login_submit" class="btn btn-primary btn-md" value="Login" onclick="validate();"/>
												   <input type="reset" class="btn btn-default btn-md" value="Reset">
												</div>
												<div class="col-sm-12 text-center"> 
												  <a class="text-center small" href="forget.php">Forgot your password?</a>
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
		
