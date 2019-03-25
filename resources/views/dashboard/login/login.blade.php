<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <meta name="description" content="Custom Login Form Styling with CSS3"/>
    <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder"/>
    <meta name="author" content="Codrops"/>
    <link rel="shortcut icon" href="../../../../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login/css/style.css')}}"/>
    {{--<link rel="stylesheet" type="text/css" href="public/login/css/style.css"/>--}}
    <script src="{{asset('public/login/js/modernizr.custom.63321.js')}}"></script>
    {{--<script src="public/login/js/modernizr.custom.63321.js"></script>--}}
    <!--[if lte IE 7]>
    <style>.main {
        display: none;
    }

    .support-note .note-ie {
        display: block;
    }</style><![endif]-->
</head>
<body>
<div class="container">

    <!-- Codrops top bar -->
    <div class="codrops-top">
        <a href="http://tympanus.net/Tutorials/RealtimeGeolocationNode/">
            <strong></strong>
        </a>
        <span class="right">
                    <a href="">
                        <strong>Tanvir Bin Faysal Khan</strong>
                    </a>
                </span>
    </div><!--/ Codrops top bar -->

    <header>

        <h1><strong>Admin Login</strong></h1>
        <h2>Student Management System</h2>


        <div class="support-note">
            <span class="note-ie">Sorry, only modern browsers.</span>
        </div>

    </header>

    <section class="main">
         {!! Form::open(['url'=>'/login','method'=>'POST','class'=>'form-1']) !!}
       {{-- <form method="POST" action="{{ route('login') }}" class="form-1">
            @csrf--}}
            <p class="field">
                <input type="text" name="email" placeholder="Username or email">
                <i class="icon-user icon-large"></i>
            </p>
            <p class="field">
                <input type="password" name="password" placeholder="Password">
                <i class="icon-lock icon-large"></i>
            </p>
            <p class="submit">
                <button type="submit" name="btn" value=""><i class="icon-arrow-right icon-large"></i></button>
            </p>
       {{-- </form>--}}
         {!! Form::close() !!}
    </section>
</div>
</body>
</html>