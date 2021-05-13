<?php
  $showError="false";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include '_dbconnect.php';
        $user_email=$_POST['signupEmail'];
        $pass=$_POST['password1'];
        $cpass=$_POST['cpassword'];

    $exitsql = "SELECT * FROM `users` WHERE `user_email`='$user_email'";
    $result = mysqli_query($conn, $exitsql);
    
    $numRows= mysqli_fetch_assoc($result);
    
    if($numRows>0){
        $showError="user name already exists";
    }
    else{
        if($pass==$cpass){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `user_email`, `user_pass`, `tstamp`) VALUES ( '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert= true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError="password do not match";
            header("Location: /forum/index.php?signupsuccess=true");
        }
    }
    //echo 'unable to signup';
    header("Location: /forum/index.php?signupsuccess=false&error=$showError");

}
        

?>