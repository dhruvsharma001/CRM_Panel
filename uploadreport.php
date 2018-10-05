<html>
    <head> 
        <script>
            function setup() {
                document.getElementById('buttonid').addEventListener('click', openDialog);
                function openDialog() {
                    document.getElementById('fileid').click();
                }
                document.getElementById('fileid').addEventListener('change', submitForm);
                function submitForm() {
                    document.getElementById('formid').submit();
                }
            }
        </script> 
    </head>
    <body onload="setup()">
             <div class="row">
        <!-- Left col -->
        <div class="col-lg-7 connectedSortable">
		<form id='formid' action="form.php" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<input id='fileid' type='file' name='filename' value='Upload Report' hidden/>
					<input id='buttonid' type='button' value='Upload Report' />
				</div>
				<div class="col-md-6">
					<input id='fileid' type='file' name='filename' hidden/>
					<input id='buttonid' type='button' value='Upload Status' /> 
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
					<input id='fileid' type='file' name='filename' hidden/>
					<input id='buttonid' type='button' value='Upload Invoice' /> 
				</div>
				<div class="col-md-6">
					<input type='submit' value='Submit' />
				</div>
			</div>
        </div>
		</form>
        <!-- right col -->
      </div>
    </body> 
</html>