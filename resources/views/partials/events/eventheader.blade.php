<nav id="event-navbar" class="navbar navbar-expand-md">
   
    <a id="event-title" class="navbar-brand">{{$event->title}}</a>
    
    <div class="navbar-collapse w-100">
        <div class="row navbar-nav ml-auto">
    
                @if(Auth::check())
                    <li class="nav-item">
                        @if(Auth::user()->wishlist->contains($event))
                        <a data-id={{$event->id}} data-active="1" id="wishlist-btn" style="color: #b30000" class="nav-link" href="#" role="button"><i class="fa fa-heart"></i></a>
                        @else 
                        <a data-id={{$event->id}} data-active="0" id="wishlist-btn" style="color: #292b2c" class="nav-link" href="#" role="button"><i class="fa fa-heart-o"></i></a>
                        @endif
                    </li>

                  @if((Auth::user()->admin) || (Auth::user()->events->contains($event)) || (Auth::user()->collaborates->contains($event)))
                  
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

