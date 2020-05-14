@extends('layouts.app')

@section('title', (empty($event) ? "Create Event" : ("Edit " . $event->title)) . ' - Artnow')

@section('content')

<br><br><br>

<div class="container">

    <div class="row profile justify-content-center">

        <div id="edit-event" class="col-lg-10 push-lg-4">

            @if(empty($event))
            <h3 style="margin-bottom: 1.5rem; font-weight: 900;">Create new event</h3>
            @else 
            <h3 style="margin-bottom: 1.5rem; font-weight: 900;">Edit - {{$event->title}}</h3>
            @endif

<hr>



            <form id="event-settings-form" data-id={{empty($event) ? "none" : $event->id}} method="post" enctype="multipart/form-data" action="{{empty($event) ? "/events/create" : "/events/".$event->id."/edit"}}">
                {{ csrf_field() }}
                <h4>Title</h4>

                <div class="row">                    
                    <div class="col">
                        <input id="event-title" class="form-control form-control-md" name="title" type="text" placeholder="Event title">
                        <p id="event-info"><small id="title-invalid" class="text-danger"></small></p>
                        @if(empty($event))
                        <input name="is_private" type="checkbox"><span style="font-size:0.9rem; margin-left:0.25rem;">This is a private event.</span>
                        
                        <a id="tooltip" class="float-right" href="#" data-toggle="tooltip" data-placement="left" title="A private event will only be seen by you and your guests. You wont be able to edit this field later."> ? </a>

                        @endif
                    </div>

                
                   <!-- photo -->
                   <div class="col text-center">
                        <label class="btn" id="upload-button">
                            <input id="upload-photo" name="upload-photo" type="file" onchange="readImage(this);"><center>
                            UPLOAD PHOTO <i style="margin-left:0.5rem; padding:0" class="fa fa-camera fa-xs"> </i> </center>
                        </label> <br>
                        <p id="event-info"><small id="photo-invalid" class="text-danger"></small></p>

                        <div class="image-area img-thumbnail"><img id="imageResult" src="#" alt="" class="img-fluid rounded float-center shadow-sm mx-auto d-block"></div>
                    </div>
                </div>           

                <br>

                <!-- location + date -->
                <h4>Where & When</h4>
                <div class="row">
                    <div class="col">
                        <p id="event-info"> 📌 <b>Where:</b><br>
                            <small> Local: </small>
                            <input id="event-local" class="form-control form-control-sm" name="local" type="text" placeholder="Location"> 
                            <small id="local-invalid" class="text-danger"></small></p>

                    </div>
                    <div class="col">
                        <p id="event-info">🕒 <b>When:</b><br>
                            <small>Start date: </small>  <input id="event-start-date" class="form-control form-control-sm" name="start_date" type="date" placeholder="Start date"> 
                            <small>End date: </small>  <input id="event-end-date" class="form-control form-control-sm" name="end_date" type="date" placeholder="End date"> 
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

                        <div class="d-flex justify-content-center btn-group btn-group-toggle" data-toggle="buttons">
                            
                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn theater-tag">
                             <input name="tag_theater" type="checkbox" autocomplete="off"> Theater
                            </label>
                 
                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn sculpture-tag">
                             <input name="tag_sculpture" type="checkbox" autocomplete="off"> Sculpture
                            </label>
                     
                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn dance-tag">
                               <input name="tag_dance" type="checkbox" autocomplete="off"> Dance
                            </label>
                         
                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn music-tag">
                               <input name="tag_music" type="checkbox" autocomplete="off"> Music
                            </label>
                           
                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn paintings-tag">
                              <input  name="tag_paintings" type="checkbox" autocomplete="off"> Paintings
                            </label>

                            <label style="margin-right: 0.25rem; margin-left: 0.25rem;" id="tag-button" class="btn comedy-tag">
                                <input name="tag_comedy" type="checkbox" autocomplete="off"> Comedy
                             </label>
                            
                             <label style="margin-right: 0.25rem; margin-left: 0.25rem;"  id="tag-button" class="btn literature-tag">
                               <input name="tag_literature" type="checkbox" autocomplete="off"> Literature
                             </label>
                             <label style="margin-right: 0.25rem; margin-left: 0.25rem;"id="tag-button" class="btn others-tag">
                                <input name="tag_others" type="checkbox" autocomplete="off"> Others
                             </label>
                            
                        </div>
                    </div>
                </div>

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