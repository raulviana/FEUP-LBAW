

<?php
    include_once('../templates/header.php');
    include_once('../templates/navbar.php');
    include_once('../templates/slideshow.php');
    include_once('../templates/event-card.php');
?>

 <?php draw_topbar(); ?>
 <?php draw_banner(); ?>


<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p class="text-center lead">Talvez identificar as áreas dos eventos: dança, teatro, comédia, música, pintura</p>
  </div>
</div>

<main id="event-list">
    <br><br><br>

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
</main>

<?php
include_once('../templates/footer.php');
?>