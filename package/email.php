<!-- ======= Start package/EMAIL.PHP ======= -->

<!-- ======= Start Function ======= -->
<?php
  require "PHPMailer-master/src/Exception.php";
  require "PHPMailer-master/src/PHPMailer.php";
  require "PHPMailer-master/src/SMTP.php";

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  if(isset($_POST['sendmail'])){

  $mail = new PHPMailer(true); 

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'agent44anonymous@gmail.com';
    $mail->Password = 'passWORD12345@';                    
    $mail->SMTPSecure = PHPMailer:: ENCRYPTION_STARTTLS;                           
    $mail->Port = 587;  
    $mail->setFrom('agent44anonymous@gmail.com','TEAM_FOUR'); 
    $mail->addAddress($_POST['u_email']);
    $mail->isHTML(true);

    $message ='If you have a problem login your account you can change your password, To reset your password click the link
              "<a href="http://localhost/CAPSTONE PROJECT/package/login.php">Click this link</a>"';
        
    $mail->Subject = 'Account verification';
    $mail->Body   = $message;
    $mail->send();


  echo '<div class="alert" id="flash-msg">
        <button class="closebtn" type="button" >×</button>
        <h4><i class="icon fa fa-check"></i>Email sent successfully!</h4></div>'; 


  }catch(Exception $e){
  echo '<div class="alert1" id="flash-msg">
      <button class="closebtn" type="button" >×</button>
      <h4><i class="icon fa fa-check"></i>Email not sent!</h4></div>';
  }
}
?>
<!-- ======= End Function ======= -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/img/rio.png" rel="icon" type="image">
  <title>Login Dashboard | RCNHS</title>

  <!-- ======= Start CSS ======= -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="assets/dist/js/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/css/rio.min.css">
  <link rel="stylesheet" href="assets/css/logstyle.css">
  <style>
  .alert {
    padding: 20px;
    background-color: #3CD805;
    color: white;
  }
  .alert1 {
    padding: 20px;
    background-color: #FF0400;
    color: white;
  }
  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }
  .closebtn:hover {
    color: black;
  }
  </style>
  <!-- ======= End CSS ======= -->
</head>

<body class="hold-transition login-page">

<!-- ======= Start Card ======= -->
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h2">Forget password</a>
    </div>
    <div class="card-body">
      <form action="" method="POST" autocomplete="off">
        <div><p class="text-center">Enter your email address</p></div>
        <div class="input-group mb-3">
          <input type="email" name="u_email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>
        <button type="submit" name="sendmail" class="btn btn-primary btn-block">Send</button>
        <a type="button" href="login.php" class="btn btn-danger btn-block">Cancel</a>
      </form>
    </div>
  </div>
</div>
<!-- ======= End Card ======= -->

</body>
</html>
<!-- ======= End package/EMAIL.PHP ======= -->