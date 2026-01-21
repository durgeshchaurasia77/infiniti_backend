@extends('admin.layout.app')
@section('title')
Abbreviations
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
                                <h4 class="page-title">Edit Abbreviations</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('abbreviation-update') }}" method="post" id="" class="formSubmit" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $abbreviationData->id }}">
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="first d-flex " style="gap:40px;">
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" required value="{{ $abbreviationData->title }}">
                                            </div>
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Image<span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="image" id="image"  >
                                                @if (isset($abbreviationData->image))
                                                    <img src="{{asset($abbreviationData->image)}}"  width="90px" height="90px" style="padding:11px">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="first d-flex " style="gap:40px;">
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                                <textarea class="form-control"  name="description"  rows="3" placeholder="Enter Description">{!! $abbreviationData->description !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="d-flex align-items-center justify-content-end m-0">
                                        <a href="{{route('abbreviation-list')}}" class="btn btn-light me-2" >Cancel</a>

                                        <button type="submit" class="btn btn-primary loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Save Changes</button>
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
