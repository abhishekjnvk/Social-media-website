
<?php
include ("includes/connection.php");
include ("functions/userdetail.php");
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
  	<div class="mt-2 ml-3 col-lg-6 bg-light border border-secondary rounded-top">

               <?php
             		$get_posts = "select * from posts where user_id='$user_id' ORDER by post_id DESC";
             		$run_posts = mysqli_query($con,$get_posts);
             		while ($row_posts=mysqli_fetch_array($run_posts)) {
             			$post_id = $row_posts['post_id'];
             			$user_id = $row_posts['user_id'];
                  $post_date=$row_posts['post_date'];
             			$content = substr($row_posts['post_content'], 0, 70);
             			$post_date = $row_posts['post_date'];
              		$sel_cmt = "select * from comments where post_id='$post_id'";
              		$run_cmt = mysqli_query($con,$sel_cmt);
              		$count_cmt = mysqli_num_rows($run_cmt);

             			//getting user who posted the thread
             			$user = "select * from users where user_id='$user_id' AND post='yes'";
             			$run_user = mysqli_query($con,$user);
             			$row_user = mysqli_fetch_array($run_user);
             			//displaying posts
                
             			echo "
                  <button class='fa fa-calendar' style='float:right;'>&nbsp;$post_date</button>
                  <div id='posts' class='container mt-1'>
                  <p style='color:white'>$content</p>
                      <a href='single.php?post_id=$post_id' style='float:right;'><button class='fa fa-comment'>($count_cmt)</button></a>
                      <a href='#' style='float:left;'><button class='fa fa-trash-o' data-toggle='modal' data-target='#exampleModal'></button></a>
                      </div><br><br>
             			";
             		} ?>
    </div>
  </div>

  <!-- Modal -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


<?php 	if(isset($_POST['delete_post'])){
  	$message_id=$_POST['message_id'];
  	$delete="UPDATE messages SET deleted = '1' WHERE message_id='$message_id' ";
  	$run_delete = mysqli_query($con,$delete);

  } ?>


  <?php } ?>
