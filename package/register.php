<!-- ======= Start package/REGISTER.PHP ======= -->

<?php
    ob_start();
    session_start();

    include("config.php");
    include("functions.php");
    include_once "register.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="assets/img/rio.png" rel="icon" type="image">
    <title>Register Dashboard | RCNHS</title>

    <!-- ======= Start STYLE ======= -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- ======= End STYLE ======= -->
</head>
<body>
<!-- ======= Start First Container ======= -->
<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #800000;">
        <marquee width="100%" direction="right">
            <img src="assets/img/rio.png" width="50px" height="50px">
            <font color="#FFA600" size="5%">Rio Chico National High School Student File Management System with Optical Scanner</font>
        </marquee>
    </nav>
<!-- ======= Start Second Container ======= -->
<div class="container"><?php display_message(); ?>
    <div id="loginbox" style="margin-top:10px;">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title"><img src="assets/img/rio.png" width="80px" height="80px">
                    Rio Chico National High School
                </div>
            </div> 
        <div style="padding-top:10px" class="panel-body">
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>    
            <form id="loginform" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                <!-- FName & MName & LName -->
                <div class="row">
                    <div class="col-md-4">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control"  name="u_fname" placeholder="Firstname" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control"  name="u_mname" placeholder="Middlename" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control"  name="u_lname" placeholder="Lastname" required>
                        </div>
                    </div>
                </div>
                <!-- Address & Email -->
                <div class="row">
                    <div class="col-md-6">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input type="text" class="form-control" name="u_address" placeholder="Address" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin-bottom: 25px;" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="email" class="form-control"  name="u_email" placeholder="Email" required >
                        </div>
                    </div>
                </div>
                <!-- Contact & Photo & Gender -->
                <div class="row">
                <div class="col-md-4">
                        <div style="margin-bottom: 25px;" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input type="number" class="form-control"  minlength="11" maxlength="11" name="u_contact" placeholder="Contact" required="" onkeypress="return /[0-9]/i.test(event.key)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="file" accept="images/*" class="form-control" name="u_photo" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <select class="form-control" name="u_gender" required>
                                <option selected disabled value="">&larr; Select Gender &rarr;</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Photo & Account Type & Password -->
                <div class="row">
                    <div class="col-md-4">
                        <div style="margin-bottom: 25px;" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <select class="form-control" name="u_role" required>
                                <option selected disabled value="">&larr; Select Role &rarr;</option>
                                <option value="ADMIN">Admin</option>
                                <option value="TEACHER">Teacher</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <!--  <input type="password" id="ssn" name="password"  minlength="8" required >< -->
                            <input type="password" class="form-control" name="u_password" minlength="8" placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="margin-bottom: 25px;" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" minlength="8" class="form-control" name="u_c_password" placeholder="Confirm Password" required >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" name="submit" value="Sign up" class="btn btn-primary btn-block btn-lg" tabindex="7">
                    </div>
                </div>
            </form><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Already have an account! 
                            <a href="login.php">Login Here</a>
                        </div>
                    </div>
                </div>   
            </div>                     
        </div>  
    </div>
</div>
<!-- ======= End Second Container ======= -->

<script>
	var password = document.getElementById("u_password")
	, confirm_password = document.getElementById("u_c_password");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}
	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>

</div>
<!-- ======= End First Container ======= -->
</body>
</html>
<!-- ======= End package/REGISTER.PHP ======= -->
