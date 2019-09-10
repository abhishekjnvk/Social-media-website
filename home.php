<?php
session_start();
error_reporting(0);
include ("includes/connection.php");
include ("functions/functions.php");
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
	<div class="mt-1 col-lg-6">
	<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f">
		<textarea  class="form-control mt-2" id="exampleFormControlTextarea3" cols="70" rows="3" name="content" placeholder="What is on your mind ?"></textarea><br />
		<button type="submit" name="sub" class="btn btn-outline-secondary mt-0 float-right">Post</button>
	</form>
  <br>
  <br>
  <?php insertPost() ?>
  <div class="container">
  <center><h2>News Feed</h2></center>
  <?php get_posts() ?>
</div>
  </div>
  </div>
</div>
</body>
</html>
