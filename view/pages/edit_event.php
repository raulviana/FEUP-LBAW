
<?php
    include_once('../templates/head.php');
    include_once('../templates/navbar.php');
    include_once('../templates/event-card.php');
?>


 <?php draw_topbar(); ?>

<br><br>



<div class="container">
  
       <div class="row py-4">
         <div class="col-lg-6 mx-auto">
                    <!-- Upload image input-->
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                      <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                 </div>
            </div>
        </div>
    </div>
       
    <div class="image-area mt-4"><img style="color:black;" id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
    <p style="font-size: 0.70rem;" class="font-italic text-black text-center">The image uploaded will be rendered inside the box above.</p>
    
    <div class="row">
        <div class="col">
            <input class="form-control form-control-lg" type="text" placeholder="Event Title">
            <label class="checkbox-inline mr-2"><input type="checkbox" value=""><span style="font-size:0.9rem;"><i> This is a private event.</i></span></label>
        </div>
    </div>

     
                    <br>
                    <h4>Where & When</h4>
                    <!-- location + date -->           
                    <div class="row">
                        <div class="col">
                            <p style="margin-bottom:0" id="event-info"> 📌 <b>Where:</b> <input class="form-control form-control-sm" type="text" placeholder="Location..."> </p>
                            <p id="event-info">🕒 <b>When:</b><input class="form-control form-control-sm" type="text" placeholder="Date and time... "> </p>
                        </div>
                    </div>
                 
                    <!-- tags -->                  
                    <div class="row">            
                        <div class="col">
                    
                           <p id="search-by">Event tags: </p>
                           
                            <label class="checkbox-inline mr-2"><input type="checkbox" value="" checked> <button id="tag-button" type="button" class="btn theater-tag">Theater</button>
</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" value=""><button id="tag-button" type="button" class="btn sculpture-tag">Sculpture</button> </label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" value=""><button id="tag-button" type="button" class="btn dance-tag">Dance</button> 
</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" value=""><button id="tag-button" type="button" class="btn music-tag">Music</button> 
</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" value=""><button id="tag-button" type="button" class="btn paintings-tag">Paintings</button> 
</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" value=""><button id="tag-button" type="button" class="btn comedy-tag">Comedy</button> 
</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" value=""><button id="tag-button" type="button" class="btn literature-tag">Literature</button> 
</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" value=""><button id="tag-button" type="button" class="btn others-tag">Others</button> 
</label>

                         
                        </div>
                    </div>
    
                    <br>
                  
                    <!-- description -->
                    <h4>Details</h4>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tell more about your event..."></textarea>
                    </div>
                    
                    <!-- end info's first section -->
                    <hr>
                    <h4>Contacts</h4>    
          
              
                    <button type="button" class="btn" data-toggle="modal" data-target="#social-media-modal-target">+</button>
                
                    
                    <hr>
                    <h4>Organisers</h4>
                        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px"> 
                        <img src="https://www.mercia-group.co.uk/media/2817/jonathan-eddy.jpg?center=0.31519274376417233,0.54931972789115646&amp;mode=crop&amp;width=448&amp;height=448&amp;rnd=132134651380000000" class="rounded-circle mr-2" alt="Collaborator" width="50px"> 
                        <img src="https://evada-images.global.ssl.fastly.net/76d1ea39-a4eb-4270-b9dc-899653415f8f/home-tile-person-3.jpg?width=345&height=345" class="rounded-circle mr-2" alt="Collaborator" width="50px"> 
                        <!-- only for owner -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">+</button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add collaborator</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="md-form mb-3 mt-0">
                                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <img src="https://secure.gravatar.com/avatar/2ed8aeda33c2d8d526556de14b7027fa?s=400&d=mm&r=g" class="rounded-circle mr-2 align-self-center" alt="Owner" width="30px"> 
                                            <p class="align-self-center">Alice Green</p>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Henry_Cavill_by_Gage_Skidmore_2.jpg/1200px-Henry_Cavill_by_Gage_Skidmore_2.jpg" class="rounded-circle mr-2 align-self-center" alt="Owner" width="30px"> 
                                            <p class="align-self-center">Adam Trent</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    <button id="button-save-changes" type="button" class="btn"> Save changes </button>           
                 
</div>
    
    

<?php
include_once('../templates/footer.php');
?>
    
    
    