<!-- ======= Start package/admin/DELETE-STUDENT.PHP ======= -->

<?php
include_once('config.php');
	
	if(ISSET($_POST['std_id'])){
		$std_id = $_POST['std_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_student` WHERE `std_id` = '$std_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_student` WHERE `std_id` = '$std_id'") or die(mysqli_error($conn));
                echo '<script>alert("Deleted Successfully!");</script>';

        header('Location: page-student.php');

	}
?>
<!-- ======= End package/admin/DELETE-STUDENT.PHP ======= -->
