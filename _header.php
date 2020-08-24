<?php
session_start();
echo '   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand text-success font-weight-bold " href="index.php">pDiscuss</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Forum/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Forum/about.php">About</a>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
         
        $sql = "SELECT category_name, category_id from `categories` LIMIT 6";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threadlist.php?catid=' .$row['category_id'] .'">' .$row['category_name']. '</a>';    
        }
        
     echo'</div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Forum/contact.php" tabindex="-1" >Contact</a>
      </li>
    </ul>
    <div class="row mx-2">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo ' <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      <p class="text-light my-0 mx-2">  Welcome ' .   $_SESSION['useremail']  . '</p>
          <a href="logout.php" class="btn btn-outline-success ml-2">Logout</a>
     </form>';
    }
   else {
        echo ' <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
     </form>
    <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-success mx-2"data-toggle="modal" data-target="#signupModal">Signup</button>';  
       }
    
    echo '</div> 
        </div>
        </nav>';   
include '_loginModal.php';
include '_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo ' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
           <strong>Success!</strong> You can login now.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
            </div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
    echo ' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
           <strong>Success!</strong> You are logged in.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
            </div>';
}
if(isset($_GET['loginunsuccess']) && $_GET['loginunsuccess']=="true"){
    echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
           <strong>Error!</strong>  Wrong username or password.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
            </div>';
}
if(isset($_GET['logout']) && $_GET['logout']=="true"){
    echo ' <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
           <strong>Alert!</strong> You are loggedout. Login to visit again.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
            </div>';
}
if(isset($_GET['userexist']) && $_GET['userexist']=="true"){
    echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
           <strong>Alert!</strong> Username already in use.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
            </div>';
}
if(isset($_GET['passwordnotmatched']) && $_GET['passwordnotmatched']=="true"){
    echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
           <strong>Not Matched!</strong> Password not matched.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
            </div>';
}
if(isset($_GET['contact']) && $_GET['contact']=="true"){
    echo ' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
           <strong>Success!</strong> Query successfully submitted please wait for our response.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
            </div>';
}

?>
