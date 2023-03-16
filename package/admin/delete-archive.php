<!-- ======= Start package/admin/DELETE-ARCHIVE.PHP ======= -->
<?php
include_once('config.php');
	
	if(ISSET($_POST['adoc_id'])){
		$adoc_id = $_POST['adoc_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_admindocuments` WHERE `adoc_id` = '$adoc_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_admindocuments` WHERE `adoc_id` = '$adoc_id'") or die(mysqli_error($conn));
        echo '<script>alert("Deleted Successfully!");</script>';
        header('Location: page-archive.php');

	}
?>
<!-- ======= End package/admin/DELETE-ARCHIVE.PHP ======= -->
