@extends('main')

@section('head_css')
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('plugins/login_boot/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/login_boot/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/login_boot/css/form-elements.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/login_boot/css/style.css')}}">

    <!-- Favicon and touch icons -->
    <link rel="stylesheet" href="{{asset('plugins/login_boot/ico/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset('plugins/login_boot/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset('plugins/login_boot/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset('plugins/login_boot/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed"
          href="{{asset('plugins/login_boot/ico/apple-touch-icon-57-precomposed.png')}}">
@stop

@section('body_before')

@stop
@section('content')

    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>Little Mushroom Store</strong> Register Form</h1>
                        <div class="description">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Register to our site</h3>
                                <p>Enter your info to register in:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="{{route('user.do_register')}}" method="post" class="login-form">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone..." class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Email..." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="login_password" placeholder="Password..." class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">RePassword</label>
                                    <input type="password" name="login_repassword" placeholder="RePassword..." class="form-control">
                                </div>

                                <input type="hidden" name="back_url" value="{{$back_url}}">
                                <input type="hidden" name="error_url" value="{{$error_url}}">
                                <input type="submit" class="btn" value="Sign in!">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <h3>...or register with:</h3>
                        <div class="social-login-buttons">
                            <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Javascript -->
    <script src="{{asset("plugins/login_boot/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("plugins/login_boot/js/jquery.backstretch.min.js")}}"></script>
    <script src="{{asset("plugins/login_boot/js/scripts.js")}}"></script>
    <script src="{{asset("plugins/login_boot/js/placeholder.js")}}"></script>

    <script>

        @if(Session::has('register_alert'))
        alert_slide("{{Session::get('register_alert')}}");
        @endif
    </script>

@stop