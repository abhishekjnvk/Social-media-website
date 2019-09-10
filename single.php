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
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	  <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="styles/home_styles.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Welcome Users!</title>
  </head>
<body>
<div class="container-fluid ">
	<?php include('templates/menu.php') ?>
  <div class=" container-fluid row ">
<?php include('templates/card.php') ?>
<div class="mt-1 col-lg-6 bg-dark ml-3">
	<div class="row">
		<a href="javascript:history.go(-1)" style='float:left;'><button class='fa fa-arrow-left'>&nbsp;go back</button></a>
	<h2 class="text-white">Comments </h2>
	</div>
		<?php single_post(); ?>
</div>
</div>
</div>
</body>
</html>

<?php } ?>
