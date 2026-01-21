@extends('admin.layout.app')
@section('title')
Our Services Header
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
                            <h4 class="page-title">Edit Our Services Header</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('our-services-header-update') }}" method="post"  class="formSubmit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$ourServicesHeaderData->id ?? ''}}">
                            <div class="modal-body">
                              <div class="modal-body">
                                {{-- <div class="first d-flex " style="gap:30px;"> --}}
                                        <label class="col-form-label">Heading<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="heading" id="heading" placeholder="Please Enter Heading..." value="{{$ourServicesHeaderData->heading ?? ''}}" required>

                                        <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="description" placeholder="Please Enter Description..."> {{$ourServicesHeaderData->description ?? ''}} </textarea>
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

