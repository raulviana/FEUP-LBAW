<?php
    include_once('../templates/head.php');
    include_once('../templates/navbar.php');
    include_once('../templates/edit_profile.php');
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
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit profile</a>
                </li>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">

                    <br>
                    <div class="row">
                        <div class="col-md-6">
                           <center><img src="https://media-manager.noticiasaominuto.com/1920/1569938681/naom_59ad8a23b9585.jpg?crop_params=eyJwb3J0cmFpdCI6eyJjcm9wV2lkdGgiOjEwNTAsImNyb3BIZWlnaHQiOjE4NjYsImNyb3BYIjoxMDI5LCJjcm9wWSI6MH0sImxhbmRzY2FwZSI6eyJjcm9wV2lkdGgiOjI4MDAsImNyb3BIZWlnaHQiOjE1NzQsImNyb3BYIjowLCJjcm9wWSI6Njd9fQ==" alt="" width="400" class="mb-4">
                            <p> <b>Upload image</b></p>
                            </center>
                        </div>
                        
                        <div class="col-md-6">
                            <h4><center>Mark Zuckerberg</center></h4><br>
                            <h6>About</h6>
                            <p id="user-about">
                                Programador e empresário norte-americano, conhecido internacionalmente por ser um dos fundadores do Facebook, a rede social mais acessada do mundo.
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
                            <h4 class="m-t-2">Going to </h4>
                        </div>
                        
                               <?php

                draw_single_eventcard("../../assets/images/HarryPotter.png", "HARRY POTTER THE EXHIBITION ", "Lisboa", "Março de 2020", "Mergulha no Mundo Mágico e descobre as decorações icónicas e as peças originais dos filmes da saga. A partir de 16 de novembro, no Pavilhão de Portugal.", 56);
                
              
                
                draw_single_eventcard("../../assets/images/comedyclub.jpeg", "Stand Up Comedy - Pinguim Comedy Club", "Porto", "7 de Março de 2020", "Estamos de regresso depois de duas noites lotadas! O cartaz já está a ser empratado e começa a ser servido amanhã. Os lugares sentados são limitados. Até já!", 123);
                
                                
                                ?>
                        
                          <div class="col-md-12">
                            <h4 class="m-t-2">My events </h4>
                              </div>
                                <?php
                draw_single_eventcard("../../assets/images/party.jpg", "Jantar de aniversario", "Lisboa", "11 de Maio de 2020", "Jantar de aniversario informal para os amigos mais proximos no restaurante XXXXXXXX", 12);
                        
                       
                                
                                ?>
                        
                        
                          <div class="col-md-12">
                            <h4 class="m-t-2">Wishlist  </h4>
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