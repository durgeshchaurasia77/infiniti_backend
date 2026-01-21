@extends('admin.layout.app')
@section('title')
Features
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
                            <h4 class="page-title">Edit Features</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('features-update') }}"
                              method="POST"
                              class="formSubmit"
                              enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <div class="modal-body">

                                {{-- BASIC FIELDS --}}
                                <div class="d-flex" style="gap:30px;">
                                    {{-- Name --}}
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control"
                                               name="name"
                                               placeholder="Enter name"
                                               value="{{ $data->name ?? '' }}"
                                               required>
                                    </div>

                                    {{-- Title --}}
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">
                                            Title <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control"
                                               name="title"
                                               placeholder="Enter title"
                                               value="{{ $data->title ?? '' }}"
                                               required>
                                    </div>
                                </div>

                                {{-- Short Description --}}
                                <div class="d-flex" style="gap:30px;">
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">
                                            Short Description <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control"
                                                name="short_description"
                                                rows="4"
                                                placeholder="Enter short description"
                                                required>{{ $data->short_description ?? '' }}</textarea>
                                    </div>

                                    {{-- Image --}}
                                    <div class="mb-3 w-100">
                                        <label class="col-form-label">
                                            Image <span class="text-danger">*</span>
                                        </label>
                                        <input type="file"
                                            class="form-control"
                                            name="image"
                                            accept="image/*">

                                        @if(!empty($data->image))
                                            <div class="mt-2">
                                                <img src="{{ asset($data->image) }}"
                                                    style="max-width:200px;border-radius:6px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- ================= DETAILS (DYNAMIC) ================= --}}
                                <hr>
                                <h5 class="mb-3">Details</h5>
                                <div id="dynamic-fields">
                                    @if(!empty($data->details) && count($data->details) > 0)
                                        @foreach($data->details as $key => $detail)
                                            <div class="dynamic-field border p-3 mb-3 rounded">

                                                {{-- Heading --}}
                                                <div class="mb-2">
                                                    <label class="col-form-label">
                                                        Heading <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                        class="form-control"
                                                        name="details[{{ $key }}][heading]"
                                                        value="{{ $detail['heading'] ?? '' }}"
                                                        required>
                                                </div>

                                                {{-- Description --}}
                                                <div class="mb-2">
                                                    <label class="col-form-label">
                                                        Description <span class="text-danger">*</span>
                                                    </label>
                                                    <textarea class="form-control"
                                                            name="details[{{ $key }}][description]"
                                                            rows="2"
                                                            required>{{ $detail['description'] ?? '' }}</textarea>
                                                </div>

                                                @if($key != 0)
                                                    <button type="button"
                                                            class="btn btn-danger remove-field">
                                                        Remove
                                                    </button>
                                                @endif

                                            </div>
                                        @endforeach
                                    @else
                                        <div class="dynamic-field border p-3 mb-3 rounded">

                                            {{-- Heading --}}
                                            <div class="mb-2">
                                                <label class="col-form-label">
                                                    Heading <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                    class="form-control"
                                                    name="details[0][heading]"
                                                    required>
                                            </div>

                                            {{-- Description --}}
                                            <div class="mb-2">
                                                <label class="col-form-label">
                                                    Description <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control"
                                                        name="details[0][description]"
                                                        rows="2"
                                                        required></textarea>
                                            </div>

                                        </div>
                                    @endif
                                </div>

                                <button type="button"
                                        id="add-field"
                                        class="btn btn-success mb-3">
                                    Add More
                                </button>


                            </div>

                            {{-- Footer --}}
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
    let addBtn = document.getElementById('add-field');
    let index = dynamicFields.querySelectorAll('.dynamic-field').length;

    addBtn.addEventListener('click', function () {
        let html = `
            <div class="dynamic-field border p-3 mb-3 rounded">

                <div class="mb-2">
                    <label class="col-form-label">
                        Heading <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           class="form-control"
                           name="details[${index}][heading]"
                           required>
                </div>

                <div class="mb-2">
                    <label class="col-form-label">
                        Description <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control"
                              name="details[${index}][description]"
                              rows="2"
                              required></textarea>
                </div>

                <button type="button"
                        class="btn btn-danger remove-field">
                    Remove
                </button>

            </div>
        `;
        dynamicFields.insertAdjacentHTML('beforeend', html);
        index++;
    });

    dynamicFields.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-field')) {
            e.target.closest('.dynamic-field').remove();
        }
    });

});
</script>
@endsection

