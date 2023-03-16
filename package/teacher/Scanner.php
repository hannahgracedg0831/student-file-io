<!-- ======= Start package/teacher/SCANNER.PHP ======= -->

<?php
  session_start();

  if (!isset($_SESSION['T_Admin'])) {
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
        <title>SCANNER | RCNHS</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/rio.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/line-awesome.min.css">
		<link rel="stylesheet" href="assets/css/select2.min.css">
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
	
					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="../images/<?php echo $_SESSION['T_Profile'];?>" alt="">
							<span class="status online"></span></span>
							<span><?php echo $_SESSION['T_Name']; ?></span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="profile.php">Account Setting</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.php">Account Setting</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
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
							<li><a href="file-manager.php"><i class="fa fa-archive"></i> <span> Archive Files</span></a></li>
							<li><a href="restore-backup.php"><i class="fa fa-database"></i> <span> Backup and Restore</span></a></li>
							<li><a href="other-file.php"><i class="fa fa-folder"></i> <span> Other Files</span></a></li>
					<hr>
						<!-- Account Settings -->
						<li class="menu-title"> 
								<span>Administration</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fa fa-user"></i> <span> Student </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="junior-high.php">Junior High</a></li>
									<li><a href="senior-high.php">Senior High</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fa fa-user"></i> <span> Teacher </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="#">Teaching</a></li>
									<li><a href="#">Non-Teaching</a></li>
								</ul>
							</li>
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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Scanner</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Scanner</li>
								</ul>
							</div>
							
							</div>
						</div>
					</div>
					<!-- /Page Header -->

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
                    document.getElementById('server_response').innerHTML = "<h2>Upload successfully... </h2>" + xhr.responseText;
                    document.getElementById('images').innerHTML = ''; 
                    imagesScanned = [];
					window.location.reload();
                }
            })) {
                document.getElementById('server_response').innerHTML = "Submitting, please stand by ...";
            } else {
                document.getElementById('server_response').innerHTML = "Form submission cancelled. Please scan first.";
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
</head>
<body>

<div class="small-box">
	<div class="container-fluid">
		<div class="card-header"><center><h2>Scan File</h2></center></div>

		<div class="row">
			<div class="col">
				<center>
					<div id="images"></div>
					<div id="server_response"></div>
				</center>
			</div>
			<div class="row m-2">
				<div class="col">
					<button class="btn btn-primary" type="button" onclick="scanToJpg();">Scan</button>
				</div>
				<div class="col">
					<form id="form1" action="scan/db_Scanner.php?action=dump" method="POST" enctype="multipart/form-data" target="_blank" >
						<input type="hidden" id="sample-field" name="sample-field" value="Test scan"/>
						<input class="btn btn-primary" type="button" value="Upload" onclick="submitFormWithScannedImages();">
					</form>

				</div>
			</div>
		</div>
	</div>
	<div class="row">
    <div class="col-md-9">
    	<div class="container">
        <div class="divScroll">
		<table class="table table-bordered table-striped" id="myTable">
		<thead class="thead-dark">
			<h3>RECENT</h3>
			<tr class="table-secondary">
			   <th class="text-center" scope="col">File Name</th>
			   <th class="text-center" scope="col">Image File</th>
				<!-- <th class="text-center" scope="col">Action</th> -->
			</tr>
		</thead>
			<?php
			include("config.php");
				$count=1;
				$sql="SELECT * FROM tbl_scanfile ORDER BY scanFile_id  DESC;";
				$result = mysqli_query($conn, $sql);
				
				while($row = mysqli_fetch_assoc($result)) { ?>
					<tr>
						<td class="text-center">
							<?php echo $row['Path']?>
						</td>
						<td>
							<center>
								<img class="img-thumbnail" src='scan/uploads/<?php echo $row['Path']?>' width="30%" height="30%" />
							</center>
						</td>	
						<td>
							<!-- <form method="POST">
								<input type="hidden" value="<?php echo $row['scanFile_id'];?>">
								<a class="btn btn-danger" href="scan/delete.php?id=<?php echo $row["scanFile_id"]; ?>"><i class="fa fa-trash"></i></a>
							</form> -->
						</td>
					</tr>
				<?php $count++; } 

				if($count == 1) {
					echo '
						<tr>
							<td colspan="3">
								<center>Empty Data...</center>
							</td>
						</tr>
					';
				}
			?>
		</table>
	</div></div>
      </div>
	 <div class="col-md-3">
      <?php /*include('sample.php');*/ ?>
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
		<script src="assets/js/app.js"></script>
		
    </body>
</html>
<!-- ======= End package/teacher/SCANNER.PHP ======= -->
