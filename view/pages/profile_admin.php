<?php
    include_once('../templates/header.php');
    include_once('../templates/navbar.php');
    include_once('../templates/edit_profile.php');
    include_once('../templates/navbar.php');
    include_once('../templates/event-card.php');

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
                    <a href="" data-target="#manage-users" data-toggle="tab" class="nav-link">Manage users</a>
                </li>
                
                 <li class="nav-item">
                    <a href="" data-target="#manage-events" data-toggle="tab" class="nav-link">Manage events</a>
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
                            <h4><center>Administrator</center></h4><br>
                            <h6>Information</h6>
                            <p id="user-about">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis dui augue, ut condimentum ante interdum nec. Donec sed magna dolor. Ut consequat pharetra blandit. Etiam convallis eu nisi et rutrum. Suspendisse placerat augue nec rutrum commodo.
                            </p>
                        </div>
                    </div>
                    <!--/row-->
                </div>

                
                
          
                
                <div class="tab-pane" id="manage-users">
                        <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Fullname</th>
                          <th scope="col">Email</th>
                          <th scope="col">Delete</th>
                          <th scope="col">State</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td> <button id="delete-button" type="button" class="btn btn-danger">x</button> </td>
                            <td> Active </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td><button id="delete-button" type="button" class="btn btn-danger">x</button> </td>
                          <td> Active </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>-</td>
                          <td> Removed </td>
                        </tr>
                      </tbody>
                    </table>        
                    
                </div>
                
                <div class="tab-pane" id="manage-events">
                    <?php draw_searchbar(); ?>
                    
                    <div class="album py-5 bg-light" >
                        <div class="container">
                            <div class="row">
                                <?php
                                    for($i=0; $i<9; $i++)
                                        draw_single_eventcard();
                                ?>
                            </div>
                        </div>
                    </div> 
                    
                </div>
                
                <div class="tab-pane" id="edit">
                    
                   <?php edit_profile(0); ?>      <!-- HARDCODED: criar #define para distinguir admin de user regular -->              
                    
                </div>
                
            </div>
        </div>
   </div>
</div>



<?php
include_once('../templates/footer.php');
?>