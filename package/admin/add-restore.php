<!-- ======= Start package/admin/ADD-RESTORE.PHP ======= -->

<html>
<head><script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<body>

<?php
include('config.php');

if(isset($_POST['submit'])){

$filename = $_POST['myfile'];
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);

foreach($sql as $query){
  $result = mysqli_query($conn,$query);
  if($result){
      echo '<tr><td><br></td></tr>';
      echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
      echo '<tr><td><br></td></tr>';    
  }
}
fclose($handle);
echo "<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Imported Successfully!',
    showConfirmButton: false,
    timer: 1500
    });
    </script>";

echo "<script>
    setTimeout( async() => {
    window.location='page-restore.php';
    }, 2000)
    </script>";
}
?>
</body>
</html>
<!-- ======= End package/admin/ADD-RESTORE.PHP ======= -->

