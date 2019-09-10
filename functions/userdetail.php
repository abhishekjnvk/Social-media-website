<?php
session_start();
  //get the user email from the login session
  $user = $_SESSION['user_email'];
  //create a sql query
  $get_user = "select * from users where user_email='$user'";
  //run the sql query
  $run_user = mysqli_query($con,$get_user);
  //get the row of the query
  $row = mysqli_fetch_array($run_user);

  //set the user id to the selected row
  $user_id = $row['user_id'];?>
<?php
include ("includes/connection.php");
include ("functions/functions.php");
//fetching user data from database
  $profile="SELECT * FROM users WHERE user_id='$user_id'";
$run_profile = mysqli_query($con,$profile);
$row_profile= mysqli_fetch_array($run_profile);
  ?>
