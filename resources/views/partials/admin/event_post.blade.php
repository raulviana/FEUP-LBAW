@extends('layouts.app')

@section('title', 'Events Management - Artnow')

@section('content')

<br><br><br>

<div class="container">
    <div class="row profile justify-content-center">
        <div class="col-lg-10 push-lg-4" id="admin-management">

            <div class="tab-content p-b-3">
                <?php
                print_r($posts);
                
                ?>

                <div class="tab-pane active" id="manage-events">
                    <h6> <strong>Manage Events</strong> </h6>
                    <input id="search-users" type="text" placeholder="Search..">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="cell">
                                <th scope="row">s</th>
                                <td>e</td>
                                <td>h</td>
                                <td>
                                    r
                                </td>
                                <td> g</td>
                                <td ><f/td>
                                
                            <tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection