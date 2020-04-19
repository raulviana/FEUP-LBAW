<nav class="navbar navbar-expand-md navbar-dark bg-dark  fixed-top"> 
    
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
        
    
    
        <ul class="nav navbar-nav navbar-right ml-auto">
             <li><a class="nav-link" href="{{route('login')}}"> LOGIN </a>   </li>
             <li><a class="nav-link" href="{{route('register')}}"> REGISTER </a>   </li>
             <li><a class="nav-link" href="{{route('logout')}}"> LOGOUT </a>   </li>
		</ul>
 
    </div>
    
</nav>