<!-- ======= Start package/REGISTER.INC.PHP ======= -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$u_fname       = ucwords($_POST['u_fname']);
	$u_mname       = ucwords($_POST['u_mname']);
	$u_lname       = ucwords($_POST['u_lname']);
    $u_address    = ucwords($_POST['u_address']);
	$u_email      = $_POST['u_email'];
	$u_contact      = $_POST['u_contact'];
    $u_role       = $_POST['u_role'];
	$u_gender       = $_POST['u_gender'];
    $u_password   = $_POST['u_password'];
	$u_cpassword   = $_POST['u_c_password'];
    $u_photo      = $_FILES['u_photo']['name'];
    $u_image_tmp  = $_FILES['u_photo']['tmp_name'];

	$hashed_password = password_hash($u_password,PASSWORD_DEFAULT);
	move_uploaded_file($u_image_tmp,"images/$u_photo");

$errors = [];

if($u_password !=$u_cpassword ){
	$errors[] = "Passwords Not Match";
}
if (email_exists($u_email)){
	$errors[] = "$u_email is already registered.";
}
if (!empty($errors)) {
	foreach ($errors as $error) {
		validation_errors($error);
	}
}else{
	$sql = "INSERT INTO tbl_user (u_fname, u_mname, u_lname, u_contact, u_address, u_photo, u_gender, u_email, u_role, u_password) 
	VALUES ('$u_fname', '$u_mname', '$u_lname', '$u_contact', '$u_address', '$u_photo', '$u_gender', '$u_email', '$u_role', '$hashed_password')";

	if ($conn->query($sql) === TRUE) {
        set_message('<div class="alert alert-warning" role="alert" col-md-12"><p>
		Your account request is now pending for approval. Please wait for confirmation. 
		Thank you!<a href="login.php"> Click here</a></p></div>');
	} else {
		set_message("<p>Error: " . $sql . "<br>" . $conn->error . "</p>");
	}
	$conn->close();
	}
}
?>
<!-- ======= End package/REGISTER.INC.PHP ======= -->
