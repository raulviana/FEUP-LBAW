<div class="modal" tabindex="-1" role="dialog" id="edit-modal{{$post->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <textarea data-post-id={{$post->id}} class="form-control" name="post-body" id="post-body" rows="5" placeholder="{{$post->content}}"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btn-login" type="submit" class="btn float-right" data-dismiss="modal">CLOSE</button>
        <button data-id={{$post->id}} data-event-id={{$post->event_id}} id="edit-save" type="submit" class="btn btn-sm btn-outline-dark">EDIT</button>
      </div>
    </div>
  </div>
</div>
