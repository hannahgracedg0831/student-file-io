<!-- ======= Start package/teacher/INDEX.PHP ======= -->

<?php
  session_start();

  if (!isset($_SESSION['T_Teacher'])) {
    header("Location: ../login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Teacher Dashboard | RCNHS</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/rio.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
	
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header" >
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="index.php" class="logo">
						<img src="assets/img/rio.png" width="60" height="60" alt="">
					</a>
                </div>
				<!-- /Logo -->
				
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				
				<!-- Header Title -->
                <div class="page-title-box">
					<h3>Rio Chico National High School</h3>
                </div>
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
				
				<!-- Header Menu -->
				<ul class="nav user-menu">
	
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="../images/<?php echo $_SESSION['T_Profile'];?>" alt="">
							<span class="status online"></span></span>
							<span><?php echo $_SESSION['T_Name']; ?></span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="profile.php">Account Setting</a>
							<a class="dropdown-item" href="../logout.php">Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.php">Account Setting</a>
						<a class="dropdown-item" href="../logout.php">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
						<!-- Dashboard -->
						<li class="menu-title">
								<span>Main</span>
							</li>
							<li><a href="index.php" style="background-color: #FFA600;"><font color="black"><strong><i class="fa fa-laptop"></i> <span>Dashboard</span></strong></font></a></li>
					<hr>	
						<!-- File Manager -->
						<li class="menu-title">
								<span>File Manager</span>
							</li>
							<li><a href="page-teacherDocument.php"><i class="fa fa-th-large"></i> <span> Archive Files</span></a></li>
							<li><a href="page-fileScanner.php"><i class="fa fa-th-large"></i> <span> Scanner</span></a></li>
					<hr>
						<!-- Account Settings -->
						<li class="menu-title"> 
								<span>Advisory</span>
							</li>
							<li><a href="page-studentDocument.php"><i class="fa fa-th-large"></i> <span> Manage Student</span></a></li>

						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
				
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				<div class="row">
						<div class="col-md-12">
							<div class="welcome-box">
								<div class="welcome-img">
									<img alt="" src="../images/<?php echo $_SESSION['T_Profile'];?>">
								</div>
								<div class="welcome-det">
									<h3>Welcome, <?php echo $_SESSION['T_Name'];?></h3>
									<p>Teacher</p>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8 col-sm-8 col-lg-8 col-xl-6">
								<div class="card dash-widget">
									<div class="card-body">
										<span class="dash-widget-icon"><i class="fa fa-calendar fa-2x"></i></span>
										<div class="dash-widget-info">
											<h3>
												<?php echo $_SESSION['T_schoolyear']; ?>
											</h3>
											<span>School Year</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-lg-8 col-xl-6">
								<div class="card dash-widget">
									<div class="card-body">
										<span class="dash-widget-icon"><i class="fa fa-users fa-2x"></i></span>
										<div class="dash-widget-info">
											<h3>
												<?php echo $_SESSION['T_yearsection'];  ?>
											</h3>
											<span>Advisory</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-lg-8 col-xl-6">
								<div class="card dash-widget">
									<div class="card-body">
										<span class="dash-widget-icon"><i class="fa fa-users fa-2x"></i></span>
										<div class="dash-widget-info">
											<h3>
												<?php include('config.php');
													$result=mysqli_query($conn,"SELECT count(*) as total from tbl_student where year_section='".$_SESSION['T_yearsection']."'");
													$data=mysqli_fetch_assoc($result);
													echo $data['total'];
												?>
											</h3>
											<span>Students</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-lg-8 col-xl-6">
								<div class="card dash-widget">
									<div class="card-body">
										<span class="dash-widget-icon"><i class="fa fa-file fa-2x"></i></span>
										<div class="dash-widget-info">
											<h3>
												<?php include('config.php');
													$result=mysqli_query($conn,"SELECT count(*) as total from tbl_teacherdocuments");
													$data=mysqli_fetch_assoc($result);
													echo $data['total'];
												?>
											</h3>
											<span>Documents</span>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				<!-- /Page Content -->
            </div>
			<!-- /Page Wrapper -->
        </div>
		<!-- /Main Wrapper -->
		
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
		<script src="assets/js/chart.js"></script>
		<script src="assets/js/app.js"></script>
		
    </body>
</html>
<!-- ======= End package/teacher/INDEX.PHP ======= -->
