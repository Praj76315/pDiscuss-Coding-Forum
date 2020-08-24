<?php
$showAlert = "false";
$showError = "false";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      
      include '_dbconnect.php';
      $username = $_POST['name'];
      $user_email= $_POST['signupEmail'];
      $pass = $_POST['password'];
      $cpass = $_POST['cpassword'];
      
      //check whether this email exists
      
      $existSql = "SELECT * FROM `users`WHERE user_email = '$user_email'";
      $result = mysqli_query($conn, $existSql);
      $numRows = mysqli_num_rows($result);
      
      if($numRows > 0 ){
          $showError = true;
           header("location:/Forum/index.php?userexist=true");
      }
       else {
          if($pass == $cpass){
              $hash = password_hash($pass,PASSWORD_DEFAULT);
              $sql ="INSERT INTO `users` ( `username`, `user_email`, `user_password`, `timestamp`) VALUES ( '$username', '$user_email', '$hash', CURRENT_TIMESTAMP())";
              $result = mysqli_query($conn, $sql);
              if($result){
                  $showAlert = true;
                  header("location:/Forum/index.php?signupsuccess=true");//it is used to redirectto another page
                  exit();
              }
          }
          else {
                $showError = true;
                 header("location:/Forum/index.php?passwordnotmatched=true");
                }
            }
//             header("location:/Forum/index.php?userexist=true");              
      }
?>

