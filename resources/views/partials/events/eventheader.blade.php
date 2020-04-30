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
                      @include('partials.modals.delete_evnt', ['event' => $event])
                  </li>
                  @endif
                @endif

           
        </div>
    </div>
</nav>

