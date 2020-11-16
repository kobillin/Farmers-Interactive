<?php 
$con = mysqli_connect("localhost","root","","farmers") or die("Connection was not established");

if (isset($_GET['user_id'])) {
	$user_id = $_GET['user_id'];

	$delete_post ="delete from users where u_id='$user_id'";

    $run_delete = mysqli_query($con, $delete_post);

    if ($run_delete) {
    	echo "<script>alert('A user has been deleted')</script>";
    	echo "<script>window.open('../users.php', '_self')</script>";
    }
}
 ?>