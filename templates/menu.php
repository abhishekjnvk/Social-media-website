
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Welcome Users!</title>
</head>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="user_profile.php?u_id=<?php echo $user_id; ?>">profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="friends.php">Friends <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="my_posts.php">My Post <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="mail.php">Mail <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="chatbox.php">Chat <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
      </li>
    </ul>
    <form class="form-inline" method="post" action="results.php">
      <div class="input-group">
        <input type="text" name="user_query" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
					<div class="input-group-prepend">
						<span class="input-group-text" type="submit" id="basic-addon1" name="search">search</span>
					</div>
			</div>
    </form>
  </div>
</nav>
