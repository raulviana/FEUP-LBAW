@extends('layouts.app')

@section('title', '')

@section('content')

<div class="container">
    <div class="row profile justify-content-center">
        <div class="col-lg-10 push-lg-4">
       
            <img style="height:35%; width:100%;" src="../../assets/images/maresvivas.png" alt="" class="img-fluid" width="100%">

            @include('partials.events.eventheader', ['event_title' => $event['title'], 'event_id' => $event['id']])
         
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
                                    <p style="margin-bottom:0" id="event-info"> 📌 <b>Where:</b> {{$event['local']['name']}}</p>
                                    <p id="event-info">🕒 <b>When:</b> {{$event['start_date'] }} </p>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <a id="event-maps-button" class="btn btn-light d-inline" href="https://www.google.com/maps/search/?api=1&query=vila+nova+de+gaia" role="button">Go to Google Maps</a>
                                    </div>
                                </div>
                            </div>

                               
                            <div class="row text-center">

                                      @if(count($event->tags) > 0)
                                        @each('partials.events.tags', $event->tags, 'tag')  
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
                                    <a href="#" class="fa fa-google"></a>
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-youtube"></a>
                                    <a href="#" class="fa fa-instagram"></a>
                                </div>

                                <hr>
                            
                                <h5>Organisers</h5>  {{$event['owner_id']}}
                                <p> 
                                <img src="https://pbs.twimg.com/profile_images/973548356462051329/PldBA7ID_400x400.jpg" class="rounded-circle mr-2" alt="Owner" width="50px">
                                <img src="https://www.mercia-group.co.uk/media/2817/jonathan-eddy.jpg?center=0.31519274376417233,0.54931972789115646&amp;mode=crop&amp;width=448&amp;height=448&amp;rnd=132134651380000000" class="rounded-circle mr-2" alt="Collaborator" width="50px">
                                <img src="https://evada-images.global.ssl.fastly.net/76d1ea39-a4eb-4270-b9dc-899653415f8f/home-tile-person-3.jpg?width=345&height=345" class="rounded-circle mr-2" alt="Collaborator" width="50px">
                                
                                
                               
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                    
                                    <img src="https://media.istockphoto.com/vectors/plus-flat-blue-simple-icon-with-long-shadow-vector-id522539379?k=6&m=522539379&s=612x612&w=0&h=oBs3Qmw78sfKoPEc03pgcKkXhsUoGjHxCV-UBouwcck=" class="rounded-circle" alt="Add" width="50px">
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add collaborator</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="md-form mb-3 mt-0">
                                                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <img src="https://secure.gravatar.com/avatar/2ed8aeda33c2d8d526556de14b7027fa?s=400&d=mm&r=g" class="rounded-circle mr-2 align-self-center" alt="Owner" width="30px">
                                                    <p class="align-self-center">Alice Green</p>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <img src="" class="rounded-circle mr-2 align-self-center" alt="Owner" width="30px">
                                                    <p class="align-self-center">Adam Trent</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="posts">   
                                @if(Auth::check())
                                    <h5>Add new post</h5>
                                    @include('partials.events.create_post', ['event' => $event])
                                @else 
                                    <p class="text-center"> Don't have an account? <br> <a class="button button-outline" href="{{ route('register') }}">Click here to register and leave posts!</a></p>
                                @endif

                                <div class="wrapper" id="post-listing">
                                    @if(count ($event->posts()->orderBy('post_time', 'desc')->get()) > 0)
                                        @each('partials.events.post_article', $event->posts, 'post')
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