
<div class="modal fade" id="modal-delete-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">

  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">{{$event->title}}</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      Are you sure that you want to delete this event?
    </div>
    <div class="modal-footer">
      <button id="btn-login" type="submit" class="btn" data-dismiss="modal">CLOSE</button>
      <button data-id={{$event->id}} id="del-event" type="submit" class="btn btn-secondary">DELETE</button>
    </div>
  </div>
</div>
</div>