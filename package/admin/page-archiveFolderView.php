<!-- ======= Start package/admin/PAGE-ARCHIVEFOLDERVIEW.PHP ======= -->

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
        <title>Archive Files | RCNHS</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/rio.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/line-awesome.min.css">
		<link rel="stylesheet" href="assets/css/select2.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel = "stylesheet" type = "text/css" href = "assets/css/jquery.dataTables.css" />

    </head>
    <body onload="myFunction()">
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
								<a href="#" style="background-color: #FFA600;"><font color="black"><strong><i class="fa fa-th-large"></i> <span> Archive Files</span> <span class="menu-arrow"></span></strong></font></a>
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
								<h3 class="page-title">Archive File</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active">Teacher Documents</li>
									</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    <div class="alert alert-warning">
						<i class="fa fa-info-circle"></i>&nbsp; 
                            <strong>GUIDE |</strong> &nbsp; Manage Teacher Archive files. ( Search / Download ).
				    </div>

					<!-- Content Starts -->
					<div class="card">
						<div class="card-body">
							<ul class="nav nav-tabs nav-tabs-bottom">
								<li class="nav-item"><a class="nav-link" href="page-archiveTeacher.php">Document Table View</a></li>
								<li class="nav-item"><a class="nav-link active" href="page-archiveFolderView.php">Document Folder View</a></li>

							</ul>
						</div>
					</div>
					
					<?php
						require('config.php');

						if(isset($_POST['searchBtn'])
						) {
							$fromDate = $_POST['fromDate'];
							$ToDate   = $_POST['toDate'];

							$newFromDate = explode('/', $fromDate)[2].'-'.explode('/', $fromDate)[1].'-'.explode('/', $fromDate)[0];

							$newToDate = explode('/', $ToDate)[2].'-'.explode('/', $ToDate)[1].'-'.explode('/', $ToDate)[0];

							$query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE created_at BETWEEN '$newFromDate' AND '$newToDate'") or die(mysqli_error($conn));

						} else {
							$query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE u_role='TEACHER'") or die(mysqli_error($conn));
						}
					
					?>

				<?php include('config.php'); ?>
				<div class="row">				
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="card-box">
									<div class="table-responsive">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="page-archiveFolderView.php"><i class="fa fa-folder"></i></a></li>
                                            <li class="breadcrumb-item active">Folder</li>
                                            <?php if(isset($_GET['teacher_id'])){ ?>
                                                <li class="breadcrumb-item active"><?php echo $_GET['teacher_id']; ?></li>
                                            <?php } // end of if ?> 
                                            <?php if(isset($_GET['school_year'])){ ?>
                                                <li class="breadcrumb-item active"><?php echo $_GET['school_year']; ?></li>
                                            <?php } // end of if ?> 
											<?php if(isset($_GET['classification'])){ ?>
                                                <li class="breadcrumb-item active"><?php echo $_GET['classification']; ?></li>
                                            <?php } // end of if ?> 
                                        </ul>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-6 col-xl-12">
                                            <h3>
												<?php include('config.php');

												if(isset($_GET['teacher_id'])){

													if(isset($_GET['school_year'])){

														if(isset($_GET['classification'])){

															$query = "SELECT *  FROM tbl_teacherdocuments WHERE tdoc_schoolyear='".$_GET['school_year']."' AND user_id='".$_GET['teacher_id']."'";
                                                        // echo $query;
                                                        // die();
                                                        $result=mysqli_query($conn,$query); ?>
                                                        <div class="col-md-12">
															<small>
																<table id="table" class="table">
																	<thead>
																		<tr>
																			<th>Name</th>
																			<th class="text-left">Type</th>
																			<th class="text-right">Size</th>
																			<th class="text-center">Date</th>
																		</tr>
																	</thead>
																	<tbody>
																<?php while($fetch = mysqli_fetch_array($result) ){ ?>


																<?php
																	$array = explode(".",$fetch['tdoc_path']);
																	$extension = $array[count($array)-1];

																	switch($extension){
																		case 'png':
																		case 'jpg':
																		case 'jpeg':
																			$icon = 'file-image';
																			break;
																		case 'pdf':
																			$icon = 'file-pdf';
																			break;
																		case 'docx':
																			$icon = 'file-word';
																			break;
																		case 'ppt':
																		case 'pptx':
																			$icon = 'file-powerpoint';
																			break;
																		case 'csv':
																			$icon = 'file-csv';
																			break;
																		case 'xls':
																			$icon = 'file-excel';
																			break;
																		case 'mp4':
																			$icon = 'file-video';
																			break;
																		case 'mp3':
																			$icon = 'file-audio';
																			break;
																		default:
																			$icon = 'file';
																			break;
																	}
																?>


																		<tr class="del_tdoc<?php echo $fetch['tdoc_id']?>">
																			<td>
																				<?php
																					$array = explode(".",$fetch['tdoc_path']);
																					$extension = $array[count($array)-1];
																				?>
																				<i class="la la-<?php echo $icon; ?> la-2x" style="color: #FFA600;"></i>&nbsp;
																				<a href="<?php echo $fetch['tdoc_path'] ?>" title="<?php echo $fetch['tdoc_description'] ?>" download="<?php echo $fetch['tdoc_title'] . ".".$extension?>">
																					<?php echo $fetch['tdoc_title'] .".".$fetch['tdoc_filetype'] ?>
																				</a>
																			</td>
																			<td class="text-left"></i><?php echo strtoupper($fetch['tdoc_filetype']) ?> File</td>
																			<td class="text-right"><?php echo number_format($fetch['tdoc_filesize']) ?></td>
																			<td class="text-center"><?php echo $fetch['created_at'] ?></td>
																		
																				<?php } ?>
																			</tbody>
																		</table>
															</small>
                                                        </div>
                                                        
														<?php
                                                    }else{
															$query = "SELECT DISTINCT(tdoc_classification) AS tdoc_classification  FROM tbl_teacherdocuments WHERE tdoc_schoolyear='".$_GET['school_year']."'";
															
															$result=mysqli_query($conn,$query);

															while($fetch = mysqli_fetch_array($result) ){
															?>
																<a title="<?php echo $fetch['tdoc_classification']; ?>" href="?teacher_id=<?php echo $_GET['teacher_id']."&school_year=".$_GET['school_year']."&classification=".$fetch['tdoc_classification'];?>" 
																	style="text-align: center; 
																		display: block; 
																		color: #FFA600; 
																		float: left; 
																		margin-left: 30px;">
																<i class="fa fa-folder fa-5x"></i><br/>
																	<p style="color: black;"><?php echo $fetch['tdoc_classification']; ?></p>
																</a>
															<?php 
															} //end of while..
														}

													}else{
														$query = "SELECT DISTINCT(tdoc_schoolyear) AS sy, tbl_teacherdocuments.* from tbl_teacherdocuments where user_id='".$_GET['teacher_id']."' GROUP BY tdoc_schoolyear";
														
														$result=mysqli_query($conn, $query);

														while($fetch = mysqli_fetch_array($result) ){
														?>
															<a title="<?php echo $fetch['tdoc_schoolyear']; ?>" href="?teacher_id=<?php echo $fetch['user_id']; ?>&school_year=<?php echo $fetch['tdoc_schoolyear']; ?>"
																style="text-align: center; 
																		display: block; 
																		color: #FFA600; 
																		float: left; 
																		margin-left: 30px;">
															<i class="fa fa-folder fa-5x"></i><br/>
																<p style="color: black;"><?php echo $fetch['tdoc_schoolyear']; ?></p>
															</a>
														<?php
														} // end of while..
													}

												}else{
													$result=mysqli_query($conn,"SELECT * from tbl_user WHERE u_role='TEACHER'");

													while($fetch = mysqli_fetch_array($result) ){ 
														$charat = substr($fetch['u_mname'], 0, 1);
														$name = $fetch['u_fname'] . ' ' . $charat . '. ' . $fetch['u_lname'];
													?>
														<a title="<?php echo $name; ?>" href="?teacher_id=<?php echo $fetch['u_id']; ?>" 
															style="text-align: center; 
																	display: block; 
																	color: #FFA600; 
																	float: left; 
																	margin-left: 30px;">
														<i class="fa fa-folder fa-5x"></i><br/>
															<p style="color: black;font-size: 12px;"><?php echo $name; ?></p>
														</a>
													<?php
													} // end of while..
												}
												?>
                                            </h3>
                                        </div>
                                    </div>

									</div>
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
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/app.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.btn-delete').on('click', function(){
					var tdoc_id = $(this).attr('id');
					$("#modal_confirm").modal('show');
					$('#btn_yes').attr('name', tdoc_id);
				});
				$('#btn_yes').on('click', function(){
					var id = $(this).attr('name');
					$.ajax({
						type: "POST",
						url: "delete-teacherDocument.php",
						data:{
							tdoc_id: id
						},
						success: function(){
							$("#modal_confirm").modal('hide');
							$(".del_tdoc" + id).empty();
							$(".del_tdoc" + id).html("<td colspan='6'><center class='text-danger'>Deleting...</center></td>");
							setTimeout(function(){
								$(".del_tdoc" + id).fadeOut('slow');
							}, 1000);
						}
					});
				});
			});
		</script>
		
		<script src = "assets/js/jquery.dataTables.js"></script>
		<script type = "text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			} );
		</script>
		
    </body>
</html>
<!-- ======= End package/admin/PAGE-ARCHIVEFOLDERVIEW.PHP ======= -->
