<html>
<link rel="stylesheet" href="choose.css">
<link rel="text/javascript" href="choose.js">
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
        Reports Upload
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/CRM/dashboard.php"><i class="fa fa-laptop"></i>Home</a></li>
		<li><a href="http://localhost/CRM/upload_file.php"><i class="fa fa-arrow-left"></i>Orders Data</a></li>
		<li class="active">Reports Upload</li>
      </ol>
    </section>
    <div class="box box-default">
        <div class="box-header with-border">
		    <div>
                <form method="post" action="action.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="file-upload">
								<div class="file-select">
									<div class="file-select-button" id="fileName">Choose File</div>
									<div class="file-select-name" id="noFile">No file chosen...</div> 
									<input type="file" name="file" id="chooseFile">
								</div>
							</div>
                        </div>      
                        <div class="col-md-4">
                            <input type="hidden" name="user_id"  value="<?php echo $_SESSION['id'];?>"/>
                            <button class="btn btn-primary" name="submitReport" value="Submit" id="uploadFiles" onclick="upload(uploadFiles)">Submit</button>
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