<div class="card  bg-secondary mb-3 rounded mt-2 d-none d-xl-block">
  <div class="card  bg-primary text-black mb-3" style="max-width: 18rem;">
    <center><img src="users/<?php echo $user_image; ?>" class="card-img-top col-lg-8"></center>
    <div class="card-body">
      <h5 class="card-title"><?php echo $user_name; ?></h5>
      <p class="card-text"><center><?php echo $describe_user; ?></center></p>
      <?php echo"
        <a href='mail.php'?Inbox&u_id='$user_id'>  <button type='button' class='fa fa-envelope-o btn btn-light col-lg-9'>
        Message <span class='badge badge-light'>$count_msg</span>
        </button></a>
      ";?><br>
      <?php echo"
        <a href='chatbox.php'><button type='button' class='fa fa-envelope-o btn btn-light mt-1 col-lg-9'>
        Chat <span class='badge badge-light'>$count_msg</span>
        <span class='sr-only'>unread messages</span>
        </button></a>
      ";?><br>
      <?php echo"
        <a href='my_posts.php'?u_id='$user_id'><button type='button' class='fa fa-clipboard btn btn-light mt-1 col-lg-9'>
        My posts <span class='badge badge-light'>$post</span>
        <span class='sr-only'>unread messages</span>
        </button></a>
      ";?><br>
      <?php echo"
        <a href='my_posts.php'?u_id='$user_id'><button type='button' class='fa fa-power-off btn btn-light mt-1 col-lg-9'>
        Logout
        </button></a>
      ";?>
      <p class="card-text text-white"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
