@extends('layouts.app')

@section('title', 'Events management - Artnow')

@section('content')

<br><br><br>

<div class="container" >
    <div class="row profile justify-content-center" >
        <div class="col-lg-10 push-lg-4" id="admin-management">
  
         <div class="tab-content p-b-3">
             <div class="tab-pane active" id="manage-users">
                 <h6> Manage Events </h6>
                 <input id="search-users" type="text" placeholder="Search..">
                 
                 <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>                             
                        @foreach ($events as $event)
                            @include('partials.admin.event_row', ['event' => $event])
                        @endforeach
                    </tbody>              
                </table>    
                  
             </div>
        </div>
    </div>
</div>
</div>


@endsection