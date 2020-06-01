@extends('layouts.app')

@section('title', 'Search Results')
  
@section('content')

<br><br><br><br>

<div class='container'>
    <div class='column'>
        <form action="{{ route('search') }}" method="GET" class="search-form">
            <input name="query" id="query" class="form-control" type="text" aria-label="Search" placeholder="Search by title or description">
        </form>
    </div>
    <div class='column'>
        <form action="{{ route('searchLocation') }}" method="GET" class="search-form">
            <input name="query" id="query" class="form-control" type="text" aria-label="Search" placeholder="Search by location">
        </form> 
    </div>        
</div>

<br><br><br><br>

<main id="event-list">
    <div class="album py-5 bg-light" >
        <div class="container">
            <div class="row">
                @if(count ($events) > 0)
                    @each('partials.events.eventcard', $events, 'event')
                @else 
                    <p class="text-center">  Ups! No events were found! </p>
                @endif

            </div>
        </div>
    </div>
</main>
            
@endsection