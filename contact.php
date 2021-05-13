<?php include 'partials/_dbconnect.php'; ?>
<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $Name=$_POST['name'];
    $address=$_POST['address'];
    $number=$_POST['number'];

      
    $sql="INSERT INTO `contactus` (`email`, `name`, `address`, `number`, `date`) VALUES ( '$email', '$Name', '$address', '$number', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
      <strong>success! </strong>your comment has been added! please wait for community to respond.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    else{
    echo"error".mysqli_error($conn);
    }}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
    .container{
      min-height:800px;
    }
    </style>

    <title>iforum-for discussion!</title>
  </head>
  <body>
  <?php include 'partials/_header.php'; ?>
 
  

  <div class="container mt-3 mb-0">
<h1 class="text-center">Contact Us</h1>
    
    <form action="/forum/contact.php" method="POST">
  <div class="form-group mt-5 ">
    <label for="exampleInputEmail1 ">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" placeholder="Enter email">
  </div>
  <div class="form-group my-2">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Name">
  </div>
  <label for="exampleInputEmail1">Address</label>
  <div class="form-floating my-2">
  <textarea class="form-control my-2" placeholder="Address" id="Address" name="address"></textarea>
 </div>
  <div class="form-group ">
    <label for="exampleInputEmail1">Phone-Number</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="number" placeholder="Enter Number">
  </div>
  <button type="submit" class="btn btn-success mt-2">Submit</button>
</form>


</div>

  <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>