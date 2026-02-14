<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Product</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
        <form action="{{ route('product-update') }}"
            method="POST"
            class="formSubmit"
            enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
            <div class="modal-body">
                <div class="mb-3">
                    <label class="col-form-label">
                        Category <span class="text-danger">*</span>
                    </label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($data->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                    Title <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        class="form-control"
                        name="title"
                        value="{{ old('title', $data->title ?? '') }}"
                        placeholder="Enter title"
                        required>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                        Image <span class="text-danger">*</span>
                    </label>
                    <input type="file"
                        class="form-control"
                        name="image"
                        >
                    @if(!empty($data->image))
                        <div class="mt-2">
                            <img src="{{ asset($data->image) }}"
                                style="width:120px; border-radius:6px;">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                        Country <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        class="form-control"
                        name="contry"
                        value="{{ old('contry', $data->contry ?? '') }}"
                        placeholder="Enter country"
                        required>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                        Plateform <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        class="form-control"
                        name="platform"
                        value="{{ old('platform', $data->platform ?? '') }}"
                        placeholder="Enter plateform"
                        required>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                        Short Details <span class="text-danger">*</span>
                    </label>
                    <textarea
                        class="form-control"
                        name="short_detail"
                        placeholder="Enter short detail"
                        required>{{ $data->short_detail ?? '' }}</textarea>
                </div>

            </div>
            <div class="modal-footer">
                <div class="d-flex align-items-center justify-content-end m-0">
                    <a href="javascript:void(0)"
                    class="btn btn-light me-2"
                    data-bs-dismiss="modal">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary loderButton">
                        <span class="spinner-grow spinner-grow-sm loderIcon"
                            role="status"
                            aria-hidden="true"
                            style="display:none;"></span>
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
	</div>
</div>

