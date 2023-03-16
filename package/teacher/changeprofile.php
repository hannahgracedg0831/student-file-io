<!-- ======= Start package/teacher/CHANGEPROFILE.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>
<!-- UPDATE PROFILE	-->
<?php include('config.php');
session_start();

if (isset($_POST["update_data"])) {
    
    $up_fname = ucwords(mysqli_real_escape_string($conn, $_POST["u_fname"]));
    $up_mname = ucwords(mysqli_real_escape_string($conn, $_POST["u_mname"]));
    $up_lname = ucwords(mysqli_real_escape_string($conn, $_POST["u_lname"]));
    $up_email = mysqli_real_escape_string($conn, $_POST["u_email"]);
    $up_contact = mysqli_real_escape_string($conn, $_POST["u_contact"]);
    $up_address = ucwords(mysqli_real_escape_string($conn, $_POST["u_address"]));

    $photo_name = $_FILES["u_photo"]["name"];


    if(empty($photo_name)
    ) {
        $sql = "UPDATE tbl_user SET u_fname='$up_fname', u_mname='$up_mname',
                                    u_lname='$up_lname', u_email='$up_email', 
                                    u_contact='$up_contact', u_address='$up_address' WHERE u_id='{$_SESSION["T_ID"]}'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>
                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Successfully updated',
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
                        title: 'Profile not update',
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
            echo  $conn->error;
        }
        
    } else {
        $photo_tmp_name = $_FILES["u_photo"]["tmp_name"];
        $photo_size = $_FILES["u_photo"]["size"];
        $photo_new_name = rand() . $photo_name;

        if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {
            $sql = "UPDATE tbl_user SET u_fname='$up_fname', u_mname='$up_mname',
                                        u_lname='$up_lname', u_email='$up_email', 
                                        u_contact='$up_contact', u_address='$up_address', u_photo='$photo_new_name' WHERE u_id='{$_SESSION["T_ID"]}'";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                move_uploaded_file($photo_tmp_name, "../images/" . $photo_new_name);
                 echo "<script>
                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Successfully updated',
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
                        title: 'Profile not update',
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
                echo  $conn->error;
            }
        }
    }
}
?>
</body>
</html>
<!-- ======= End package/teacher/CHANGEPROFILE.PHP ======= -->
