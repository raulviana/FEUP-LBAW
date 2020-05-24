<article class="post p-3 mb-3">
    <div style="margin-bottom: 1.5rem;" class="d-flex flex-row align-items-center">
        <img src={{ Storage::url('users/'.$post['writer']['photo'])}} class="rounded-circle mr-2" alt="Owner" width="50px">
    
          @if(is_null($post['writer']['name']))
              <h6> <b> SUSPENDED USER </b> says <h6>
          @else 
              <h6> <b> {{$post['writer']['name']}} </b> says: </h6>
          @endif 

          <div class="col-lg-9">
            @if(Auth::check())
              @if(Auth::user()->name == $post['writer']['name'])
                <button id="btn-edit-post" data-post-id={{$post->id}} data-post-event={{$post->event_id}} type="submit" class="edit btn float-right" >Edit</button>          
              @endif
            @endif
          </div> 
    </div>
    <p id="comment-body">{{$post->content}}</p>
    <p id="comment-datetime" class="text-right">{{$post->post_time}}</p>
</article>

<div class="modal" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form >
            <div class="form-group">
                <textarea class="form-control" name="post-body" id="post-body" rows="5" placeholder="Write your new post!"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="edit-save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






                                