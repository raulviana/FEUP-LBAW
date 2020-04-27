@extends('layouts.app')

@section('title', 'My profile - Artnow')
  
@section('content')
<br><br><br><br>
<div class="container">
    <div class="row profile justify-content-center">
        <div class="col-lg-12 push-lg-4">
              <div class="tab-pane active" id="profile">
                  <div class="row">
                      <div class="col">
                    <h4 style="margin-bottom: 1.5rem; font-weight: 900;">Profile</h4>
                      </div>
                      @if(Auth::user()->id == $user->id)
                        <a class="nav-link" href="/profile/{{$user->id}}/edit">⚙️</a>
                      @endif
                      
                  </div>


                    <div class="row">
                        <div class="col-md-6">
                            <center><img src="https://media-manager.noticiasaominuto.com/1920/1569938681/naom_59ad8a23b9585.jpg?crop_params=eyJwb3J0cmFpdCI6eyJjcm9wV2lkdGgiOjEwNTAsImNyb3BIZWlnaHQiOjE4NjYsImNyb3BYIjoxMDI5LCJjcm9wWSI6MH0sImxhbmRzY2FwZSI6eyJjcm9wV2lkdGgiOjI4MDAsImNyb3BIZWlnaHQiOjE1NzQsImNyb3BYIjowLCJjcm9wWSI6Njd9fQ==" alt="" width="400" class="mb-4">
                            </center>
                        </div>

                        <div class="col-md-6">
                            <h4>
                                <center>{{$user->name}}</center>
                            </h4>
                            
                            <h6>About</h6>
                            <p id="user-about"> {{$user->about}} </p>

                            <h6>Preferences</h6>
                            <div class="row">
                                <div class="col px-md-6">
                                    <button id="tag-button" type="button" class="btn music-tag">Music</button>
                                </div>

                                <div class="col px-md-6">
                                    <button id="tag-button" type="button" class="btn paintings-tag">Paintings</button>
                                </div>

                                <div class="col px-md-6">
                                    <button id="tag-button" type="button" class="btn comedy-tag">Comedy</button>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-md-12">
                            <h4 class="m-t-2">Going to </h4>
                        </div>                        

                        <div class="col-md-12">
                            <h4 class="m-t-2">My events </h4>
                        </div>

                        <div class="col-md-12">
                            <h4 class="m-t-2">Wishlist </h4>
                        </div>
                   </div>
             </div>
        </div>
    </div>
</div>

            
@endsection
