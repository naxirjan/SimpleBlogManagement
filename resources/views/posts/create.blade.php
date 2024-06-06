<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('title', 'Create Post')

@section('cssStyles')
    <link rel="stylesheet" href="{{asset('assets/css/vendor/cropper.min.css')}}" />
@endsection

@section('content')
    @php

        @endphp
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Posts / Create</h1>
                    <div class="top-right-button-container">
                        <x-hyper-link fieldHyperLinkURL="/posts" fieldClasses="btn btn-primary btn-sm top-right-button mr-1" fieldIcon='iconsminds-back' fieldText="Back" />
                    </div>
                    <div class="separator"></div>
                </div>
            </div>
            <form id="exampleForm" method="POST" action="/posts" class="tooltip-right-bottom" enctype="multipart/form-data" novalidate>

            <div class="row mt-3">
                    <div class="col-12 col-md-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-5 font-weight-bold">Post Information</h2>

                                <!-- Title -->
                                <x-text-field-floating-label id="title" name="title" type="text" text="Title" value="{{old('title')}}" required="" />
                                <br />
                                <!-- Description -->
                                <x-text-field-floating-label id="description" name="description" type="text" text="Description" value="{{old('description')}}"  required="" />

                                <div class="text-center">
                                    <x-button class="btn btn-lg btn-primary mt-3" type="submit" text="Save Post" />
                                    @csrf
                                </div>

                        </div>
                    </div>
                </div>
                    <div class="col-12 col-md-12 col-xl-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">Post Image</h2>
                            <label class="btn btn-primary btn-lg btn-upload" for="inputImage" title="Upload image file">
                                <input type="file" name="image" accept=".jpg,.jpeg,.png,.gif" required>
                                @if(!empty($errors->first("image")))
                                    <div class="invalid-tooltip d-block">{{$errors->first('image')}}</div>
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </main>
@endsection
@section('jsScripts')
    <script src="{{asset('assets/js/vendor/jquery.validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.validate/additional-methods.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/cropper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap-notify.min.js')}}"></script>
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
@endsection
