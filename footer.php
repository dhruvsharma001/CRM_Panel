					<!-- Modal -->
					<div class="modal fade" id="modalForm" role="dialog">
					<?php
					include('connection.php');
					$id=$_SESSION['id'];
					$query="SELECT users.role_id,users.id,users.name,users.email,user_details.contact_person,user_details.address,user_details.phone
											FROM users INNER JOIN user_details ON users.id = user_details.user_id where users.id='$id'";
					
					$result = mysqli_query($conn,$query);
					$row=mysqli_fetch_assoc($result);
					?>
						<div class="modal-dialog">
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
									<h4>Profile Details</h4>
									<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">&times;</span>
										<span class="sr-only">Close</span>
									</button>
								</div>
								<!-- Modal Body -->
								<div class="modal-body">
												<form method="post" action="profileupdate.php">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Name</label>
																<input type="text" class="form-control select2" name="name" style="width: 100%;" value="<?php echo $row['name'];?>"/>
															</div>
															<div class="form-group">
																<label>E-mail</label>
																<input type="email" class="form-control select2" name="email" style="width: 100%;" value="<?php echo $row['email'];?>"/>
															</div>
															<!-- /.form-group -->
														</div>
														<!-- /.col -->
														<div class="col-md-6">
															<div class="form-group">
																<label>Address</label>
																<input type="text" class="form-control select2" name="address" style="width: 100%;" value="<?php echo $row['address'];?>"/>
															</div>
															<div class="form-group">
																<label>Contact No.</label>
																<input type="text" class="form-control select2" name="phone" style="width: 100%;" value="<?php echo $row['phone'];?>"/>
															</div>
														</div>
														<div class="box-footer">
															<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>	
															<button class="btn btn-primary" style="float:right" name="update" value="update">Update</button>
														</div>
													</div>
											</form>
										</div>
									</div>
								</div>
							</div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong><i class="fa fa-copyright"> Copyright 2018. All Rights Reserved.</i></strong>
	<script src="bower_components/jquery/dist/jquery-3.1.1.min.js"></script>
	<script src="jquery.dataTables.min.js"></script>
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
	<script src="custom.js"></script>
	<script src="choose.js"></script>
  </footer>