<article class="post p-3 mb-3">
    <div style="margin-bottom: 1.5rem;" class="d-flex flex-row align-items-center">
        <img src={{ Storage::url('users/'.$post['writer']['photo'])}} class="rounded-circle mr-2" alt="Owner" width="50px">
    
          @if(is_null($post['writer']['name']))
              <h6> <b> SUSPENDED USER </b> says <h6>
          @else 
              <h6> <b> {{$post['writer']['name']}} </b> says: </h6>
          @endif 

          <!--<div class="col-lg-9">
            @if(Auth::check())
              @if(Auth::user()->name == $post['writer']['name'])
                <button id="btn-edit-post" data-post-id={{$post->id}} data-post-event={{$post->event_id}} type="submit" class="edit btn float-right" >Edit</button>          
              @endif
            @endif
          </div> -->
    </div>
   
      <p id="comment-body" data-id={{$post->id}}>{{$post->content}}</p>

      <div class="row float-right">
        <p id="comment-datetime" class="text-right">{{$post->post_time}}</p>
        @if(Auth::check() && ((Auth::user()->name == $post['writer']['name']) || Auth::user()->admin))
        <button id="edit-post-button" type="button" class="btn float-right" data-toggle="modal" data-target="#edit-modal{{$post->id}}"> [ edit ] </button>
        @endif
      </div>
</article>

@include('partials.modals.edit_post', ['post' => $post])
