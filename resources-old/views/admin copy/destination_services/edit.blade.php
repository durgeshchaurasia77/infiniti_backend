@extends('admin.layout.app')
@section('title')
Destination Services
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
                                <h4 class="page-title">Edit Destination Services</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('destination-services-update') }}" method="post" id="" class="formSubmit" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $destinationservicesData->id }}">
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="first d-flex " style="gap:40px;">
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" required value="{{ $destinationservicesData->title }}">
                                            </div>
                                        </div>
                                        <div class="first d-flex " style="gap:40px;">
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="summernote" name="description"  rows="3" placeholder="Enter Description">{!! $destinationservicesData->description !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="d-flex align-items-center justify-content-end m-0">
                                        <a href="{{route('destination-services-list')}}" class="btn btn-light me-2" >Cancel</a>

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
