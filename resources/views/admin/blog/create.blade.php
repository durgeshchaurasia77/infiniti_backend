@extends('admin.layout.app')
@section('title')
Blog
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
                            <h4 class="page-title">Add New Blog</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('blog-store') }}"
                            method="POST"
                            class="formSubmit"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                {{-- Category --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Category <span class="text-danger">*</span>
                                    </label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Title --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        name="title"
                                        placeholder="Enter blog title"
                                        required>
                                </div>

                                {{-- Author --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Author <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control"
                                        name="author"
                                        placeholder="Enter author name"
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
                                        required>
                                </div>

                                {{-- Blog Image --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">
                                        Blog Image <span class="text-danger">*</span>
                                    </label>
                                    <input type="file"
                                        class="form-control"
                                        name="image"
                                        accept="image/*"
                                        required>
                                </div>

                                {{-- Short Detail --}}
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label">
                                        Short Detail <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control"
                                            name="short_detail"
                                            rows="3"
                                            placeholder="Enter short description"
                                            required></textarea>
                                </div>

                                {{-- Detail --}}
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label">
                                        Detail <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control"
                                            name="detail"
                                            id="summernote"
                                            rows="6"
                                            placeholder="Enter full blog content"
                                            required></textarea>
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
                                        placeholder="auto-generated if empty">
                                </div>

                                {{-- SEO Title --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">SEO Title</label>
                                    <input type="text"
                                        class="form-control"
                                        name="seo_title"
                                        placeholder="SEO optimized title">
                                </div>

                                {{-- SEO Keywords --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">SEO Keywords</label>
                                    <input type="text"
                                        class="form-control"
                                        name="seo_keywords"
                                        placeholder="keyword1, keyword2, keyword3">
                                </div>

                                {{-- SEO Description --}}
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label">SEO Description</label>
                                    <textarea class="form-control"
                                            name="seo_description"
                                            rows="3"
                                            placeholder="SEO meta description"></textarea>
                                </div>

                                {{-- SEO Image --}}
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">SEO Image</label>
                                    <input type="file"
                                        class="form-control"
                                        name="seo_image"
                                        accept="image/*">
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
    document.querySelector('input[name="title"]').addEventListener('keyup', function () {
        const slug = this.value.toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)/g, '');
        document.querySelector('input[name="seo_slug"]').value = slug;
    });
</script>
@endsection
