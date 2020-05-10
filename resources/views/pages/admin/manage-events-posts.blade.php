@extends('layouts.app')

@section('title', 'Events management - Artnow')

@section('content')

<br>

<div class="container" >
    <div class="row profile justify-content-center" >
        <div class="col-lg-10 push-lg-4" id="admin-management">
  
         <div class="tab-content p-b-3">
             <div class="tab-pane active" id="manage-users">
             <br><br>
             <h6> <strong>Manage <i>"{{$event_title}}"</i> Posts</strong> </h6>
              
                 <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date</th>
                        <th scope="col">User</th>
                        </tr>
                    </thead>
                    <tbody>                             
                        @foreach ($posts as $post)
                            @include('partials.admin.event_post', ['post' => $post])
                        @endforeach
                    </tbody>              
                </table>    
                  
             </div>
        </div>
    </div>
</div>
</div>


@endsection