<!-- ======= Start package/admin/DELETE-DOCTYPE.PHP ======= -->

<?php
include_once('config.php');
	
	if(ISSET($_POST['doc_id'])){
		$doc_id = $_POST['doc_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_doctype` WHERE `doc_id` = '$doc_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_doctype` WHERE `doc_id` = '$doc_id'") or die(mysqli_error($conn));
        echo '<script>alert("Deleted Successfully!");</script>';
        header('Location: page-doctype.php');

	}
?>
<!-- ======= End package/admin/DELETE-DOCTYPE.PHP ======= -->
