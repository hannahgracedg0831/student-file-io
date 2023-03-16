<?php

include('../config.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM tbl_scanfile WHERE scanFile_id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location:../Scanner.php"); 
?>

<?php

    // include('../config.php');
    // if(isset($_GET['scanFile_id']))
    //   {
    //     $id=$_GET['scanFile_id'];
    //     $query1=mysql_query("delete from addd where scanFile_id='$id'");
    //     if($query1)
    //       {
    //       	echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete.php?id=".$query2['scanFile_id']."'>x</a></td><tr>"; //use double quotes for js inside php!
    //       header('Location:../scan.php');
    //       }
    //   }
?>