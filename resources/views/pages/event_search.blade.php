@extends('layouts.app')

@section('title', '{{$tag->name}} - Artnow')
  
@section('content')

<br><br><br><br>

<main id="event-list">
    <div class="album py-5 bg-light" >
        <div class="container">
            <div class="row">
            
                @if(count ($tag->events) > 0)
                    @each('partials.events.eventcard', $tag->events, 'event')
                @else 
                    <p class="text-center"> Ups! Don't exist events with tag " {{$tag->name}} " </p>
                @endif

            </div>
        </div>
    </div>
</main>
            
@endsection