<!-- ======= Start package/EMAILFUNCTION.PHP ======= -->

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

      $message = <<<EOF
      <html>
      <body>
      <p>Someone trying to access your account, If it is not you change your password immediately</p><br>
      <p>If you have a problem log in your account, you can reset it into new password</p><br>
      <p>To Verify it is you Click the link below to change your password</p>
      <a href="#">Click Here!!!</a>
      </body>
      </html>
      EOF;
      $mail->Subject = 'Account verification';
      $mail->Body   = $message;
      $mail->send();

      echo '<div class="alert" id="flash-msg">
            <button class="closebtn" type="button" >×</button>
            <h4><i class="icon fa fa-check"></i>Email sent successfully!</h4></div>'; 

      }catch(Exception $e){
      echo '<div class="alert1" id="flash-msg">
            <button class="closebtn" type="button" >×</button>
            <h4><i class="icon fa fa-check"></i>Email not Sent!</h4></div>';
      }
}
?>
<!-- ======= End package/EMAILFUNCTION.PHP ======= -->
