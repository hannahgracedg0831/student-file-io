<!-- ======= Start package/admin/PAGE-PENDINGACCOUNT.PHP ======= -->

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
        <title>Pending Account | RCNHS</title>
		
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
							<li><a href="page-pendingAccount.php" style="background-color: #FFA600;"><font color="black"><strong><i class="fa fa-users"></i> <span> Pending Account</span></strong></font></a></li>
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
								<h3 class="page-title">Pending Account</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active">Pending Account</li>
									</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    <div class="alert alert-warning">
						<i class="fa fa-info-circle"></i>&nbsp; 
                            <strong>GUIDE |</strong> &nbsp; Manage Teachers Pending Account. ( Search / Edit(Active) / Delete ).
                            &nbsp;<a href="page-teacherList.php" class="btn btn-success" >Manage Teacher</a>
				    </div>

				<?php include('config.php'); ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="card-box">
									<div class="table-responsive">

									<div id = "content">
			<!-- <button class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Student</button> -->
			<table id = "table" class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Name</th>
						<th class="text-center">Email</th>
						<th class="text-center">Address</th>
						<th class="text-center">Contact</th>
						<th class="text-center">Role</th>
						<th class="text-center">Status</th>
						<th class="text-center">Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE u_status='Pending'") or die(mysqli_error($conn));
						while($fetch = mysqli_fetch_array($query)){
							$charat = substr($fetch['u_mname'], 0, 1);
              				$name = $fetch['u_fname'] . ' ' . $charat . '. ' . $fetch['u_lname'];

							//   if($fetch['u_status'] == 'active'){
							// 	$status = '<span class="badge bg-inverse-success">Active</span>';
							//   }else if($fetch['u_status'] == 'pending'){
							$status = '<span class="badge bg-inverse-danger">Pending</span>';
							//   }
					?>
						<tr class="del_pending<?php echo $fetch['u_id']?>">
							<td class="text-center"><?php echo $name; ?></td>
							<td class="text-center"><?php echo $fetch['u_email']?></td>
							<td class="text-center"><?php echo $fetch['u_address']?></td>
							<td class="text-center"><?php echo $fetch['u_contact']?></td>
							<td class="text-center"><?php echo $fetch['u_role']?></td>
                            <td class="text-center"><?php echo $status?></td>
							<td class="text-center"><?php echo $fetch['created_at']?></td>
							<td class="text-center">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['u_id']?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item btn-delete" id="<?php echo $fetch['u_id']?>" type="button"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
								</div>
							</td>
						</tr>

			<!-- Update File -->
			<div class="modal fade" id="edit_modal<?php echo $fetch['u_id']?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form method="POST" action="update-pendingAccount.php">	
							<div class="modal-header">
								<h4 class="modal-title">Activate account</h4>
							</div>
							<div class="modal-body">
								<div class="col-md-3"></div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="hidden" name="u_id" value="<?php echo $fetch['u_id']?>" class="form-control"/>
										<label>Name</label>
										<input type="text" value="<?php echo $name?>" class="form-control" readonly=""/>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="text" value="<?php echo $fetch['u_email']?>" class="form-control" readonly=""/>
									</div>
									<div class="form-group">
										<label>Contact</label>
										<input type="text" value="<?php echo $fetch['u_contact']?>" class="form-control" readonly=""/>
									</div>
									<div class="form-group">
										<label>Address</label>
										<textarea type="text" class="form-control" readonly=""><?php echo $fetch['u_address']?></textarea>
									</div>
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="u_status" required>
											<option value="Active">Accept</option>
											<option selected value="Pending">Pending</option>
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
					var u_id = $(this).attr('id');
					$("#modal_confirm").modal('show');
					$('#btn_yes').attr('name', u_id);
				});
				$('#btn_yes').on('click', function(){
					var id = $(this).attr('name');
					$.ajax({
						type: "POST",
						url: "delete-pendingAccount.php",
						data:{
							u_id: id
						},
						success: function(){
							$("#modal_confirm").modal('hide');
							$(".del_pending" + id).empty();
							$(".del_pending" + id).html("<td colspan='6'><center class='text-danger'>Deleting...</center></td>");
							setTimeout(function(){
								$(".del_pending" + id).fadeOut('slow');
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
<!-- ======= End package/admin/PAGE-PENDINGACCOUNT.PHP ======= -->
