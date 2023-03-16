<!-- ======= Start package/FUNCTIONS.PHP ======= -->

<?php
function email_exists($u_email){
	global $conn;
	$sql = "SELECT u_id FROM tbl_user WHERE u_email = '$u_email'";
	$result = $conn->query($sql);
	
	if($result->num_rows == 1 ) {
		return true;
	} else {
		return false;
	}
}

function get_name($u_email){
	global $conn;
	$sql = "SELECT u_fname, u_mname, u_lname FROM tbl_user WHERE u_email = '$u_email'";
	$charat = substr($row['u_mname'], 0, 1);
	$name = $row['u_fname'] . ' ' . $charat . '. ' . $row['u_lname'];
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $name;
}

function set_message($message) {
	if(!empty($message)){
		$_SESSION['message'] = $message;
	}else {
		$message = "";
	}
}

function display_message(){
	if(isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function redirect($location){
	return header("Location: {$location}");
}

function validation_errors($error_message) {
	$error_message = <<<DELIMITER

	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		<strong>Warning!</strong> $error_message
	</div>
	DELIMITER;
	set_message($error_message);
}

function logged_in(){
	if(isset($_SESSION['u_email']) || isset($_COOKIE['u_email'])){
		return true;
	} else {
		return false;
	}
}
?>
<!-- ======= End package/FUNCTIONS.PHP ======= -->
