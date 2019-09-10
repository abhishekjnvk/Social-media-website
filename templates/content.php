<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="container-fluid bg-dark">
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary d-none d-xl-block">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <form class="form-inline form-control-sm text-white" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email:&nbsp </label>
                <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1 ml-1">&nbspPassword:&nbsp </label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <button type="submit" name="login" class="btn btn-outline-success ml-2 bg-light">Login</button>
      </form>
    </div>
  </nav>
</div>
<div class="container-fluid bg-dark">
<div class="container col-lg-3 float-right mr-5 mt-2 bg-info rounded d-none d-xl-block">
   <form method="post">
        <div class="form-group">
          <label for="exampleFormControlInput1">Your Name</label>
          <input type="text" name="u_name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email addres</label>
          <input type="email" name="u_email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="u_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Date of birth</label>
          <input type="date" name="u_birthday" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Country</label>
          <select name="u_country" class="form-control" id="exampleFormControlSelect1">
                <option>India</option>
                <option>Canada</option>
                <option>China</option>
                <option>United States of America</option>
                <option>UK</option>
                <option>France</option>
                <option>Jamaica</option>
          </select>
        </div>
        <div class="form-check form-check-inline">
          <label for="exampleFormControlSelect1">Gender:&nbsp&nbsp&nbsp</label>
          <input class="form-check-input" type="radio" name="u_gender" id="inlineRadio1" value="male">
          <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="u_gender" id="inlineRadio2" value="female">
          <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
      <div class="modal-footer">
            <button type="submit" name="sign_up" class="btn btn-danger float-right">signup</button>
        <?php include ('insert_user.php'); ?>
      </div>
   </form>
</div>

<!--end of PC screen -->

<!--Start of mobile -->
<div class="d-xl-none bg-light">
      <ul class="nav nav-tabs">
          <li class="nav-item">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Login
          </button>
          </li>
          <li class="nav-item button">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
              Signup
            </button>
          </li>
          <li class="nav-item">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Know More
            </button>
          </li>
      </ul>
<!--login mobile-->
<div class="accordion " id="accordionExample">
  <div class="card">
    <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <form class="form-box form-control-sm text-black" method="post">
                <div class="form-group ">
                  <label for="exampleInputEmail1">Email:&nbsp </label>
                  <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1 ml-1">&nbspPassword:&nbsp </label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-outline-success ml-2 bg-light">Login</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">

        <!--signup mobile-->
        <form method="post" id="signup" class='accordion my-auto'>
             <div class="form-group">
               <label for="exampleFormControlInput1">Your Name</label>
               <input type="text" name="u_name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
             </div>
             <div class="form-group">
               <label for="exampleFormControlInput1">Email addres</label>
               <input type="email" name="u_email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" name="u_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Date of birth</label>
               <input type="date" name="u_birthday" class="form-control" id="exampleInputPassword1" placeholder="Password">
             </div>
             <div class="form-group">
               <label for="exampleFormControlSelect1">Country</label>
               <select name="u_country" class="form-control" id="exampleFormControlSelect1">
                     <option>India</option>
                     <option>Canada</option>
                     <option>China</option>
                     <option>United States of America</option>
                     <option>UK</option>
                     <option>France</option>
                     <option>Jamaica</option>
               </select>
             </div>
             <div class="form-check form-check-inline">
               <label for="exampleFormControlSelect1">Gender:&nbsp&nbsp&nbsp</label>
               <input class="form-check-input" type="radio" name="u_gender" id="inlineRadio1" value="male">
               <label class="form-check-label" for="inlineRadio1">Male</label>
             </div>
             <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="u_gender" id="inlineRadio2" value="female">
               <label class="form-check-label" for="inlineRadio2">Female</label>
             </div>
           <div class="modal-footer">
                 <button type="submit" name="sign_up" class="btn btn-danger float-right">signup</button>
             <?php include ('insert_user.php'); ?>
           </div>
        </form>
        </div>
    </div>
  </div>
  <div class="card">
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
<!--signup mobile-->
</div>

<!--mobile end-->

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
