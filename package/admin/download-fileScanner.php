<!-- ======= Start package/admin/DOWNLOAD-FILESCANNER.PHP ======= -->

<?php
include_once('config.php');

if(isset($_REQUEST['scanFile_id'])){
		$scanFile_id = $_REQUEST['scanFile_id'];
		
		$query = mysqli_query($conn, "SELECT * FROM `tbl_scanfile` WHERE `scanFile_id` = '$scanFile_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);
		$file_name = $fetch['Path'];

		header("Content-Disposition: attachment; filename=".$file_name);
		header("Content-Type: application/octet-stream;");
		readfile("../../storage/scannedfiles/".$file_name);

	}
    header('Location: page-fileScanner.php');

?>
<!-- ======= End package/admin/DOWNLOAD-FILESCANNER.PHP ======= -->
