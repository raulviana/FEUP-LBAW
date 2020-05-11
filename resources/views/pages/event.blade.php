@extends('layouts.app')

@section('title', $event->title.' - Artnow')

@section('content')

<div class="container">
    <div class="row profile justify-content-center">
        <div class="col-lg-10 h-10%">
        <br><br><br>
        <img style="width:100%;" src={{ Storage::url('event_photo/'.$event['photo']) }} alt="" class="img-fluid">

        @include('partials.events.eventheader', ['event' => $event])
         
        
        <div class="row justify-content-center">
            <div class="col-12">
                <ul class="nav nav-tabs nav-fill w-100">
                    <li class="nav-item">
                        <a href="" data-target="#info" data-toggle="tab" class="nav-link active">Info</a>
                    </li>

                    <li class="nav-item">
                        <a href="" data-target="#posts" data-toggle="tab" class="nav-link">Posts</a>
                    </li>

                    <li class="nav-item">
                        <a href="" data-target="#related" data-toggle="tab" class="nav-link">Related</a>
                    </li>
                </ul>
    
                <div class="tab-content p-b-3">
                    <div class="tab-pane active" id="info">
                        <h5>Where & When</h5>
                        <div class="row">
                            <div class="col">
                                <p style="margin-bottom:0" id="event-info"> 📌 <b>Where:</b> {{$event['local']['name']}} </p>
                                <p id="event-info">🕒 <b>When:</b> {{$event['start_date'] }} </p>
                            </div>
                            @if(Auth::check())
                                <div class="col text-right">                               
                                    <div class="arrow">   
                                        <a data-id={{$event->id}} id="up-vote"><i class="fa fa-thumbs-up"></i></a> 
                                        <p style="display:inline;" id="event-reviews"> {{$event->review}}</p>                
                                        <a data-id={{$event->id}} id="down-vote"><i class="fa fa-thumbs-down"></i></a> 
                                    </div>
                                </div>
                                
                            @endif                              
                        </div>

                        <br>

                            <!--<a id="event-maps-button" class="btn btn-light d-inline" href="https://www.google.com/maps/search/?api=1&query=vila+nova+de+gaia" role="button">Go to Google Maps</a>-->
                        <div class="row text-center">
                            @if(count($event->tags) > 0)
                                @each('partials.events.tags.tags', $event->tags, 'tag')  
                            @else 
                                <small> This event has no tags </small>
                            @endif
                        </div>
                            
                        <br>
   
                        <h5>Details</h5>
                        <p> {{$event['details']}}</p>
                        
                        <hr>
                            
                        <h5>Contacts</h5>

                        <div class="container">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-twitter"></a>    
                        </div>
                            
                        <hr>
                            
                        <h5>Organisers</h5>                          
                               
                        @include('partials.events.collaborators.owner', ['user' => $event['owner']])

                        @if(count ($event->collaborators()->where('is_active', 'true')->get()) > 0)
                            @each('partials.events.collaborators.collaborator', $event->collaborators()->orderBy('id', 'asc')->get(), 'user')
                        @endif
                     
                        @if(Auth::check())
                            @if(Auth::user()->id == $event['owner']['id'] || Auth::user()->admin)
                                <button type="button" class="btn float-right" data-toggle="modal" data-target="#collaborators-settings"> + </button>
                                @include('partials.modals.collab_evnt', ['event' => $event])
                            @endif
                        @endif
                        
                    </div>

                    <div class="tab-pane" id="posts">   
                        @if(Auth::check())
                            <h5>Add new post</h5>
                            @include('partials.events.posts.create_post', ['event' => $event])
                        @else 
                            <p class="text-center"> Don't have an account? <br> <a class="button button-outline" href="{{ route('register') }}">Click here to register and leave posts!</a></p>
                        @endif

                        <div class="wrapper" id="post-listing">
                                
                            @if(count ($event->posts()->get()) > 0)                        
                                @each('partials.events.posts.post', $event->posts()->orderBy('post_time', 'desc')->get(), 'post')
                            @else 
                                <p id="warning-nopost" class="text-center"> There are no posts! :( </p>
                            @endif
                                
                        </div>
                    </div>

                    <div class="tab-pane" id="related">  
                        <div class="row">

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>



@endsection

