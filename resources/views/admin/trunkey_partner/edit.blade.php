@extends('admin.layout.app')
@section('title')
Trunkey Partner
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
                            <h4 class="page-title">Edit Trunkey Partner</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('trunkey-partner-update') }}"
                                method="POST"
                                class="formSubmit"
                                enctype="multipart/form-data">

                                @csrf
                                <input type="hidden" name="id" value="{{ $trunkeyPartner->id ?? '' }}">

                                <div class="modal-body">

                                    {{-- Title --}}
                                    <div class="mb-3">
                                        <label class="col-form-label">
                                            Title <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                            class="form-control"
                                            name="title"
                                            placeholder="Enter title"
                                            value="{{ old('title', $trunkeyPartner->title ?? '') }}"
                                            required>
                                    </div>

                                    {{-- Short Description --}}
                                    <div class="mb-3">
                                        <label class="col-form-label">Short Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control"
                                                name="short_description"
                                                rows="3"
                                                placeholder="Enter short description">{{ old('short_description', $trunkeyPartner->short_description ?? '') }}</textarea>
                                    </div>

                                    <div class="row">
                                        {{-- Image One --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label">Image One <span class="text-danger">*</span></label>
                                            <input type="file"
                                                class="form-control"
                                                name="image_one"
                                                accept="image/*">

                                            @if(!empty($trunkeyPartner->image_one))
                                                <div class="mt-2">
                                                    <img src="{{ asset($trunkeyPartner->image_one) }}"
                                                        alt="Image One"
                                                        style="max-width: 180px; border-radius: 6px;">
                                                </div>
                                            @endif
                                        </div>

                                        {{-- Image Two --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label">Image Two <span class="text-danger">*</span></label>
                                            <input type="file"
                                                class="form-control"
                                                name="image_two"
                                                accept="image/*">

                                            @if(!empty($trunkeyPartner->image_two))
                                                <div class="mt-2">
                                                    <img src="{{ asset($trunkeyPartner->image_two) }}"
                                                        alt="Image Two"
                                                        style="max-width: 180px; border-radius: 6px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Status --}}
                                    <div class="mb-3">
                                        <label class="col-form-label">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ (isset($trunkeyPartner) && $trunkeyPartner->status == 1) ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="0" {{ (isset($trunkeyPartner) && $trunkeyPartner->status == 0) ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>

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
@endsection
