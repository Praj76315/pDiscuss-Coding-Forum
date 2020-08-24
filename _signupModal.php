<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup for an pDiscuss Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="handleSignUp.php" method="post">
       <div class="modal-body">
                   <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                   </div>
                <div class="form-group">
                <label for="signupEmail">Username</label>
                <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
<!--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
              <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" id="password" name="password">
               </div>
           <div class="form-group">
               <label for="cpassword">Confirm Password</label>
               <input type="password" class="form-control" id="cpassword"name="cpassword">
               </div>
                    
                        <button type="submit" class="btn btn-primary">Signup</button>
          
      </div>
       </form>
      </div>
      
    </div>
  </div>
</div>

