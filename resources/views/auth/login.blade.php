@extends('layouts.auth')

@section('content')
<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <!-- Login Block -->
    <div class="block block-themed animated fadeIn">
        <div class="block-header bg-primary">
            <ul class="block-options">
                <li>
                    <a href="base_pages_reminder.html">Forgot Password?</a>
                </li>
                <li>
                    <a href="base_pages_register.html" data-toggle="tooltip" data-placement="left" title="New Account"><i class="si si-plus"></i></a>
                </li>
            </ul>
            <h3 class="block-title">Login</h3>
        </div>
        <div class="block-content block-content-full block-content-narrow">
            <!-- Login Title -->
            <h1 class="h2 font-w600 push-30-t push-5">OneUI</h1>
            <p>Welcome, please login.</p>
            <!-- END Login Title -->

            <!-- Login Form -->
            <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <form  method="POST" action="{{ route('login') }}" class="js-validation-login form-horizontal push-30-t push-50">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material form-material-primary floating">
                            <input class="form-control" type="text" id="login-username" name="email" required autofocus>
                            <label for="login-username">Username</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material form-material-primary floating">
                            <input class="form-control" type="password" id="login-password" name="password"">
                            <label for="login-password">Password</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="css-input switch switch-sm switch-primary">
                            <input type="checkbox" id="login-remember-me" name="remember"><span></span> Remember Me?
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <button class="btn btn-block btn-primary" type="submit"><i class="si si-login pull-right"></i> Log in</button>
                    </div>
                </div>
            </form>
            <!-- END Login Form -->
        </div>
    </div>
                    <!-- END Login Block -->
</div>
@endsection


                
