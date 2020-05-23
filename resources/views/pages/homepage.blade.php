@extends('layouts.app')

@section('title', 'Home - Artnow')
  
@section('content')

@include('partials.homeheader')

<br>

@include('partials.events.events')
            
@endsection