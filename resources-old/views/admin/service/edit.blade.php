@extends('admin.layout.app')
@section('title')
Service
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
                            <h4 class="page-title">Edit Service</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('service-update') }}"
                            method="POST"
                            class="formSubmit"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <div class="row">

                                {{-- Category --}}
                                
                                {{-- Title --}}
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        name="name"
                                        value="{{ old('name', $data->name ?? '') }}"
                                        required>
                                </div> <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        name="title"
                                        placeholder="Enter title"
                                        value="{{ old('title', $data->title ?? '') }}"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Image
                                    </label>
                                    <input type="file"
                                           class="form-control"
                                           name="image"
                                           accept="image/*">
                                    @if($data->image)
                                        <img src="{{ asset($data->image) }}"
                                             class="mt-2"
                                             width="120">
                                    @endif
                                </div>
                                {{-- Short Detail --}}
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Short Description <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control"
                                            name="short_description"
                                            rows="3"
                                            required>{{ old('short_description', $data->short_description ?? '') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div id="dynamic-fields">
                                        @if(isset($data->features) && count($data->features) > 0)
                                            @foreach($data->features as $key => $detail)
                                            <div class="dynamic-field d-flex align-items-end mb-3" data-index="{{ $key }}">
                                                <div class="mb-2 w-50">
                                                    <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                    <input type="text"  class="form-control" name="details[{{ $key }}][titles]" placeholder="Please Enter title..." required value="{{ $detail['titles'] }}">
                                                </div>
                                                @if($key != 0)
                                                    <button type="button" class="btn btn-danger ms-3 remove-field">Remove</button>
                                                @endif
                                            </div>
                                            @endforeach
                                        @else
                                        <div class="dynamic-field d-flex align-items-end mb-3" data-index="0">
                                            <div class="mb-2 w-50">
                                                <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="details[0][titles]" placeholder="Please Enter title..." required>
                                            </div>
                                            <button type="button" class="btn btn-danger ms-3 remove-field">Remove</button>
                                        </div>
                                        @endif
                                    </div>

                                    <button type="button" id="add-field" class="btn btn-success mb-3">Add More</button>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <h5 class="mb-3">SEO Details</h5>
                                </div>

                                {{-- SEO Slug --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">SEO Slug</label>
                                    <input type="text"
                                           class="form-control"
                                           name="seo_slug"
                                           value="{{ old('seo_slug', $data->seo_slug) }}">
                                </div>

                                {{-- SEO Title --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">SEO Title</label>
                                    <input type="text"
                                           class="form-control"
                                           name="seo_title"
                                           value="{{ old('seo_title', $data->seo_title) }}">
                                </div>

                                {{-- SEO Keywords --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">SEO Keywords</label>
                                    <input type="text"
                                           class="form-control"
                                           name="seo_keywords"
                                           value="{{ old('seo_keywords', $data->seo_keywords) }}">
                                </div>

                                {{-- SEO Description --}}
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label">SEO Description</label>
                                    <textarea class="form-control"
                                              name="seo_description"
                                              rows="3">{{ old('seo_description', $data->seo_description) }}</textarea>
                                </div>

                                {{-- SEO Image --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">SEO Image</label>
                                    <input type="file"
                                           class="form-control"
                                           name="seo_image"
                                           accept="image/*">
                                    @if($data->seo_image)
                                        <img src="{{ asset($data->seo_image) }}"
                                             class="mt-2"
                                             width="120">
                                    @endif
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