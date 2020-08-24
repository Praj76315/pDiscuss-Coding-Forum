<?php
//if(isset( $_POST['name']))
//$name = $_POST['name'];
//if(isset( $_POST['email']))
//$email = $_POST['email'];
//if(isset( $_POST['message']))
//$message = $_POST['message'];
//if(isset( $_POST['subject']))
//$subject = $_POST['subject'];
//$content="From: $name \n Email: $email \n Message: $message";
//$recipient = "praj76315@gmail.com";
//$mailheader = "From: $email \r\n";
//mail($recipient, $subject, $content, $mailheader) or die("Error!");
//echo "Email sent!";
$showAlert = "false";
if($_SERVER['REQUEST_METHOD']=="POST"){
    include '_dbconnect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $con_sql ="INSERT INTO `contact` ( `name`, `email`, `subject`, `message`) VALUES ( '$name', '$email', '$subject', '$message')";
    $con_result = mysqli_query($conn, $con_sql);
    if($con_result){
        $showAlert = true;
        header("location:/Forum/index.php?contact=true");
    }
}
?>

