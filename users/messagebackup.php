<?php
session_start();
include ("includes/connection.php");
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
				<center>	<h2>	Messages	</h2></center>
<?php
$my_messages = "select * from messages WHERE deleted='0' AND ( reciver='$user_id' OR sender='$user_id') ORDER by sl DESC";
$run_message = mysqli_query($con,$my_messages);
while ($array_message=mysqli_fetch_array($run_message)) {
	$recived_subject= substr($array_message['subject'], 0, 5);
	$recived_message = substr($array_message['message'], 0, 5).'....';
	$recived_message = str_replace(array("\n", "\r"), ' ', $recived_message);		//replace new line with a space for short look
	$sender_id = $array_message['sender'];
	$reciver_id= $array_message['reciver'];
	$message_id=$array_message['message_id'];
		//getting Name of sender
		$profile="SELECT * FROM users WHERE user_id='$sender_id'";
		$run_profile = mysqli_query($con,$profile);
		$row_profile= mysqli_fetch_array($run_profile);
		$sender=$row_profile['user_name'];

		//getting Name of Reciver
		$profile="SELECT * FROM users WHERE user_id='$reciver_id'";
		$run_profile = mysqli_query($con,$profile);
		$row_profile= mysqli_fetch_array($run_profile);
		$reciver=$row_profile['user_name'];
?>
<div class="message_container"><br>
	<div class="message_container_sender">
	<left>	From: <?php echo $sender; ?></left>
<right>
		To: <?php echo $reciver; ?>
</right>
<br>
<br>	</div>
	<div class="message_container_subject">
&nbsp<?php echo $recived_subject; ?>:&nbsp
<?php echo $recived_message; ?>
<right>
					<?php
				if ($array_message['status'] == 'unread') {
				echo "unread";
				}
				?>
				</right>
</right>
	<form method="post" action="view_message.php"  id='view_message'>
	    <input type="hidden" name="m_id" value="<?php echo $message_id; ?>">
	    <input type="submit" value="view message">
	</form>
</div>
</div>
<br>
<?php } ?>
					</div>
				</div>
				<?php include ('footer.php') ?>

			</body>
			</html>
