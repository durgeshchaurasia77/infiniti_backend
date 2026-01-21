@extends('admin.layout.app')
@section('title')
Our Services
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
                                <h4 class="page-title">Edit Our Services</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('ourServices-update') }}" method="post" id="" class="formSubmit" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $ourServicesData->id }}">
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="first d-flex " style="gap:40px;">
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" id="title" required value="{{ $ourServicesData->title ?? '' }}">
                                            </div>
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Upload Image<span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="image" id="image">
                                                @if ($ourServicesData->image != '')
                                                <img src="{{asset($ourServicesData->image)}}"  width="90px" height="90px" style="padding:11px">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description"  rows="3" placeholder="Enter Description" required>{{$ourServicesData->description ?? ''}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Summary<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="summary" id="summernote"  rows="3" placeholder="Enter Summary">{!! $ourServicesData->summary !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="d-flex align-items-center justify-content-end m-0">
                                        <a href="{{route('ourServices-list')}}" class="btn btn-light me-2" >Cancel</a>

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
