<!-- ======= Start package/teacher/ADD-STUDENTDOCUMENT.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
session_start();
	include('config.php');


if (isset($_POST['upload'])) {

$filename =$_FILES['sdoc_file']['tmp_name'];

$sdoc_class = $_POST['doc_type'];
$student = $_POST['std_lrn'];
$sdoc_title = ucwords($_POST['sdoc_title']);
$sdoc_description = ucwords($_POST['sdoc_description']);
$sdoc_tag = ucwords($_POST['sdoc_tag']);
$filetype = $_FILES['sdoc_file']['type'];

$user_id = $_SESSION['T_ID'];
$yearsection = $_SESSION['T_yearsection'];
$schoolyear = $_SESSION['T_schoolyear'];

$sdoc_filetype = pathinfo($_FILES['sdoc_file']['name'],PATHINFO_EXTENSION);
$location = "../storage/".time() .rand(10000,99999).".".$sdoc_filetype;
$path = $location;

$sdoc_filesize = $_FILES['sdoc_file']['size'];

    if (move_uploaded_file($filename, $location)) {
  
      $sql = "INSERT INTO tbl_studentdocuments(user_id, student_lrn, sdoc_title, sdoc_description, sdoc_path, sdoc_classification, sdoc_tag, sdoc_filetype, sdoc_filesize, sdoc_yearsection, sdoc_schoolyear) 
      		  VALUES('$user_id', '$student', '$sdoc_title', '$sdoc_description ', '$path', '$sdoc_class', '$sdoc_tag', '$sdoc_filetype', '$sdoc_filesize', '$yearsection', '$schoolyear')";
        
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
                        window.location='page-studentDocument.php';
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
                        window.location='page-studentDocument.php';
                   }, 2000)
                </script>
            ";
      }
    }else{
        echo "<script>
                Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Something Went Wrong! Please Try Again!',
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
  }
?>

</body>
</html>
<!-- ======= End package/teacher/ADD-STUDENTDOCUMENT.PHP ======= -->
