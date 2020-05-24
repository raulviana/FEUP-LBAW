
<div class="row">
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-horizontal bg-light">
                <div class="img-square-wrapper">
                    <img id="event-card-img" class="card-img-top" src={{ Storage::url('event_photo/'.$event['photo']) }} alt="Card image cap">
                </div>
                <div class="card-body">
                    <p style="margin-bottom:0.5rem;" id="event-card-title" class="card-text"> {{$event['title']}} </p>
                       
                    <div class="row">
                        <div class="col">
                            <p style="margin-bottom:0" id="event-card-info" class="card-text"> 📌 {{$event['local']['name']}} </p>
                            <p id="event-card-info" class="card-text">🕒 {{$event['start_date']}} -  {{$event['end_date']}} </p>  
                        </div>
                                
                        <div class="col text-right">
                            <p id="event-card-info" class="text-muted"> {{$event->review}} likes </p>
                        </div>
                    </div>
                        
                    <p id="event-card-body" class="card-text"> {{\Illuminate\Support\Str::limit($event['details'], 200, $end=" (...)")}}  </p>
               
                    <div class="text-right">
                        <a id="event-card-button" class="btn btn-sm" href="/events/{{ $event['id'] }}" role="button" > View + </a>
                        <a id="event-card-button-buy" class="btn btn-sm btn-outline-dark" href="/events/{{ $event['id'] }}/edit" role="button"> Edit </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
