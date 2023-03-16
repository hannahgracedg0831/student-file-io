<!-- ======= Start package/admin/UPDATE-ARCHIVE.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php 
include_once('config.php');

if(isset($_POST['update'])){
	
	$sql = "UPDATE `tbl_admindocuments` SET `adoc_title`='".$_POST['adoc_title']."',
                                             `adoc_description`='".$_POST['adoc_description']."'
                                             WHERE adoc_id = '".$_POST['adoc_id']."'";

				// echo $sql;
				// die();
	
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
                    window.location='page-archive.php';
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
                    window.location='page-archive.php';
                }, 2000)
            </script>
        ";
	}
	
    echo "
            <script>
                setTimeout( async() => {
                    window.location='page-archive.php';
                }, 2000)
            </script>
        ";
	exit();
}
?>

</body>
</html>
<!-- ======= End package/admin/UPDATE-ARCHIVE.PHP ======= -->
