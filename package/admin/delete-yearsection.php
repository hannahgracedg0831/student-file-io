<!-- ======= Start package/admin/DELETE-YEARSECTION.PHP ======= -->

<?php
include_once('config.php');
	
	if(ISSET($_POST['ys_id'])){
		$ys_id = $_POST['ys_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_yearsection` WHERE `ys_id` = '$ys_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_yearsection` WHERE `ys_id` = '$ys_id'") or die(mysqli_error($conn));
                echo '<script>alert("Deleted Successfully!");</script>';

        header('Location: page-year_section.php');

	}
?>
<!-- ======= End package/admin/DELETE-YEARSECTION.PHP ======= -->
