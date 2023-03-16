<!-- ======= Start package/admin/DELETE-PENDINGACCOUNT.PHP ======= -->

<?php
include_once('config.php');
	
	if(ISSET($_POST['u_id'])){
		$u_id = $_POST['u_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `u_id` = '$u_id'") or die(mysqli_error());
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_user` WHERE `u_id` = '$u_id'") or die(mysqli_error());
                echo '<script>alert("Deleted Successfully!");</script>';

        header('Location: page-pendingAccount.php');

	}
?>
<!-- ======= End package/admin/DELETE-PENDINGACCOUNT.PHP ======= -->
