<!-- ======= Start package/admin/ADD-YEARSECTION.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
include_once('config.php');

if(isset($_POST['save']))
{	 

     $yearAsection = $_POST['std_year'] . ' - ' . strtoupper($_POST['std_section']);
     
	 $sql = "INSERT INTO tbl_yearsection (ys_yearsection)
	 VALUES ('$yearAsection')";
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
                    window.location='page-year_section.php';
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
                    window.location='page-year_section.php';
                }, 2000)
            </script>
        ";
	 }
	 mysqli_close($conn);
}
?>

</body>
</html>
<!-- ======= eND package/admin/ADD-YEARSECTION.PHP ======= -->
