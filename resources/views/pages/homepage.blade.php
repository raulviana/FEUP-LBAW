@extends('layouts.app')

@section('title', 'Home - Artnow TEST')
  
@section('content')

@include('partials.homeheader')

<br>

@include('partials.events.events')
            
@endsection