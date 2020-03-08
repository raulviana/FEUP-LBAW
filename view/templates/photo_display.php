<?php function draw_header(){ ?>
     <div class="carousel-item active d-none d-sm-block">
            <img class="d-block w-100" src="../../assets/images/banner.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3 class="display-2"><b>Art Now</b></h3>
                <h5>Join us to find great events near you!</h5>
                
            
                <button id="button-header"  type="button" class="btn btn-light btn-sm btn-margin">Create your event</button>
                
                <button id="button-header" onclick="location.href = '#event-list';" type="button" class="btn btn-light btn-sm btn-margin">Search for events</button>
            </div>
        </div>



<?php } ?>

<?php function draw_target_areas(){ ?>

<div style="background: black; padding-bottom:2rem;" class="container-fluid py-3 d-none d-sm-block">
    <div class="row">
        <div class="col container">
              <img src="../../assets/images/p.png" alt="Avatar" class="image">
              <div style="color: #c43227" class="text-centered">Theater</div>
              <div style="background: #c43227" class="overlay">
                <div id="overlay-text" class="text">Click to search for <b>#theater</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="../../assets/images/p.png" alt="Avatar" class="image">
              <div style="color: #e0d426;" class="text-centered">Sculpture</div>
              <div style="background: #e0d426;" class="overlay">
                <div id="overlay-text" class="text">Click to search for <b>#sculpture</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="../../assets/images/p.png" alt="Avatar" class="image">
            <div style="color: #4c3ac2;" class="text-centered">Dance</div>
              <div style="background: #4c3ac2;" class="overlay">
                <div id="overlay-text" class="text">Click to search for <b>#dance</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="../../assets/images/p.png" alt="Avatar" class="image">
            <div style="color: #db27d5;" class="text-centered">Music</div>
              <div style="background: #db27d5;" class="overlay">
                <div id="overlay-text" class="text">Click to search for <b>#music</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="../../assets/images/p.png" alt="Avatar" class="image">
            <div style="color: #d45008;"  class="text-centered">Paintings</div>
              <div style="background: #d45008;" class="overlay">
                <div id="overlay-text" class="text">Click to search for <b>#paintings</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="../../assets/images/p.png" alt="Avatar" class="image">
            <div style="color: #2a97b5;" class="text-centered">Comedy</div>
              <div style="background: #2a97b5;" class="overlay">
                <div id="overlay-text" class="text">Click to search for <b>#comedy</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="../../assets/images/p.png" alt="Avatar" class="image">
            <div style="color: #43b52a;"  class="text-centered">Literature</div>
              <div style="background: #43b52a;" class="overlay">
                <div id="overlay-text" class="text">Click to search for <b>#literature</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="../../assets/images/p.png" alt="Avatar" class="image">
            <div style="color: #000FFF;" class="text-centered">Others</div>
              <div style="background: #000FFF;" class="overlay">
                <div id="overlay-text" class="text">Click to search for <b>#others</b></div>
              </div>
        </div>
    </div>
    
</div>
<?php } ?>