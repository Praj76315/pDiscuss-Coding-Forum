<?php

// configuration
include '_dbconnect.php';

$row = $_POST['row'];
$rowperpage = 3;

// selecting posts
$query = 'SELECT * FROM categories limit '.$row.','.$rowperpage;
$result = mysqli_query($conn,$query);



   while ($row= mysqli_fetch_assoc($result)){
                  $id = $row['category_id'];
                  $cat = $row['category_name'];
                  $desc = $row['category_description'];
                     $link = $row['link'];
                 echo '<div class="col-md-4 my-2">
                  <div class="card " style="width: 18rem;">
                  <img src="card'.$id. '.jpg"  class="card-img-top" alt="...">
                  <div class="card-body">
                   <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                   <p class="card-text">' . substr($desc, 0, 90) .'...</p>
                   <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
                          <a href="'.$link.'" target="_blank" class="more">More</a>
                   </div>
               </div>
              </div>';
              }    


?>