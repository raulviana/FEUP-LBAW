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

                @if((Auth::user()->admin) || (Auth::user()->id == $event->user_id))
                <li class="nav-item">
                <a class="nav-link" href="/events/{{$event->id}}/edit">⚙️</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link delete-evnt" href="">🗑️</a> 
                </li>
                @endif

           
        </div>
    </div>
</nav>