<?php
    $showError="false";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include '_dbconnect.php';
        $email=$_POST['loginEmail'];
        $pass=$_POST['pass'];
        $sql= "SELECT * FROM `users` WHERE  user_email= '$email'"; 
        $result = mysqli_query($conn, $sql);
        $numRows= mysqli_num_rows($result);
      // print_r ($numRows);
        if($numRows){
            $row = mysqli_fetch_assoc($result);
            
            if(password_verify($pass,$row['user_pass'])){
             //  echo "ok";
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['sno']=$row['sno'];
            $_SESSION['useremail']=$email;
            echo "logg in". $email;               
        }            
        header("Location: /forum/index.php");
      
     }
     header("Location: /forum/index.php");
           
        
}
        
 ?>    