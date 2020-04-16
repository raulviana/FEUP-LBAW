@extends('layouts.app')

@section('title', 'Artnow - Home')
  
@section('content')

@include('partials.homeheader')

<main id="event-list">
    <div class="album py-5 bg-light" >
        <div class="container">
            <div class="row">

                @each('partials.eventcard', $events, 'event')

            </div>
        </div>
    </div>
</main>
            
@endsection