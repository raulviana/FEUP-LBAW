<?php
    include_once('../templates/head.php');
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
                           <center><img src="https://res.cloudinary.com/mhmd/image/upload/v1564991372/image_pxlho1.svg" alt="LOGO ARTNOW" width="150" class="mb-4">
                            <p> <b>Upload image</b></p>
                            </center>
                        </div>
                        
                        <div class="col-md-6">
                            <h4><center>Administrator</center></h4><br>
                            <h6>Information</h6>
                            <p id="user-about">
                                Informamos os nossos utilizadores que fizemos uma parceria com a empresa XXXXX e pode agora usufruir de 10% de desconto numa compra através no site, com o codigo ARTNOW10.
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
                draw_single_eventcard("../../assets/images/maresvivas.png", "Festival Meo Marés Vivas", "Vila Nova de Gaia", "14 a 16 de Julho de 2020", "O MEO Marés Vivas está de volta a Vila Nova de Gaia de 19 a 21 de Julho! Acompanhem a página oficial para saber mais novidades!", 12234);
                
                 draw_single_eventcard("../../assets/images/arte.jpg", "O IMPRESSIONISMO E OS NOVOS CLÁSSICOS NA MÚSICA FRANCESA", "Porto", "9 de Março de 2020", "O Curso Livre de História da Música é dirigido a todos os públicos, independentemente da sua formação musical, e na sua 11ª edição mantém uma ligação próxima com a programação da Casa da Música. ", 494);
                
                 draw_single_eventcard("../../assets/images/comedyclub.jpeg", "Stand Up Comedy - Pinguim Comedy Club", "Porto", "7 de Março de 2020", "Estamos de regresso depois de duas noites lotadas! O cartaz já está a ser empratado e começa a ser servido amanhã. Os lugares sentados são limitados. Até já!", 123);
                
                 draw_single_eventcard("../../assets/images/HarryPotter.png", "HARRY POTTER THE EXHIBITION ", "Lisboa", "Março de 2020", "Mergulha no Mundo Mágico e descobre as decorações icónicas e as peças originais dos filmes da saga. A partir de 16 de novembro, no Pavilhão de Portugal.", 56);
                      
                
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
