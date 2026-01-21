@extends('admin.layout.app')
@section('title')
Our Experties
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
                            <h4 class="page-title">Edit Our Experties</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('our-experties-update') }}" method="post" class="formSubmit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $our_expertiesData->id ?? '' }}">
                            <div class="modal-body">
                                <div class="first d-flex" style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter title..." value="{{ $our_expertiesData->title ?? '' }}" required>
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="description" placeholder="Please Description...">{{ $our_expertiesData->description ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div id="dynamic-fields">
                                    @if(isset($our_expertiesData->details) && count($our_expertiesData->details) > 0)
                                        @foreach($our_expertiesData->details as $key => $detail)
                                        <div class="dynamic-field d-flex align-items-end mb-3" data-index="{{ $key }}">
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="details[{{ $key }}][title]" placeholder="Please Enter Title..." value="{{ $detail['title'] }}" required>
                                            </div>
                                            <div class="mb-2 w-100 ms-3">
                                                <label class="col-form-label">YouTube Link<span class="text-danger">*</span></label>
                                                <input type="url" class="form-control" name="details[{{ $key }}][video_url]" placeholder="Please YouTube URL..." value="{{ $detail['video_url'] }}" required>
                                            </div>
                                            <button type="button" class="btn btn-danger ms-3 remove-field">Remove</button>
                                        </div>
                                        @endforeach
                                    @else
                                    <div class="dynamic-field d-flex align-items-end mb-3" data-index="0">
                                        <div class="mb-2 w-100">
                                            <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="details[0][title]" placeholder="Please Enter Title..." required>
                                        </div>
                                        <div class="mb-2 w-100 ms-3">
                                            <label class="col-form-label">YouTube Link<span class="text-danger">*</span></label>
                                            <input type="url" class="form-control" name="details[0][video_url]" placeholder="Please YouTube URL..." required>
                                        </div>
                                        <button type="button" class="btn btn-danger ms-3 remove-field">Remove</button>
                                    </div>
                                    @endif
                                </div>

                                <button type="button" id="add-field" class="btn btn-success mb-3">Add More</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
    let dynamicFields = document.getElementById('dynamic-fields');
    let addFieldButton = document.getElementById('add-field');

    // Counter for new fields
    let fieldIndex = dynamicFields.querySelectorAll('.dynamic-field').length || 0;

    // Add new field
    addFieldButton.addEventListener('click', function () {
        let newField = `
            <div class="dynamic-field d-flex align-items-end mb-3" data-index="${fieldIndex}">
                <div class="mb-2 w-100">
                    <label class="col-form-label">Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="details[${fieldIndex}][title]" placeholder="Please Enter Title..." required>
                </div>
                <div class="mb-2 w-100 ms-3">
                    <label class="col-form-label">YouTube Link<span class="text-danger">*</span></label>
                    <input type="url" class="form-control" name="details[${fieldIndex}][video_url]" placeholder="Please YouTube URL..." required>
                </div>
                <button type="button" class="btn btn-danger ms-3 remove-field">Remove</button>
            </div>`;
        dynamicFields.insertAdjacentHTML('beforeend', newField);
        fieldIndex++;
    });

    // Remove field
    dynamicFields.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-field')) {
            event.target.closest('.dynamic-field').remove();
        }
    });
});

</script>

