<div style="margin-top: 0.5rem; padding: 0.05rem;" class="row">
        <div class="card">
            <div class="card-horizontal bg-light">
                <div class="img-square-wrapper">
                    
                </div>
                <div class="card-body">
                    <p style="margin-bottom: 0.5rem;" id="event-card-title"  href="/events/{{ $invite['event_id'] }}" class="card-text"> {{$invite['event']['title']}} </p>

                    <div class="row">
                        <div class="col">
                            <p style="margin-bottom:0" id="event-card-info" class="card-text"> 📌 {{$invite['event']['local']['name']}} </p>
                            <p id="event-card-info" class="card-text">🕒 {{$invite['event']['start_date']}} - {{$invite['event']['end_date']}} </p>  
                        </div>
                    </div>

                    <br>
                        
                    <p id="event-card-body" class="card-text"> <strong> {{$invite['inviter']['name']}} says: </strong> <i> {{$invite['message']}} </i> </p>
            
                    <div class="row">
                       
                        <div class="col text-left">
                            <a data-id={{$invite->id}} id="remove-guest" role="button">🗑️</a>
                        </div>
                        <div class="col text-right">
                            <a id="accept-invite-btn" class="btn btn-sm btn-success" href="/events/{{ $invite['event_id'] }}" role="button" > Accept </a>
                            <a id="reject-invite-btn" class="btn btn-sm btn-danger" href="/events/{{ $invite['event_id'] }}" role="button" > Reject </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

</div>
