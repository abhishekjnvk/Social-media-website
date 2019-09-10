
<?php

  if ($fetched_profile['user_id']>$user_id)
  {
  $user2=$fetched_profile['user_id'];
  $user1=$user_id;
  }
  if ($fetched_profile['user_id']<$user_id)
  {
    $user2=$user_id;
    $user1=$fetched_profile['user_id'];
  }
  $friendship_id='S'.$user1.'_'.$user2.'L';

if (isset($_POST['addfriend']))
{
	$date=date('d-m-Y');
	$addfriend = "insert into friends (user1, user2,friendship_date,friendship_id,status) values ('$user1', '$user2', '$date', '$friendship_id','not verified')";
	$run_addfriend = mysqli_query($con,$addfriend);

}
 ?>
 <?php
//fetching friendship data from database
 $friendship_data="SELECT * FROM friends WHERE friendship_id='$friendship_id'";
 $run_friendship_data = mysqli_query($con,$friendship_data);
 $fetched_friendshop_array=mysqli_fetch_array($run_friendship_data);
 $fetched_friendshop_data= mysqli_num_rows($run_friendship_data);
 if ($fetched_friendshop_data==1)
 {
   if ($fetched_friendshop_array['status']=='verified')
      {
     $frienship_status="Already Friend";
     $button_name="#";
      }
   if ($fetched_friendshop_array['status']=='not verified')
   {
     $frienship_status="Request Sent";
     $button_name="#";
   }
 }
else
  {
  $frienship_status="ADD Friend";
  $button_name="addfriend";
  }

 ?>
