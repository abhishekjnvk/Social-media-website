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
	<div class="mt-1 col-lg-6 row">
		<?php
		$check_point1='S'.$user_id.'_';
		$check_point2='_'.$user_id.'L';
		$my_friend = "select * from friends WHERE friendship_id LIKE '%{$check_point1}%' OR friendship_id LIKE '%{$check_point2}%'";
		$run_friend = mysqli_query($con,$my_friend);
		$Count_friend = mysqli_num_rows($run_friend);

		?>
		<?php
		$sl='1';
		while ($array_friend=mysqli_fetch_array($run_friend)) {
			$user1 = substr($array_friend['user1'], 0, 70);
			$user2 = substr($array_friend['user2'], 0, 70);
			$friendship_date = substr($array_friend['friendship_date'], 0, 70);
			if($user1==$user_id)
			{
			$friend_id = substr($array_friend['user2'], 0, 70);
			}
			if($user2==$user_id)
			{
			$friend_id = substr($array_friend['user1'], 0, 70);
			}
		//fetching friends name
		$profile="SELECT * FROM users WHERE user_id='$friend_id'";
		$run_profile = mysqli_query($con,$profile);
		$fetched_profile= mysqli_fetch_array($run_profile);
		$friend_name=$fetched_profile['user_name'];
		$friend_photo=$fetched_profile['user_image'];
		?>
<div class="container col-lg-5 mx-auto mt-1">
	<div class="row">
	<?php echo $sl;	//serial number of friends ?>
		<img class="ml-2 mt-2 mb-2" src="users/<?php echo $friend_photo; ?>" height="80px" width="80px">
		<div class="block ml-3">
			<strong><?php echo $friend_name;?></strong>
			<div>
				<?php echo "<a href='user_profile.php?u_id=$friend_id' class='fa fa-user'>view profile</a>";
				?>
			</div>
			<div>
				Since: <?php echo $friendship_date;
				$sl++;					//serial number of friends
				?>
			</div>
		</div>
	</div>
</div>
		 <?php } ?>
  </div>
  </div>
</div>
</body>
</html>
