<?php
session_start();
include ("includes/connection.php");
error_reporting(0);
$search = $_POST['user_query'];
if (strlen($search) >3 )
		{
		$user_search = "select * from users WHERE user_name LIKE '%{$search}%'";
		$run_search = mysqli_query($con,$user_search);
		?>
		<html>
		<head>
		<title>Welcome Users!</title>
		<link rel="stylesheet" type="text/css" href="styles/home_styles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		</head>
		<body>
		<div class="container">
		<?php
		include ("templates/menu.php");
		?>
		<div id="content_timeline">
		<?php
		while ($row_search=mysqli_fetch_array($run_search)) {
			  $people = substr($row_search['user_name'], 0, 70);
				$u_id = substr($row_search['user_id'], 0, 70);?>
				<img src="users/<?php echo 	$row_search['user_image']; ?>" width="110px" width="110px" />
				<?php echo "<h3><a href='user_profile.php?u_id=$u_id'>$people</a></h3>"; ?>
			</form>
			<form method="post" action="send_message.php">
						<input type="hidden" name="to_id" value="<?php echo $u_id; ?>">
						<input type="submit" value="Send Email">
			</form>

		<br>
			<?php } ?>
			</div>
		</div>
		<?php include ('footer.php') ?>
		</body>
		</html>
<?php }
else
	 {
		// echo "<script>window.open('home.php','_self')</script>";
		 echo "<script>alert('Please insert more than 2 character.')</script>";

	}?>
