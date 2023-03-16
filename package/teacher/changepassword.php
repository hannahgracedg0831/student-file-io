<!-- ======= Start package/teacher/CHANGEPASSWORD.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
session_start();
include('config.php');

$password = $_POST["currentPassword"];

if (count($_POST) > 0) 
{
    $result = mysqli_query($conn,"SELECT * From tbl_user WHERE u_id='" . $_SESSION["T_ID"] . "'");
    $row = mysqli_fetch_array($result);

    // $hash = password_verify($password,$row["u_password"]);

    if(password_verify($password,$row["u_password"])) 
    {
        if($_POST["newPassword"] == $_POST["confirmPassword"]){
            mysqli_query($conn,"UPDATE tbl_user Set u_password='" . password_hash($_POST["newPassword"],PASSWORD_DEFAULT) . "' WHERE u_id='" . $_SESSION["T_ID"] . "'");

                    echo "<script>
                        Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Password is Successfully Changed!',
                                showConfirmButton: false,
                                timer: 1500
                                });
                        </script>";

                    echo "
                        <script>
                            setTimeout( async() => {
                                window.location='profile.php';
                            }, 2000)
                        </script>
                    ";
                    
        } else {
             echo "<script>
                        Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Password is not match!',
                                showConfirmButton: false,
                                timer: 1500
                                });
                        </script>";

                    echo "
                        <script>
                            setTimeout( async() => {
                                window.location='profile.php';
                            }, 2000)
                        </script>
                    ";
        }
        
    } else {
        echo "<script>
                        Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Current Password is not correct!',
                                showConfirmButton: false,
                                timer: 1500
                                });
                        </script>";

                    echo "
                        <script>
                            setTimeout( async() => {
                                window.location='profile.php';
                            }, 2000)
                        </script>
                    ";
    }
}
?>

</body>
</html>
<!-- ======= End package/teacher/CHANGEPASSWORD.PHP ======= -->
