<?php
function draw_single_eventcard($image, $title, $local, $schedule, $description, $counter)
{
?>
  <div class="col-md-4">
    <div class="card mb-4 box-shadow">
      <img id="event-card-img" class="card-img-top" src=<?php echo $image ?> alt="Card image cap">


      <div class="card-body">
        <p id="event-card-title" class="card-text"><?php echo $title ?> </p>

        <p style="margin-bottom:0" id="event-card-info" class="card-text"> 📌 <?php echo $local ?> </p>

        <p id="event-card-info" class="card-text">🕒 <?php echo $schedule ?> </p>

        <p id="event-card-body" class="card-text"> <?php echo $description ?> </p>

        <div class="d-flex justify-content-between align-items-center">
          <a id="event-card-button" class="btn btn-sm btn-dark" href="../pages/event.php" role="button">View</a>
          <small class="text-muted"><?php echo $counter ?> going</small>
          <a id="event-card-button" class="btn btn-sm btn-dark" href="../pages/event.php" role="button">Buy</a>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>