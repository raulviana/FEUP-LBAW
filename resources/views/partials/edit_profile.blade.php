<form method="post" action="/profile/{{Auth::user()->id}}/edit"> 
    {{ csrf_field() }}

    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Full name</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" name="name" >
        </div>
    </div>
    
    
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Email</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" name="email" >
        </div>
    </div>
                 
    
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">About</label>
        <div class="col-lg-9">
             <textarea class="form-control" name="about" rows="6"></textarea>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Password</label>
        <div class="col-lg-9">
             <input class="form-control" type="password" name="password">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
        <div class="col-lg-9">
            <input class="form-control" type="password" name="password_confirmation">
        </div>
    </div>
    
    
    <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label"></label>
         <div class="col-lg-9">

            <button href="/profile/{{Auth::user()->id}}" class="btn float-left" id="btn-login">Back</button>      
            <button type="submit" class="btn float-right" id="btn-login">Save changes</button>                                   
                             
        </div>
    </div>
    
</form>