<?php

	$con = mysqli_connect("localhost", "root", "", "social_media") or die("Connection was not established");
	//$con =  mysqli_connect("localhost", "id8818379_abhishek", "9934190257", "id8818379_social_media");
	//function for insert posts
	function insertPost()
	{
		//if the submit button is clicked
		if (isset($_POST['sub'])) {
			# code...
			global $con;
			global $user_id;

			//returns a string with backslashes infront of each chars
			$content = addslashes($_POST['content']);

			if ($content=='') {
				# code...
				echo "<h2>Please Enter your post</h2>";
				exit();
			}
			else
			{
				$insert = "insert into posts (user_id, post_content, post_date) values('$user_id', '$content', NOW())";
				$run = mysqli_query($con,$insert);

				if ($run) {
					# code...
					echo "<script>alert('Your post has been updated successfully')</script>";

					$update = "Update users set post='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con,$update);
				}
			}
		}
	}

	function get_posts()
	{
		global $con;
		$per_page = 8;
		if (isset($_GET['page'])) {
			# code...
			$page = $_GET['page'];
		}
		else
		{
			$page = 1;
		}
		$start_from = ($page-1) * $per_page;

		$get_posts = "select * from posts ORDER by post_id DESC LIMIT $start_from, $per_page";
		$run_posts = mysqli_query($con,$get_posts);

		while ($row_posts=mysqli_fetch_array($run_posts)) {
			# code...
			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];

			$content = substr($row_posts['post_content'], 0, 70);
			$post_date = $row_posts['post_date'];

			//getting user who posted the thread
			$user = "select * from users where user_id='$user_id' AND post='yes'";
			$run_user = mysqli_query($con,$user);

			$row_user = mysqli_fetch_array($run_user);
			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];


			//displaying posts

			echo "
				<button class='fa fa-calendar ' style='float:right;'>&nbsp;$post_date</button>
				<div id='posts'>
					<p><img src='users/$user_image' width='80' height='80' class='rounded-pill' mt-0/></p>
					<a href='user_profile.php?u_id=$user_id'>$user_name</a>&nbsp<div class='float-right' style='color:black'>Updated on $post_date</div>
					<p style='color:white'>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='fa fa-comment'>&nbsp;Comment</button></a>
				</div><br><br>
			";
		}

		include ('pagination.php');
	}

	function single_post()
	{
		if (isset($_GET['post_id'])) {
			# code...
			global $con;

			$get_id = $_GET['post_id'];

			$get_posts = "select * from posts where post_id='$get_id'";
			$run_posts = mysqli_query($con,$get_posts);

			$row_posts = mysqli_fetch_array($run_posts);

			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$content = $row_posts['post_content'];
			$post_date = $row_posts['post_date'];


			//getting the user who posted the thread
			$user = "select * from users where user_id='$user_id' AND post='yes'";

			$run_user = mysqli_query($con,$user);

			$row_user = mysqli_fetch_array($run_user);


			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];
			$user_com = $_SESSION['user_email'];


			$get_com = "select * from users where user_email='$user_com'";

			$run_com = mysqli_query($con,$get_com);
			$row_com = mysqli_fetch_array($run_com);

			$user_com_id = $row_com['user_id'];
			$user_com_name = $row_com['user_name'];

			//displaying all post at once

			echo "
			<div id='posts' class='container bg-light'>
			<div class='row'>
						<div><img src='users/$user_image' width='80' height='80'/></div>
						<div class='block'>
						<div><a href='user_profile.php?u_id=$user_id'>$user_name</a></div>
						<div>Posted On: $post_date</div>
						</div></div>
						<hr>
						<p class=''>$content</p>
						<hr>
						<form method='post'>
							<input type='textarea' name='comment' placeholder='write your comment here' clasa='col-lg-10' required>
							<input class='' type='submit' name='reply' value='Comment' ><br />
						</form>
						";
						include ("comments.php");
				echo "</div>";
				echo "<br />
				";
				if (isset($_POST['reply'])) {
					$comment = $_POST['comment'];
					$insert = "insert into comments (post_id, user_id, comment, comment_author, date)
					values('$post_id','$user_id', '$comment', '$user_com_name', NOW())";
					$run = mysqli_query($con, $insert);
					echo "<script>window.open('single.php?post_id=$post_id', '_self')</script>";
				}
		}
	}



?>
