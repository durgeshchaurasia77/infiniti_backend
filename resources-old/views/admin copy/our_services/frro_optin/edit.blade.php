@extends('admin.layout.app')
@section('title')
Frro Optin
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
                            <h4 class="page-title">Edit Frro Optin</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('frro-optin-update') }}" method="post" class="formSubmit" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $frroOptinData->id ?? '' }}">
                            <div class="modal-body">
                                <div class="first d-flex" style="gap:30px;">
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter title..." value="{{ $frroOptinData->title ?? '' }}" required>
                                    </div>
                                    <div class="mb-2 w-100">
                                        <label class="col-form-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="image" >
                                        @if (isset($frroOptinData->image))
                                            <img src="{{asset($frroOptinData->image)}}"  width="90px" height="90px" style="padding:11px">
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-2 w-100">
                                    <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Please Enter description..."  required>{{ $frroOptinData->description ?? '' }}</textarea>
                                </div>
                                <div id="dynamic-fields">
                                    @if(isset($frroOptinData->details) && count($frroOptinData->details) > 0)
                                        @foreach($frroOptinData->details as $key => $detail)
                                        <div class="dynamic-field d-flex align-items-end mb-3" data-index="{{ $key }}">
                                            <div class="mb-2 w-100">
                                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                <input type="text"  class="form-control" name="details[{{ $key }}][titles]" placeholder="Please Enter title..." required value="{{ $detail['titles'] }}">
                                            </div>
                                            <button type="button" class="btn btn-danger ms-3 remove-field">Remove</button>
                                        </div>
                                        @endforeach
                                    @else
                                    <div class="dynamic-field d-flex align-items-end mb-3" data-index="0">
                                        <div class="mb-2 w-100">
                                            <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="details[0][titles]" placeholder="Please Enter title..." required>
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

