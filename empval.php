<html>
<body>
	<style>
		#contact label{
			display: inline-block;
			width: 100px;
			text-align: right;
		}
		#contact_submit{
			padding-left: 100px;
		}
		#contact div{
			margin-top: 1em;
		}
		textarea{
			vertical-align: top;
			height: 5em;
		}
			
		.error{
			display: none;
			margin-left: 10px;
		}		
		
		.error_show{
			color: red;
			margin-left: 10px;
		}
		
		input.invalid, textarea.invalid{
			border: 2px solid red;
		}
		
		input.valid, textarea.valid{
			border: 2px solid green;
		}
	</style>
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
        Employee Registration
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
        <li><a href="#">Employee</a></li>
        <li class="active">Add Employee</li>
      </ol>
    </section>
		<div class="box box-default">
        <div class="box-header with-border">
        <!-- /.box-header -->
        <div class="box-body">
		<form id="contact" method="post" action="employee.php">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label style="text-align:left;">Name</label>
				<input type="text" class="form-control" id="contact_name" placeholder="eg.John Doe" name="name"></input>
				<span class="error">This field is required</span>
              </div>
			  <div class="form-group">
                <label style="text-align:left;">Email:</label>
				<input type="text" class="form-control" id="contact_email" placeholder="john@example.com" name="email"></input>
				<span class="error">A valid email address is required</span>
               </div>
			   <div class="form-group">
                <label style="text-align:left;">Phone:</label>
				<input type="text" id="contact_phone" class="form-control" placeholder="9876543210" name="phone"></input>
				<span class="error">This field is required</span>												
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
			  <div class="form-group">
                <label style="text-align:left;">Address:</label>
				<input type="text" class="form-control" id="contact_address" placeholder="Address" name="address"></input>
				<span class="error">This field is required</span>
              </div>
              <div class="form-group">
               <label style="text-align:left;">Password:</label>
				<input type="text" class="form-control" id="contact_password" placeholder="******" name="password"></input>
				<span class="error">This field is required</span>
               </div>
            </div>
			<div class="box-footer">
                <div id="contact_submit">				
				<button type="submit" class="btn btn-primary" style="float:right" name="submit" value="submit">Submit</button>
			</div>
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
</body>
<script type='text/javascript' src='valid.min.js'></script>
<script>
		$(document).ready(function() {
			<!-- Real-time Validation -->
				<!--Name can't be blank-->
				$('#contact_name').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				<!--Email must be an email -->
				$('#contact_email').on('input', function() {
					var input=$(this);
					var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
					var is_email=re.test(input.val());
					if(is_email){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				<!--Phone can't be blank-->
				$('#contact_phone').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				<!--Address can't be blank-->
				$('#contact_address').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				<!--Password can't be blank-->
				$('#contact_password').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
			<!-- After Form Submitted Validation-->
			$("#contact_submit button").click(function(event){
				var form_data=$("#contact").serializeArray();
				var error_free=true;
				for (var input in form_data){
					var element=$("#contact_"+form_data[input]['name']);
					var valid=element.hasClass("valid");
					var error_element=$("span", element.parent());
					if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
					else{error_element.removeClass("error_show").addClass("error");}
				}
				if (!error_free){
					event.preventDefault(); 
				}
				else{
					alert('No errors: Form will be submitted');
				}
			});
			
			
			
		});
	</script>
</html>