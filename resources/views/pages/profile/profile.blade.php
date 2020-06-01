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
                    <a id="edit_profile_button" class="nav-link" href="/profile/{{$user->id}}/edit">⚙️</a>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="w-50 p-3 mx-auto">
                            <img src={{ Storage::url('users/'.$user['photo']) }} alt="User photo" width="400" class="img-thumbnail img-fluid">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <h4>
                            <center>{{$user->name}}</center>
                        </h4>

                        <h6>About</h6>
                        <p id="user-about"> {{$user->about}} </p>

                        <h6>Preferences</h6>
                        <div class="row justify-content-left">
                            @each('partials.events.tags.tags', $tags, 'tag')
                        </div>
                    </div>

                    <hr>

                    <div class="col-md-12">
                        <h4 class="m-t-2">Wishlist </h4>
                        <div class="container">
                            <div class="row">
                                @foreach ($user->wishlist as $event)
                                    @if($event->is_active)
                                        @include('partials.events.eventcard', ['event' => $event])
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection