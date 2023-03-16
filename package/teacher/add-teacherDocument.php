<!-- ======= Start package/teacher/ADD-TEACHERDOCUMENT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
  session_start();
	include('config.php');


if (isset($_POST['save'])) {

$filename =$_FILES['tdoc_file']['tmp_name'];
$tdoc_class = $_POST['doc_type'];
$tdoc_title = ucwords($_POST['tdoc_title']);
$tdoc_description = ucwords($_POST['tdoc_description']);
$tdoc_tag = ucwords($_POST['tdoc_tag']);
$filetype = $_FILES['tdoc_file']['type'];

$user_id = $_SESSION['T_ID'];
$yearsection = $_SESSION['T_yearsection'];
$schoolyear = $_SESSION['T_schoolyear'];

$tdoc_filetype = pathinfo($_FILES['tdoc_file']['name'],PATHINFO_EXTENSION);
$location = "../storage/".time() .rand(10000,99999).".".$tdoc_filetype;
$path = $location;

$tdoc_filesize = $_FILES['tdoc_file']['size'];


    if (move_uploaded_file($filename, $location)) {
  
      $sql = "INSERT INTO tbl_teacherdocuments(user_id, tdoc_title, tdoc_description, tdoc_path, tdoc_classification, tdoc_tag, tdoc_filetype, tdoc_filesize, tdoc_yearsection, tdoc_schoolyear) 
      		  VALUES('$user_id','$tdoc_title', '$tdoc_description ', '$path', '$tdoc_class', '$tdoc_tag', '$tdoc_filetype', '$tdoc_filesize', '$yearsection', '$schoolyear')";

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

        echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacherDocument.php';
                }, 2000)
            </script>
        ";

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

        echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacherDocument.php';
                }, 2000)
            </script>
        ";
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

        echo "
            <script>
                setTimeout( async() => {
                    window.location='page-teacherDocument.php';
                }, 2000)
            </script>
        ";
    }
  }
?>

</html>
</body>
<!-- ======= End package/teacher/ADD-TEACHERDOCUMENT.PHP ======= -->
