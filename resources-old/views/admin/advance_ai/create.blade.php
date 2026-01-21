@extends('admin.layout.app')
@section('title')
Advance Ai
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
                            <h4 class="page-title">Add New Advance Ai</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('advance-ai-store') }}"
                            method="POST"
                            class="formSubmit"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                {{-- name --}}
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        name="name"
                                        placeholder="Enter name"
                                        required>
                                </div>

                                {{-- <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        name="title"
                                        placeholder="Enter title"
                                        required>
                                </div> --}}

                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Image <span class="text-danger">*</span>
                                    </label>
                                    <input type="file"
                                           class="form-control"
                                           name="image"
                                           accept="image/*"
                                           required>
                                </div>
                                {{-- Short Detail --}}
                                {{-- <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Short Description <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control"
                                            name="short_description"
                                            rows="3"
                                            placeholder="Enter short description"
                                            required></textarea>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <div id="dynamic-fields">
                                        <div class="dynamic-field d-flex align-items-end mb-3" data-index="0">
                                            <div class="mb-2 w-50">
                                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="details[0][titles]" placeholder="Please Enter title..." required>
                                            </div>
                                            <button type="button" class="btn btn-danger ms-3 remove-field">Remove</button>
                                        </div>
                                    </div>

                                    <button type="button" id="add-field" class="btn btn-success mb-3">Add More</button>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary loderButton">
                                    <span class="spinner-grow spinner-grow-sm loderIcon"
                                        style="display:none;"></span>
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
                <div class="mb-2 w-50">
                    <label class="col-form-label">Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="details[${fieldIndex}][titles]" placeholder="Please Enter title..." required>
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
@endsection
