@extends('admin.layout.app')
@section('title')
Blogs & News
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-sm-8">
                                <h4 class="page-title">Blogs & News List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <div class="card">
                        <div class="card-header">
                            <!-- Search -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        <a href="{{ route('blogs-create') }}" class="btn btn-primary"
                                            title="Add Blogs & News"><i class="ti ti-square-rounded-plus me-2"></i>Add
                                            Blogs & News</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Search -->
                        </div>
                        <div class="card-body">
                            <!-- Contact Stage List -->
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Blog Title</th>
                                            <th scope="col">Blog Image</th>
                                            <th scope="col">Author Name</th>
                                            <th scope="col">Author Photo</th>
                                            <th scope="col">Description</th>

                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogsList as $key => $blogs)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                    {{ $blogs->title ?? '' }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset($blogs->blog_image ?? '#') }}" width="50px" height="50px" alt="User Image" loading="lazy" onerror="this.src='{{ asset('notImage.jpg') }}'">
                                                </td>
                                                <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                    {{ $blogs->name ?? '' }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset($blogs->image ?? '#') }}" width="50px" height="50px" alt="User Image" loading="lazy" onerror="this.src='{{ asset('notImage.jpg') }}'">
                                                </td>
                                                <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                    {{ $blogs->description ?? '' }}
                                                </td>

                                                <td>
                                                    @if($blogs->status == 1)
                                                        <span class="badge bg-success active_btn">Active</span>
                                                    @else
                                                        <span class="badge bg-danger inactive_btn">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a type="button" href="{{ route('blogs-edit', [$blogs->id]) }}" class="btn btn-secondary edit_model"  title="Edit">
                                                            <i class="feather-edit"></i>
                                                        </a>
                                                        <button @if($blogs->status == 1) class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('blogs-status-update', [$blogs->id]) }}" title="Status">
                                                            @if($blogs->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif
                                                        </button>
                                                        <button id="delete" href="{{ route('blogs.delete',[$blogs->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row align-items-center mt-2 mb-2">
                                    <div class="col-md-6">
                                        <div class="datatable-length">
                                            Showing {{$blogsList->firstItem()}} to {{$blogsList->lastItem()}} of {{$blogsList->total()}} entries
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="datatable-paginate">
                                            {!! $blogsList->appends(request()->input())->links('custom') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
