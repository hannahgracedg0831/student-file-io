<!-- ======= Start package/teacher/SCAN-STUDENTDOCUMENT.PHP ======= -->

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
        <title>Student Documents | RCNHS</title>
		
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
							<li><a href="index.php"><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>
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
							<li><a href="page-studentDocument.php" style="background-color: #FFA600;"><font color="black"><strong><i class="fa fa-th-large"></i> <span> Manage Student </span></strong></font></a></li>

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
								<h3 class="page-title">Student Documents</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active">Student Documents</li>
									</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    <div class="alert alert-warning">
						<i class="fa fa-info-circle"></i>&nbsp; 
                            <strong>GUIDE |</strong> &nbsp; Manage Student Advisory Files. ( Search / Download / Delete ).
				    </div>

					<!-- Content Starts -->
					<div class="card">
						<div class="card-body">
							<!-- <h4 class="card-title">Solid justified</h4> -->
							<ul class="nav nav-tabs nav-tabs-bottom">
								<li class="nav-item"><a class="nav-link" href="page-studentDocument.php">Student List</a></li>
								<li class="nav-item"><a class="nav-link" href="view-studentDocument.php">Student Documents</a></li>
                                <li class="nav-item"><a class="nav-link active" href="scan-studentDocument.php">Student Scanned Documents</a></li>
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
							$query = mysqli_query($conn, "SELECT * FROM `tbl_studentdocuments` WHERE created_at BETWEEN '$newFromDate' AND '$newToDate'") or die(mysqli_error($conn));

						} else {
							$query = mysqli_query($conn, "SELECT * FROM `tbl_studentdocuments`") or die(mysqli_error($conn));
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
                                            <li class="breadcrumb-item"><a href="scan-studentDocument.php"><i class="fa fa-folder"></i></a></li>
                                            <li class="breadcrumb-item active">Folder</li>
											<?php if(isset($_GET['lrn'])){ ?>
                                                <li class="breadcrumb-item active"><?php echo $_GET['lrn']; ?></li>
                                            <?php } // end of if ?>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-lg-6 col-xl-12">
                                            <h3>
                                                <?php include('config.php');

                                                if(isset($_GET['scanyearsection'])){

                                                    if(isset($_GET['lrn'])){
                                                        $query = "SELECT *  FROM tbl_studentScanfile WHERE scan_yearsection='".$_SESSION['T_yearsection']."' AND student_lrn='".$_GET['lrn']."'";
                                                      
                                                        $result=mysqli_query($conn,$query); ?>
                                                        <div class="col-md-12">
															<small>
																<table id="table" class="table">
																	<thead>
																		<tr>
                                                                            <th class="text-center">Download</th>
																			<th class="text-center">Path</th>
																			<th class="text-center">Date</th>
																			<th class="text-center">Action</th>
																		</tr>
																	</thead>
																	<tbody>
																<?php while($fetch = mysqli_fetch_array($result) ){ ?>


																		<tr class="del_scan<?php echo $fetch['scan_id']?>">
                                                                            <td class="text-center">
                                                                                <?php
                                                                                    $array = explode(".",$fetch['scan_path']);
                                                                                ?>
                                                                                <a title="Click this to download" href="<?php echo $fetch['scan_path'] ?>" download="<?php echo $fetch['scan_path']?>">
                                                                                    <i class="fa fa-download"></i>
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center"><?php echo $fetch['scan_path'] ?></td>
																			<td class="text-center"><?php echo $fetch['created_at'] ?></td>
																			<td class="text-center">	
																				<div class="dropdown dropdown-action">
																					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																						<div class="dropdown-menu dropdown-menu-right">
																							<a class="dropdown-item btn-delete" id="<?php echo $fetch['scan_id']?>" type="button"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
																						</div>
																				</div>
																			</td>
																				<?php } ?>
																			</tbody>
																		</table>
															</small>
                                                        </div>
                                                        
														<!-- Delete File -->
														<div class="modal fade" id="modal_confirm" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
																	<div class="modal-header">
																		<h3 class="modal-title">Delete</h3>
																	</div>
																	<div class="modal-body">
																		<center><h4 class="text-danger">Are you sure you want to delete this file?</h4></center>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																		<button type="button" class="btn btn-success" id="btn_yes">Yes</button>
																	</div>
																</div>
															</div>
														</div>
														<!-- /Delete File -->
                                                        
														<?php
                                                    }

                                                }else{

													$query = "SELECT * FROM tbl_student WHERE year_section='".$_SESSION['T_yearsection']."'";
													$result = mysqli_query($conn, $query) or die( mysqli_error($conn));

													while($fetch = mysqli_fetch_array($result) ){
														$charat = substr($fetch['std_mname'], 0, 1);
              											$name = $fetch['std_fname'] . ' ' . $charat . '. ' . $fetch['std_lname'];
													?>
														<a title="<?php echo $name; ?>" href="?scanyearsection=<?php echo "&lrn=". $fetch['std_lrn']; ?>" 
															style="text-align: center; 
																display: block; 
																color: #FFA600; 
																float: left; 
																margin-left: 30px;">
														<i class="fa fa-folder fa-5x"></i><br/>
															<p style="color: black; 
																	white-space: nowrap;
																	overflow: hidden;
																	text-overflow: ellipsis;
																	width: 150px;
																	font-size: 12px;"><?php echo $name; ?></p>
														</a>
													<?php 
													} //end of while

												} //end of if else
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
					var scan_id = $(this).attr('id');
					$("#modal_confirm").modal('show');
					$('#btn_yes').attr('name', scan_id);
				});
				$('#btn_yes').on('click', function(){
					var id = $(this).attr('name');
					$.ajax({
						type: "POST",
						url: "delete-studentScanDocument.php",
						data:{
							scan_id: id
						},
						success: function(){
							$("#modal_confirm").modal('hide');
							$(".del_scan" + id).empty();
							$(".del_scan" + id).html("<td colspan='6'><center class='text-danger'>Deleting...</center></td>");
							setTimeout(function(){
								$(".del_scan" + id).fadeOut('slow');
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
<!-- ======= End package/teacher/SCAN-STUDENTDOCUMENT.PHP ======= -->
