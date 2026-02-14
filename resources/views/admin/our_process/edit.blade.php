@extends('admin.layout.app')
@section('title')
Our Process
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
                            <h4 class="page-title">Edit Our Process</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('our-process-update') }}"
                            method="POST"
                            enctype="multipart/form-data"
                            class="formSubmit">
                            @csrf

                            <div class="modal-body">
                                <div class="row">

                                    {{-- Title Header One --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Title Header One <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control"
                                            name="title_header_one"
                                            value="{{ $ourProcess->title_header_one ?? '' }}"
                                            required>
                                    </div>

                                    {{-- Title Header Two --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Title Header Two <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control"
                                            name="title_header_two"
                                            value="{{ $ourProcess->title_header_two ?? '' }}"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Step One Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                                class="form-control"
                                                name="title_step_one"
                                                value="{{ $ourProcess->title_step_one ?? '' }}"
                                                required>
                                    </div>
                                    {{-- Step One Image --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Step One Image <span class="text-danger">*</span></label>
                                        <input type="file"
                                            class="form-control"
                                            name="image_step_one"
                                            accept="image/*">
                                             @if(!empty($ourProcess->image_step_one))
                                                <div class="mt-2">
                                                    <img src="{{ asset($ourProcess->image_step_one) }}"
                                                        width="120"
                                                        class="img-thumbnail">
                                                </div>
                                            @endif
                                    </div>

                                    {{-- Step One Description --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Step One Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control"
                                                name="short_description_step_one"
                                                rows="3"
                                                required>{{ $ourProcess->short_description_step_one ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Step Two Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control"
                                            name="title_step_two"
                                            value="{{ $ourProcess->title_step_two ?? '' }}"
                                            required>
                                    </div>
                                    {{-- Step Two Image --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Step Two Image <span class="text-danger">*</span></label>
                                        <input type="file"
                                            class="form-control"
                                            name="image_step_two"
                                            accept="image/*">
                                            @if(!empty($ourProcess->image_step_two))
                                                <div class="mt-2">
                                                    <img src="{{ asset($ourProcess->image_step_two) }}"
                                                        width="120"
                                                        class="img-thumbnail">
                                                </div>
                                            @endif
                                    </div>

                                    {{-- Step Two Description --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Step Two Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control"
                                                name="short_description_step_two"
                                                rows="3"
                                                required>{{ $ourProcess->short_description_step_two ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Step Three Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                                class="form-control"
                                                name="title_step_three"
                                                value="{{ $ourProcess->title_step_three ?? '' }}"
                                                required>
                                    </div>
                                    {{-- Step Three Image --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Step Three Image <span class="text-danger">*</span></label>
                                        <input type="file"
                                            class="form-control"
                                            name="image_step_three"
                                            accept="image/*">
                                            @if(!empty($ourProcess->image_step_three))
                                                <div class="mt-2">
                                                    <img src="{{ asset($ourProcess->image_step_three) }}"
                                                        width="120"
                                                        class="img-thumbnail">
                                                </div>
                                            @endif
                                    </div>

                                    {{-- Step Three Description --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Step Three Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control"
                                                name="short_description_step_three"
                                                rows="3"
                                                required>{{ $ourProcess->short_description_step_three ?? '' }}</textarea>
                                    </div>
                                     <div class="col-md-6 mb-3">
                                        <label>Step Four Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control"
                                            name="title_step_four"
                                            value="{{ $ourProcess->title_step_four ?? '' }}"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Step Four Image <span class="text-danger">*</span></label>
                                        <input type="file"
                                            class="form-control"
                                            name="image_step_four"
                                            accept="image/*">

                                            @if(!empty($ourProcess->image_step_four))
                                                <div class="mt-2">
                                                    <img src="{{ asset($ourProcess->image_step_four) }}"
                                                        width="120"
                                                        class="img-thumbnail">
                                                </div>
                                            @endif
                                    </div>

                                    {{-- Step Four Description --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Step Four Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control"
                                                name="short_description_step_four"
                                                rows="3"
                                                required>{{ $ourProcess->short_description_step_four ?? '' }}</textarea>
                                    </div>
                                    {{-- Bottom Short Description --}}
                                    <div class="col-md-12 mb-3">
                                        <label>Bottom Short Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control"
                                                name="short_description_two"
                                                rows="3"
                                                required>{{ $ourProcess->short_description_two ?? '' }}</textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
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
