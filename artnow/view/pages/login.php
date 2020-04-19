<?php
    include_once('../templates/head.php');
    include_once('../templates/navbar.php');
   draw_topbar();

?>
<br><br><br>
    
<div id="login-form" class="container">
        <div class="row justify-content-center">
                <div class="col-8">
                    <ul class="nav nav-tabs nav-fill w-100">
                        <li class="nav-item">
                            <a href="" data-target="#login" data-toggle="tab" class="nav-link active">Login</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#register" data-toggle="tab" class="nav-link">Register</a>
                        </li>

                    </ul>

            

                    <div class="tab-content p-b-3">
                        <div class="tab-pane active" id="login">
                            <div class="col-md-12 flex-column justify-content-center">        
                                
                                <div id="text-banner-login" class="container">
                                    <img style="height:25%; width:100%;filter: brightness(80%);" src="../../assets/images/banner_2.jpg" class="img-fluid" width="100%">
                                    <div id="text-banner-login" class="centered">Sign in</div>
                                </div>
                                                                   
                                <div class="card-body">
                                    <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                        <div class="form-group">
                                            <label for="inputsm">Email</label>
                                            <input class="form-control input-sm" id="inputsm" type="text">
                                         </div>

                                        <div class="form-group">
                                            <label for="inputsm">Password</label>
                                            <input class="form-control input-sm" id="inputsm" type="password">
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <small id="recover_password"><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot your password?</a></small>
                                                </div>
                                            </div>
                                            <div class="col">
                                                 <button type="submit" class="btn float-right" id="btn-login">Sign in</button>
                                            </div>
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                        
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
                        
                        
                 
                        <div class="tab-pane" id="register">
                            <div class="col-md-12 flex-column justify-content-center">
          
                                <div id="text-banner-login" class="container">
                                    <img style="height:25%; width:100%; filter: brightness(80%);" src="../../assets/images/banner_2.jpg" class="img-fluid" width="100%">
                                    <div id="text-banner-login" class="centered">Sign up</div>
                                </div>
                                    
                                
                                <div class="card-body">
                                    <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                        <div class="form-group">
                                            <label for="inputsm">Email</label>
                                            <input class="form-control input-sm" id="inputsm" type="text">
                                         </div>
                                        <div class="form-group">
                                            <label for="inputsm">Full name</label>
                                            <input class="form-control input-sm" id="inputsm" type="text">
                                         </div>
                                        <div class="form-group">
                                            <label for="inputsm">Password</label>
                                            <input class="form-control input-sm" id="inputsm" type="password">
                                         </div>
                                          <div class="form-group">
                                            <label for="inputsm">Confirm password</label>
                                            <input class="form-control input-sm" id="inputsm" type="password">
                                         </div>
                                                                                
                                        <button type="submit" class="btn float-right" id="btn-login">Sign up</button>
                                    </form>
                                </div>
                            </div>                                                  
                        </div>                        
                    </div>
            </div>

        </div>

    </div>




<?php
include_once('../templates/footer.php');
?>

