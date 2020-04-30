<div class="modal fade bd-example-modal-lg" id="collaborators-settings" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Collaborators - Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            
            <small> Enter the email of the collaborator</small>  
            <form>
                <input id="search-users" type="text" placeholder="Search.." name="search">
                <button id="search-users" type="submit" class="btn">+</button>
            </form>
          
            <table class="table table-striped" id="search-results">          
                <tbody>  </tbody> <!-- tbody used in javascript !-->
            </table>
            
                
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Collaborator</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody id="edit-collaborators" data-id={{$event->id}}>
                    @if(count ($event->collaborators()->get()) > 0)
                        @each('partials.events.collaborators.edit_collaborator', $event->collaborators()->orderBy('id', 'asc')->get(), 'user')
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
  