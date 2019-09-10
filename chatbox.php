<?php
session_start();
error_reporting(0);
include ("includes/connection.php");
?>
<html>
<head>
<title>Welcome chatbox!</title>
<link rel="stylesheet" type="text/css" href="styles/home_styles.css">
<link rel="stylesheet" type="text/css" href="styles/chat.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
    <?php include ("templates/menu.php"); ?>

        <div id="chatpage">
            <div class="chat_friend">
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
                <friendName> &nbsp&nbsp<?php echo "<a href='?u_id=$friend_id'>$friend_name</a>";?></friendName>
                <profile><?php echo "<a href='user_profile.php?u_id=$friend_id'>profile</a>";?></profile>
                <?php
                $sl++;					//serial number of friends
                } ?>
                <hr>
            </div>

              <?php
                  $test=$_GET['u_id'];
                  //getting name of friend
                  $profile="SELECT * FROM users WHERE user_id='$test'";
                  $run_profile = mysqli_query($con,$profile);
                  $row_profile= mysqli_fetch_array($run_profile);
                  $friend_name=$row_profile['user_name'];
                  //getting Name of Reciver
                  $profile="SELECT * FROM users WHERE user_id='$user_id'";
                  $run_profile = mysqli_query($con,$profile);
                  $row_profile= mysqli_fetch_array($run_profile);
                  $user_name=$row_profile['user_name'];
                  if ($test) {
                    echo "<div class='chat-content'> ";
                    echo " <a href='chatbox.php'><button id='close' class='fa fa-times'></button></a>";
                    echo "
                    <form action='' method='post' id='delete_chat'>
                    <input type='hidden' value='$user_id' name='sender'>
                    <input type='hidden' value='$test' name='reciver'>
                    <input type='submit' value='delete' name='delete_chat'>
                    </form><br>
                    <hr>
                    ";
           ?>
              <?php 	echo "<form method='post'>
        			<input type='hidden' value='$message_id' name='message_id'>
        			</form>"; ?>
                  <?php
                  $my_chats = "select * from chat_box WHERE deleted='0' AND ( (reciver='$test' AND sender='$user_id') OR (sender='$test' AND reciver='$user_id')) ORDER by sl ASC LIMIT 15";
                  $run_chat = mysqli_query($con,$my_chats);
                  $update_status="UPDATE chat_box SET status='read' WHERE (sender='$test' AND reciver='$user_id')";
                  $run_update_status = mysqli_query($con,$update_status);
                  while ($array_chat=mysqli_fetch_array($run_chat)) { ?>
                    <?php   if($array_chat['reciver']==$user_id){ ?>
                           <?php  echo '<p id="sent">&nbsp&nbsp'.$array_chat['message'].'</p>';
                          } ?>
                          <?php   if($array_chat['sender']==$user_id){ ?>
                                 <?php  echo '<p id="recived">'.$array_chat['message'];
                                 if ($array_chat['status']=='read')
                                  {
                                   echo "&nbsp&nbsp&#10003;";
                                  }
                                  else {
                                    echo "&nbsp&nbsp&nbsp&nbsp;";
                                  }
                                 echo '</p>';
                                } ?>
                              <?php } ?>
                              <form action="" method="post" class='chat'>
                              <textarea name="message" rdeleows="3" placeholder="Type Your message here"required></textarea>
                              <input type="submit" name="send" value="send">
                              <input type="hidden" name="reciver" value="<?php echo $test; ?>">
                              <input type="hidden" name="sender" value="<?php echo $user_id; ?>">
                            </form>
                            <hr>
                            <?php
                                        echo " <button id='close'><a href='chatbox.php?u_id=$test'>refresh</a></button>";
 ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['send'])) {
  $message=$_POST['message'];
  $sender_id=$_POST['sender'];
  $reciver_id=$_POST['reciver'];
  $time= date("dmYhis");
  $random = rand(9999999,999999999999999999999999999999);	//generate a random number between these two number for message id
  $chat_id=$sender_id.'-'.$time.'-'.$random.'-'.$reciver_id;
  $insert = "insert into chat_box (sender, reciver, message, status,chat_id,message_time,deleted) values ('$sender_id','$reciver_id', '$message', 'unread', '$chat_id','$time','0')";
  $query = mysqli_query($con,$insert);
  echo "<script>window.open('chatbox.php?u_id=$reciver_id','_self')</script>";
}

if(isset($_POST['delete_chat']))
{  $sender_id=$_POST['sender'];
$reciver_id=$_POST['reciver'];
$delete="UPDATE chat_box SET deleted = '1' WHERE (sender='$sender_id' AND reciver='$reciver_id') OR (sender='$reciver_id' AND reciver='$sender_id') ";
$run_delete = mysqli_query($con,$delete);
if ($run_delete) {
  echo "<script>alert('Your chat has been successfully deleted')</script>";
  echo "<script>window.open('chatbox.php?u_id=$reciver_id','_self')</script>";
  }
else {
  echo "<script>window.open('my_message.php,'_self')</script>";
}
}
}
?>
