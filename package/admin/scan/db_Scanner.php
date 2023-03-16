<?php session_start();

error_reporting(E_ALL ^ E_NOTICE);
define('UPLOAD_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR);

processRequest();

// Front controller
function processRequest() {
    if(isset($_GET['delay']) && is_numeric($_GET['delay'])) {
        sleep($_GET['delay']);
    }

    $action = $_GET['action'];
    switch($action) {
        case 'dump': { // dump request information
            require('../config.php');
            $user = $_SESSION['A_ID'];

            
            $filename = rand(1000,10000)."-".$_FILES['com_asprise_scannerjs_images']['name'][0];

            $destination = '../../storage/scannedfiles/' . $filename;
            $path = $destination;
            $extension = pathinfo($filename,PATHINFO_EXTENSION);
            $file = $_FILES['com_asprise_scannerjs_images']['tmp_name'][0];
            $size = $_FILES['com_asprise_scannerjs_images']['size'][0];

            if (!in_array($extension, ['png', 'jpeg', 'jpg'])) {
                echo '<script>alert("file extention must be .png, .jpeg, .jpg")</script>';
              }
              else if ($size > 99000000) {
                echo '<script>alert("File is too Large")</script>';
              } else{
                if (move_uploaded_file($file, $destination)) {
        
                    $sql = "INSERT INTO tbl_scanfile(user_id,Path) VALUES('$user', '$path')";

                    if (mysqli_query($conn, $sql)
                    ) {
                      echo '<script>alert("Upload successfully");</script>';
                    } else {
                      echo '<script>alert("Failed to upload");</script>';
                    }
                }
            }
        }
        break;
    } 
}
?>