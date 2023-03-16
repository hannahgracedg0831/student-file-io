<!-- ======= Start package/LOGIN.PHP ======= -->

<?php
    ob_start();
    session_start();

    include("config.php");
    include("functions.php");
    include_once "login.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="assets/img/rio.png" rel="icon" type="image">
    <title>Login Dashboard | RCNHS</title>

    <!-- ======= Start Style ======= -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- ======= End Style ======= -->
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
    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title"><img src="assets/img/rio.png" width="80px" height="80px">
                    Rio Chico National High School
                </div>
                <div style="float:right; font-size: 80%; position: relative; top:-30px"><a href="forgetPass.php">Forgot password?</a></div>
            </div>     
            <div style="padding-top:20px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" method="post" role="form">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="u_email" type="text" class="form-control" name="u_email" value="" placeholder="Email" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="myInput" type="password" class="form-control" name="u_password" minlength="8" placeholder="Password" required>
                    </div>
                    <div style="margin-top:-15px;"> 
                        <input type="checkbox" onclick="myFunction()">&nbsp;show password</input>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-4 controls">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                    </div>
                </form> 
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Don't have an account!<a href="register.php"> Sign Up Here</a>
                        </div>
                        <div style="padding-top:5px; font-size:85%" >
                            <a href="../index.php"> Back to Home</a>
                        </div>
                    </div>
                </div>    
            </div>                     
        </div>  
    </div>
</div>
<!-- ======= End Second Container ======= -->

<script type="text/javascript">
    function myFunction(){
        var x = document.getElementById("myInput");
        if (x.type=== "u_password") {
            x.type ="text";
        }else{
            x.type="u_password";
        }
    }
</script>

</div>
<!-- ======= End First Container ======= -->
</body>
</html>
<!-- ======= End package/LOGIN.PHP ======= -->
