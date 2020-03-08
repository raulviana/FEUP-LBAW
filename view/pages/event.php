
<?php
    include_once('../templates/header.php');
    include_once('../templates/navbar.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top d-flex align-items-center">
            <div class="flex-grow-1 align-self-center d-flex align-items-center">
                <h3 class="mb-0" id="event_title">Queen Concert</h3>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse flex-grow-1 justify-content-end text-right align-self-center" id="navbarSupportedContent">
                <ul class="navbar-nav flex-nowrap">
                    <li class="nav-item">
                        <a class="nav-link bg-secondary" href="#">Buy Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Wishlist</a>
                    </li>
                    <!-- for artist that haven't confirmed presence -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Confirm Presence</a>
                    </li>
                    <!-- for artist that have already confirmed presence -->
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#">Cancel Presence</a>
                    </li>-->
                    <!-- only for collaborators and owner -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Edit</a>
                    </li>
                    <!-- only for owner -->
                    <li class="nav-item">
                        <a class="nav-link bg-danger" href="#">Cancel</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- image -->
        <img src="https://www.clarionlbv.com/wp-content/uploads/2014/11/CLBV-Central-Florida-Events-Main-Img.jpg" alt="event_name" class="img-fluid">


        <nav>
            <div class="nav nav-tabs nav-fill w-100" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Info</a>
                <a class="nav-item nav-link" id="nav-posts-tab" data-toggle="tab" href="#nav-posts" role="tab" aria-controls="nav-posts" aria-selected="false">Posts</a>
                <a class="nav-item nav-link" id="nav-related-tab" data-toggle="tab" href="#nav-related" role="tab" aria-controls="nav-related" aria-selected="false">Related</a>
            </div>
        </nav>
        <div class="tab-content m-5" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                <!-- location -->
                <h4 class="d-inline mr-5">Altice Arena, Lisbon</h4>
                <a id="event_tag" class="btn btn-light d-inline" href="https://www.google.com/maps/search/?api=1&query=altice+arena" role="button">Go to Maps</a>
                <!-- dates -->
                <h5>12-12-2020 20:30 - 12-12-2020 23h30 GMT</h5>
                <!-- tags -->
                <a id="event_tag" class="btn btn-info" href="#" role="button">Music</a>
                <a id="event_tag" class="btn btn-secondary" href="#" role="button">Concert</a>
                <a id="event_tag" class="btn btn-secondary" href="#" role="button">Classics</a>
                <hr>
                <!-- description -->
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis dui augue, ut condimentum ante interdum nec. Donec sed magna dolor. Ut consequat pharetra blandit. Etiam convallis eu nisi et rutrum. Suspendisse placerat augue nec rutrum commodo. Mauris vestibulum nisi vel odio pretium, quis vestibulum tellus pellentesque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                <hr>
                <h3>Contacts</h3>
                <div id="event_sm">
                    <a class="btn btn-dark" href="#" role="button">Website</a>
                    <a class="btn btn-dark" href="#" role="button">Facebook</a>
                    <a class="btn btn-dark" href="#" role="button">Instagram</a>
                </div>
                <hr>
                <h3>Organisers</h3>
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
                                <img src="data:image/jpeg;base64,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" class="rounded-circle mr-2 align-self-center" alt="Owner" width="30px"> 
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
            <div class="tab-pane fade" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                <article class="bg-light p-3 mb-3">
                    <div class="d-flex flex-row align-items-center">
                        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px"> 
                        <h6>Liam Black</h6>
                    </div>
                    <p class="text-justify mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada lobortis mi, vitae facilisis nulla elementum nec. Sed finibus neque et nunc scelerisque, id elementum risus venenatis. Nunc ut mi congue, vehicula nunc id, maximus libero. Pellentesque aliquet mollis sapien, vel blandit sem elementum nec. Pellentesque convallis nunc sed purus feugiat pharetra.</p>
                    <p class="text-right">04-03-2020, 13:56</p>
                </article>
                <article class="bg-light p-3 mb-3">
                    <div class="d-flex flex-row align-items-center">
                        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px"> 
                        <h6>Liam Black</h6>
                    </div>
                    <p class="text-justify mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada lobortis mi, vitae facilisis nulla elementum nec. Sed finibus neque et nunc scelerisque, id elementum risus venenatis. Nunc ut mi congue, vehicula nunc id, maximus libero. Pellentesque aliquet mollis sapien, vel blandit sem elementum nec. Pellentesque convallis nunc sed purus feugiat pharetra.</p>
                    <p class="text-right">04-03-2020, 13:56</p>
                </article>
                <article class="bg-light p-3 mb-3">
                    <div class="d-flex flex-row align-items-center">
                        <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px"> 
                        <h6>Liam Black</h6>
                    </div>
                    <p class="text-justify mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut malesuada lobortis mi, vitae facilisis nulla elementum nec. Sed finibus neque et nunc scelerisque, id elementum risus venenatis. Nunc ut mi congue, vehicula nunc id, maximus libero. Pellentesque aliquet mollis sapien, vel blandit sem elementum nec. Pellentesque convallis nunc sed purus feugiat pharetra.</p>
                    <p class="text-right">04-03-2020, 13:56</p>
                </article>
            </div>
            <div class="tab-pane fade" id="nav-related" role="tabpanel" aria-labelledby="nav-related-tab">...</div>
        </div>
        <!--     FOOTER     -->

       


<?php
    include_once('../templates/footer.php');
?>