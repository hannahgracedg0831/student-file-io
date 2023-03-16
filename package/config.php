<!-- ======= Start package/CONFIG.PHP ======= -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rcnhsdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<!-- ======= End package/CONFIG.PHP ======= -->
