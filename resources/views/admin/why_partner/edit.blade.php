@extends('admin.layout.app')
@section('title')
Why Partner
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
                            <h4 class="page-title">Edit Why Partner</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('why-partner-update') }}"
                            method="POST"
                            class="formSubmit">
                            @csrf

                            <div class="modal-body">
                                <div class="row">

                                    {{-- Heading One --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Heading One</label>
                                        <input type="text"
                                            class="form-control"
                                            name="heading_one"
                                            value="{{ $whyPartner->heading_one ?? '' }}">
                                    </div>

                                    {{-- Description One --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Short Description One</label>
                                        <textarea class="form-control"
                                                name="short_description_one"
                                                rows="3">{{ $whyPartner->short_description_one ?? '' }}</textarea>
                                    </div>

                                    {{-- Heading Two --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Heading Two</label>
                                        <input type="text"
                                            class="form-control"
                                            name="heading_two"
                                            value="{{ $whyPartner->heading_two ?? '' }}">
                                    </div>

                                    {{-- Description Two --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Short Description Two</label>
                                        <textarea class="form-control"
                                                name="short_description_two"
                                                rows="3">{{ $whyPartner->short_description_two ?? '' }}</textarea>
                                    </div>

                                    {{-- Heading Three --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Heading Three</label>
                                        <input type="text"
                                            class="form-control"
                                            name="heading_three"
                                            value="{{ $whyPartner->heading_three ?? '' }}">
                                    </div>

                                    {{-- Description Three --}}
                                    <div class="col-md-6 mb-3">
                                        <label>Short Description Three</label>
                                        <textarea class="form-control"
                                                name="short_description_three"
                                                rows="3">{{ $whyPartner->short_description_three ?? '' }}</textarea>
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

