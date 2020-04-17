@extends('layouts.app')

@section('title', 'Artnow - Home')
  
@section('content')

@include('partials.homeheader')

<br>

@include('partials.events.events')
            
@endsection