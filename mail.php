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
	<div class="mt-1 col-lg-2 bg-warning rounded">


		<center>	<h2>	Messages	</h2></center>
		<?php
		$my_messages = "select * from messages WHERE deleted='0' AND reciver='$user_id' ORDER by sl DESC";
		$run_message = mysqli_query($con,$my_messages);
		while ($array_message=mysqli_fetch_array($run_message)) {
		$recived_subject= substr($array_message['subject'], 0, 8);
		$recived_message = substr($array_message['message'], 0, 12).'....';
		$sender_id = $array_message['sender'];
		$reciver_id= $array_message['reciver'];
		$message_id=$array_message['message_id'];
		//getting Name of sender

		?>
    <form method="post" action="#">
      <input type="hidden" value="<?php echo $message_id; ?>" name="message_id">
		   <button class="col-lg-12 text-left mt-1 btn btn-warning" type="submit" name="select_message">
      	From: <?php echo $sender; ?>
        <div class="float-right">
        <?php if ($array_message['status'] == 'unread') {echo "<i class='fa fa-envelope' aria-hidden='true'></i>";} if ($array_message['status'] == 'read') {echo "<i class='fa fa-envelope-open' aria-hidden='true'></i>";}?>
          </div>
      <div class="light col-lg-12 text-left">
        <?php echo $recived_subject; ?>:
			<?php echo $recived_message; ?>
      </div>
    </button>
  </form>
		<?php } ?>
</div>


<?php
if (isset($_POST['select_message'])) {
  $message_id=$_POST['message_id'];
  $message = "SELECT * FROM messages WHERE message_id='$message_id'";
  $query = mysqli_query($con,$message);
  $row_messages=mysqli_fetch_array($query);
  if ($row_messages) {
  }
}
?>

<div class="container col-lg-6 bg-light border border-danger ml-2 mt-2 rounded">
<?php
$sender_id = $row_messages['sender'];
$reciver_id= $row_messages['reciver'];
$recived_subject=$row_messages['subject'];
$recived_message=$row_messages['message'];
$sent_date=$row_messages['message_time'];
$profile="SELECT * FROM users WHERE user_id='$sender_id'";
$run_profile = mysqli_query($con,$profile);
$row_profile= mysqli_fetch_array($run_profile);
$sender=$row_profile['user_name'];
if ($sender) {...   //if there is no message selected
?>

        <div class="col-lg-12 bg-light mt-2">
          <strong>From:&nbsp&nbsp</strong>  <?php echo $sender;?>
          <div class="float-right">
          <?php echo $sent_date; ?>
          </div>
        </div>
        <div class="col-lg-12">
          <strong>Subject:&nbsp&nbsp</strong><?php     echo $recived_subject; ?>
        </div>
        <hr>
        <div class="col-lg-12">
          <?php    echo $recived_message;

}

else
{
  echo "Welcome to penta mail services";
}

    ?>
  </div>
</div>
  </div>
  </div>
</div>
</body>
</html>
