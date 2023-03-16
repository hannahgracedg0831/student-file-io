<!-- ======= Start package/teacher/RESTOREDB.PHP ======= -->

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
echo 'Successfully imported';
}
?>
<!-- ======= End package/teacher/RESTOREDB.PHP ======= -->

