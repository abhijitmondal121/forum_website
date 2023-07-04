<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum">iDiscuss</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>

      <li class="nav-item ">
        <a class="nav-link  " href="/forum/contact.php" tabindex="-1">contact</a>
      </li>
    </ul>
    <div class="row">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
      echo '<form class="form-inline" method="get" action="search.php">
      <input class="form-control me-2 mx-2 " name="search" type="search" placeholder="Search"  aria-label="Search">
      <button class="btn btn-outline-light me-2 " type="submit">Search</button>
      <p class="text-light my-0 mx-1">  welcome_'.$_SESSION['useremail'].'</p>
      <a href="partials/_logout.php" class="btn btn-outline-light mr-2"  data-bs-target="#logoutmodal">Logout</a>
    </form>
    ';

    }
    else{
      echo '<form class="form-inline" method="get" action="search.php">
      <input class="form-control me-2 ml-2" name="search" type="search" placeholder="Search"  aria-label="Search">
      <button class="btn btn-outline-light me-2 ml-2" type="submit">Search</button>
    </form>
      <button class="btn btn-outline-light mx-2 " data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
      <button class="btn btn-outline-light mr-2" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>
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
