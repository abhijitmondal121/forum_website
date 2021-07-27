<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
<img src="image/p.png" width="60px"  class="mx-3 " alt="...">
  <a class="navbar-brand mx-2" href="/forum">iforum</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link mx-3 active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-3" href="/forum/about.php">About</a>
      </li>
      

      <li class="nav-item ">
        <a class="nav-link mx-3 " href="/forum/contact.php" tabindex="-1">contact</a>
      </li>
    </ul>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
      echo '<form class="d-flex" method="get" action="search.php">
      <input class="form-control me-2 mx-3" name="search" type="search" placeholder="Search"  aria-label="Search">
      <button class="btn btn-outline-light me-2" type="submit">Search</button>
      
    </form>
    <p class="text-light my-0 mx-1">  welcome_'.$_SESSION['useremail'].'</p>
    <div class="mx-2">
    
    <a href="partials/_logout.php" class="btn btn-outline-light "  data-bs-target="#logoutmodal">Logout</a>
  
    </div>
    ';

    }
    else{
      echo '    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light me-2" type="submit">Search</button>
      </form>
      <div class="mx-0">
      
      <button class="btn btn-outline-light mx-0 " data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
      <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>
      
      </div>
       ';
    }

 echo '  </div>
</div>
</nav>';
include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] =="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You are signup successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
?>