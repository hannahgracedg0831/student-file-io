<!-- ======= Start package/teacher/DELETE-STUDENTSCANDOCUMENT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
include_once('config.php');
	
	if(ISSET($_POST['scan_id'])){
		$scan_id = $_POST['scan_id'];

		$query = mysqli_query($conn, "SELECT * FROM `tbl_studentScanfile` WHERE `scan_id` = '$scan_id'") or die(mysqli_error($conn));
		$fetch  = mysqli_fetch_array($query);

		mysqli_query($conn, "DELETE FROM `tbl_studentScanfile` WHERE `scan_id` = '$scan_id'") or die(mysqli_error($conn));
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
                            window.location='scan-studentDocument.php';
                        }, 2000)
                    </script>
                ";
	}
?>

</body>
</html>
<!-- ======= End package/teacher/DELETE-STUDENTSCANDOCUMENT.PHP ======= -->
