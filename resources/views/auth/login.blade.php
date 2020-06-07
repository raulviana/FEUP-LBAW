@extends('layouts.app')

@section('title', 'Artnow - Login')

@section('content')
<br><br><br>
<form method="POST" action="{{ route('login') }}">

    {{ csrf_field() }}

    <div id="login-form" class="container">
        <div class="row justify-content-center">
                <div class="col-8">
                    <div class="tab-content p-b-3">
                        <div class="tab-pane active" id="login">
                            <div class="col-md-12 flex-column justify-content-center">        
                                
                                <div id="text-banner-login" class="container">
                                    <img style="height:25%; width:100%;filter: brightness(80%);" src="{{asset('images/banner_2.jpg')}}" alt="" class="img-fluid" width="100%">
                                    <div id="text-banner-login" class="centered">Sign in</div>
                                </div>
                                                                   
                                <div class="card-body">
                                   
                                        <div class="form-group">
                                            <label for="inputsm">Email</label>
                                            <input id="email" class="form-control input-sm" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputsm">Password</label>
                                            <input id="password" class="form-control input-sm" type="password" name="password" required>                               
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <small id="recover_password"><a class="button button-outline text-muted" href="#">Forgot your password?</a></small>
                                                </div>
                                            </div>
                                            <div class="col">
                                                 <button type="submit" class="btn float-right" id="btn-login">Sign in</button>                                   
                                            </div>
                                        </div>

                                        @include('partials.inc.messages')
                                    
                                        <p class="text-center"> Don't have an account? <br> <a class="button button-outline text-muted" href="{{ route('register') }}">Click here to register!</a></p>
                                       
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>
@endsection
