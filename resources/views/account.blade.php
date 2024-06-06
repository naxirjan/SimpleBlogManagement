<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('title', 'Account')

@section('cssStyles')
    <link rel="stylesheet" href="{{asset('assets/css/vendor/cropper.min.css')}}" />
@endsection

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Account</h1>

                    <div class="separator"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-5 font-weight-bold">Account Information</h2>
                                @php
                                    $addedOn = (empty(Auth::user()->created_at) ? "-" : date("d F, Y", strtotime(Auth::user()->created_at)));
                                    $updatedOn = (empty(Auth::user()->updated_at) ? "-" : date("d F, Y", strtotime(Auth::user()->updated_at)));
                                @endphp
                                <!-- Title -->
                                <x-paragraph-floating-label text="Full Name" value="{{Auth::user()->name}}" />
                                <br />

                                <!-- Description -->
                                <x-paragraph-floating-label text="E-mail" value="{{Auth::user()->email}}" />
                                <br />

                                <!-- Created On -->
                                <x-paragraph-floating-label text="Account Created On" value="{{$addedOn}}" />
                                <br>

                                <!-- Updated On -->
                                <x-paragraph-floating-label text="Updated On" value="{{$updatedOn}}" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xl-4">
                    <form id="exampleForm" method="POST" action="/updateProfilePicture" class="tooltip-right-bottom" novalidate>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">Profile Picture</h4>
                            <img src="{{asset('assets/img/profiles/profile-pic.png')}}" height="280">
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('jsScripts')
    <script src="{{asset('assets/js/vendor/jquery.validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.validate/additional-methods.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/cropper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap-notify.min.js')}}"></script>

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
@endsection
