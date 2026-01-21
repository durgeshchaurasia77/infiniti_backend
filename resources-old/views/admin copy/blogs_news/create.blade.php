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
                                <h4 class="page-title">Add New Blogs & News</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('blogs-store') }}" method="post" class="formSubmit" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="first d-flex " style="gap:40px;">
                                        <div class="mb-2 w-100">
                                            <label class="col-form-label">Blog Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title...">
                                        </div>
                                        <div class="mb-2 w-100">
                                            <label class="col-form-label">Upload Blog Image<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="blog_image" id="blog_image">
                                        </div>
                                    </div>
                                    <div class="first d-flex " style="gap:40px;">
                                        <div class="mb-2 w-100">
                                            <label class="col-form-label">Author Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Author Name...">
                                        </div>
                                        <div class="mb-2 w-100">
                                            <label class="col-form-label">Upload Author Photo<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                    </div>
                                        <div class="mb-3 w-100">
                                            <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description"  rows="3" placeholder="Enter Description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Summary<span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="summernote" name="summary"  rows="3" placeholder="Enter Summary"></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="d-flex align-items-center justify-content-end m-0">
                                        <a href="{{route('blogs-list')}}" class="btn btn-light me-2" >Cancel</a>
                                        <button type="submit" class="btn btn-primary loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
