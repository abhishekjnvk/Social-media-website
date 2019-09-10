<?php
session_start();
error_reporting(0);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Welcome Users!</title>
</head>
<body>
<div class="container-fluid ">
	<?php include('templates/menu.php') ?>
	<div class="row col-lg-12">
	<div class="card-group col-lg-2 rounded mt-2">
	  <div class="card">
	    <center><img src="users/<?php echo $user_image; ?>default.png" class="card-img-top col-lg-8"></center>
	    <div class="card-body">
	      <h5 class="card-title"><?php echo $user_name; ?> Name</h5>
	      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
	      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	    </div>
	  </div>
	</div>
	<div class="container">
	<div class="mt-1 col-lg-8">
	<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f">
		<textarea  class="form-control mt-2" id="exampleFormControlTextarea3" cols="70" rows="3" name="content" placeholder="What is on your mind ?"></textarea><br />
		<button type="submit" name="su3b" class="btn btn-outline-secondary mt-0 float-right">Post</button>
	</form>
	</div>
	<br>
		<?php insertPost() ?>
		<center><h2>News Feed</h2></center>
		<?php get_posts() ?>
	</div>
</div>
</div>
<?php include ('footer.php') ?>
</body>
</html>
<?php } ?>
