<!-- ======= Start package/admin/ADD-STUDENT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
include_once('config.php');

if(isset($_POST['save'])){	 
    $std_lrn = $_POST['std_lrn'];
    $std_fname = ucwords($_POST['std_fname']);
    $std_mname = ucwords($_POST['std_mname']);
    $std_lname = ucwords($_POST['std_lname']);
    $std_gender = $_POST['std_gender'];
    $school_year = $_POST['schoolyear'];
    $yearAsection = strtoupper($_POST['ys_yearsection']);

    $sql = "INSERT INTO tbl_student (std_lrn,std_fname,std_mname,std_lname,std_gender,year_section,school_year)
    VALUES ('$std_lrn','$std_fname','$std_mname','$std_lname','$std_gender','$yearAsection','$school_year')";

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

    echo "<script>
        setTimeout( async() => {
        window.location='page-student.php';
        }, 2000)
        </script>";

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

    echo "<script>
        setTimeout( async() => {
         window.location='page-student.php';
        }, 2000)
        </script>";
	}
	mysqli_close($conn);
}
?>
</body>
</html>
<!-- ======= End package/admin/ADD-STUDENT.PHP ======= -->
