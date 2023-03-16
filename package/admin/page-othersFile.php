<!-- ======= Start package/admin/PAGE-OTHERFILE.PHP ======= -->

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
        <title>Other Files | RCNHS</title>
		
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
								<h3 class="page-title">Other Files</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Other Files</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
					<div class="row filter-row">
					<?php
						$host = 'localhost';
						$db = 'rcnhsdb';
						$user = 'root';
						$pass = '';

						$connect = new PDO("mysql:host=$host; dbname=$db",$user,$pass);
						$sql = "SELECT folder_name FROM tbl_folder";

						try{
							$stmt = $connect->prepare($sql);
							$stmt->execute();
							$results = $stmt->fetchAll();
						}
							catch(Exception $ex){
								echo($ex->getMessage());
							}
					
					?>
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
									<option selected disabled value="">&larr; Select &rarr;</option>
									<?php foreach($results as $output) {?>
									<option><?php echo $output["folder_name"]; ?></option>
									<?php } ?>
								</select>
								<label class="focus-label">Folder</label>
							</div>
						</div>
						<div class="col-sm-12 col-md-6">  
						   <div class="row">  
							   <div class="col-md-6 col-sm-6">  
									<div class="form-group form-focus">
										<div class="cal-icon">
											<input class="form-control floating datetimepicker" type="text">
										</div>
										<label class="focus-label">From</label>
									</div>
								</div>
							   <div class="col-md-6 col-sm-6">  
									<div class="form-group form-focus">
										<div class="cal-icon">
											<input class="form-control floating datetimepicker" type="text">
										</div>
										<label class="focus-label">To</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div>
					<!-- /Search Filter -->

				<?php include('config.php'); ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="card-box">
									<div class="table-responsive">

		<div id = "content">
			<table id = "table" class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Folder</th>
						<th class="text-center">Filename</th>
						<th class="text-center">Size</th>
						<th class="text-center">Type</th>
						<th class="text-center">Date Uploaded</th>
						<th class="text-center">Permission</th>
						<th class="text-center">Uploader</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = mysqli_query($conn, "SELECT * FROM `tbl_file`") or die(mysqli_error($conn));
						while($fetch = mysqli_fetch_array($query)){
					?>
						<tr class="del_file<?php echo $fetch['file_id']?>">
							<td class="text-center">-----</td>
							<td class="text-center"><?php echo $fetch['file_name']?></td>
							<td class="text-center"><?php echo $fetch['file_size']?></td>
							<td class="text-center"><?php echo $fetch['file_type']?></td>
							<td class="text-center"><?php echo $fetch['file_uploaded']?></td>
							<td class="text-center"><?php echo $fetch['file_privacy']?></td>
							<td class="text-center">-----</td>
							<td class="text-center">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" data-toggle="modal" data-target="#download_client"><i class="fa fa-download m-r-5"></i> Download</a>
											<a class="dropdown-item" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['file_id']?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item btn-delete" id="<?php echo $fetch['file_id']?>" type="button"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
								</div>
							</td>
						</tr>

			<!-- Update File -->
			<div class="modal fade" id="edit_modal<?php echo $fetch['file_id']?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form method="POST" action="update-othersFile.php">	
							<div class="modal-header">
								<h4 class="modal-title">Update Student</h4>
							</div>
							<div class="modal-body">
								<div class="col-md-3"></div>
								<div class="col-md-6">
									<div class="form-group">
									<input type="hidden" name="file_id" value="<?php echo $fetch['file_id']?>" class="form-control"/>
										<select class="form-control" name="file_privacy" required>
											<option selected disabled value="">&larr; Select &rarr;</option>
											<option value="Private">Only me</option>
											<option value="Public">Public</option>
										</select>
									</div>
									<br />
								</div>
							</div>
							<div style="clear:both;"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
								<button name="update" class="btn btn-warning" ><span class="glyphicon glyphicon-save"></span> Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /Update File -->
					<?php } ?>
				</tbody>
			</table>
		</div>

			<!-- Delete File -->
			<div class="modal fade" id="modal_confirm" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title">Delete</h3>
						</div>
						<div class="modal-body">
							<center><h4 class="text-danger">Are you sure you want to delete this data?</h4></center>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-success" id="btn_yes">Yes</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete File -->

			<!-- Upload File -->
			<div class="modal fade" id="form_modal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form method="POST" action="add-othersFile.php.php">	
							<div class="modal-header">
								<h4 class="modal-title">Add Student</h4>
							</div>
							<div class="modal-body">
								<div class="col-md-3"></div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Student no</label>
										<input type="number" name="stud_no" class="form-control" required="required"/>
									</div>
									<br />
								</div>
							</div>
							<div style="clear:both;"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
								<button name="save" class="btn btn-success" ><span class="glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /Upload File -->

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
					var stud_id = $(this).attr('id');
					$("#modal_confirm").modal('show');
					$('#btn_yes').attr('name', stud_id);
				});
				$('#btn_yes').on('click', function(){
					var id = $(this).attr('name');
					$.ajax({
						type: "POST",
						url: "delete_student.php",
						data:{
							stud_id: id
						},
						success: function(){
							$("#modal_confirm").modal('hide');
							$(".del_file" + id).empty();
							$(".del_file" + id).html("<td colspan='6'><center class='text-danger'>Deleting...</center></td>");
							setTimeout(function(){
								$(".del_file" + id).fadeOut('slow');
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
<!-- ======= End package/admin/PAGE-OTHERFILE.PHP ======= -->
