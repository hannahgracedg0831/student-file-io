<!-- ======= Start package/admin/ADD-DOCTYPE.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
include_once('config.php');

if(isset($_POST['save'])){	 

     $doc_type = ucwords($_POST['doc_type']);
	 $doc_owner = $_POST['doc_owner'];
	 $sql = "INSERT INTO tbl_doctype (doc_type, doc_owner) VALUES ('$doc_type', '$doc_owner')";

    if (mysqli_query($conn, $sql)) {
    echo "<script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Added Successfully!',
        showConfirmButton: false,
        timer: 1500
        });
        </script>";

    echo "<script>
        setTimeout( async() => {
        window.location='page-doctype.php';
        }, 2000)
        </script>";

	} else {
    echo "<script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Something Went Wrong! Please try again.',
        showConfirmButton: false,
        timer: 1500
        });
        </script>";

    echo "<script>
        setTimeout( async() => {
        window.location='page-doctype.php';
        }, 2000)
        </script>";
    }
    mysqli_close($conn);
}
?>
</body>
</html>
<!-- ======= End package/admin/ADD-DOCTYPE.PHP ======= -->
