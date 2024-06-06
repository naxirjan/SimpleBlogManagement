<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('title', 'Create New Branch')

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
                    <h1>Posts / View</h1>
                    <div class="top-right-button-container">
                        <x-hyper-link fieldHyperLinkURL="/posts" fieldClasses="btn btn-primary btn-sm top-right-button mr-1" fieldIcon='iconsminds-back' fieldText="Back" />
                    </div>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="mb-5 font-weight-bold">Post Information</h2>
                                @php
                                    $postImage = $post[0]['image'];
                                    $addedOn = date("d F, Y", strtotime($post[0]['created_at']));
                                    $updatedOn = (empty($post[0]['updated_at']) ? "" : date("d F, Y", strtotime($post[0]['updated_at'])));
                                @endphp
                                <!-- Title -->
                                <x-paragraph-floating-label text="Title" value="{{$post[0]['title']}}" />
                                <br />

                                <!-- Description -->
                                <x-paragraph-floating-label text="Description" value="{{$post[0]['description']}}" />
                                <br />

                                <!-- Added By -->
                                <x-paragraph-floating-label text="Added By" value="{{$post[0]['user']['name']}}" />
                                <br>

                                <!-- Added On -->
                                <x-paragraph-floating-label text="Added On" value="{{$addedOn}}" />
                                <br>

                                <!-- Updated On -->
                                <x-paragraph-floating-label text="Updated On" value="{{$updatedOn}}" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xl-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img alt="No Image" src="{{asset('assets/img/posts/'.$postImage)}}" style="width: 100%">
                        </div>
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


           $("#btnCropImage").attr("disabled", "disabled");

           $("#inputImage").change(function (){
               $("#btnCropImage").removeAttr("disabled");
           });

           $("#btnCropImage").click(function (){
               $("#cropperContainer").hide();
               $("#cropperContainer img").attr("src", "");
               $("#branchLogo").val($("#cropper-preview img").attr("src"));
           });


        });


        $(function() {
            $.contextMenu({
                selector: '.context-menu-one',
                callback: function(key, options) {
                    var m = "clicked: " + key;
                    window.console && console.log(m) || alert(m);
                },
                items: {
                    "edit": {name: "Edit", icon: "edit"},
                    "cut": {name: "Cut", icon: "cut"},
                    copy: {name: "Copy", icon: "copy"},
                    "paste": {name: "Paste", icon: "paste"},
                    "delete": {name: "Delete", icon: "delete"},
                    "sep1": "---------",
                    "quit": {name: "Quit", icon: function(){
                            return 'context-menu-icon context-menu-icon-quit';
                        }}
                }
            });

            $('.context-menu-one').on('click', function(e){
                console.log('clicked', this);
            })
        });
    </script>
@endsection
