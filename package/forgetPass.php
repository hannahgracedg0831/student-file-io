<!-- ======= Start package/FORGETPASS.PHP ======= -->
<?php
ob_start();
session_start();
include("config.php");
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="assets/dist/img/rio.png" rel="icon" type="image">
    <title>Forget Password | RCNHS</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

    
</head>
<body>
<!-- ======= Start First Container ======= -->
<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #800000;">
        <marquee width="100%" direction="right">
            <img src="assets/img/rio.png" width="50px" height="50px">
            <font color="#FFA600" size="5%">
                Rio Chico National High School Student File Management System with Optical Scanner
            </font>
        </marquee>
    </nav>

<!-- ======= Start Second Container ======= -->
<div class="container"><?php display_message(); ?>
    <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="assets/img/rio.png" width="80px" height="80px">
                    Forgot Password
                </div>
            </div>     
            <div style="padding-top:20px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <!-- ======= Start Form ======= -->
                <form id="loginform" class="form-horizontal" method="post" role="form">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="u_email" type="text" class="form-control" name="u_email" value="" placeholder="Email" required>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-4 controls">
                            <button class="btn btn-lg btn-primary btn-block" name="resetBtn" type="submit">Send link</button>
                        </div>
                        <div class="col-sm-4 controls">
                            <a href="login.php" class="btn btn-lg btn-danger btn-block" type="submit">Cancel</a>
                        </div>
                    </div>
                </form>                 
                <!-- ======= End Form ======= -->
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" ></div>
                    </div>
                </div>   
            </div>                     
        </div>  
    </div>
</div>
<!-- ======= End Second Container ======= -->

<!-- ======= Start Function ======= -->
<?php
    if (isset($_POST['resetBtn'])) {

    $u_email = $_POST['u_email'];
    $sql = "SELECT * FROM tbl_user WHERE u_email='$u_email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
            
    if ($row["u_email"] == $u_email){
        header("Location: resetPass.php");

    }else if ($row["u_email"] != $u_email){
        echo '<script>alert("Invalid Email!");</script>';
        header("Location: forgetPass.php");
    }
}
?>
<!-- ======= End Function ======= -->
</div>
<!-- ======= End First Container ======= -->
</body>
</html>
<!-- ======= End package/FORGETPASS.PHP ======= -->
