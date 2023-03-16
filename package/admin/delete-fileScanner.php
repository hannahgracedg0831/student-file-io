<!-- ======= Start package/admin/DELETE-FILESCANNER.PHP ======= -->
<?php
include_once('config.php');
	
	if(ISSET($_POST['scanFile_id'])){
		$scanFile_id = $_POST['scanFile_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_scanfile` WHERE `scanFile_id` = '$scanFile_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_scanfile` WHERE `scanFile_id` = '$scanFile_id'") or die(mysqli_error($conn));
                echo '<script>alert("Deleted Successfully!");</script>';

        header('Location: page-fileScanner.php');

	}
?>
<!-- ======= End package/admin/DELETE-FILESCANNER.PHP ======= -->
