<?php require('../config.php');?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    	.divScroll {
			overflow-y:auto;
			height:370px;
			width:fix;
		}
	</style>
</head>
<body>

	<div class="container">

	<!-- <h1>Add / View Document Files</h1> -->
	<hr>
    <div class="row">
    <div class="col-md-9">
    	<div class="container">
        <div class="divScroll">
		<table class="table table-bordered table-striped" id="myTable">
		<thead class="thead-dark">
			<tr class="table-secondary">
			   <th class="text-center" scope="col">File Name</th>
			   <th class="text-center" scope="col">Image File</th>
				<th class="text-center" scope="col">Action</th>
			</tr>
		</thead>
			<?php
				$count=1;
				$sql="SELECT * FROM tbl_scanfile ORDER BY scanFile_id  DESC;";
				$result = mysqli_query($conn, $sql);
				
				while($row = mysqli_fetch_assoc($result)) { ?>
					<tr>
						<td class="text-center">
							<?php echo $row['Path']?>
						</td>
						<td>
							<center>
								<img class="img-thumbnail" src='scan/uploads/<?php echo $row['Path']?>' width="30%" height="30%" />
							</center>
						</td>	
						<td>
							<form method="POST">
								<input type="hidden" value="<?php echo $row['scanFile_id'];?>">
								<a class="btn btn-danger" href=".../pages/scan/delete.php?id=<?php echo $row["scanFile_id"]; ?>"><i class="fa fa-trash"></i></a>
							</form>
						</td>
					</tr>
				<?php $count++; } 

				if($count == 1) {
					echo '
						<tr>
							<td colspan="3">
								<center>Empty Data...</center>
							</td>
						</tr>
					';
				}
			?>
		</table>
	</div></div>
      </div>
	 <div class="col-md-3">
      <?php /*include('sample.php');*/ ?>
    </div>
  </div>
</div>


<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('myTable').DataTable();	

    });
  </script>

  <!-- <script type="text/javascript">
  	function confirmationDelete(anchor) {
		  var conf = confirm('Are you sure want to delete this record?');
		  if(conf)
		    window.location=anchor.attr("href");
		}
  </script> -->

</body>
</html>
