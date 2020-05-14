<nav id="event-navbar" class="navbar navbar-expand-md">
   
    <a id="event-title" class="navbar-brand">{{$event->title}}</a>
    
    <div class="navbar-collapse w-100">
        <div class="row navbar-nav ml-auto">
    
                <li class="nav-item">
                    <a style="color: #292b2c" class="nav-link" href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>

                @if(Auth::check())
                  @if((Auth::user()->admin) || (Auth::user()->id == $event->user_id))
                  <li class="nav-item">
                      <a style="color: #292b2c" class="nav-link" href="/events/{{$event->id}}/edit"><i class="fa fa-cogs"></i></a>
                  </li>

                  <li class="nav-item">
                      <a style="color: #292b2c" data-toggle="modal" data-target="#modal-delete-event" class="nav-link" href="#"><i class="fa fa-trash fa-xs" aria-hidden="true"></i>
                      </a> 
                      @include('partials.modals.delete_evnt', ['event' => $event])
                  </li>
                  @endif
                @endif

           
        </div>
    </div>
</nav>

