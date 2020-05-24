<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top"> 
    
    <a class="navbar-brand">ART NOW</a>
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapse_target">     
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}"> Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('aboutus') }}"> About us </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('faq') }}"> FAQs </a>
            </li>
        </ul>
        
    

        @if(Auth::guest())

            
            <ul class="nav navbar-nav navbar-right ml-auto">
                <li><a class="nav-link" href="{{route('login')}}"> LOGIN </a>   </li>
                <li><a class="nav-link" href="{{route('register')}}"> REGISTER </a>   </li>
                
            </ul>
        @else
            <ul class="nav navbar-nav navbar-right ml-auto">
            @if(Auth::user()->admin)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('admin-users') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-gear"></i> <!-- admin management -->
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('admin-users') }}"> Manage users </a>
                      <a class="dropdown-item" href="{{ route('admin-events') }}"> Manage events </a>
                    </div>
                  </li>

            @endif         
                <li><a class="nav-link" href="/profile/users/{{Auth::user()->id}}/events"> <i class="fa fa-heart"></i> </a> </li> <!-- user events -->

                <li><a class="nav-link" href="/profile/{{Auth::user()->id}}"> <i class="fa fa-user"></i> </a> </li> <!-- profile -->
            
                <li><a class="nav-link" href="{{route('logout')}}"> <i class="fa fa-sign-out"></i> </a> </li> <!-- logout -->
            </ul>
        @endif
 
    </div>
    
</nav>


@include('partials.inc.messages')