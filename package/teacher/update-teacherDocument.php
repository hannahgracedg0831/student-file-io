<!-- ======= Start package/teacher/UPDATE-TEACHERDOCUMENT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php 
include_once('config.php');

if(isset($_POST['update'])){
	
	$sql = "UPDATE `tbl_teacherdocuments` SET `tdoc_title`='".$_POST['tdoc_title']."',
                                             `tdoc_description`='".$_POST['tdoc_description']."',
                                             `tdoc_tag`='".$_POST['tdoc_tag']."',
                                             `tdoc_classification`='".$_POST['tdoc_classification']."'
                                             WHERE tdoc_id = '".$_POST['tdoc_id']."'";
	
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
                    window.location='page-teacherDocument.php';
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
                    title: 'Update Error!',
                    showConfirmButton: false,
                    timer: 1500
                    });
            </script>";

        echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacherDocument.php';
                }, 2000)
            </script>
        ";
	}
	
    echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacherDocument.php';
                }, 2000)
            </script>
        ";
	exit();
}
?>

</body>
</html>
<!-- ======= End package/teacher/UPDATE-TEACHERDOCUMENT.PHP ======= -->
