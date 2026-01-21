@extends('admin.layout.app')
@section('title')
Empowering Global Careers
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
                            <h4 class="page-title">Edit Empowering Global Careers</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('empowering-careers-update') }}" method="post" class="formSubmit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $empowering_careersData->id ?? '' }}">
                            <div class="modal-body">
                                <div class="first d-flex" style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter title..." value="{{ $empowering_careersData->title ?? '' }}" required>
                                    </div>
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">Image<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="image" id="image" >
                                        @if (isset($empowering_careersData->image))
                                            <img src="{{asset($empowering_careersData->image)}}"  width="90px" height="90px" style="padding:11px">
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 w-100">
                                    <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Please Description...">{{ $empowering_careersData->description ?? '' }}</textarea>
                                </div>

                                <div id="dynamic-fields">
                                    @if(isset($empowering_careersData->details) && count($empowering_careersData->details) > 0)
                                        @foreach($empowering_careersData->details as $key => $detail)
                                        <div class="dynamic-field d-flex align-items-end mb-3" data-index="{{ $key }}">
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="details[{{ $key }}][title]" placeholder="Please Enter Title..." value="{{ $detail['title'] }}" required>
                                            </div>
                                            <div class="mb-2 w-100 ms-3">
                                                <label class="col-form-label">Percentange<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="details[{{ $key }}][percentage]" maxlength="5" placeholder="Please Percentage..." value="{{ $detail['percentage'] }}" required onkeypress="return percentageonly(event, this)" >
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
                                            <label class="col-form-label">Percentange<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="details[0][percentage]" maxlength="5" placeholder="Please Percentage..." required onkeypress="return percentageonly(event, this)" >
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
                    <label class="col-form-label">Percentange<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="details[${fieldIndex}][percentage]" maxlength="5" placeholder="Please Percentage..." required onkeypress="return percentageonly(event, this)" >
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
<script>
    function percentageonly(e, input) {
        const charCode = e.which || e.keyCode;
        const currentValue = input.value;

        // Allow numbers (48-57), period (46), and backspace (8)
        if (
            (charCode >= 48 && charCode <= 57) || // Numbers
            charCode === 8                       // Backspace
        ) {
            // Prevent entering numbers beyond 99
            if (currentValue.length === 2 && !currentValue.includes(".") && charCode !== 46) {
                return false;
            }
            return true;
        }

        // Allow period (.) if not already present and not at the start
        if (charCode === 46 && !currentValue.includes(".") && currentValue.length > 0) {
            return true;
        }

        // Prevent anything else
        return false;
    }
</script>

