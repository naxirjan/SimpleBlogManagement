<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('assets/font/iconsmind-s/css/iconsminds.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/font/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.rtl.only.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/component-custom-switch.min.css')}}" />
    @yield('cssStyles')
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
</head>

<body class="background show-spinner no-footer">
<div class="fixed-background"></div>
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side bg-light"></div>
                        <div class="form-side">
                            <h3 class="mb-4 font-weight-bold">Login</h3>
                            <form id="exampleForm" method="POST" action="/loginProcess" class="tooltip-right-bottom" novalidate>
                            <!-- Email -->
                            <x-text-field-floating-label id="email" name="email" type="email" text="E-mail" value="{{old('email')}}" required="" />
                            <x-text-field-floating-label id="password" name="password" type="password" text="Password" value="{{old('password')}}" required="" />

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/register">Don't have account? register here</a>
                                <x-button class="btn btn-primary btn-shadow" type="submit" text="LOGIN" />
                                @csrf
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- JS Scripts -->
<script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/dore.script.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/jsAppScript.js')}}"></script>
@php
    $msg = (Session::has('msg') ? Session::get('msg') : "");
    $decodeMsg = json_decode($msg);
@endphp
<script>
    $(document).ready(function (){
        let title = "{{($decodeMsg[0] ?? '')}}";
        let message = "{{($decodeMsg[1] ?? '')}}";
        let type = "{{($decodeMsg[2] ?? '')}}";
        if(title != "") notifyAlert(title, message, type);
    });
</script>

</body>
</html>
