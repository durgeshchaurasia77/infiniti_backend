@extends('admin.layout.app')
@section('title')
Blogs & News Header
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
                            <h4 class="page-title">Edit Blogs & News Header</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('blogs-header-update') }}" method="post"  class="formSubmit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$blogsHeaderData->id ?? ''}}">
                                <div class="modal-body">
                                    <div class="modal-body">
                                        {{-- <div class="first d-flex " style="gap:30px;"> --}}
                                        <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter title..." value="{{$blogsHeaderData->title ?? ''}}" required>

                                        <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="description" placeholder="Please Enter Description..."> {{$blogsHeaderData->description ?? ''}} </textarea>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <div class="d-flex align-items-center justify-content-end m-0">
                                    <button type="submit" class="btn btn-primary loderButton">
                                        <span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>
                                        Save Changes
                                    </button>
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

