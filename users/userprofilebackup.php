<?php
session_start();
error_reporting(0);
include ("includes/connection.php");
?>
<!DOCTYPE html>
<?php
	if (!isset($_SESSION['user_email'])) {
		# code...
		header("location: index.php");
	}else
	{
?>
<?php
//getting id
$get_id = $_GET['u_id'];
//getting total no. of Users
$query_total_users="select * FROM users";
$run_total_users = mysqli_query($con,$query_total_users);
$tota_users = mysqli_num_rows($run_total_users);
if($tota_users<$get_id)
{
	echo "<script>window.open('home.php','_self')</script>";		//if total no of user is less than u_id it will be redirected to home page
}

//fetching user's public data from database
$profile="SELECT * FROM users WHERE user_id='$get_id'";
$run_profile = mysqli_query($con,$profile);
$fetched_profile= mysqli_fetch_array($run_profile);
$count = mysqli_num_rows($run_profile);
?>

<html>
<head>
	<title>Welcome Users!</title>
	<link rel="stylesheet" type="text/css" href="styles/home_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/home_styles2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
	<?php
	include ("templates/menu.php");
	?>
<div id="content_timeline">
	<?php if ($count==1) {																						//if any one trys some random keyword like (',;,:) etc it will prevent
 ?>
	<?php include ("functions/friend_request.php");?>
							<div class="profile_detail">
								<div class="friend_button" >
									<div class="profile_pic_user">
									<img src="users/<?php echo 	$fetched_profile['user_image']; ?>" width="110px" width="110px" />
								</div>
									<?php 	if ($user_id!=$get_id) {		//if user is viewing own profile he wil not get addfriend button?>
									<form action="#"  method="post">
									<input type="submit" name="<?php echo $button_name; ?>" id="friend_button_action" value="<?php echo $frienship_status; ?> ">
									<br>
									<input type="submit" name="block_user" value="Block user" id="friend_button_action"><br>
									</form>
									<?php	}			//end of if condition?>
								</div>
									<div class="profile_detail_field">
									Name:</div>
									<div class="profile_detail_user">
										<?php	echo $fetched_profile['user_name'];?>
								</div><br>
								<div class="profile_detail_field">
								Email:</div>
								<div class="profile_detail_user">
								<?php echo $fetched_profile['user_email'];?>
										</div><br>
										<div class="profile_detail_field">
										User Id:</div>
										<div class="profile_detail_user">
											<?php echo $fetched_profile['user_id']; ?>
										</div><br>
											<div class="profile_detail_field">
											Gender:</div>
											<div class="profile_detail_user">
											<?php echo $fetched_profile['user_gender']; ?></div>
											<br>
											<div class="profile_detail_field">
												Relationship:</div>
											<div class="profile_detail_user">
											<?php echo $fetched_profile['relationship']; ?></div>
											<br>
											<div class="profile_detail_field">
											Country:</div>
											<div class="profile_detail_user">
											<?php	echo $fetched_profile['user_country']; ?></div>
											<br>
											<div class="profile_detail_field">
											Birthday:</div>
											<div class="profile_detail_user">
											<?php echo $fetched_profile['user_birthday']; ?></div>
											<br>
											<br>
											<h3>&nbsp&nbsp Bio:<br></h3>
											<div class="profile_detail_user_status">
											<textarea rows="8" cols="74" readonly><?php echo $fetched_profile['describe_user']; ?></textarea></div>

	<?php
	}

	else {
		echo "No Such Users";
	} ?>
							</div>

</div>
</div>
<?php include ('footer.php') ?>
</body>
</html>
<?php }?>
