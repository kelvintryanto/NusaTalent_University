@extends('layouts.logintemplate')
@section('content')

<!-- Login Container -->
<div class="login-container bg-image">
    <!-- Logo Nusatalent -->
    <img src="/images/logo.png">
    <!-- /Logo Nusatalent -->

        <!-- Panel Login -->
        <div class="content">
            <div class="page-container">
                <div class="content-wrapper">
                    <form action="{{ action('MainController@authorizedAccess') }}" method="post" class="login-form">
                        {{ csrf_field() }}
                        <div class="panel panel-body">
                            <div class="text-center">
                                <h3 class="content1">Are you ready to meet</h3>
                                <h3 class="content4">your future employees?</h3>
                            </div>
                            <div class="content5">
                                <input type="text" class="form-control" placeholder="hello@nusatalent.com" name="txtEmail">
                            </div>

                            <div class="content2">
                                <input type="password" class="form-control" placeholder="**********" name="txtPassword">
                            </div>

                            <!-- Forgot Password -->
                            <div class="form-group div-forgot">
                                <div class="row">
                                    <div class="col-sm-6 roboto">
                                        <a href="login_password_recover.html">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Forgot Password -->

                            <!-- Sign In -->
                            <div class="div-submit">
                                <button type="submit" class="btn btnlogin btn-block">Sign In</button>
                            </div>
                            <!-- /Sign In -->


                            <!-- Join Us -->
                             <div class="form-group div-forgot roboto">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Don’t have an account yet? <a href="">Join us!</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- /Join Us -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Panel Login -->
</div>
<!-- /Login Container -->
@endsection
