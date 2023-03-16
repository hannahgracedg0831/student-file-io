<!-- ======= Start package/teacher/DELETE-FILESCANNER.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
include_once('config.php');
	
	if(ISSET($_POST['scanFile_id'])){
		$scanFile_id = $_POST['scanFile_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_scanfile` WHERE `scanFile_id` = '$scanFile_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_scanfile` WHERE `scanFile_id` = '$scanFile_id'") or die(mysqli_error($conn));
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
                            window.location='page-fileScanner.php';
                        }, 2000)
                    </script>
                ";

	}
?>

</body>
</html>
<!-- ======= End package/teacher/DELETE-FILESCANNER.PHP ======= -->
