<div id='container col-lg-8'>
<?php
echo "<h2>Comments</h2>";
	$get_id = $_GET['post_id'];
	$get_com = "select * from comments where post_id='$get_id' ORDER by 1 DESC";
	$run_com = mysqli_query($con,$get_com);
	while ($row=mysqli_fetch_array($run_com)) {
		$com = $row['comment'];
		$com_name = $row['comment_author'];
		$date = $row['date'];
		$u_id= $row['user_id'];
		echo "
				<b><a href='user_profile.php?u_id=$u_id'>$com_name</b></a><span><i>&nbsp, &nbsp Commented</i> on $date</span>
				<div>$com</div>
		";
	}
?>
</div>
