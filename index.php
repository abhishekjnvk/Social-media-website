<?php
session_start();
include ("includes/connection.php");
include ("functions/functions.php");
error_reporting(0);
?>
<!DOCTYPE html>
<?php
	if (isset($_SESSION['user_email'])) {
		# code...
		header("location: home.php");
	}else
	{
//include the files needed
include ('templates/content.php');
//include ('templates/footer.php');
include ("login.php");
}
