<div class="col-md-4">
    <div class="card mb-4 box-shadow">
  
     <img id="event-card-img" class="card-img-top" src={{ Storage::url('event_photo/'.$event['photo']) }} alt="Card image cap">
     <div class="card-body">
      <a style="margin-bottom:0.5rem;" id="event-card-title" href="/events/{{ $event['id'] }}" class="card-text"> {{$event['title']}} </a>
  
      <div class="row">
          <div class="col">
            <p style="margin-bottom:0" id="event-card-info" class="card-text"> 📌 {{$event['local']['name']}} </p>

        
            <p id="event-card-info" class="card-text">🕒 {{$event['start_date']}}  </p>
          
          
          </div>
              
          <div class="col text-right">
            @if(Auth::check())
              @if(Auth::user()->wishlist->contains($event))
                <a data-id={{$event->id}} data-active="1" id="wishlist-btn" style="color: #b30000;" href="#"><i class="fa fa-heart"></i></a>
              @else 
                <a data-id={{$event->id}} data-active="0" id="wishlist-btn" style="color: #292b2c" href="#"><i class="fa fa-heart-o"></i></a>
              @endif 
            @endif
          </div>

      </div>
      
      <hr>
      
      <p id="event-card-body" class="card-text"> {{\Illuminate\Support\Str::limit($event['details'], 420, $end=" (...)")}}  </p>
      
    <div class="row justify-content-between align-items-center">
      <div class="col">
        <a id="event-card-button" class="btn btn-sm" href="/events/{{ $event['id'] }}" role="button" >View +</a>
        </div>
        
      <div class="col text-right">
        <a id="event-card-button-buy" class="btn btn-sm btn-outline-dark">{{$event->review}} likes</a>
      </div>
    </div>
  </div>   
    </div>
</div>


    