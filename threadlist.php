<!doctype html>
<html lang="en">
  <head>
    <!-- Requi#e9ecef meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    #ques{
      min-height:200px;
    }

    #mid{
      margin-top:150px;
      margin-bottom:100px;

    }

    @media screen and (min-device-width: 294px) and (max-device-width: 500px){
      #h1{
        font-size:22px;
        font-weight:500;
        margin-top:10px;
        margin-bottom:15px;
      }
      #p{
        font-size:14px;
      }
      #mid{
      margin-top:80px;
      margin-bottom:80px;

    }
    #x{
      height:150px;
    }
    #c{
      font-size:12px;
     
      width:250px;
      /* background-color:red; */
      font-weight:none;
    }
    #a{
      padding-top:10px;
      font-size:8px;
      padding-left:10px;
      width:75px;
      /* background-color:blue; */
    }
    a{
      font-size:20px;
      text-decoration:underline;
    }
    #ques{
      min-height:150px;
    }
    }

    </style>
    <title>iforum-for discussion!</title>
  </head>
  <body>
  <?php include 'partials/_header.php'; ?>
  <?php include 'partials/_dbconnect.php'; ?>
  <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `catagories` WHERE catagories_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['catagories_name'];
        $catdesc = $row['catagories_description'];
    }
    
    ?>
    <?php
    $showAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
      //insert data into data base;
      $th_title=$_POST['title'];
      $th_desc=$_POST['desc'];
      $th_title = str_replace("<", "&lt;", $th_title);
      $th_title = str_replace(">", "&gt;", $th_title);

       $th_desc = str_replace("<", "&lt;",  $th_desc);
       $th_desc = str_replace(">", "&gt;",  $th_desc); 
      $sno=$_POST['sno'];
      $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp());"; 
      $result = mysqli_query($conn, $sql);
      $showAlert=true;
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>success! </strong>your thread has been added! please wait for community to respond.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }

    }
    ?>

   <div class="container my-3 ">
   <div class="jumbotron my-3 py-4 px-4 "  >
   <h1 class="display-4" id="h1"><b>welcome to <?php echo $catname; ?> forums</b></h1>
            <p class="lead" id="p"><b><?php echo  $catdesc; ?> </b></p>
            <hr class="my-4">
            <p id="p">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            
    </div>  
    </div>
    <?php
    if(isset($_SESSION['loggedin'])){
    echo '<div class="container" id="mid" >
    <h1 class="my_3" id="h1"><u>Start a Discussions</u></h1>
      <form action="'. $_SERVER["REQUEST_URI"] .'" method="post" >
        <div class="form-group">
          <label for="exampleInputEmail1">Problem Title</label>
          <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title">
          <small id="emailHelp" class="form-text text-muted">keep your title as short as possible
          .</small>
        </div>
        <input type="hidden" name="sno"  value="'.$_SESSION["sno"].'">
        <div class="form-group">
          <label for="exampleFormControlTextarea1 " class="my-3">Elaburate your concern</label>
          <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
          
        </div>
        
        <button type="submit" class="btn btn-success my-2">Submit</button>
      </form>

    </div>';
    }
    else{
      echo '
      <div class="container px-3 style="background-color:red;">
      <div class="container py-3" id="mid" style="background-color:#e9ecef;">
      <h1 class="my-3" id="h1"><u>Start a Discussion</u></h1>
      <p class="lead" id="p">you are not logged in.please login to be able to start a Discussion.</p>
      </div>
      </div>

      ';
    }
    ?>

    <div class="container" id="ques" >
    <h1 class="my_3 "id="h1"><u>Browse question</u></h1>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id"; 
    $result = mysqli_query($conn, $sql);
    $noresult=true;
    while($row = mysqli_fetch_assoc($result)){
      $noresult=false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $time=$row['timestamp'];
        $thread_user_id=$row['thread_user_id'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        
   



echo '<div class="media my-3 py-4 px-4 " id="x" style="background-color:#e9ecef;">
<img src="image/i.png" width="20px" class="mr-3" alt="...">
<div class="media-body" id="c">'.
 '<h5 class="mt-0" > <a class="text-dark" href="thread.php?threadid=' . $id. '" >'. $title . ' </a></h5><b>
    '. $desc . '</b> </div>'.'
  <div class="font-weight-bold my-0" id="a"> Asked by: '. $row2['user_email'] . ' at '. $time. '</div>'.
'</div>';

} 
if($noresult){
  echo '<div class="jumbotron my-3 py-4 px-4 "id="ques" >
  <div class="container">
    <p class="display-6">No result found</p>
    <p class="lead" id="p">Be the 1st person to ask the question</p>
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