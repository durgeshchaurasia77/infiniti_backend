@extends('admin.layout.app')
@section('title')
Excellance Counting
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
                            <h4 class="page-title">Edit Excellance Counting</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('excelanace-counting-update') }}"
                            method="POST"
                            class="formSubmit">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label>Industry Count</label>
                                        <input type="number"
                                            class="form-control"
                                            name="industry_count"
                                            min="0"
                                            value="{{ $counting->industry_count ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Empowered Count</label>
                                        <input type="number"
                                            class="form-control"
                                            name="empowered_count"
                                            min="0"
                                            value="{{ $counting->empowered_count ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Countries Count</label>
                                        <input type="number"
                                            class="form-control"
                                            name="coutries_count"
                                            min="0"
                                            value="{{ $counting->coutries_count ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Tech Engineers</label>
                                        <input type="number"
                                            class="form-control"
                                            name="teach_engineer_count"
                                            min="0"
                                            value="{{ $counting->teach_engineer_count ?? '' }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Digital Solutions</label>
                                        <input type="number"
                                            class="form-control"
                                            name="digital_solution_count"
                                            min="0"
                                            value="{{ $counting->digital_solution_count ?? '' }}">
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

