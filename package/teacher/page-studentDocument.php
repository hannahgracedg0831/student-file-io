<!-- ======= Start package/teacher/PAGE-STUDENTDOCUMENT.PHP ======= -->

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
        <title>Manage Student | RCNHS</title>
		
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
								<h3 class="page-title">Students</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active">Students</li>
									</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    <div class="alert alert-warning">
						<i class="fa fa-info-circle"></i>&nbsp; 
                            <strong>GUIDE |</strong> &nbsp; Manage Student Advisory. ( Search / Upload ).
				    </div>
                    

					<!-- Content Starts -->
					<div class="card">
						<div class="card-body">
							<!-- <h4 class="card-title">Solid justified</h4> -->
							<ul class="nav nav-tabs nav-tabs-bottom">
								<li class="nav-item"><a class="nav-link active" href="page-studentDocument.php">Student List</a></li>
								<li class="nav-item"><a class="nav-link" href="view-studentDocument.php">Student Documents</a></li>
                                <li class="nav-item"><a class="nav-link" href="scan-studentDocument.php">Student Scanned Documents</a></li>
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

							$query = mysqli_query($conn, "SELECT * FROM `tbl_student` WHERE created_at BETWEEN '$newFromDate' AND '$newToDate'") or die(mysqli_error($conn));

						} else {
							$query = mysqli_query($conn, "SELECT * FROM `tbl_student` WHERE year_section = '".$_SESSION['T_yearsection']."'") or die(mysqli_error($conn));
						}
					?>

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
						<th class="text-center">LRN</th>
						<th class="text-center">Name</th>
						<th class="text-center">Gender</th>
						<th class="text-center">Year and Section</th>
						<th class="text-center">Action</th>
                        
					</tr>
				</thead>
				<tbody>
					<?php while($fetch = mysqli_fetch_array($query) ){
                        $charat = substr($fetch['std_mname'], 0, 1);
                        $name = $fetch['std_fname'] . ' ' . $charat . '. ' . $fetch['std_lname'];
                        ?>
                        
						<tr>
							<td class="text-center"><?php echo $fetch['std_lrn'] ?></td>
							<td class="text-center"><?php echo $name ?></td>
							<td class="text-center"><?php echo $fetch['std_gender'] ?></td>
                            <td class="text-center"><?php echo $fetch['year_section'] ?></td>

							<td class="text-center">	
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#scan_modal" onclick="setLrn('<?php echo $fetch['std_lrn']?>')"><i class="fa fa-camera m-r-5"></i> Scan</a>

										<a class="dropdown-item" data-toggle="modal" data-target="#upload_modal<?php echo $fetch['std_id']?>"><i class="fa fa-upload m-r-5"></i> Upload Files</a>
										</div>
								</div>
							</td>
							</tr>

<!-- Upload File -->
<div class="modal fade" id="upload_modal<?php echo $fetch['std_id']?>" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" action="add-studentDocument.php" enctype="multipart/form-data">	
				<div class="modal-header">
					<h4 class="modal-title">Upload Student Files</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-3"></div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="hidden" name="std_id" value="<?php echo $fetch['std_id']?>" class="form-control"/>
									<label>LRN</label>
									<input type="text" name="std_lrn" value="<?php echo $fetch['std_lrn']?>" class="form-control" readonly/>
								</div>
								<div class="form-group">
									<label>File</label>
									<input type="file" name="sdoc_file" class="form-control" required/>
								</div>
								<div class="form-group">
									<label>Title</label>
									<input type="text" name="sdoc_title" class="form-control" required/>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea type="text" name="sdoc_description" class="form-control" required></textarea>
								</div>
					<?php
						$host = "localhost";
						$user = "root";
						$pass = "";
						$db = "rcnhsdb";

						$connect = new PDO("mysql:host=$host; dbname=$db",$user,$pass);
						$sql = "SELECT doc_type FROM tbl_doctype WHERE doc_owner='Student'";
                        
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
										<select class="form-control" name="doc_type" required>
											<option selected disabled value="">&larr; Select &rarr;</option>
											<?php foreach($results as $output) {?>
											<option value="<?php echo $output["doc_type"]; ?>"><?php echo $output["doc_type"]; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Tag</label>
										<input type="text" name="sdoc_tag" class="form-control" required/>
									</div>
						
						<br />
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button name="upload" class="btn btn-warning" ><span class="glyphicon glyphicon-save"></span> Save</button>
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

<!-- Scan File -->

                                                            


                                                            <script>
                                                                const setLrn = (lrn) => {
                                                                    document.querySelector('#stdLrn').value = lrn;
                                                                }
                                                            </script>

                                                        <div class="modal fade" id="scan_modal<?php echo $fetch['std_id']?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <form id="form1" action="add-studentScanDocument.php?action=dump" method="POST" enctype="multipart/form-data" target="_blank" >
                                                                        <input type="hidden" name="scan_id" value="<?php echo $fetch['scan_id']?>" class="form-control"/>
                                                                        <input id="stdLrn" type="text" name="student_lrn" class="form-control" readonly/>
                                                                        
                                
                                                                        
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Scan Student Files</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="col-md-3"></div>
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                    <div class="row">				
                                                                            <div class="col-md-12">
                                                                                    
                                                                                                <div class="small-box">
                                                                                                    <center>
                                                                                                        <div id="server_response"></div>
                                                                                                        <div id="images"></div>
                                                                                                    </center>
                                                                                                    <div class="container-fluid">

                                                                                                        <div class="row">
                                                                                                            <div class="row m-2">
                                                                                                                <div class="col">
                                                                                                                    <button class="btn btn-warning" type="button" onclick="scanToJpg();">Scan</button>
                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                        <input type="hidden" id="sample-field" name="sample-field" value="Test scan"/>
                                                                                                                        <input class="btn btn-warning" type="button" value="Upload" onclick="submitFormWithScannedImages();"/>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                
                                                                                <br />
                                                                            </div>
                                                                        </div>
                                                                        <div style="clear:both;"></div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Scan File -->



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

		<script src = "assets/js/jquery.dataTables.js"></script>
		<script type = "text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			} );
		</script>

        <script src="https://cdn.asprise.com/scannerjs/scanner.js" type="text/javascript"></script>

<script>
	/** Initiates a scan */
	function scanToJpg() {
		scanner.scan(displayImagesOnPage,
				{
					"output_settings": [
						{
							"type": "return-base64",
							"format": "jpg"
						}
					]
				}
		);
	}

	/** Processes the scan result */
	function displayImagesOnPage(successful, mesg, response) {
		if(!successful) { // On error
			console.error('Failed: ' + mesg);
			return;
		}

		if(successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
			console.info('User cancelled');
			return;
		}

		var scannedImages = scanner.getScannedImages(response, true, false); // returns an array of ScannedImage
		for(var i = 0; (scannedImages instanceof Array) && i < scannedImages.length; i++) {
			var scannedImage = scannedImages[i];
			processScannedImage(scannedImage);
		}
	}

	/** Images scanned so far. */
	var imagesScanned = [];

	/** Processes a ScannedImage */
	function processScannedImage(scannedImage) {
		imagesScanned.push(scannedImage);
		var elementImg = scanner.createDomElementFromModel( {
			'name': 'img',
			'attributes': {
				'class': 'scanned',
				'src': scannedImage.src
			}
		});
		document.getElementById('images').appendChild(elementImg);
	}

	/** Upload scanned images by submitting the form */
	function submitFormWithScannedImages() {
		if (scanner.submitFormWithImages('form1', imagesScanned, function (xhr) {
			if (xhr.readyState == 4) { // 4: request finished and response is ready
				document.getElementById('server_response').innerHTML = "<div class='alert alert-info'><h2>Upload successfully... </h2></div>" + xhr.responseText;
				document.getElementById('images').innerHTML = ''; 
				imagesScanned = [];
				window.location.reload();
			}
		})) {
			document.getElementById('server_response').innerHTML = "<div class='alert alert-warning'>Submitting, please stand by ...</div>";
		} else {
			document.getElementById('server_response').innerHTML = "<div class='alert alert-danger'>Form submission cancelled. Please scan first.</div>";
		}
	}

</script>

<style>
	img.scanned {
		height: 200px; /** Sets the display size */
		margin-right: 12px;
	}

	div#images {
		margin-top: 20px;
	}
</style>
		
    </body>
</html>
<!-- ======= End package/teacher/PAGE-STUDENTDOCUMENT.PHP ======= -->
