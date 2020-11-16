<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<?php 
         if(isset($_GET['u_id'])){
          global $con;

          $user_id = $_GET['u_id'];

          $select ="select * from users where user_id ='$user_id'";
          $run = mysqli_query($con, $select);
          $row = mysqli_fetch_array($run);

          $name = $row['user_name'];
        }
    ?>
<?php 
	$mysqli =new mysqli('localhost', 'root','', 'farmers') or die(mysqli_error(mysqli));
	$result =$mysqli->query("SELECT * from users") or die($mysqli->error);

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
	<title><?php echo "$username"; ?>/Manage users</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../bootstrap/js/jquery.min.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style/home_style2.css">
</head> 
<body>
	<div class="row">
		<div class="col-sm-2" style="left:0.5%;">
			<?php include 'side-nav.php';?>
		</div>
		<div class="col-sm-10" style="left:7%:">
			<h2><strong>Manage Users</strong></h2><br><br>
			
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
      					       <th>Email</th>
      					       <th>Username</th>
                        <th>County</th>
                        <th>Gender</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
    	<?php
           while($row = mysqli_fetch_array($result))
                {
                ?>
     <tr>
      <td><?php echo $row["f_name"]; ?></td>
      <td><?php echo $row["l_name"]; ?></td>
      <td><?php echo $row["user_email"]; ?></td>
      <td><?php echo $row["user_name"]; ?></td>
      <td><?php echo $row["user_county"]; ?></td>
      <td><?php echo $row["user_gender"]; ?></td>
      <td>
       <a href='?u_id=$user_id' style='float:right;'><button class='btn btn-danger'>Ban User</button>
        functions/delete_user.php
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
                <a target="new" href='functions/print.php' style='float:left;'><button class='btn btn-success'>Print</button>
                  
            </table>
		</div>
	</div>
</body>
</html>