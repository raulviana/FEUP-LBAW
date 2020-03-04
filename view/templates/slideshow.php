<?php function draw_banner(){ ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../../assets/images/slide_1.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3 class="display-2"><b>Art Now</b></h3>
                <h5>Join us to find great events near you!</h5>
                
            
                <button type="button" class="btn btn-light btn-sm btn-margin">Create your event</button>
                
                <button onclick="location.href = '#event-list';" type="button" class="btn btn-light btn-sm btn-margin">Search for events</button>
            </div>
        </div>
    <!--    <div class="carousel-item">
            <img class="d-block w-100" src="https://placeimg.com/1080/500/arch" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://placeimg.com/1080/500/nature" alt="Third slide">
        </div> !-->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php } ?>

<!-- https://www.geeksforgeeks.org/how-to-display-bootstrap-carousel-with-three-post-in-each-slide/ -->