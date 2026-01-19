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
                        <form action="{{ route('about-us-update') }}" method="POST" class="formSubmit">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"
                                           value="{{ $data->title ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title"
                                           value="{{ $data->sub_title ?? '' }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Short Description</label>
                                    <textarea class="form-control" name="short_description" rows="3">{{ $data->short_description ?? '' }}</textarea>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>Experience</label>
                                    <input type="text" class="form-control" name="experience"
                                           value="{{ $data->experience ?? '' }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Countries</label>
                                    <input type="text" class="form-control" name="countries"
                                           value="{{ $data->countries ?? '' }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Delivered</label>
                                    <input type="text" class="form-control" name="delivered"
                                           value="{{ $data->delivered ?? '' }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Enthusiasts</label>
                                    <input type="text" class="form-control" name="enthusiasts"
                                           value="{{ $data->enthusiasts ?? '' }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Human Centric Title</label>
                                    <input type="text" class="form-control" name="human_centric_title"
                                           value="{{ $data->human_centric_title ?? '' }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Human Centric Description</label>
                                    <textarea class="form-control" name="human_centric_description" rows="2">{{ $data->human_centric_description ?? '' }}</textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Exceptional Expertise Title</label>
                                    <input type="text" class="form-control" name="exceptional_expertis_title"
                                           value="{{ $data->exceptional_expertis_title ?? '' }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Exceptional Expertise Description</label>
                                    <textarea class="form-control" name="exceptional_expertise_description" rows="2">{{ $data->exceptional_expertise_description ?? '' }}</textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>End To End Support Title</label>
                                    <input type="text" class="form-control" name="end_to_end_support_title"
                                           value="{{ $data->end_to_end_support_title ?? '' }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>End To End Support Description</label>
                                    <textarea class="form-control" name="end_to_end_support_description" rows="2">{{ $data->end_to_end_support_description ?? '' }}</textarea>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" {{ ($data->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ ($data->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary loderButton">
                                    <span class="spinner-grow spinner-grow-sm loderIcon" style="display:none;"></span>
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
