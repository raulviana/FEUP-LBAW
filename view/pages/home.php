

<?php
    include_once('../templates/head.php');
    include_once('../templates/navbar.php');
    include_once('../templates/photo_display.php');
    include_once('../templates/event-card.php');
?>

 <?php draw_topbar(); ?>
 <?php draw_header(); ?> 
 <?php draw_target_areas(); ?>



<main id="event-list">
    <br><br><br>

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
</main>

<?php
include_once('../templates/footer.php');
?>