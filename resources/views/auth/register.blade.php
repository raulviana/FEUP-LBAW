@extends('layouts.app')

@section('title', 'Artnow - Register')

@section('content')
<br><br><br>


<div id="login-form" class="container">
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="tab-content p-b-3">
        <div class="tab-pane active" id="login">
          <div class="col-md-12 flex-column justify-content-center">

            <div id="text-banner-login" class="container">
              <img style="height:25%; width:100%;filter: brightness(80%);" src="{{asset('images/banner_2.jpg')}}" class="img-fluid" width="100%">
              <div id="text-banner-login" class="centered">Register</div>
            </div>
            <br><br>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data" action="{{ "/register" }}">
                {{ csrf_field() }}

                <!-- Upload image input-->
                <div class="input-group" id="upload-group">
                  <label id="upload-button">
                    <input id="upload-photo" name="upload-photo" type="file" onchange="readImage(this);">
                    <span>Upload Profile Photo
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

                <div class="form-group">
                  <label for="inputsm">Email</label>
                  <input id="email" class="form-control input-sm" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                  <label for="inputsm">Name</label>
                  <input id="name" class="form-control input-sm" type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                  <label for="inputsm">About me</label>
                  <input id="about" class="form-control input-sm" type="text" name="about">
                </div>

                <div class="form-group">
                  <label for="inputsm">Password</label>
                  <input id="password" class="form-control input-sm" type="password" name="password" required>
                </div>
                <div class="form-group">
                  <label for="inputsm">Confirm password</label>
                  <input id="password" class="form-control input-sm" type="password" name="password_confirmation" required>
                </div>

                <div class="row">

                  <div class="col">
                    <button type="submit" class="btn float-right" id="btn-login">Register</button>
                  </div>
                </div>


                <p class="text-center"> Already have an account? <br> <a class="button button-outline" href="{{ route('login') }}">Click here to sign in!</a></p>

            </div>
          </div>
        </div>
        </form>
        @endsection