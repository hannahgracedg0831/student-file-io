<!-- ======= Start package/admin/UPDATE-TEACHERLIST.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php 
include_once('config.php');

if(isset($_POST['update'])){
	
	$sql = "UPDATE `tbl_user` 
    SET `year_section`='".$_POST['ys_yearsection']."', `school_year`='".$_POST['schoolyear']."'  WHERE u_id = '".$_POST['u_id']."'";
	
	if ($conn->query($sql) == TRUE) 
	{
        echo "<script>
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Updated Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                    });
            </script>";

        echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacherList.php';
                }, 2000)
            </script>
        ";
	} 
	else 
	{
		echo "Something Went Wrong " . $conn->error;
		echo "Something Went Wrong " . $sql . "<br>" . $conn->error;

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
                    window.location='page-teacherList.php';
                }, 2000)
            </script>
        ";
	}
	
    echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacherList.php';
                }, 2000)
            </script>
        ";
	exit();
}
?>

</body>
</html>
<!-- ======= End package/admin/UPDATE-TEACHERLIST.PHP ======= -->
