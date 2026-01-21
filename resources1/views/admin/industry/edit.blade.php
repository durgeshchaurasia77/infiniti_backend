@extends('admin.layout.app')
@section('title')
Edit Industry
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
                            <h4 class="page-title">Edit Industry</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('industry-update', $data->id) }}"
                              method="POST"
                              class="formSubmit"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- Header Title --}}
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Header Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           name="header_title"
                                           value="{{ old('header_title', $data->header_title) }}"
                                           required>
                                </div>
                                {{-- Header Short Description --}}
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label">
                                        Header Short Description <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control"
                                              name="header_short_description"
                                              rows="2"
                                              required>{{ old('header_short_description', $data->header_short_description) }}</textarea>
                                </div>

                                {{-- Industry Title --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Industry Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           value="{{ old('title', $data->title) }}"
                                           required>
                                </div>

                                {{-- Publish Date --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Publish Date <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                           class="form-control"
                                           name="publish_date"
                                           value="{{ old('publish_date', $data->publish_date) }}"
                                           required>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Status <span class="text-danger">*</span>
                                    </label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                {{-- Industry Image --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Industry Image
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

                                {{-- Video --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Video URL
                                    </label>
                                    <input type="text"
                                           class="form-control"
                                           name="video"
                                           value="{{ old('video', $data->video) }}">
                                </div>

                                {{-- Short Description --}}
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label">
                                        Short Description <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control"
                                              name="short_description"
                                              rows="3"
                                              required>{{ old('short_description', $data->short_description) }}</textarea>
                                </div>

                                {{-- ================= SEO SECTION ================= --}}
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
                                    Update Changes
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
