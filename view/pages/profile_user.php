<?php
    include_once('../templates/header.php');
    include_once('../templates/navbar.php');
    include_once('../templates/edit_profile.php');

   draw_topbar();

?>

     <br><br><br><br>
<div class="container">
       <div class="row profile justify-content-center">
		   <div class="col-lg-10 push-lg-4">
     
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>

                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit profile</a>
                </li>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">

                    <br>
                    <div class="row">
                        <div class="col-md-6">
                           <center><img src="https://res.cloudinary.com/mhmd/image/upload/v1564991372/image_pxlho1.svg" alt="" width="150" class="mb-4">
                            <p> <b>Upload image</b></p>
                            </center>
                        </div>
                        
                        <div class="col-md-6">
                            <h4><center>User full name</center></h4><br>
                            <h6>About</h6>
                            <p id="user-about">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis dui augue, ut condimentum ante interdum nec. Donec sed magna dolor. Ut consequat pharetra blandit. Etiam convallis eu nisi et rutrum. Suspendisse placerat augue nec rutrum commodo.
                            </p>
                            <h6>Preferences</h6>
                            <!-- hardcoded -->
                            <div class="row">
                                 <div class="col px-md-6">
                                    <button id="tag-button" type="button" class="btn music-tag">Music</button> 
                                </div>

                                  <div class="col px-md-6">
                                      <button id="tag-button" type="button" class="btn paintings-tag">Paintings</button> 
                                  </div>

                                  <div class="col px-md-6">
                                      <button id="tag-button" type="button" class="btn comedy-tag">Comedy</button> 
                                  </div> 
                            </div>
                            <!-- hardcoded -->
                        </div>
                      
                        <hr>
                        
                        
                        <div class="col-md-12">
                            <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Going to </h4>
                        </div>
                        
                          <div class="col-md-12">
                            <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> My events </h4>
                        </div>
                        
                          <div class="col-md-12">
                            <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span>  Wishlist  </h4>
                        </div>
                    </div>
                    <!--/row-->
                </div>

                
                
                <div class="tab-pane" id="edit">
                    
                   <?php edit_profile(1); ?>      <!-- HARDCODED: criar #define para distinguir admin de user regular -->              
                    
                </div>
                
            </div>
        </div>
   </div>
</div>



<?php
include_once('../templates/footer.php');
?>