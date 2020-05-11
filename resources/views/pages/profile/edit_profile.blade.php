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
                        <div class="input-group" id="upload-group">
                            <label id="upload-button">
                                <input id="upload-photo" name="upload-photo" type="file" onchange="readImage(this);">
                                <span>Change Profile Photo
                                    <svg class="bi bi-upload" width="1em" height="1em" viewBox="0 -2 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 8a.5.5 0 01.5.5V12a1 1 0 001 1h12a1 1 0 001-1V8.5a.5.5 0 011 0V12a2 2 0 01-2 2H2a2 2 0 01-2-2V8.5A.5.5 0 01.5 8zM5 4.854a.5.5 0 00.707 0L8 2.56l2.293 2.293A.5.5 0 1011 4.146L8.354 1.5a.5.5 0 00-.708 0L5 4.146a.5.5 0 000 .708z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 2z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </label>
                        </div>
                        <!-- Uploaded image area-->
                        <div class="image-area mt-4 img-thumbnail"><img id="imageResult" src="#" alt="" class="img-fluid rounded float-center shadow-sm mx-auto d-block">
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
                            <input class="form-control" type="text" name="email" placeholder={{$user->email}}>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">About</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="about" rows="6" placeholder={{$user->about}}></textarea>
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

                    <div class="form-group row">
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