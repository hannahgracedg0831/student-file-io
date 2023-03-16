<!-- ======= Start package/teacher/PAGE-FILESCANNER.PHP ======= -->

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
        <title>File Scanner | RCNHS</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/rio.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/line-awesome.min.css">
		<link rel="stylesheet" href="assets/css/select2.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel = "stylesheet" type = "text/css" href = "assets/css/jquery.dataTables.css" />
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
							<li><a href="page-fileScanner.php" style="background-color: #FFA600;"><font color="black"><strong><i class="fa fa-th-large"></i> <span> Scanner</span></strong></font></a></li>
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
								<h3 class="page-title">Scanner</h3>
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
										<li class="breadcrumb-item active">Scanner</li>
									</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    <div class="alert alert-warning">
						<i class="fa fa-info-circle"></i>&nbsp; 
                            <strong>GUIDE |</strong> &nbsp; Manage Scanned files. ( Search / Scan / Download / Delete ).
				    </div>
					
					<?php include('config.php'); ?>
				<div class="row">				
					<div class="col-md-12">
							
<div class="small-box">
	<div class="container-fluid">

		<div class="row">
			<div class="col">
				<center>
					<div id="images"></div>
					<div id="server_response"></div>
				</center>
			</div>
			<div class="row m-2">
				<div class="col">
					<button class="btn btn-warning" type="button" onclick="scanToJpg();">Scan</button>
				</div>
				<div class="col">
					<form id="form1" action="scan/db_Scanner.php?action=dump" method="POST" enctype="multipart/form-data" target="_blank" >
                        
						<input type="hidden" id="sample-field" name="sample-field" value="Test scan"/>
						<input class="btn btn-warning" type="button" value="Upload" onclick="submitFormWithScannedImages();">
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
									</div>
								</div>

							<?php include('config.php'); 
								$query = mysqli_query($conn, "SELECT * FROM tbl_scanfile WHERE user_id='".$_SESSION['T_ID']."' ") or die(mysqli_error($conn));
							?>
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
						<th class="text-center">Download</th>
						<th class="text-center">Path</th>
						<th class="text-center">Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($fetch = mysqli_fetch_array($query)){
							//   }
					?>
						<tr class="del_scan<?php echo $fetch['scanFile_id']?>">
							<td class="text-center">
								<?php
									$array = explode(".",$fetch['Path']);
								?>
								<a title="Click this to download" href="<?php echo $fetch['Path'] ?>" download="<?php echo $fetch['Path']?>">
									<i class="fa fa-download"></i>
								</a>
							</td>
							<td class="text-center"><?php echo $fetch['Path']?></td>
							<td class="text-center"><?php echo $fetch['created_at']?></td>
							<td class="text-center">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item btn-delete" id="<?php echo $fetch['scanFile_id']?>" type="button"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
								</div>
							</td>
						</tr>
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
					var scanFile_id = $(this).attr('id');
					$("#modal_confirm").modal('show');
					$('#btn_yes').attr('name', scanFile_id);
				});
				$('#btn_yes').on('click', function(){
					var id = $(this).attr('name');
					$.ajax({
						type: "POST",
						url: "delete-fileScanner.php",
						data:{
							scanFile_id: id
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
<!-- ======= End package/teacher/PAGE-FILESCANNER.PHP ======= -->
