<?php
$showError = "false";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      include '_dbconnect.php';
       $username = $_POST['username'];
      $email = $_POST['loginEmail'];
      $pass = $_POST['loginPass'];   
       $sql ="Select * from users where user_email='$email'";
       $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
       if($numRows == 1){
           $row = mysqli_fetch_assoc($result);
           if(password_verify($pass, $row['user_password'])){
               session_start();
               $_SESSION['loggedin'] = true;
               $_SESSION['sno'] = $row['sno'];
               $_SESSION['username'] = $username;
               $_SESSION['useremail'] = $email;
                $showAlert = true;
                  header("location:/Forum/index.php?loginsuccess=true");//it is used to redirectto another page
                  exit();
           }
           else {
                    $showError = true;
                    header("location:/Forum/index.php?loginunsuccess=true");
                }
           } 
       
     
           
  }
?>

