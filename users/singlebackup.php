<?php
session_start();
include ("includes/connection.php");
include ("functions/functions.php");
?>
<!DOCTYPE html>
<?php
	if (!isset($_SESSION['user_email'])) {
		# code...
		header("location: index.php");
	}else
	{
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
				<h2>Comments </h2
					<?php single_post(); ?>
			</div>
		</div>
	</div>
</body>
</html>

<?php } ?>
