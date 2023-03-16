<!-- ======= Start package/teacher/DELETE-STUDENTDOCUMENT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
include_once('config.php');
	
	if(ISSET($_POST['sdoc_id'])){
		$sdoc_id = $_POST['sdoc_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_studentdocuments` WHERE `sdoc_id` = '$sdoc_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_studentdocuments` WHERE `sdoc_id` = '$sdoc_id'") or die(mysqli_error($conn));
                           echo "<script>
                    Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Deleted Successfully!',
                            showConfirmButton: false,
                            timer: 1500
                            });
                    </script>";

                echo "
                    <script>
                        setTimeout( async() => {
                            window.location='page-studentDocument.php';
                        }, 2000)
                    </script>
                ";
	}
?>

</body>
</html>
<!-- ======= End package/teacher/DELETE-STUDENTDOCUMENT.PHP ======= -->
