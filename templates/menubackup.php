
	<?php
		//get the user email from the login session
		$user = $_SESSION['user_email'];
		//create a sql query
		$get_user = "select * from users where user_email='$user'";
		//run the sql query
		$run_user = mysqli_query($con,$get_user);
		//get the row of the query
		$row = mysqli_fetch_array($run_user);

		//set the user id to the selected row
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$describe_user =substr($row['describe_user'], 0, 20) .'...' ;  //Show only 20 word of line status

		$user_image = $row['user_image'];
		$user_posts = "select * from posts where user_id='$user_id'";
		//run the sql sql query
		$run_posts = mysqli_query($con,$user_posts);
			//	error_reporting(0);

		//select all data one by one
		$post = mysqli_num_rows($run_posts);
		$sel_msg = "select * from messages where reciver='$user_id' AND (status='unread' AND deleted='0') ORDER by 1 DESC";
		$run_msg = mysqli_query($con,$sel_msg);
		$count_msg = mysqli_num_rows($run_msg);?>

<div id="head_wrap">
	<div id="header">
		<ul id="menu">
			<li><a class="fa fa-home" href="home.php">&nbsp;Home</a></li>
			<li><a class="fa fa-user" href='user_profile.php?u_id=<?php echo $user_id; ?>'>&nbsp;Profile</a></li>
			<li><a class="fa fa-user-plus" href="friends.php">&nbsp;Friends</a></li>
			<li><a class="fa fa-envelope" href="my_posts.php">&nbsp;My Posts</a></li>
			<li><a class="fa fa-paper-plane" href="my_messages.php">&nbsp;Mail</a></li>
			<li><a class="fa fa-paper-plane" href="chatbox.php">&nbsp;Messages</a></li>
		</ul>
		<form method="post" action="results.php" id="form1">
			<input type="text" name="user_query" placeholder="Search" minlength="3" required>
			<input type="submit" name="search" value="Search">
		</form>
	</div>
</div>
<div class="content">
	<div id="user_timeline">
		<div id="user_details">
				<?php
								echo
				"<center>
					<img src='users/$user_image' width='150px' height='150px'/>
				</center>
				<div id='user_mention'>
					<p><center><h2>$user_name</h2></center>
					<center><strong>$describe_user</strong></center></p>
					<p class='fa fa-group'>&nbsp;<a href='my_messages.php'?Inbox&u_id='$user_id'>Messages ($count_msg)</a></p>
					<p class='fa fa-user-o'>&nbsp;<a href='my_posts.php'?u_id='$user_id'>My Posts ($post)</a></p><br>
					<p class='fa fa-mouse-pointer'>&nbsp;<a href='logout.php'>Logout</a></p><br>
					<p class='fa fa-paint-brush'>&nbsp;<a href='#'>Edit Profile<br></a>&nbsp&nbsp&nbsp coming soon </p>

				</div>
				";
			?>
		</div>
	</div>
</div>
