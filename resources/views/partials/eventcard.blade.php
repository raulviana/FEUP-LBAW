
<div class="col-md-4">
    <div class="card mb-4 box-shadow">
     <!-- <img id="event-card-img" class="card-img-top" src="" alt="Card image cap"> -->
        
      <div class="card-body">
          <p style="margin-bottom:0.5rem;" id="event-card-title" class="card-text"> {{$event['title']}} </p>
      
          <div class="row">
              <div class="col">
              <p style="margin-bottom:0" id="event-card-info" class="card-text"> 📌 {{$event['local_id']['name']}} </p>

              <p id="event-card-info" class="card-text">🕒  {{$event['start_date']}} </p>
              </div>
                  
              <div class="col text-right">
               <p id="event-card-info" class="text-muted"> X going</p>
              </div>
          </div>
          
          <hr>
          
          <p id="event-card-body" class="card-text">  {{$event['details']}} </p>
          
        <div class="row justify-content-between align-items-center">
          <div class="col">
            <a id="event-card-button" class="btn btn-sm" href="../pages/event.php" role="button" >View +</a>
            </div>
            
          <div class="col text-right">
            <a id="event-card-button-buy" class="btn btn-sm btn-outline-dark" href="../pages/event.php" role="button">Buy</a>
          </div>
        </div>
      </div>
    </div>
</div>


    