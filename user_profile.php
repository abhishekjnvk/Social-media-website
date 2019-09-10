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



	<?php if ($count==1) {																						//if any one trys some random keyword like (',;,:) etc it will prevent
 ?>
	<?php include ("functions/friend_request.php");?>
							<div class="profile_detail">
								<table class="table table-striped table-info col-lg-12">
								  <tbody>
										<tr>
								      <th colspan="2" >
														<center>	<div class="profile_pic_user">
																<img src="users/<?php echo 	$fetched_profile['user_image']; ?>" width="110px" width="110px" />
															</div><br>
															<?php 	if ($user_id!=$get_id) {		//if user is viewing own profile he wil not get addfriend button?>
															<form action="#"  method="post">
															<input type="submit" name="<?php echo $button_name; ?>" value="<?php echo $frienship_status; ?> ">
															<input type="submit" name="block_user" value="Block user"><br>
															</form>
															<?php	}			//end of if condition?>
													</center>
											</th>
								    </tr>
								    <tr>
								      <td>Name:</td>
								      <td><?php	echo $fetched_profile['user_name'];?></td>
								    </tr>
								    <tr>
								      <td>	Email:</td>
								      <td><?php echo $fetched_profile['user_email'];?></td>
								    </tr>
										<tr>
								      <td>User Id:</td>
								      <td><?php echo $fetched_profile['user_id']; ?></td>
								    </tr>
										<tr>
								      <td>Gender</td>
								      <td><?php echo $fetched_profile['user_gender']; ?></td>
								    </tr>
										<tr>
								      <td>Relationship:</td>
								      <td><?php echo $fetched_profile['relationship']; ?></td>
								    </tr>
										<tr>
								      <td>Country:</td>
								      <td><?php	echo $fetched_profile['user_country']; ?></td>
								    </tr>
										<tr>
								      <td>Birthday:</td>
								      <td><?php echo $fetched_profile['user_birthday']; ?></td>
								    </tr>
										<tr>
								      <td>Bio:</td>
								      <td>	<textarea rows="4" class="col-lg-12" readonly><?php echo $fetched_profile['describe_user']; ?></textarea></td>
								    </tr>
								  </tbody>
								</table>

	<?php
	}

	else {
		echo "No Such Users";
	} ?>
	</div>





</div>
  </div>
</div>
</body>
</html>

<?php }?>
