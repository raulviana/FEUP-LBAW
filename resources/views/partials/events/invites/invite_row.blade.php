<div style="margin-top: 0.5rem; padding: 0.05rem;" class="row">
        <div class="card">
            <div class="card-horizontal bg-light">
                <div class="card-body">
                    <a style="margin-bottom: 0.5rem;" id="event-card-title"  href="/events/{{ $invite['event_id'] }}" class="card-text"> {{$invite['event']['title']}} </a>

                    <div class="row">
                        <div class="col">
                            <p style="margin-bottom:0" id="event-card-info" class="card-text"> 📌 {{$invite['event']['local']['name']}} </p>
                            <p id="event-card-info" class="card-text">🕒 {{$invite['event']['start_date']}} - {{$invite['event']['end_date']}} </p>  
                        </div>
                    </div>

                    <br>
                        
                    <p id="event-card-body" class="card-text"> <strong> {{$invite['inviter']['name']}} says: </strong> <i> {{$invite['message']}} </i> </p>
            
                    <div style="margin-bottom: 0.75rem" class="row">
                       
                        <div class="col text-left">
                            <a data-id={{$invite->id}} id="remove-invitation" role="button">🗑️</a>
                        </div>
                        <div class="col text-right">
                            @if($invite->accepted == true)
                                <button id="accept-invite-btn" class="btn btn-sm btn-success" data-id={{$invite->id}} disabled> Accept </button>
                            @else 
                                <button id="accept-invite-btn" class="btn btn-sm btn-success" data-id={{$invite->id}}> Accept </button>
                            @endif
                            
                            @if($invite->accepted == false)
                                <button id="reject-invite-btn" class="btn btn-sm btn-danger" data-id={{$invite->id}} disabled> Reject </button>
                            @else
                                <button id="reject-invite-btn" class="btn btn-sm btn-danger" data-id={{$invite->id}} > Reject </button>
                            @endif
                        </div>
                    </div>
                    
                    <div class="card-footer text-center">
                        @if($invite->accepted == true)
                            <small id="invite-confirmation-message" data-id={{$invite->id}}><b> You accepted this invitation ! :) </b></small>
                        @elseif($invite->accepted == false)
                            <small id="invite-confirmation-message" data-id={{$invite->id}}><b>  You didn't accept this invitation ! :( </b></small>
                        @else
                            <small id="invite-confirmation-message" data-id={{$invite->id}}><b>  You haven't answered this invitation! :( </b> </small>
                        @endif
                    </div>
                </div>
               
            </div>
        </div>

</div>
