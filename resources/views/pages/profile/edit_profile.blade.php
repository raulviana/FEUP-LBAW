@extends('layouts.app')

@section('title', 'Edit profile - Artnow')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row profile justify-content-center">
        <div class="col-lg-12 push-lg-4">
            <div class="tab-pane active" id="edit">

                <h5 style="margin-bottom: 1.5rem; font-weight: 900;">Edit profile</h5>
                <hr>
                <form id="edit-profile" method="post" enctype="multipart/form-data" action="/profile/{{Auth::user()->id}}/edit">
                    {{ csrf_field() }}

                   
                        <!-- Upload image input-->
                        <div class="col text-center">
                            <label class="btn" id="upload-button">
                                <input id="upload-photo" name="upload-photo" type="file" onchange="readImage(this);"><center>
                                UPLOAD PHOTO <i style="margin-left:0.5rem; padding:0" class="fa fa-camera fa-xs"> </i> </center>
                            </label> <br>
    
                            <div class="image-area img-thumbnail">
                                <img id="imageResult" src="#" alt="" class="img-fluid rounded float-center shadow-sm mx-auto d-block">
                            </div>
                        </div>
                        
                        <!-- Uploaded image area-->
                        <div class="image-area mt-4 img-thumbnail"><img id="imageResult" src={{ Storage::url('users/'.$user['photo']) }} alt="" class="img-fluid rounded float-center shadow-sm mx-auto d-block">
                        </div>
              
                       
                 

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Full name</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="name" placeholder={{$user->name}}>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" name="email" placeholder={{$user->email}}>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">About</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="about" rows="6" placeholder="{{$user->about}}"></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                        <div class="col-lg-9">
                            <input id="password" class="form-control" type="password" name="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                        <div class="col-lg-9">
                            <input onkeyup="validatePassword()" id="confirm-password" class="form-control" type="password" name="password_confirmation">
                        </div>
                    </div>

                    <div id="buttons-edit-profile" class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <button onclick="location.href = '/profile/{{Auth::user()->id}}';" class="btn float-left" id="btn-login">Back</button>
                            <button type="submit" class="btn float-right" id="btn-login">Save changes</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>