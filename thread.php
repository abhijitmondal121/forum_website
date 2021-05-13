<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
    #ques{
      min-height:500px;
    }
    </style>
    <title>iforum-for discussion!</title>
  </head>
  <body>
  <?php include 'partials/_header.php'; ?>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $content = $row['thread_desc'];   
         $thread_user_id = $row['thread_user_id']; 
         
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by=$row2['user_email'];
 
      

    } 
    
    ?>

<?php
    $showAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
      //insert threads into data base;
      $comment=$_POST['comment'];
      $comment = str_replace("<", "&lt;", $comment);
      $comment = str_replace(">", "&gt;", $comment); 
      $sno=$_POST['sno'];
      $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`,`comment_time` ) VALUES ( '$comment', '$id','$sno', current_timestamp())"; 
      $result = mysqli_query($conn, $sql);
      $showAlert=true;
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>success! </strong>your comment has been added! please wait for community to respond.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }

    }
    ?>




<div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead">  <?php echo $content;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <p>Posted by: <em><?php echo $posted_by; ?></em></p>
        </div>
    </div>

    <div class="container">
    
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
      echo '
      <form action="'. $_SERVER['REQUEST_URI'] .'" method="post" >
        <div class="form-group">
        <h1 class="my-2"><u>Post a comment</u></h1>
          <label for="exampleFormControlTextarea1 " class="my-3">type your Comments</label>
          <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
          <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
        </div>
        
        <button type="submit" class="btn btn-success my-2">postcomment</button>
      </form>

      </div>
      ';}
      else{
        echo '
        <div class="container">
        <h1 class="my-2"><u>Post a comment</u></h1>
      <p class="lead">you are not logged in.please login to be able to post a comment .</p>
      </div>
        ';
      }
      ?>
    </div>  <!--abc-->
    <div class="container" id="ques">
    <h1 class="my-3 "><u>Discussions</u></h1>
   <?php
    $noresult=true;
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comment` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      $noresult=false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time= $row['comment_time'];

        $thread_user_id=$row['comment_by'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
 

 echo  '<div class="media my-3">
   <img  src="image/user.jpg"  width="25px" class="mr-3"  alt="...">
  <div class="media-body ">
  <p class="font-weight-bold my-0">'. $row2['user_email'] .''.$comment_time.'</p>
  '.$content.'
</div>
</div>';

} 
if($noresult){
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-6">No Comments found</p>
      <p class="lead">Be the 1st person to ask the question</p>
    </div>
  </div>
    ';
  }
  
?>

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