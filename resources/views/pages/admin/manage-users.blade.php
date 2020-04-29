@extends('layouts.app')

@section('title', 'User management - Artnow')

@section('content')

<br><br><br>

<div class="container" >
    <div class="row profile justify-content-center" >
        <div class="col-lg-10 push-lg-4" id="admin-management">
  
      
            
         <div class="tab-content p-b-3">
             <div class="tab-pane active" id="manage-users">
                 <h6> Manage Users </h6>
                 <input id="search-users" type="text" placeholder="Search..">
                 <small> Todo: add search bar to search for users emails </small>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Suspend/Activate</th>
                        <th scope="col">State</th>
                        </tr>
                    </thead>
                    <tbody>                             
                        @foreach ($users as $user)
                            @include('partials.admin.user_row', ['user' => $user])
                        @endforeach
                    </tbody>              
                </table>    
                {{ $users->links() }}    
                 
             </div>
        </div>
    </div>
</div>
</div>


@endsection