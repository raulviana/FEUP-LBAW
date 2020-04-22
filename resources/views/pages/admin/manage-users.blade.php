@extends('layouts.app')

@section('title', 'User management - Artnow')

@section('content')

<br><br><br>

<div class="container" >
    <div class="row profile justify-content-center" >
        <div class="col-lg-10 push-lg-4" id="admin-management">
  
         <ul class="nav nav-tabs">
              <li class="nav-item">
                 <a data-target="#manage-users" data-toggle="tab" class="nav-link active">Manage active users</a>
             </li>
             
              <li class="nav-item">
                 <a data-target="#manage-susp-users" data-toggle="tab" class="nav-link">Manage suspended users</a>
             </li>
            
         </ul>
            
         <div class="tab-content p-b-3">
             <div class="tab-pane active" id="manage-users">

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

             <div class="tab-pane fade" id="manage-susp-users">
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
                        @foreach ($susp_users as $susp_user)
                            @include('partials.admin.user_row', ['user' => $susp_user])
                        @endforeach
                    </tbody>
                   
                </table>
                {{ $susp_users->links() }}
            </div>
        </div>
    </div>
</div>
</div>


@endsection