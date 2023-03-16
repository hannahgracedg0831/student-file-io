<!-- ======= Start package/admin/DOWNLOAD-ARCHIVE.PHP ======= -->

<?php
include_once('config.php');

if(isset($_REQUEST['file_id'])){
		$file_id = $_REQUEST['file_id'];
		
		$query = mysqli_query($conn, "SELECT * FROM `tbl_file` WHERE `file_id` = '$file_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);
		$file_name = $fetch['file_name'];
		$is_folder = $fetch['is_folder'];

		header("Content-Disposition: attachment; filename=".$file_name);
		header("Content-Type: application/octet-stream;");
		readfile("../storage/".$file_name);

	}
    header('Location: page-archive.php');

?>
<!-- ======= End package/admin/DOWNLOAD-ARCHIVE.PHP ======= -->
