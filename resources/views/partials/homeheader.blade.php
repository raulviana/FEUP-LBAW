<div class="carousel-item active d-none d-sm-block">
    <img class="d-block w-100" src="images/banner.jpg">
    <div class="carousel-caption d-none d-md-block">
        <h3 class="display-2"><b>Art Now</b></h3>
        <h5>Join us to find great events near you!</h5>
    
          @if(Auth::guest())
            <button id="button-header" onclick="location.href = 'login';" type="button" class="btn btn-light btn-sm btn-margin">Create your event</button>
          @else
            <button id="button-header" onclick="location.href = '/events/create';" type="button" class="btn btn-light btn-sm btn-margin">Create your event</button>
          @endif

        <button id="button-header" onclick="location.href = '#tags-search';" type="button" class="btn btn-light btn-sm btn-margin">Search for events</button>
    </div>
</div>

<div style="background: black; padding-bottom:2rem;" class="container-fluid py-3 d-none d-sm-block" id="tags-search">
    <div class="row">
        <div class="col container">
              <img src="{{asset('images/p.png')}}" alt="Avatar" class="image">
              <div style="color: #c43227" class="text-centered">#THEATER</div>
              <div style="background: #c43227" class="overlay">
                <div onclick="location.href='tags/theater';" id="overlay-text" class="text">Search for <br><b>#THEATER</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="{{asset('images/p.png')}}" alt="Avatar" class="image">
              <div style="color: #e0d426;" class="text-centered">#SCULPTURE</div>
              <div style="background: #e0d426;" class="overlay">
                <div onclick="location.href='tags/sculpture';" id="overlay-text" class="text">Search for <br><b>#SCULPTURE</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="{{asset('images/p.png')}}" alt="Avatar" class="image">
            <div style="color: #4c3ac2;" class="text-centered">#DANCE</div>
              <div style="background: #4c3ac2;" class="overlay">
                <div onclick="location.href='tags/dance';" id="overlay-text" class="text">Search for <br><b>#DANCE</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="{{asset('images/p.png')}}" alt="Avatar" class="image">
            <div style="color: #db27d5;" class="text-centered">#MUSIC</div>
              <div style="background: #db27d5;" class="overlay">
                <div onclick="location.href='tags/music';" id="overlay-text" class="text">Search for<br> <b>#MUSIC</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="{{asset('images/p.png')}}" alt="Avatar" class="image">
            <div style="color: #d45008;"  class="text-centered">#PAINTINGS</div>
              <div style="background: #d45008;" class="overlay">
                <div onclick="location.href='tags/painting';" id="overlay-text" class="text">Search for <br><b>#PAINTINGS</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="{{asset('images/p.png')}}" alt="Avatar" class="image">
            <div style="color: #2a97b5;" class="text-centered">#COMEDY</div>
              <div style="background: #2a97b5;" class="overlay">
                <div onclick="location.href='tags/comedy';" id="overlay-text" class="text">Search for <br><b>#COMEDY</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="{{asset('images/p.png')}}" alt="Avatar" class="image">
            <div style="color: #43b52a;"  class="text-centered">#LITERATURE</div>
              <div style="background: #43b52a;" class="overlay">
                <div onclick="location.href='tags/literature';" id="overlay-text" class="text">Search for <br> <b>#LITERATURE</b></div>
              </div>
        </div>
        
        <div class="col container">
              <img src="{{asset('images/p.png')}}" alt="Avatar" class="image">
            <div style="color: #000FFF;" class="text-centered">#OTHERS</div>
              <div style="background: #000FFF;" class="overlay">
                <div onclick="location.href='tags/others';" id="overlay-text" class="text">Search for <br><b>#OTHERS</b></div>
              </div>
        </div>
    </div>
    
</div>



