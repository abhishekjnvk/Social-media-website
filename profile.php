<?php
session_start();
include ("includes/connection.php");
?>
<!DOCTYPE html>
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
				<?php
				include ("functions/userdetail.php");
				?>
        <form id="signup_fcorm" method="post" class="updateprofile" action="profile.php">
				<table>
					<tr>
						<td>

					<hr>
					<h2><center>Personal Details</h2></center>
<hr>

				</td>
			</td>
					<tr>
						<td width="300px">
						Name:</td><td>	<input type="text" name="u_name" placeholder="<?php echo $row_profile['user_name']; ?>" readonly>
						</td>
					</tr>
					<tr>
						<td width="10px">
						username:	</td>
						<td>
							<input type="text" name="user_id" value="<?php echo $row_profile['user_id']; ?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Password: </td>
							<td><input type="text" name="u_pass" placeholder="<?php //echo $row_profile['user_pass']; ?>********">
						</td>
					</tr>
					<tr>
						<td>Email:</td>
							<td>
								<input type="email" name="u_email" required="required" Value="<?php echo $row_profile['user_email']; ?>">
						</td>
					</tr>
					<tr>
						<td>Country:</td>
						<td>
							<input type="text" name="u_country" value="<?php echo $row_profile['user_country']; ?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td>
								<select name="u_gender">
								<option>Select a Gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</td>
					</tr>
			<tr>
				<td>Birthday</td>
				<td><input type="date" name="u_birthday" value="<?php echo $row_profile['user_birthday']; ?>" ></td>
			</tr>
					<tr>
						<td>
			<input style="width: 200px; height: 45px; font-weight: bold; background: #228B22; border-radius: 5px; border: 0.5px solid #7FFF00; color: white;" type="submit" name="update" value="Update Account">
	                    </td>
					</tr>

				</table>
			</div>
        </form>

        </div>


<!-- profile Updating -->

</div>
<div class="profile_pic_user">
	<br><br><br>
	<hr>
	<h2><center>Profile Picture</center></h2><hr>
<img src="users/<?php echo 	$row_profile['user_image']; ?>" width="110px" width="110px" />
</div>
<input type="file" name="profile_pic">
<input type="submit" value="Update Profile Pic">
<br>
<br>
<hr>
<h2><center>Bio</center></h2><hr>
<div class="profile_detail_user_status_edit">
<form id="bio" method="post" class="updatebio" action="profile.php">
<textarea rows="15" cols="74"><?php echo $row_profile['describe_user']; ?></textarea>
<input type="submit" name="update_bio" value="update Bio">
</form>
</div>
</body>
</html>


<?php
if (isset($_POST['update']))
{
    $email=$_POST['u_email'];
		$username=$_POST['user_id'];
		$birthday=$_POST['u_birthday'];
    $update_query="UPDATE users SET user_email='$email', user_birthday='$birthday' WHERE user_id='$username'";
  $data=mysqli_query($con,$update_query);
  ?>
<pre color="red" font-size='25px'>
<?php
if($data)
echo "Profile Updated";
echo "<script>window.open('profile.php','_self')</script>";

}
?>
</pre>
