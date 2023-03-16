<!-- ======= Start package/teacher/UPDATE-STUDENTDOCUMENT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php 
include_once('config.php');

if(isset($_POST['update'])){
	
	$sql = "UPDATE `tbl_studentdocuments` SET `sdoc_title`='".$_POST['sdoc_title']."',
                                             `sdoc_description`='".$_POST['sdoc_description']."',
                                             `sdoc_tag`='".$_POST['sdoc_tag']."',
                                             `sdoc_classification`='".$_POST['doc_type']."'
                                             WHERE sdoc_id = '".$_POST['sdoc_id']."'";
	
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
                    window.location='page-studentDocument.php';
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
                    window.location='page-studentDocument.php';
                }, 2000)
            </script>
        ";
	}
	
    echo "
            <script>
                setTimeout( async() => {
                    window.location='page-studentDocument.php';
                }, 2000)
            </script>
        ";
	exit();
}
?>

</body>
</html>
<!-- ======= End package/teacher/UPDATE-STUDENTDOCUMENT.PHP ======= -->
