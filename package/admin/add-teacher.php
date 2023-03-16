<!-- ======= Start package/admin/ADD-TEACHER.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
include_once('config.php');

if(isset($_POST['save']))
{	 
     $tch_fname = ucwords($_POST['tch_fname']);
     $tch_mname = ucwords($_POST['tch_mname']);
     $tch_lname = ucwords($_POST['tch_lname']);
     $tch_gender = $_POST['tch_gender'];


     $yearAsection = strtoupper($_POST['ys_yearsection']);
     
	 $sql = "INSERT INTO tbl_teacher (tch_fname,tch_mname,tch_lname,tch_gender,tch_yearsection)
	 VALUES ('$tch_fname','$tch_mname','$tch_lname','$tch_gender','$yearAsection')";
	 if (mysqli_query($conn, $sql)) {
        echo "<script>
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Added Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                    });
            </script>";

        echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacher.php';
                }, 2000)
            </script>
        ";
	 } else {
		echo "<script>
            Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Something Went Wrong! Please try again.',
                    showConfirmButton: false,
                    timer: 1500
                    });
            </script>";

        echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacher.php';
                }, 2000)
            </script>
        ";
	 }
	 mysqli_close($conn);
}
?>

</body>
</html>
<!-- ======= End package/admin/ADD-TEACHER.PHP ======= -->
