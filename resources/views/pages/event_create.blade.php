@extends('layouts.app')

@section('title', (empty($event) ? "Create Event" : ("Edit " . $event->title)) . ' - Artnow')

@section('content')

<br><br><br>

<div class="container">
    <div class="row profile justify-content-center">
        <div id="edit-event" class="col-lg-10 push-lg-4">

            <form method="post" enctype="multipart/form-data" action="{{empty($event) ? "/events/create" : "/events/".$event->event_id."/edit"}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-md" name="title" type="text" placeholder={{empty($event) ? " Event title " : $event->title }}>
                        <label class="checkbox-inline mr-2"><input name="is_private" type="checkbox"><span style="font-size:0.9rem;"><i> This is a private event.</i></span></label>

                    </div>

                   <!-- photo -->
                    <div class="col-lg-6 mx-auto text-right">

                        <div class="file-field">
                            <svg class="bi bi-paperclip" width="1em" height="1em" >
                                <path fill-rule="evenodd" d="M4.25 3a2.25 2.25 0 0125 0v9a1.25 1.25 0 01-3 0V25a.25.25 0 011 0v7a.25.25 0 001 0V3a1.25 1.25 0 10-3 0v9a2.25 2.25 0 0025 0V25a.25.25 0 011 0v7a3.25 3.25 0 11-7 0V3z" clip-rule="evenodd" />
                            </svg>
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                </div>

                <br>

                <!-- location + date -->
                <h4>Where & When</h4>
                <div class="row">
                    <div class="col">
                        <p id="event-info"> 📌 <b>Where:</b><br>
                            <small> Local: </small>
                            <input class="form-control form-control-sm" name="local" type="text" placeholder="Location"> </p>
                    </div>
                    <div class="col">
                        <p id="event-info">🕒 <b>When:</b><br>
                            <small>Start date: </small><input class="form-control form-control-sm" name="start_date" type="date" placeholder="Start date">
                            <small>End date (opt):</small><input class="form-control form-control-sm" name="end_date" type="date" placeholder="End date">
                        </p>
                    </div>
                </div>

                <br>

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

            </form>
        </div>
    </div>
</div>
<br><br>

@endsection