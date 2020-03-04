<?php
    function draw_login_form(){
?>

<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
    <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
        <li class="dropdown order-1">
            <button type="button" id="dropdown-navbar" data-toggle="dropdown" class="btn dropdown-toggle">LOGIN <span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu-right mt-2">
               <li class="px-3 py-2">
                   <p><center>LOGIN</center></p>
                   <form class="form" role="form">
                        <div style="width: 220px" class="form-group">
                            <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">
                        </div>
                        <div class="form-group">
                            <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password"  required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <small id="recover_password"><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot your password?</a></small>
                        </div>
                    </form>
                </li>
            </ul>
        </li>
</ul>



<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Forgot password</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Reset your password..</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>





<?php function draw_register_form(){ ?>
    
<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
    <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
        <li class="dropdown order-1">
            <button type="button" id="dropdown-navbar" data-toggle="dropdown" class="btn dropdown-toggle ">SIGN UP <span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu-right mt-2">
               <li class="px-3 py-2">
                   <p><center>REGISTER</center></p>
                   <form class="form" role="form">
                        <div style="width: 220px" class="form-group">
                            <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">
                        </div>
                       <div style="width: 200px" class="form-group">
                            <input id="nameInput" placeholder="Full name" class="form-control form-control-sm" type="text" required="">
                        </div>
                        <div class="form-group">
                            <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" required="">
                        </div>
                       <div class="form-group">
                            <input id="confirmpasswordInput" placeholder="Confirm password" class="form-control form-control-sm" type="password" required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                        </div>
                    
                    </form>
                </li>
            </ul>
        </li>
</ul>
    
<?php } ?>