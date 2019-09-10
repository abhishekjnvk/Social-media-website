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

            <?php
            $message_id = $_POST['m_id'];
						if (!$message_id) {
							$message_id=$_GET['$message_id'];
							}

						//checking user is permitted to see messaage or not
            $validity = "select * from messages WHERE message_id ='$message_id' AND (sender='$user_id' OR reciver='$user_id')";
            $run_validity = mysqli_query($con,$validity);
            $row_messages=mysqli_fetch_array($run_validity);
            $check_user = mysqli_num_rows($run_validity);

            if ($check_user==1) {
								//getting Name of sender
								$sender_id=$row_messages['sender'];
								$profile="SELECT * FROM users WHERE user_id='$sender_id'";
								$run_profile = mysqli_query($con,$profile);
								$row_profile= mysqli_fetch_array($run_profile);
								$sender=$row_profile['user_name'];
								//getting Name of Reciver
								$reciver_id=$row_messages['reciver'];
								$profile="SELECT * FROM users WHERE user_id='$reciver_id' ";
								$run_profile = mysqli_query($con,$profile);
								$row_profile= mysqli_fetch_array($run_profile);
								$reciver=$row_profile['user_name'];

							//updating message status = read
							if($row_messages['status']== 'unread')
							{
							$status='read';
							$time= date("d M Y h:i:s A");
							$update_status="UPDATE messages SET status='$status' , read_time='$time' WHERE message_id='$message_id' ";
							$run_update = mysqli_query($con,$update_status);
							}


							if ($row_messages['deleted']=='0')
							{
              ?>


<div class="message_container">
	<hr>
	<div class="message_container_tools">
		&nbsp&nbsp<button>&nbsp<a href="javascript:history.go(-1)">Go back</a></button>
		&nbsp&nbsp
			<right><?php 	echo "<form method='post'>
			<input type='submit' value='delete' name='delete_message'>
			<input type='hidden' value='$message_id' name='message_id'>
			</form>"; ?></right>

			<right> <?php 	echo "<form method='post'>
			<input type='submit' value='Mark as unread' name='unread_message'>
			<input type='hidden' value='$message_id' name='message_id'>
			</form>"; ?> </right>
	</div>
	<hr>
			<div class="message_container_sender">
				<left>	From: <?php echo $sender.' ('.$row_messages['sender'].' )'; ?></left>
				<right>
				To: <?php echo $reciver.' ('.$row_messages['reciver'].' )'; ?>
				</right>
				<br>
		</div>
		<hr>
		<div class="message_container_subject">
				<left>&nbsp Subject:&nbsp&nbsp<?php  echo $row_messages['subject'];  ?></left>
		</div>
			<hr>

		<div class="message_container_content">
		            <textarea rows="22" cols="78" readonly><?php  echo $row_messages['message'];  ?></textarea><br>
								&nbsp Sent on: <?php echo $row_messages['message_time'] ?>
		</div>
</div>
<?php }

	else {
		echo "This message was deleted";
	}					//end of checking message is deleted or not

} 						// End of checking user is permitted to see messaage or not
//if user is not permitted to see message
else {
echo "";
}


?>
</div>
</div>
<?php include ('footer.php') ?>
</body>
</html>
<?php
if (isset($_POST['delete_message']))
{
	$message_id=$_POST['message_id'];
	$delete="UPDATE messages SET deleted = '1' WHERE message_id='$message_id' ";
	$run_delete = mysqli_query($con,$delete);
	if ($run_delete) {
		echo "<script>alert('Your message has been successfully deleted')</script>";
		echo "<script>window.open('my_messages.php','_self')</script>";
		}
}
if (isset($_POST['unread_message']))
{
	$message_id=$_POST['message_id'];
	$unread="UPDATE messages set status='unread' WHERE message_id='$message_id'";
	$run_unread = mysqli_query($con,$unread);
	if ($run_unread)
	{
	echo "<script>alert('Marked as unread')</script>";
	echo "<script>window.open('my_messages.php','_self')</script>";
	}
}
 ?>
