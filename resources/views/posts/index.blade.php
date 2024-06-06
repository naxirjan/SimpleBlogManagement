@extends('layouts.master')

@section('title', 'Posts')

@section('cssStyles')
@endsection


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Posts</h1>
                    <div class="top-right-button-container">
                        <a href="/posts/create" class="btn btn-primary btn-sm top-right-button mr-1"><i class="simple-icon-plus"></i> Add New</a>
                    </div>
                    <div class="separator"></div>

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 data-tables-hide-filter">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse"
                                   href="#displayOptions" role="button" aria-expanded="true"
                                   aria-controls="displayOptions">Display Options <i
                                        class="simple-icon-arrow-down align-middle"></i></a>
                                <div class="collapse dont-collapse-sm" id="displayOptions">
                                    <div class="d-block d-md-inline-block">
                                        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top"><input
                                                class="form-control" placeholder="Search Table" id="searchDatatable"></div>
                                    </div>
                                    <div class="float-md-right dropdown-as-select" id="pageCountDatatable"><span
                                            class="text-muted text-small">Displaying 1-10 of 40 items </span>
                                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">10
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">5</a> <a
                                                class="dropdown-item active" href="#">10</a> <a class="dropdown-item"
                                                                                                href="#">20</a></div>
                                    </div>
                                </div>
                            </div>

                            <table id="datatableRows" class="data-table data-table-scrollable responsive nowrap" data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead class="table-header-primary">
                                <tr>
                                    <th> S#</th>
                                    <th> Title</th>
                                    <th> Added By</th>
                                    <th> Added On</th>
                                    <th class="text-center"> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($posts as $key => $data)
                                    <tr id="row{{($data['id'])}}">
                                        <td>{{($key+1)}}</td>
                                        <td>{{$data['title']}}</td>
                                        <td>{{$data['user']['name']}}</td>
                                        <td>{{date("d F, Y", strtotime($data['created_at']))}}</td>
                                        <td class="text-center">
                                            <a href="/posts/{{base64_encode($data['id'])}}">
                                                <x-button class="btn icon-button btn-primary" id="btnCropImage" type="button" icon="simple-icon-eye" msgToolTip="View" placement="bottom"/>
                                            </a>
                                            <a href="/posts/{{base64_encode($data['id'])}}/edit">
                                                <x-button class="btn icon-button btn-info" id="btnCropImage" type="button" icon="iconsminds-folder-edit" msgToolTip="Edit" placement="bottom"/>
                                            </a>
                                            <a href="javascript:void(0);" class="btnDeletePost" id="{{base64_encode($data['id'])}}">
                                                <x-button class="btn icon-button btn-danger" type="button" icon="simple-icon-trash" msgToolTip="Delete" placement="bottom"/>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title font-weight-bold">Do you want delete post?</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    <button type="button" class="btn btn-primary" postId="" id="btnConfirmDelete">YES</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsScripts')
    <script src="{{asset('assets/js/jsAppScript.js')}}"></script>
    <script>
        $(document).ready(function (){
            var modal = $("#modal");

            $(document).on('click', ".btnDeletePost", function (){
                $("#btnConfirmDelete").attr('postId', $(this).attr('id'));
                modal.modal('show');
            });

            $(document).on('click', "#btnConfirmDelete", function (){
                var postId = $(this).attr('postId');

                $.ajax({
                    type:'POST',
                    url:'/posts/'+ postId,
                    data:{
                        _token:"{{csrf_token()}}",
                        _method:"DELETE",
                        id:postId
                    },
                    success:function(data) {
                        modal.modal('hide');
                        $("#row"+atob(postId)).remove();
                        notifyAlert(data.title, data.message, data.type);
                    }
                });
            });
        });
    </script>
@endsection
