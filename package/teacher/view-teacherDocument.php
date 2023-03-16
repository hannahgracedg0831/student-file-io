<!-- ======= Start package/teacher/VIEW-TEACHERDOCUMENT.PHP ======= -->

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
							<li><a href="page-teacherDocument.php" style="background-color: #FFA600;"><font color="black"><strong><i class="fa fa-th-large"></i> <span> Archive Files</span></strong></font></a></li>
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
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Archive File</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active">Archive File</li>
									</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    <div class="alert alert-warning">
						<i class="fa fa-info-circle"></i>&nbsp; 
                            <strong>GUIDE |</strong> &nbsp; Manage Archive files. ( Search / Add / Edit / Download / Delete ).
				    </div>

					<!-- Content Starts -->
					<div class="card">
						<div class="card-body">
							<!-- <h4 class="card-title">Solid justified</h4> -->
							<ul class="nav nav-tabs nav-tabs-bottom">
								<li class="nav-item"><a class="nav-link" href="page-teacherDocument.php">Documents Table View</a></li>
								<li class="nav-item"><a class="nav-link active" href="view-teacherDocument.php">Documents Folder View</a></li>
								<!-- <li class="nav-item"><a class="nav-link" href="#">Archived </a></li> -->
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
							$query = mysqli_query($conn, "SELECT * FROM `tbl_teacherdocuments` WHERE created_at BETWEEN '$newFromDate' AND '$newToDate'") or die(mysqli_error($conn));

						} else {
							$query = mysqli_query($conn, "SELECT * FROM `tbl_teacherdocuments`") or die(mysqli_error($conn));
						}
					?>
					
<?php include('config.php'); ?>
				<div class="row">
					<div class="col-md-12">
						<form method="POST" action="add-teacherDocument.php" enctype=multipart/form-data>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="file" name="tdoc_file" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="tdoc_title" placeholder="Title" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="tdoc_description" placeholder="Description" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">

					<?php
						$host = "localhost";
						$user = "root";
						$pass = "";
						$db = "rcnhsdb";
						
						$connect = new PDO("mysql:host=$host; dbname=$db",$user,$pass);
						$sql = "SELECT doc_type FROM tbl_doctype WHERE doc_owner='Teacher'";
                        
						try{
							$stmt = $connect->prepare($sql);
							$stmt->execute();
							$results = $stmt->fetchAll();
						}
							catch(Exception $ex){
								echo($ex->getMessage());
							}
					?>

									<div class="form-group">
										<select class="form-control" name="doc_type" required>
											<option selected disabled value="">&larr; Select Document Classification &rarr;</option>
											<?php foreach($results as $output) {?>
											<option value="<?php echo $output["doc_type"]; ?>"><?php echo $output["doc_type"]; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" name="tdoc_tag" placeholder="File Tag" class="form-control"/>
									</div>
								</div>
							<div class="form-group">
								<button name="save" class="btn btn-success" >Save</button>
							</div>
						</form>
					</div>
						</div>
					</div>

				<?php include('config.php'); ?>
				<div class="row">				
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="card-box">
									<div class="table-responsive">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="view-teacherDocument.php"><i class="fa fa-folder"></i></a></li>
                                            <li class="breadcrumb-item active">Folder</li>
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

                                                if(isset($_GET['school_year'])){

                                                    if(isset($_GET['classification'])){

                                                        $query = "SELECT *  FROM tbl_teacherdocuments WHERE tdoc_schoolyear='".$_GET['school_year']."'";
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
																			<th class="text-center">Action</th>
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
																			<td class="text-center">	
																				<div class="dropdown dropdown-action">
																					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																						<div class="dropdown-menu dropdown-menu-right">
																							<a class="dropdown-item" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['tdoc_id']?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
																							<a class="dropdown-item btn-delete" id="<?php echo $fetch['tdoc_id']?>" type="button"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
																						</div>
																				</div>
																			</td>
																		<!-- Update File -->
																		<div class="modal fade" id="edit_modal<?php echo $fetch['tdoc_id']?>" aria-hidden="true">
																			<div class="modal-dialog modal-dialog-centered">
																				<div class="modal-content">
																					<form method="POST" action="update-teacherDocument.php">	
																						<div class="modal-header">
																							<h4 class="modal-title">Update</h4>
																						</div>
																						<div class="modal-body">
																							<div class="col-md-12">
																								<div class="row">
																									<div class="col-md-12">
																										<div class="form-group">
																											<input type="hidden" name="tdoc_id" value="<?php echo $fetch['tdoc_id']?>" class="form-control"/>
																											<label>Title</label>
																											<input type="text" name="tdoc_title" value="<?php echo $fetch['tdoc_title']?>" class="form-control"/>
																										</div>
																										<div class="form-group">
																											<label>Description</label>
																											<input type="text" name="tdoc_description" value="<?php echo $fetch['tdoc_description']?>" class="form-control"/>
																										</div>
																									

																				<?php
																					$host = "localhost";
																					$user = "root";
																					$pass = "";
																					$db = "rcnhsdb";

																					$connect = new PDO("mysql:host=$host; dbname=$db",$user,$pass);
																					$sql = "SELECT doc_type FROM tbl_doctype WHERE doc_owner='Teacher'";
																					
																					try{
																						$stmt = $connect->prepare($sql);
																						$stmt->execute();
																						$results = $stmt->fetchAll();
																					}
																						catch(Exception $ex){
																							echo($ex->getMessage());
																						}
																				?>

																								<div class="form-group">
																									<label>Document Classification</label>
																									<select class="form-control" name="tdoc_classification" value="<?php echo $fetch['tdoc_classification']?>" required>
																										<option selected disabled value="">&larr; Select &rarr;</option>
																										<?php foreach($results as $output) {?>
																										<option <?php echo ($output["doc_type"]==$fetch['tdoc_classification']) ? " selected " : ' '; ?>value="<?php echo $output["doc_type"]; ?>"><?php echo $output["doc_type"]; ?></option>
																										<?php } ?>
																									</select>
																								</div>
																								<div class="form-group">
																									<label>Tag</label>
																									<input type="text" name="tdoc_tag" value="<?php echo $fetch['tdoc_tag']?>" class="form-control"/>
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
                                                    }else{

                                                        $query = "SELECT DISTINCT(tdoc_classification) AS tdoc_classification  FROM tbl_teacherdocuments WHERE tdoc_schoolyear='".$_GET['school_year']."'";
                                                        // echo $query;
                                                        // die();
                                                        $result=mysqli_query($conn,$query);

                                                        while($fetch = mysqli_fetch_array($result) ){
                                                        ?>
                                                            <a title="<?php echo $fetch['tdoc_classification']; ?>" href="?school_year=<?php echo $_GET['school_year'] . "&classification=". $fetch['tdoc_classification']; ?>" 
                                                                style="text-align: center; 
                                                                    display: block; 
                                                                    color: #FFA600; 
                                                                    float: left; 
                                                                    margin-left: 30px;">
                                                            <i class="fa fa-folder fa-5x"></i><br/>
                                                                <p style="color: black;"><?php echo $fetch['tdoc_classification']; ?></p>
                                                            </a>
                                                        <?php 
                                                        } //end of while

                                                    } //end of if else

                                                }else{
                                                    $result=mysqli_query($conn,"SELECT DISTINCT(tdoc_schoolyear) AS tdoc_schoolyear from tbl_teacherdocuments");

                                                    while($fetch = mysqli_fetch_array($result) ){
                                                    ?>
                                                        <a title="<?php echo $fetch['tdoc_schoolyear']; ?>" href="?school_year=<?php echo $fetch['tdoc_schoolyear']; ?>" 
                                                            style="text-align: center; 
                                                                   display: block; 
                                                                   color: #FFA600; 
                                                                   float: left; 
                                                                   margin-left: 30px;">
                                                        <i class="fa fa-folder fa-5x"></i><br/>
                                                            <p style="color: black;"><?php echo $fetch['tdoc_schoolyear']; ?></p>
                                                        </a>
                                                    <?php 
                                                    } //end of while
                                                    
                                                } // end of if else
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
<!-- ======= End package/teacher/VIEW-TEACHERDOCUMENT.PHP ======= -->
