<?php
session_start();
include ("includes/connection.php");
$reciver_id = $_POST['to_id'];
?>
<?php
		$user_search = "select * from users WHERE user_id ='$reciver_id'";
		$run_search = mysqli_query($con,$user_search);
	 $row_search=mysqli_fetch_array($run_search);
	 ?>

<html>
<head>
<title>Welcome Users!</title>
<link rel="stylesheet" type="text/css" href="styles/home_styles.css">
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
<?php
include ("templates/menu.php");
?>
<div id="content_timeline">
	<form class="Message" method="post">
		<?php 	?>	From:<br>
	<input type="text" name="from" class="messageinput" value="<?php echo $user_name; echo ' ('; echo $user_id ;echo ')';  ?>" readonly>
	<br>
	<input type="hidden" name="sender" value="<?php echo $user_id;?>"><br>

	<br>
			To:<br>
<input type="text" name="to" class="messageinput" value=" <?php  echo $row_search['user_name']; echo ' ('; echo $reciver_id; echo ')';?>" readonly>
<input type="hidden" name="reciver" value="<?php echo $reciver_id;?>"><br>

		Subject<br>
			<input type="text" name="subject" size="1px" class="messageinput"><br>
			Message<br>
			<textarea rows="4" cols="50" name="message" class="messageinput"></textarea><br>
			<input type="submit" name="send" value="send">
	</form>
</div>
</div>
<?php include ('footer.php') ?>
</body>
</html>
<?php
if(isset($_POST['send']))
	{
		$subject = $_POST['subject'];
		$reciver_id=$_POST['reciver'];
		$sender_id=$_POST['sender'];

	  $time= date("dmYhis");				//time for message id
	  $random = rand(9999999,999999999999999999999999999999);	//generate a random number between these two number for message i
		$message = $_POST['message'];
		$message_id=$sender_id.'-'.$time.'-'.$random.'-'.$reciver_id;

		$time= date("d M Y h:i:s A"); //time for message time
		$insert = "insert into messages (sender, reciver, subject, message, status,message_id,message_time,deleted) values ('$sender_id','$reciver_id', '$subject', '$message', 'unread', '$message_id','$time','0')";
		$query = mysqli_query($con,$insert);

		if ($query) {
			# code...
			echo "<script>alert('message sent.')</script>";
			echo "<script>window.open('my_messages.php','_self')</script>";
		}
}
?>
