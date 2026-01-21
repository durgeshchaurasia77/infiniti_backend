@extends('admin.layout.app')
@section('title')
Setting
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
                            <h4 class="page-title">Edit Setting</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('setting-update') }}" method="post"  class="formSubmit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$settingData->id ?? ''}}">
                            <div class="modal-body">
                              <div class="modal-body">
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Address<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="address" id="address" placeholder="Please Enter Address..." value="{{$settingData->address ?? ''}}" required>
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Email Address<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Please Enter Email Address..." value="{{$settingData->email ?? ''}}" required>
                                    </div>
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Contact Number<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="phone" id="phone" placeholder="Please Enter Contact No..." value="{{$settingData->phone ?? ''}}" required>
                                    </div>
                                </div>
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Favicon<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="favicon" id="favicon"  >
                                        <div class="p-3 w-50" >
                                            @if (isset($settingData->favicon))
                                                <img src="{{asset($settingData->favicon)}}"  width="50%" height="5%" style="padding:9px">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Header Logo<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="header_logo" id="header_logo"  >
                                        <div class="p-3 w-50" >
                                            @if (isset($settingData->header_logo))
                                                <img src="{{asset($settingData->header_logo)}}"  width="50%" height="5%" style="padding:9px">
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Footer Logo<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="footer_logo" id="footer_logo"  >
                                        <div class="p-3 w-50" >
                                            @if (isset($settingData->footer_logo))
                                                <img src="{{asset($settingData->footer_logo)}}"  width="50%" height="5%" style="padding:9px">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">About Footer<span class="text-danger">*</span></label>
                                          <textarea class="form-control" name="footer_about" rows="4" id="footer_about" placeholder="Please Footer About..."  required>{{$settingData->footer_about ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Facebook Link<span class="text-danger">*</span></label>
                                          <input type="url" class="form-control" name="facebook_url" id="facebook_url" placeholder="Please Facebook Url..." value="{{$settingData->facebook_url ?? ''}}" required>
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Twitter Link<span class="text-danger">*</span></label>
                                        <input type="url" class="form-control" name="twitter_url" id="twitter_url" placeholder="Please Twitter Url..." value="{{$settingData->twitter_url ?? ''}}" required>
                                    </div>
                                </div>
                                <div class="first d-flex " style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Instagram Link<span class="text-danger">*</span></label>
                                          <input type="url" class="form-control" name="instagram_url" id="instagram_url" placeholder="Please Instagram Url..." value="{{$settingData->instagram_url ?? ''}}" required>
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">LinkedIn Link<span class="text-danger">*</span></label>
                                        <input type="url" class="form-control" name="linkedin_url" id="linkedin_url" placeholder="Please LinkedIn Url..." value="{{$settingData->linkedin_url ?? ''}}" required>
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

