<div class="modal fade bd-example-modal-lg" id="guest-settings" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Guests - Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            
            @include('partials.events.invites.send_invite', ['event' => $event])
                
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Guest</th>
                        <th scope="col">State</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody id="edit-guests" data-id={{$event->id}}>
                    @if(count ($event->invites()->get()) > 0)
                        @each('partials.events.invites.edit_guest', $event->invites()->orderBy('accepted', 'desc')->get(), 'invite')
                    @endif
                </tbody>
            </table>

                
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal" id="light-btn">CLOSE</button>          
            <button onclick="location.href='/events/{{$event->id}}';" data-event-id={{$event->id}} class="btn float-right" id="save-changes-btn">SAVE CHANGES</button> 
        </div>

      </div>
    </div>
</div>
  