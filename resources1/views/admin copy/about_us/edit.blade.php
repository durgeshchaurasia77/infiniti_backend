@extends('admin.layout.app')
@section('title')
About Us
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
                            <h4 class="page-title">Edit About Us</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('aboutus-update') }}" method="post"  class="formSubmit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$aboutusData->id ?? ''}}">
                            <div class="modal-body">
                              <div class="modal-body">
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter title..." value="{{$aboutusData->title ?? ''}}" required>
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Experties<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="experties" id="experties" maxlength="2" placeholder="Please Enter experties ..." value="{{$aboutusData->experties ?? ''}}" required onkeypress="return numbersonly(event)">
                                    </div>
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Contact No.<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Please Contact no..." value="{{$aboutusData->contact_no ?? ''}}" required>
                                    </div>

                                </div>
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Image<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="image" id="image"  value="{{$aboutusData->image ?? ''}}" >
                                        @if (isset($aboutusData->image))
                                                    <img src="{{asset($aboutusData->image)}}"  width="70px" height="70px" >
                                                @endif
                                    </div>
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Achievement<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="achievement" id="achievement" placeholder="Please Enter Contact No..." value="{{$aboutusData->achievement ?? ''}}" required>
                                    </div>
                                </div>
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" rows="4" id="description" placeholder="Please description..."  required>{{$aboutusData->description ?? ''}}</textarea>
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

