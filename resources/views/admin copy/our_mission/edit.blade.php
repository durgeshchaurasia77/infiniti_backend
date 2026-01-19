@extends('admin.layout.app')
@section('title')
Our Mission
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
                            <h4 class="page-title">Edit Our Mission</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('our-mission-update') }}" method="post"  class="formSubmit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$our_missionData->id ?? ''}}">
                            <div class="modal-body">
                              <div class="modal-body">
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter title..." value="{{$our_missionData->title ?? ''}}" >
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Image One<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="image_one" id="image_one"  value="{{$our_missionData->image_one ?? ''}}" >
                                        @if (isset($our_missionData->image_one))
                                            <img src="{{asset($our_missionData->image_one)}}"  width="60px" height="60px" style="padding:9px">
                                        @endif
                                    </div>
                                </div>
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Image Two<span class="text-danger">*</span></label>
                                          <input type="file" class="form-control" name="image_two" id="image_two"  value="{{$our_missionData->image_two ?? ''}}" >
                                          @if (isset($our_missionData->image_two))
                                            <img src="{{asset($our_missionData->image_two)}}"  width="60px" height="60px" style="padding:9px">
                                        @endif
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Image Three<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="image_three" id="image_three" placeholder="Please Website Url..." value="{{$our_missionData->image_three ?? ''}}" >
                                        @if (isset($our_missionData->image_three))
                                            <img src="{{asset($our_missionData->image_three)}}"  width="60px" height="60px" style="padding:9px">
                                        @endif
                                    </div>
                                </div>
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                          <textarea  class="form-control" name="description" id="description" placeholder="Please Description..." >{{$our_missionData->description ?? ''}}</textarea>
                                    </div>

                                </div>
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
                          </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

