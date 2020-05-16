
<?php
session_start();
$con=mysqli_connect('localhost','root','','project');
// for registering data
if(isset($_POST['confirm']))
{
  $username=$_POST['username'];
  $email=  $_POST['email'];
  $password= $_POST['password'];
  $pass=md5($password.$email);
  $query=$con->prepare("SELECT * FROM `-record` WHERE `email`=?");
  $query->bind_param("s",$email);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
  	if($row==1)
    {
  	   echo '<script>alert("email already exists")</script>';

     }
    else {
      $query1=$con->prepare("INSERT INTO `record`(`username`, `email`, `password`) VALUES (?, ? ,?)");
      $query1->bind_param("sss",$username, $email,$pass);
      $query1->execute();
      $run1= $query->get_result();
      echo '<script>alert("Registered Successfully")</script>';


    }
}

// for login`
if(isset($_POST['Login']))
{
  $email=  $_POST['email'];
	$password= $_POST['password'];
  $_SESSION['email']=$email;
  $pass=md5($password.$email);
  $query=$con->prepare("SELECT * FROM `record` WHERE `email` = ?");
  $query->bind_param("s",$email);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
	if($row==1){
    $res=$run->fetch_assoc();
    if($res['password']==$pass){
	     header('location:enquiry.php');
     }
     else{
      echo '<script>alert("you entered Wrong password")</script>';
     }
  }
  else {
    echo '<script>alert("you have not yet Registered")</script>';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="index.css">
</head>
<body>

  <header>
    <div class="container-fluid">
    <div class="navbarResponsive">
    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <a  class="photo" class="navbar-brand" href="#">
      <img src="logo.jpg" height="50" width="70" alt="">
      </a>
      <h5 style="color:white;">Business growth</h5>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#"><b>Home</b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#con"><b>Contact Us</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><b>About Us</b></a>
      </li>
    </ul>
  </div>
</nav>
</div>
</div>
  </header>
  <main>
<!-- login -->
<br>
<br>
<div class="modal-dialog text-center">
  <div class="main-section">
    <div class="modal-content">
        <div class="modal-body">
          <br>
      <div class="col-12">
        <h2>Login</h2>
      </div>
      <form action="#" method="post" name="login" class="needs-validation" novalidate>
        <div class="input-group mb-3">
         <input type="email" name="email" class="form-control" placeholder="Email" required>
        <div class="input-group-append">
        <span class="input-group-text">@example.com</span>
       </div>
       <div class="valid-feedback">Valid.</div>
       <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-group">
         <input type="password" name="password" class="form-control" placeholder="password" id="pwd" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
       </div>
       <br>
       <button type="submit" name="Login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Login</button>
      </form>

      <div class="col-12 forgot">
        <a href="#">Forget Password?</a>
    </div>
    <br>
  </div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4 col-md-4 "></div>
<div class="col-sm-4 col-md-4 ">
<h3>Don't have an account yet?</h3>
<button style="border: 1px solid black;color:black;background-color:lightgray;"class="btn btn-secondary" data-target="#mymodel" data-toggle="modal">Registration</button>
</div>!
</div>
<!-- registration-->
<div class="container">
  <div class="modal" id="mymodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="text-dark" style= "padding:10px;color:black;">Create Your Account</h3>
          <button type="button" class="close" data-dismiss="modal">&times</button>
        </div>
       <div class="modal-body">
          <form action="#" method="post" name="login" class="needs-validation" novalidate>
            <div class="input-group mb-5">
            <div class="input-group">
            <div class="input-group-prepend">
           <span class="input-group-text" id="inputGroupPrepend">@</span>
           </div>
          <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
           Please choose a username.
          </div>
        </div>
        </div>
           <div class="input-group mb-5">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
           <div class="input-group-append">
           <span class="input-group-text">@example.com</span>
          </div>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
           </div>
       <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="password" id="pwd" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
    <div class="modal-footer  justify-content-center">
    <button type="submit" name="confirm" class="btn btn-success"> Confirm</button>
    </div>
       </form>
   </div>
 </div>
</div>
</div>
</div>
</main>
<footer>
<!-- contact-->
<div class="ff">"
<hr class="my-4">
<div id="con">
<div class="container-fluid padding">
<div class="row text-center padding">
  <div class="col-12">
    <h3>Contact Us</h3>
  </div>
  <div class="col-12 social padding">
    <a href="#"><l class="fab fa-facebook"></l></a>
      <a href="#"><l class="fab fa-twitter"></l></a>
        <a href="#"><l class="fab fa-instagram"></l></a>
          <a href="#"><l class="fab fa-youtube"></l></a>
  </div>
</div>
</div>
</div>
</div>
</footer>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</body>
</html>
