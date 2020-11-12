<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<?php 
	$mysqli =new mysqli('localhost', 'root','', 'farmers') or die(mysqli_error(mysqli));
	$result =$mysqli->query("SELECT * from posts ") or die($mysqli->error);

 ?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from admin where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$username = $row['username'];
	?>
	<title><?php echo "$username"; ?>/Manage posts</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head> 
<body>
	<div class="row">
		<div class="col-sm-3" style="left:0.5%;">
			<?php include 'side-nav.php';?>
		</div>
		<div class="col-sm-9" style="left:7%:">
			<h2><strong>Manage Posts</strong></h2><br><br>
			
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Posted By</th>
                        <th>Post</th>
      					       <th>Image</th>
      					       <th>Posted On</th>
                    </tr>
                </thead>
                <tbody>
    	<?php
           while($row = mysqli_fetch_array($result))
                {
                ?>
     <tr>
      <td><?php echo $row["user_id"]; ?></td>
      <td><?php echo $row["post_content"]; ?></td>
      <td><?php echo $row["upload_image"]; ?></td>
      <td><?php echo $row["post_date"]; ?></td>
      <td>
       <button href="#deleteEmployeeModal" class="btn btn-danger" class="delete" data-toggle="modal" data-toggle="tooltip" title="Delete">Delete</button>
      </td>
     </tr>
                <?php 
                    } 
                ?>
    <?php
    
     // close connection database
     // mysqli_close($conn);
                ?>
                </tbody>
            </table>
		</div>
	</div>
</body>
</html>