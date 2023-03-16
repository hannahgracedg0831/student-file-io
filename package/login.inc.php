<!-- ======= Start package/LOGIN.INC.PHP ======= -->

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $u_email		= $_POST['u_email'];
    $u_password	= $_POST['u_password'];

    $sql = "SELECT * FROM tbl_user WHERE u_email='$u_email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

  if (mysqli_num_rows($result) > 0) {
    if($row['u_status'] == 'Active'){         
      if(password_verify($u_password, $row["u_password"]))  {          
        if ($row["u_role"] == 'ADMIN'){

        $charat = substr($row['u_mname'], 0, 1);
        $name = $row['u_fname'] . ' ' . $charat . '. ' . $row['u_lname'];

        $_SESSION['A_Admin'] = $row["u_email"];
        $_SESSION['A_Name'] = $name;
        $_SESSION['A_ID'] = $row["u_id"];
        $_SESSION['A_Profile'] = $row["u_photo"];
        $_SESSION['A_Role'] = $row["u_role"];

        header("Location: admin/index.php");
                  
        }else if ($row["u_role"] == 'TEACHER'){

        $charat = substr($row['u_mname'], 0, 1);
        $name = $row['u_fname'] . ' ' . $charat . '. ' . $row['u_lname'];

        $_SESSION['T_Teacher'] = $row["u_email"];
        $_SESSION['T_ID'] = $row["u_id"];
        $_SESSION['T_Name'] = $name;
        $_SESSION['T_Subject'] = $row["u_subject"];
        $_SESSION['T_Profile'] = $row["u_photo"];
        $_SESSION['T_Role'] = $row["u_role"];
        $_SESSION['T_yearsection'] = $row["year_section"];
        $_SESSION['T_schoolyear'] = $row["school_year"];

        header("Location: teacher/index.php");
      }
    }else{
    set_message('<div class="alert alert-warning" role="alert" col-md-12"><p>Invalid emails or password.</p></div>');
  } 
}else if($row['u_status'] == 'Pending'){
set_message('<div class="alert alert-danger" role="alert" col-md-12"><p>Unknown Account.</p></div>');
}  }  }
?>
<!-- ======= End package/LOGIN.INC.PHP ======= -->
