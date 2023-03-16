<!-- ======= Start package/LOGOUT.PHP ======= -->

<?php
	ob_start();
	session_start();

	include("config.php");
	include("functions.php");

	session_destroy();

	if(isset($_COOKIE['u_email'])) {
		unset($_COOKIE['u_email']);
		setcookie('u_email', '', time()-86400);
	}
	redirect("../index.php");
?>
<!-- ======= End package/LOGOUT.PHP ======= -->
