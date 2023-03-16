<!-- ======= Start package/admin/ADD-ARCHIVE.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
  session_start();
  include('config.php');

if (isset($_POST['save'])) {
    $filename =$_FILES['adoc_file']['tmp_name'];
    $adoc_title = ucwords($_POST['adoc_title']);
    $adoc_description = ucwords($_POST['adoc_description']);
    $filetype = $_FILES['adoc_file']['type'];
    $curr= date('Y')+1;
    $schoolyear = date('Y') . "-" . $curr;
    $adoc_filetype = pathinfo($_FILES['adoc_file']['name'],PATHINFO_EXTENSION);
    $location = "../storage/".time().rand(10000,99999).".".$adoc_filetype;
    $path = $location;
    $adoc_filesize = $_FILES['adoc_file']['size'];

    if (move_uploaded_file($filename, $location)) {
        $sql = "INSERT INTO tbl_admindocuments(adoc_title, adoc_description, adoc_path, adoc_filetype, adoc_filesize, adoc_schoolyear) 
      		  VALUES('$adoc_title', '$adoc_description ', '$path', '$adoc_filetype', '$adoc_filesize', '$schoolyear')";

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
        window.location='page-archive.php';
        }, 2000)
        </script>";

    }else{
    echo "<script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Failed to upload!',
        showConfirmButton: false,
        timer: 1500
        });
        </script>";

    echo "<script>
        setTimeout( async() => {
        window.location='page-archive.php';
        }, 2000)
        </script>";
    }
    }else{
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
        window.location='page-archive.php';
        }, 2000)
        </script>";
    }
  }
?>

</body>
</html>
<!-- ======= End package/admin/ADD-ARCHIVE.PHP ======= -->
