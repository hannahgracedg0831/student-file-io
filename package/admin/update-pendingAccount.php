<!-- ======= Start package/admin/UPDATE-PENDINGACCOUNT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php 
include_once('config.php');

if(isset($_POST['update'])){
	
	$sql = "UPDATE `tbl_user` SET `u_status`='".$_POST['u_status']."' WHERE u_id = '".$_POST['u_id']."'";
	
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
                    window.location='page-pendingAccount.php';
                }, 2000)
            </script>
        ";
	} 
	else 
	{

        echo "<script>
            Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Something Went Wrong! Please try again.',
                    showConfirmButton: false,
                    timer: 1500
                    });
            </script>";

        echo "
            <script>
                setTimeout( async() => {
                    window.location='page-pendingAccount.php';
                }, 2000)
            </script>
        ";
	}
	
    echo "
            <script>
                setTimeout( async() => {
                    window.location='page-pendingAccount.php';
                }, 2000)
            </script>
        ";
	exit();
}
?>

</body>
</html>
<!-- ======= End package/admin/UPDATE-PENDINGACCOUNT.PHP ======= -->
