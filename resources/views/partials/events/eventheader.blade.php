<nav id="event-navbar" class="navbar navbar-expand-md">
   
    <a id="event-title" class="navbar-brand">{{$event->title}}</a>
    
    <div class="navbar-collapse w-100">
        <div class="row navbar-nav ml-auto">
    
                <li class="nav-item">
                    <a class="nav-link" href="#"> ❤︎ </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> 🚶 </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> 🛒 </a>
                </li>

                @if(Auth::check())
                  @if((Auth::user()->admin) || (Auth::user()->id == $event->user_id))
                  <li class="nav-item">
                      <a class="nav-link" href="/events/{{$event->id}}/edit">⚙️</a>
                  </li>

                  <li class="nav-item">
                      <a data-toggle="modal" data-target="#modal-delete-event" class="nav-link">🗑️</a> 
                  </li>
                  @endif
                @endif

           
        </div>
    </div>
</nav>


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
        Are you sure that you want to <b>delete</b> this event?
      </div>
      <div class="modal-footer">
        <button id="btn-login" type="submit" class="btn" data-dismiss="modal">CLOSE</button>
        <button data-id={{$event->id}} id="del-event" type="submit" class="btn btn-secondary">DELETE</button>
      </div>
    </div>
  </div>
</div>