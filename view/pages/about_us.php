<?php
    include_once('../templates/head.php');
    include_once('../templates/navbar.php');
    include_once('../templates/edit_profile.php');

   draw_topbar();

?>

    <br><br><br>

    <div class="container">

        <h4 class="mt3">About Us</h1>
            <hr>

            <div class="row justify-content-start">
                <div class="col-xs-5 col-lg-5">
                    <p id="about-us">
                        EventNow platform allows the art events management, namely gigs and music festivals, dance
                        shows,
                        theatre, and art exhibitions, among others.
                    </p>
                    <p id="about-us">
                        We think, that nowadays, it would be useful such a platform, allowing users to not only organize
                        and
                        search for events
                        , but also advertise and show low visibility artists and bands. These events can change in
                        dimension, ranging from
                        organizing the gig of a newly formed band to bigger scale events, like a music or a dance
                        festival.
                    </p>
                </div>
                <div class="col">
                    <img style="width: 75%; heigth:auto;" src="../../assets/images/about_us.jpg" alt="Events" class="rouded-float-left">
                </div>
            </div>


            <h4 class="mt3">Our Team</h1>
                <hr>
                <!--TEAM CARDS-->
                <div class="row text-center row-cols-4">
                    <div class="col d-flex justity-content-center">
                        <div class="card text-center">
                            <img class="card-img-topimg-fluid" src="../../assets/images/default.jpg" alt="Raul Photo">
                            <div class="card-body">
                                <h5 class="card-title">Raul Viana</h5>
                                <p class="card-text">up201208089@fe.up.pt</p>
                                </di>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justity-content-center">
                        <div class="card text-center">
                            <img class="card-img-topimg-fluid" src="../../assets/images/default.jpg" alt="Claudia Photo">
                            <div class="card-body">
                                <h5 class="card-title">Cláudia Mamede</h5>
                                <p class="card-text">up201604832@fe.up.pt</p>
                                </di>
                            </div>
                        </div>
                    </div>

                    <div class="col d-flex justity-content-center">
                        <div class="card text-center">
                            <img class="card-img-topimg-fluid" src="../../assets/images/default.jpg" alt="Leonor Photo">
                            <div class="card-body">
                                <h5 class="card-title">Leonor Sousa</h5>
                                <p class="card-text">up201705377@fe.up.pt</p>
                                </di>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justity-content-center">
                        <div class="card text-center">
                            <img class="card-img-topimg-fluid" src="../../assets/images/default.jpg" alt="Miguel Photo">
                            <div class="card-body">
                                <h5 class="card-title">Miguel Romariz</h5>
                                <p class="card-text">up201708809@fe.up.pt</p>
                                </di>
                            </div>
                        </div>
                    </div>
                </div>
    </div>



<?php
include_once('../templates/footer.php');
?>