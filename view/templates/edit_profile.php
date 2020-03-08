<?php function edit_profile($user_type){  ?>
    
    <h4 style="margin: 1.2rem;" class="text-center">Edit Profile</h4>
    <form role="form"> 
        
        <?php 
                                if($user_type == 1) { /* 0: admin ; 1: regular user */ ?>
        
    
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Full name</label>
            <div class="col-lg-9">
                <input class="form-control" type="text" placeholder="Full name">
            </div>
        </div>
        
        <?php
                                }
                                        ?>
        
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Email</label>
            <div class="col-lg-9">
                <input class="form-control" type="text" placeholder="Email">
            </div>
        </div>
                
        
          <?php 
                                if($user_type == 1) { /* 0: admin ; 1: regular user */ ?>
        
        
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">About</label>
            <div class="col-lg-9">
                 <textarea class="form-control" placeholder="What's on your mind?" rows="3"></textarea>
            </div>
        </div>
        
           <?php
                                }
                                        ?>
                        
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Password</label>
            <div class="col-lg-9">
                 <input class="form-control" type="password" placeholder="Password">
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
            <div class="col-lg-9">
                <input class="form-control" type="password" placeholder="Confirm password">
            </div>
        </div>
        
        
        <div class="form-group row">
             <label class="col-lg-3 col-form-label form-control-label"></label>
             <div class="col-lg-9">
                 <input type="reset" class="btn btn-secondary" value="Cancel">
                 <input type="button" class="btn btn-primary" value="Save Changes">
            </div>
        </div>
        
</form>
        
        
<?php } ?>