@extends('layouts.app')

@section('title', 'My profile - Artnow')

@section('content')

<br><br><br><br>
<div class="container">
    <div id="my-events" class="row justify-content-center row-height">
            <div class="col-sm-8 left">
                <h4 class="m-t-2">My events </h4>

                    @if(count($myEvents) == 0)
                        <p class="text-center"> You don't own any events... :( <br> 
                            <a class="button button-outline" href="{{ route('new-event') }}">Click here to start planning an event!</a>
                        </p>
                    @else
                        <small> You currently own {{count($myEvents)}} events. </small>
                        @foreach ($myEvents as $event)
                            @include('partials.events.eventcard_horizontal', ['event' => $event])
                        @endforeach
                    @endif

                <hr>

                <h4 class="m-t-2">Collaborating in </h4>
                    @if(count($collaboratingIn) == 0)
                        <p class="text-center"> You are not collaborating in any events :( </p>
                    @else   
                        <small> You are currently collaborating in {{count($collaboratingIn)}} events. </small>
                        @foreach ($collaboratingIn as $col)
                            @include('partials.events.eventcard_horizontal', ['event' => $col])
                        @endforeach
                    @endif
                
            </div>
            <div class="col-sm-4 right">
                <h4 class="text-center"> Invites </h4>
                    @if(count($invitedTo) == 0)
                        <p class="text-center"> You haven't been invited to any events :( </p>
                    @else   
                        <small> You are currently invited to {{count($invitedTo)}} events. </small>
                        @foreach ($invitedTo as $invite)
                            @if($invite->event->is_active)
                                @include('partials.events.invites.invite_row', ['invite' => $invite])
                            @else 
                                This event has been deleted! :(
                            @endif
                        @endforeach
                    @endif
            </div>
        
    </div>
</div>


@endsection