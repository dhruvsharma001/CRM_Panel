<body class="hold-transition skin-blue sidebar-mini">
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user3.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <span class="hidden-xs"><?php echo ucwords($_SESSION['name']);?></span>
        </div>
      </div>
	  <!-- sidebar menu: : style can be found in sidebar.less -->
	  <ul class="sidebar-menu" data-widget="tree">
	  <?php if($_SESSION['role']=='3'){?>
	  <li class="active treeview">
		  <a href="#">
            <i class="fa fa-laptop"></i> <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu" style="display: none;">
            <li class="active"><a href="orders.php"><i class="fa fa-user-o"></i>Add Orders</a></li>
			<li><a href="orderslist.php"><i class="fa fa-reorder"></i>Orders List</a></li>
		  </ul>
		  <li class="active">
			  <a href="index3.php">
				<i class="fa fa-send-o"></i><span>Feedback</span>
				<span class="pull-right-container"></span>
			  </a>
		  </li>
      </li>
	  <?php }else{ ?>
	  <li class="active treeview">
          <a href="#">
            <i class="fa fa-handshake-o"></i> <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="active"><a href="addemployee.php" target="_self"><i class="fa fa-user-o"></i>Add Employees</a></li>
            <li><a href="employeelist.php" target="_self"><i class="fa fa-reorder"></i>Employees List</a></li>
          </ul>
      </li>
	  <li class="active">
          <a href="upload_file.php">
            <i class="fa fa-suitcase"></i><span>Orders</span>
			<span class="pull-right-container"></span>
          </a>
      </li>
	  <li class="active">
          <a href="orderslist.php">
            <i class="fa fa-television"></i><span>Web Orders</span>
			<span class="pull-right-container"></span>
          </a>
      </li>
	  <?php } ?>
	</ul>  
    </section>
    <!-- /.sidebar -->
  </aside>
  