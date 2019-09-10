<?php
session_start();
error_reporting(0);
include ("includes/connection.php");
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
$check_point1='S'.$user_id.'_';
$check_point2='_'.$user_id.'L';
$my_friend = "select * from friends WHERE friendship_id LIKE '%{$check_point1}%' OR friendship_id LIKE '%{$check_point2}%'";
$run_friend = mysqli_query($con,$my_friend);
$Count_friend = mysqli_num_rows($run_friend);
echo 'Total ';
echo $Count_friend;
echo ' friends';
?>
<br>
<br>
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
?>
<br>
<?php echo $sl;	//serial number of friends ?>
&nbsp&nbsp<?php echo $friend_name;?>&nbsp
<?php echo "<a href='user_profile.php?u_id=$friend_id' >view profile</a>";
 ?>
<br>&nbsp&nbsp
 Since: <?php echo $friendship_date;
 $sl++;					//serial number of friends
  ?>
<br>
 <?php } ?>
					</div>
				</div>
				<?php include ('footer.php') ?>
			</body>
			</html>
