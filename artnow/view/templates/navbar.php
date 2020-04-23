
<?php function draw_topbar() { ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark  fixed-top"> 
    
    <a class="navbar-brand">ART NOW</a>
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapse_target">     
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../pages/home.php"> Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/about_us.php"> About us </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/faq.php"> FAQs </a>
            </li>
        </ul>
        
    
    
        <ul class="nav navbar-nav navbar-right ml-auto">
             <a class="nav-link" href="../pages/login.php"> LOGIN </a>   
		</ul>
 
    </div>
    
</nav>
<?php
                          }
                                        ?>


<?php function draw_searchbar(){ ?>

    <!-- search bar -->
    <div class="container">
        <!-- Search form -->
        <div class="active-purple-3 active-purple-4 mb-4">
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </div>
    </div>
    <!-- search bar -->
    
    
    <!-- tags -->
    <div class="container">
    <p id="search-by">Search by tag: </p>
      <div class="row mx-md-n6">
          <div class="col px-md-6">
              <button id="tag-button" type="button" class="btn theater-tag">Theater</button>
          </div>
          
          <div class="col px-md-6">
              <button id="tag-button" type="button" class="btn sculpture-tag">Sculpture</button> 
          </div>
          
          <div class="col px-md-6">
              <button id="tag-button" type="button" class="btn dance-tag">Dance</button> 
          </div>
          
          <div class="col px-md-6">
              <button id="tag-button" type="button" class="btn music-tag">Music</button> 
          </div>
          
          <div class="col px-md-6">
              <button id="tag-button" type="button" class="btn paintings-tag">Paintings</button> 
          </div>
          
          <div class="col px-md-6">
              <button id="tag-button" type="button" class="btn comedy-tag">Comedy</button> 
          </div>    
          
           <div class="col px-md-6">
              <button id="tag-button" type="button" class="btn literature-tag">Literature</button> 
          </div>
          
           <div class="col px-md-6">
              <button id="tag-button" type="button" class="btn others-tag">Others</button> 
          </div>
        </div>
    </div>
    <!-- tags -->

     <?php
                                }
                                        ?>


<?php function draw_eventbar($event_title){ ?>
<nav id="event-navbar" class="navbar navbar-expand-md">
   
    <a id="event-title" class="navbar-brand"><?php echo $event_title?></a>
    
    <div class="navbar-collapse w-100">
        <div class="row navbar-nav ml-auto">
    
                <li class="nav-item">
                    <a class="nav-link" href="#"> ❤︎ </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> 🚶 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> 🛒 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/edit_event.php">⚙️</a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" href="../pages/edit_event.php">🗑️</a>
                </li>

           
        </div>
    </div>
    

</nav>



<?php } ?>