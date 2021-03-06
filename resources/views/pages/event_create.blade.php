@extends('layouts.app')

@section('title', (empty($event) ? "Create Event" : ("Edit " . $event->title)) . ' - Artnow')

@section('content')

<br><br><br>

<div class="container">

    <div class="row profile justify-content-center">

        <div id="edit-event" class="col-lg-10 push-lg-4">

            @if(empty($event))
            <h3 style="margin-bottom: 1.5rem; font-weight: 900;">Create new event</h3>
            <small> <b>NOTE (*): </b>fill all required fields </small>
            @else
            <h3 style="margin-bottom: 1.5rem; font-weight: 900;">Edit - {{$event->title}}</h3>
            @endif

            
            <hr>



            <form id="event-settings-form" data-id={{empty($event) ? "none" : $event->id}} method="post" enctype="multipart/form-data" action="{{empty($event) ? "/events/create" : "/events/".$event->id."/edit"}}">
                {{ csrf_field() }}
                <h4>Title</h4>

                <div class="row">
                    <div class="col">
                        <input id="event-title" class="form-control form-control-md" name="title" type="text" placeholder="{{empty($event) ? "Event title (*)" : $event->title}}">
                        <p id="event-info"><small id="title-invalid" class="text-danger"></small></p>
                        @if(empty($event))
                        <input name="is_private" type="checkbox"><span style="font-size:0.9rem; margin-left:0.25rem;">This is a private event.</span>

                        <a id="tooltip" class="float-right" href="#" data-toggle="tooltip" data-placement="left" title="A private event will only be seen by you and your guests. You wont be able to edit this field later."> ? </a>

                        @endif
                    </div>


                    <!-- photo -->
                    <div class="col text-center">
                        <label class="btn" id="upload-button">
                            <input id="upload-photo" name="upload-photo" type="file" onchange="readImage(this);">
                            <center>
                                UPLOAD PHOTO <i style="margin-left:0.5rem; padding:0" class="fa fa-camera fa-xs"> </i> </center>
                        </label> <br>
                        <p id="event-info"><small id="photo-invalid" class="text-danger"></small></p>

                        <div class="image-area img-thumbnail">
                            <img id="imageResult" src="#" alt="" class="img-fluid rounded float-center shadow-sm mx-auto d-block">
                        </div>
                    </div>
                </div>

                <br>

                <!-- location + date -->
                <h4>Where & When</h4>
                <div class="row">
                    <div class="col">
                        <p id="event-info"> 📌 <b>Where:</b><br>
                            @if(empty($event))
                            <small> Local (*): </small>
                            @else 
                            <small> Local: </small>
                            @endif
                            <input id="event-local" class="form-control form-control-sm" name="local" type="text" placeholder="{{empty($event) ? "Local" : $event->local->name}}">
                            <small id="local-invalid" class="text-danger"></small></p>

                    </div>
                    <div class="col">

                        <p id="event-info">🕒 <b>When:</b>
                            <a id="tooltip" class="float-right" href="#" data-toggle="tooltip" data-placement="left" title="You should indicate both start and end dates. Start date should be earlier than end date."> ? </a>

                            <br>
                            @if(empty($event))
                            <small>Start date and time: (*) </small> 
                            @else 
                            <small>Start date and time:  </small> 
                            @endif                                                                           
                                                                 <input id="event-start-date" class="form-control form-control-sm" name="start_date" type="date" placeholder="Start date">
                                                                 <input id="event-start-time" class="form-control form-control-sm" name="start_time" type="time" placeholder="Start time">
                  <br>

                            @if(empty($event))
                            <small>End date and time: (*) </small> 
                            @else 
                            <small>End date and time:  </small> 
                            @endif  
                                                               <input id="event-end-date" class="form-control form-control-sm" name="end_date" type="date" placeholder="End date">
                                                               <input id="event-end-time" class="form-control form-control-sm" name="end_time" type="time" placeholder="End time">




                            <small id="date-invalid" class="text-danger"></small>
                        </p>
                    </div>
                </div>



                <!-- tags -->
                <h4>Tags</h4>
                <div class="row">
                    <div style="font-size:0.625rem;" class="col">

                        <p id="search-by">Choose some tags related to your event</p>
                        <br>

                        <div class="d-flex justify-content-center btn-group" data-toggle="buttons">

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn theater-tag">
                                @if(!empty($event) && count($event->tags->where('name', 'like', 'Theater')) > 0)
                                <input id="selected-tags" name="tag_theater" type="checkbox" autocomplete="off" checked> Theater
                                @else
                                <input id="selected-tags" name="tag_theater" type="checkbox" autocomplete="off"> Theater
                                @endif
                            </label>

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn sculpture-tag">
                                @if(!empty($event) && count($event->tags->where('name', 'like', 'Sculpture')) > 0)
                                <input id="selected-tags" name="tag_sculpture" type="checkbox" autocomplete="off" checked> Sculpture
                                @else
                                <input id="selected-tags" name="tag_sculpture" type="checkbox" autocomplete="off"> Sculpture
                                @endif
                            </label>

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn dance-tag">
                                @if(!empty($event) && count($event->tags->where('name', 'like', 'Dance')) > 0)
                                <input input="selected-tags" name="tag_dance" type="checkbox" autocomplete="off" checked> Dance
                                @else
                                <input input="selected-tags" name="tag_dance" type="checkbox" autocomplete="off"> Dance
                                @endif
                            </label>

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn music-tag">
                                @if(!empty($event) && count($event->tags->where('name', 'like', 'Music')) > 0)
                                <input id="selected-tags" name="tag_music" type="checkbox" autocomplete="off" checked> Music
                                @else
                                <input id="selected-tags" name="tag_music" type="checkbox" autocomplete="off"> Music
                                @endif
                            </label>

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn paintings-tag">
                                @if(!empty($event) && count($event->tags->where('name', 'like', 'Paintings')) > 0)
                                <input id="selected-tags" name="tag_paintings" type="checkbox" autocomplete="off" checked> Paintings
                                @else
                                <input id="selected-tags" name="tag_paintings" type="checkbox" autocomplete="off"> Paintings
                                @endif
                            </label>

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn comedy-tag">
                                @if(!empty($event) && count($event->tags->where('name', 'like', 'Comedy')) > 0)
                                <input id="selected-tags" name="tag_comedy" type="checkbox" autocomplete="off" checked> Comedy
                                @else
                                <input id="selected-tags" name="tag_comedy" type="checkbox" autocomplete="off"> Comedy
                                @endif
                            </label>

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn literature-tag">
                                @if(!empty($event) && count($event->tags->where('name', 'like', 'Literature')) > 0)
                                <input id="selected-tags" name="tag_literature" type="checkbox" autocomplete="off" checked> Literature
                                @else
                                <input id="selected-tags" name="tag_literature" type="checkbox" autocomplete="off"> Literature
                                @endif
                            </label>

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn others-tag">
                                @if(!empty($event) && count($event->tags->where('name', 'like', 'Others')) > 0)
                                <input id="selected-tags" name="tag_others" type="checkbox" autocomplete="off" checked> Others
                                @else
                                <input id="selected-tags" name="tag_others" type="checkbox" autocomplete="off"> Others
                                @endif
                            </label>

                        </div>
                    </div>
                </div>

                <br><br>

                <h4>Social media</h4>
                @if(!empty($event))
                @include('partials.events.social_media.sm_input_form', ['event' => $event, 'sm_name' => "Facebook", 'sm_url' => "url_facebook"])
                @include('partials.events.social_media.sm_input_form', ['event' => $event, 'sm_name' => "Youtube", 'sm_url' => "url_youtube"])
                @include('partials.events.social_media.sm_input_form', ['event' => $event, 'sm_name' => "Instagram", 'sm_url' => "url_instagram"])
                @include('partials.events.social_media.sm_input_form', ['event' => $event, 'sm_name' => "Twitter", 'sm_url' => "url_twitter"])
                @include('partials.events.social_media.sm_input_form', ['event' => $event, 'sm_name' => "Website", 'sm_url' => "url_website"])
                @else
                @include('partials.events.social_media.sm_input_form', ['sm_name' => "Facebook", 'sm_url' => "url_facebook"])
                @include('partials.events.social_media.sm_input_form', ['sm_name' => "Youtube", 'sm_url' => "url_youtube"])
                @include('partials.events.social_media.sm_input_form', ['sm_name' => "Instagram", 'sm_url' => "url_instagram"])
                @include('partials.events.social_media.sm_input_form', ['sm_name' => "Twitter", 'sm_url' => "url_twitter"])
                @include('partials.events.social_media.sm_input_form', ['sm_name' => "Website", 'sm_url' => "url_website"])


                @endif
                <br>

                <h4>Details</h4>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="details" value={{empty($event) ? " Event details " : $event['details']}}></textarea>
                </div>

                <button id="button-save-changes" type="submit" class="btn"> {{empty($event) ? "CREATE" : "CONFIRM CHANGES"}} </button>

                @if(empty($event))
                @else
                <input name="id" type="hidden" value={{$event->id}}>
                @endif
            </form>
        </div>
    </div>
</div>
<br><br>

@endsection