<!-- ======= Start package/admin/PROFILE.PHP ======= -->

<?php
  session_start();

  if (!isset($_SESSION['A_Admin'])) {
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
        <title>Account Settings | RCNHS</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/rio.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		<link rel="stylesheet" href="assets/css/select2.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
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

                    <!-- Notifications -->
					<li class="nav-item dropdown">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i> 
								<span class="badge badge-pill">
								<?php include('config.php');
									$result=mysqli_query($conn,"SELECT count(*) as total from tbl_user where u_status='Pending'");
									$data=mysqli_fetch_assoc($result);
									echo $data['total'];
								?>
								</span>
							</a>
							<div class="dropdown-menu notifications">
								<div class="topnav-dropdown-header">
									<span class="notification-title">Notifications</span>
									<a href="page-pendingAccount.php" class="clear-noti"> View All</a>
								</div>
								<div class="noti-content">
								<?php  include('config.php');
									$query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `u_status`='Pending' ORDER BY `created_at` DESC") or die(mysqli_error($conn));
									while($fetch = mysqli_fetch_array($query) ){
										$role = $fetch['u_role'];
										$date = $fetch['created_at'];

										$charat = substr($fetch['u_mname'], 0, 1);
                        				$name = $fetch['u_fname'] . ' ' . $charat . '. ' . $fetch['u_lname'];
								?>
									<ul class="notification-list">
										<li class="notification-message">
											<a href="page-pendingAccount.php">
												<div class="media">
													<span class="avatar">
														<img src="../images/<?php echo $fetch['u_photo'];?>" width="50" height="50" alt="">
													</span>
													<div class="media-body">
														<p class="noti-details"><span class="noti-title"><?php echo $name;?></p>
														<p class="noti-role"><span class="notification-role"><?php echo $role;?></span></p>
														<p class="noti-time"><span class="notification-time"><?php echo $date;?></span></p>
													</div>
												</div>
											</a>
										</li>
									</ul>
								<?php } ?>
								</div>
								<div class="topnav-dropdown-footer">
									<p class="text-center">Request Account</p>
								</div>
							</div>
						</li>
						<!-- /Notifications -->
	
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="../images/<?php echo $_SESSION['A_Profile'];?>" alt="">
							<span class="status online"></span></span>
							<span><?php echo $_SESSION['A_Name']; ?></span>
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
							<li><a href="index.php"><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>
					<hr>	
						<!-- File Manager -->
						<li class="menu-title">
								<span>File Manager</span>
							</li>
                            <li class="submenu">
								<a href="#"><i class="fa fa-th-large"></i> <span> Archive Files</span> <span class="menu-arrow"></span></a>
								    <ul style="display: none;">
                                        <li><a href="page-archive.php"> <span> Admin Documents</span></a></li>
                                        <li><a href="page-archiveTeacher.php"> <span> Teacher Documents</span></a></li>
								    </ul>
							</li>
							<li><a href="page-fileScanner.php"><i class="fa fa-th-large"></i> <span> Scanner</span></a></li>
							<li><a href="page-backup.php"><i class="fa fa-database"></i> <span> Backup and Restore</span></a></li>
					<hr>
						<!-- Account Settings -->
						<li class="menu-title"> 
								<span>Administration</span>
							</li>
							<li><a href="page-student.php"><i class="fa fa-th-large"></i> <span> Manage Student</span></a></li>
							<li><a href="page-teacherList.php"><i class="fa fa-th-large"></i> <span> Manage Teacher</span></a></li>
							<li><a href="page-year_section.php"><i class="fa fa-th-large"></i> <span> Set Year and Section</span></a></li>
							<li><a href="page-doctype.php"><i class="fa fa-list"></i> <span> Set Document List</span></a></li>
							<li><a href="page-pendingAccount.php"><i class="fa fa-users"></i> <span> Pending Account</span></a></li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">Account Settings</h3>
										<ul class="breadcrumb">
											<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
											<li class="breadcrumb-item active">Account Settings</li>
										</ul>
									</div>
								</div>
							</div>
					<!-- /Page Header -->
					<hr>

			<!-- SELECT PROFILE -->
			<?php 	include('config.php');
            
				$select_sql = "SELECT * FROM tbl_user WHERE u_id='{$_SESSION["A_ID"]}'";
				$select_result = mysqli_query($conn, $select_sql);
				if (mysqli_num_rows($select_result) > 0) {
					while ($select_row = mysqli_fetch_assoc($select_result)) 
					{
					$Sid = $select_row['u_id'];
					// $Sfirst = $select_row['u_fname'];
					// $Smiddle = $select_row['u_mname'];
					// $Slast = $select_row['u_lname'];
					$Scontact = $select_row['u_contact'];
					$Saddress = $select_row['u_address'];
					$Semail = $select_row['u_email'];
					$password = $select_row['u_password'];

					// $charat = substr($select_row['u_mname'], 0, 1);
              		// $name = $select_row['u_fname'] . ' ' . $charat . '. ' . $select_row['u_lname'];
					}
				}
            ?>

					<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="#"><img src="../images/<?php echo $_SESSION["A_Profile"]; ?>" alt=""></a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<br/>
														<h3 class="user-name m-t-0 mb-0">
															<?php echo $_SESSION["A_Name"]; ?>
														</h3>
														<h6 class="text-muted">Administrator</h6>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Account Type:</div>
															<div class="text"><?php echo $_SESSION["A_Role"]; ?></div>
														</li>
														<li>
															<div class="title">Phone:</div>
															<div class="text"><?php echo $Scontact; ?></div>
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><?php echo $Semail; ?></div>
														</li>
														<li>
															<div class="title">Address:</div>
															<div class="text"><?php echo $Saddress; ?></div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card tab-box">
						<div class="row user-tabs">
							<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Change Password</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="tab-content">
					
		<!-- Password Info Tab -->
						<div id="emp_profile" class="pro-overview tab-pane fade show active">
							<div class="row">
								<div class="col-md-8 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Change Password</h3>
											<ul class="personal-info">
											<form method="POST" action="changepassword.php">
												<div class="form-group">
													<label>Old password</label>
													<input type="password" name="currentPassword" minlength="8" placeholder="********" class="form-control">
												</div>
												<div class="form-group">
													<label>New password</label>
													<input type="password" name="newPassword" minlength="8" placeholder="********" class="form-control">
												</div>
												<div class="form-group">
													<label>Confirm password</label>
													<input type="password" name="confirmPassword" minlength="8" placeholder="********" class="form-control">
												</div>
												<div class="submit-section">
													<button class="btn btn-primary submit-btn" name="change_password">Update Password</button>
												</div>
											</form>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Password Info Tab -->
		
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Profile Modal -->
				<div id="profile_info" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">

								<h5 class="modal-title">Profile Information</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							<form action="changeprofile.php" method="post" enctype="multipart/form-data">

		<!-- SELECT PROFILE -->
		<?php 	include('config.php');
            
			$update_sql = "SELECT * FROM tbl_user WHERE u_id='{$_SESSION["A_ID"]}'";
			$update_result = mysqli_query($conn, $update_sql);
			if (mysqli_num_rows($update_result) > 0) {
				while ($update_row = mysqli_fetch_assoc($update_result)) 
				{
				$Uid = $update_row['u_id'];
				$Ufname = $update_row['u_fname'];
				$Umname = $update_row['u_mname'];
				$Ulname = $update_row['u_lname'];
				$Ucontact = $update_row['u_contact'];
				$Uaddress = $update_row['u_address'];
				$Uemail = $update_row['u_email'];
				}
			}
		?>


									<div class="row">
										<div class="col-md-12">
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle"></i>&nbsp; 
                                                <strong>REMINDER |</strong> &nbsp; Changes will be applied on your next login.
                                        </div>
											<div class="row">
												<div class="col-md-6">
														<label>Profile</label><br>
														<input type="file" name="u_photo" class="form-group" value="<?php echo $u_photo; ?>">
												</div>
												<div class="col-md-6">
												<div class="form-group">
														<label>Account Type</label>
														<input type="text" class="form-control" readonly="" value="<?php echo $_SESSION["A_Role"]; ?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>First Name</label>
														<input type="text" class="form-control" name="u_fname" value="<?php echo $Ufname; ?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Middle Name</label>
														<input type="text" class="form-control" name="u_mname" value="<?php echo $Umname; ?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" class="form-control" name="u_lname" value="<?php echo $Ulname; ?>">
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group">
														<label>Email</label>
														<input type="text" class="form-control" name="u_email" value="<?php echo $Uemail; ?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Phone</label>
														<input type="text" class="form-control" name="u_contact" value="<?php echo $Ucontact; ?>">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Address</label>
												<textarea name="u_address" id="" class="form-control" cols="10" rows="5"><?php echo $Uaddress; ?></textarea>
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn" name="update_data">Update Profile</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Profile Modal -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
		<script src="assets/js/app.js"></script>
		
		<script>
			function triggerClick(e) {
			document.querySelector('#profileImage').click();
			}
				function displayImage(e) {
				if (e.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e){
					document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
					}
					reader.readAsDataURL(e.files[0]);
				}
			}
	</script>
    </body>
</html>
<!-- ======= End package/admin/PROFILE.PHP ======= -->
