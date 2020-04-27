@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div id='session-alerts' class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
        <div id='session-alerts' class="alert alert-success">
            {{session('success')}}
        </div>
@endif

@if(session('danger'))
        <div id='session-alerts' class="alert alert-danger">
            {{session('error')}}
        </div>
@endif