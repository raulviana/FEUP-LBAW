<?php
include_once('../templates/head.php');
include_once('../templates/navbar.php');
include_once('../templates/event-card.php');
?>


<?php draw_topbar(); ?>

<br><br>



<div class="container">
    <div class="row profile justify-content-center">
        <div class="col-lg-10 push-lg-4">
       
            <img style="height:35%; width:100%;" src="../../assets/images/maresvivas.png" alt="Queen Concert" class="img-fluid" width="100%">

         
            <div class="row justify-content-center">
                <div class="col-12">
                    <ul class="nav nav-tabs nav-fill w-100">
                        <li class="nav-item">
                            <a href="" data-target="#info" data-toggle="tab" class="nav-link active">Info</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#posts" data-toggle="tab" class="nav-link">Posts</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#related" data-toggle="tab" class="nav-link">Related</a>
                        </li>
                    </ul>

                    
                    <?php draw_eventbar("festival meo mares vivas") ?>

                    <div class="tab-content p-b-3">
                        <div class="tab-pane active" id="info">
                               
                            <h5>Where & When</h5>
                            <!-- location + date -->
                            <div class="row">
                                <div class="col">
                                    <p style="margin-bottom:0" id="event-info"> 📌 <b>Where:</b> Vila Nova de Gaia </p>
                                    <p id="event-info">🕒 <b>When:</b> 17/07 – 19/07/2020 </p>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <a id="event-maps-button" class="btn btn-light d-inline" href="https://www.google.com/maps/search/?api=1&query=vila+nova+de+gaia" role="button">Go to Google Maps</a>
                                    </div>
                                </div>
                            </div>

                                <!-- tags -->
                                <div class="row">
                                    <div class="col">
                                        <center>
                                            <button style="margin-right: 1.25rem;" id="tag-button" type="button" class="btn music-tag">Music</button>
                                            <button style="margin-right: 1.25rem;" id="tag-button" type="button" class="btn dance-tag">Dance</button>
                                            <button style="margin-right: 1.25rem;" id="tag-button" type="button" class="btn others-tag">Others</button>
                                        </center>
                                    </div>
                                </div>

                                <br>

                                <!-- description -->
                                <h5>Details</h5>
                                <p >MEO Marés Vivas é um festival de música realizado em Vila Nova de Gaia, em Julho. Teve a sua primeira edição em 1999 e em 2010 foi realizada a sua oitava edição, contando com bandas como Placebo, Morcheeba e Ben Harper. Em 2011, a nona edição contou com nomes como Manu Chao, Skunk Anansie, Moby, The Cranberries , Aurea e Mika. Em 2013, a décima primeira edição tem o nome de MEO Marés Vivas, com o namming sponsor do MEO e realiza-se nos dias 18, 19 e 20 de Julho. Em 2016, o festival contou com Elthon John, Tom Odell, Kodaline, Dengaz, Lost Frenquencies, Rui Veloso, James Bay, Kelis e D.A.M.A. nos dias 14,15 e 16 de Julho.</p>

                                <!-- end info's first section -->
                                <hr>
                            
                                <h5>Contacts</h5>

                                <div class="container">

                                    <a href="#" class="fa fa-facebook"></a>
                                    <a href="#" class="fa fa-twitter"></a>
                                    <a href="#" class="fa fa-google"></a>
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-youtube"></a>
                                    <a href="#" class="fa fa-instagram"></a>
                                </div>

                                <hr>
                            
                                <h5>Organisers</h5>
                                <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px">
                                <img src="https://www.mercia-group.co.uk/media/2817/jonathan-eddy.jpg?center=0.31519274376417233,0.54931972789115646&amp;mode=crop&amp;width=448&amp;height=448&amp;rnd=132134651380000000" class="rounded-circle mr-2" alt="Collaborator" width="50px">
                                <img src="https://evada-images.global.ssl.fastly.net/76d1ea39-a4eb-4270-b9dc-899653415f8f/home-tile-person-3.jpg?width=345&height=345" class="rounded-circle mr-2" alt="Collaborator" width="50px">
                                <!-- only for owner -->
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                    <img src="https://media.istockphoto.com/vectors/plus-flat-blue-simple-icon-with-long-shadow-vector-id522539379?k=6&m=522539379&s=612x612&w=0&h=oBs3Qmw78sfKoPEc03pgcKkXhsUoGjHxCV-UBouwcck=" class="rounded-circle" alt="Add" width="50px">
                                </button>
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
                                                    <img src="" class="rounded-circle mr-2 align-self-center" alt="Owner" width="30px">
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

                            </div>

                            <div class="tab-pane" id="posts">

                                <article class="post p-3 mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px">
                                        <h6>Liam Black</h6>
                                    </div>
                                    <p id="comment-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada lobortis mi, vitae facilisis nulla elementum nec. Sed finibus neque et nunc scelerisque, id elementum risus venenatis. Nunc ut mi congue, vehicula nunc id, maximus libero. Pellentesque aliquet mollis sapien, vel blandit sem elementum nec. Pellentesque convallis nunc sed purus feugiat pharetra.</p>
                                    <p id="comment-datetime" class="text-right">04-03-2020, 13:56</p>
                                </article>

                                <hr>
                                

                                <article class="post p-3 mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px">
                                        <h6>Liam Black</h6>
                                    </div>
                                    <p id="comment-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada lobortis mi, vitae facilisis nulla elementum nec. Sed finibus neque et nunc scelerisque, id elementum risus venenatis. Nunc ut mi congue, vehicula nunc id, maximus libero. Pellentesque aliquet mollis sapien, vel blandit sem elementum nec. Pellentesque convallis nunc sed purus feugiat pharetra.</p>
                                    <p id="comment-datetime" class="text-right">04-03-2020, 13:56</p>
                                </article>

                                <hr>
                                
                                <article class="post p-3 mb-3">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px">
                                        <h6>Liam Black</h6>
                                    </div>
                                    <p id="comment-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada lobortis mi, vitae facilisis nulla elementum nec. Sed finibus neque et nunc scelerisque, id elementum risus venenatis. Nunc ut mi congue, vehicula nunc id, maximus libero. Pellentesque aliquet mollis sapien, vel blandit sem elementum nec. Pellentesque convallis nunc sed purus feugiat pharetra.</p>
                                    <p id="comment-datetime" class="text-right">04-03-2020, 13:56</p>
                                </article>

                                
                                
                            </div>

                            <div class="tab-pane" id="related">
                                
                                <div class="row">

                                    <?php

                                    draw_single_eventcard("../../assets/images/HarryPotter.png", "HARRY POTTER THE EXHIBITION ", "Lisboa", "Março de 2020", "Mergulha no Mundo Mágico e descobre as decorações icónicas e as peças originais dos filmes da saga. A partir de 16 de novembro, no Pavilhão de Portugal.", 56);



                                    draw_single_eventcard("../../assets/images/comedyclub.jpeg", "Stand Up Comedy - Pinguim Comedy Club", "Porto", "7 de Março de 2020", "Estamos de regresso depois de duas noites lotadas! O cartaz já está a ser empratado e começa a ser servido amanhã. Os lugares sentados são limitados. Até já!", 123);


                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<?php
include_once('../templates/footer.php');
?>