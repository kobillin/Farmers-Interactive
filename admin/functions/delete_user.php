<?php 
$con = mysqli_connect("localhost","root","","farmers") or die("Connection was not established");

if (isset($_GET['u_id'])) {
	$u_id = $_GET['u_id'];

	$delete_user ="delete from users where u_id='$u_id'";

    $run_delete = mysqli_query($con, $delete_user);

    if ($run_delete) {
    	echo "<script>alert('A user has been deleted')</script>";
    	echo "<script>window.open('../members.php', '_self')</script>";
    }
}
 ?>