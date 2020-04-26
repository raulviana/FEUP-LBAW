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
                                <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 015 0v9a1.5 1.5 0 01-3 0V5a.5.5 0 011 0v7a.5.5 0 001 0V3a1.5 1.5 0 10-3 0v9a2.5 2.5 0 005 0V5a.5.5 0 011 0v7a3.5 3.5 0 11-7 0V3z" clip-rule="evenodd" />
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
                    <div style="font-size:0.65rem;" class="col">

                        <p id="search-by">Choose some tags related to your event</p>
                        <br>

                        <label class="checkbox-inline mr-2"><input type="checkbox" name="tag_theater"><button id="tag-button" type="button" class="btn theater-tag">Theater</button></label>

                        <label class="checkbox-inline mr-2"><input type="checkbox" name="tag_sculpture"><button id="tag-button" type="button" class="btn sculpture-tag">Sculpture</button> </label>

                        <label class="checkbox-inline mr-2"><input type="checkbox" name="tag_dance"><button id="tag-button" type="button" class="btn dance-tag">Dance</button></label>

                        <label class="checkbox-inline mr-2"><input type="checkbox" name="tag_music"><button id="tag-button" type="button" class="btn music-tag">Music</button></label>

                        <label class="checkbox-inline mr-2"><input type="checkbox" name="tag_paintings"><button id="tag-button" type="button" class="btn paintings-tag">Paintings</button></label>

                        <label class="checkbox-inline mr-2"><input type="checkbox" name="tag_comedy"><button id="tag-button" type="button" class="btn comedy-tag">Comedy</button></label>

                        <label class="checkbox-inline mr-2"><input type="checkbox" name="tag_literature"><button id="tag-button" type="button" class="btn literature-tag">Literature</button></label>

                        <label class="checkbox-inline mr-2"><input type="checkbox" name="tag_others"><button id="tag-button" type="button" class="btn others-tag">Others</button></label>


                    </div>
                </div>

                <br>

                <h4>Details</h4>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="details" placeholder={{empty($event) ? " Event title " : $event['details']}}></textarea>
                </div>

                @include('partials.inc.messages')

                <button id="button-save-changes" type="submit" class="btn"> {{empty($event) ? "Create" : "Confirm Changes"}} </button>

            </form>
        </div>
    </div>
</div>
<br><br>

@endsection