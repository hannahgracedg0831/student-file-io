<!-- ======= Start package/admin/UPDATE-ALLYSSTUDENT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php 
include_once('config.php');

if(isset($_POST['updateAllYS'])){
	
	$sql = "UPDATE `tbl_student` SET `year_section`= '".$_POST['ys_yearsection']."' WHERE std_id IN (".$_POST['selectedStudents'].")";
	
    echo $sql;
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
                        window.location='page-student.php';
                    }, 2000)
                </script>
            ";
	} 
	else 
	{
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
                        window.location='page-student.php';
                    }, 2000)
                </script>
            ";
	}
	
    echo "
                <script>
                    setTimeout( async() => {
                        window.location='page-student.php';
                    }, 2000)
                </script>
            ";
	exit();
}
?>

</body>
</html>
<!-- ======= End package/admin/UPDATE-ALLYSSTUDENT.PHP ======= -->
