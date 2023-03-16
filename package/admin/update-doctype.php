<!-- ======= Start package/admin/UPDATE-DOCTYPE.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php 
include_once('config.php');

if(isset($_POST['update'])){
	
	$sql = "UPDATE `tbl_doctype` SET `doc_type`='".$_POST['doc_type']."',`doc_owner`= '".$_POST['doc_owner']."' WHERE doc_id = '".$_POST['doc_id']."'";
	
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
                    window.location='page-doctype.php';
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
                    window.location='page-doctype.php';
                }, 2000)
            </script>
        ";
	}
	
    echo "
            <script>
                setTimeout( async() => {
                    window.location='page-doctype.php';
                }, 2000)
            </script>
        ";
	exit();
}
?>

</body>
</html>
<!-- ======= End package/admin/UPDATE-DOCTYPE.PHP ======= -->
