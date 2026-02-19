<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Digital Category</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
        <form action="{{ route('digital-category-update') }}"
            method="POST"
            class="formSubmit"
            enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
            <div class="modal-body">
                {{-- Title --}}
                <div class="mb-3">
                    <label class="col-form-label">
                        Name <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        class="form-control"
                        name="name"
                        placeholder="Enter name"
                        required
                        value="{{ old('name', $data->name ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                        Banner Title <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        class="form-control"
                        name="banner_title"
                        placeholder="Enter Banner Title"
                        value="{{ old('banner_title', $data->banner_title ?? '') }}"
                        required>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                        Banner Image <span class="text-danger">*</span>
                    </label>
                    <input type="file"
                        class="form-control"
                        name="banner_image"
                        required>

                    @if(!empty($data->banner_image))
                        <div class="mt-2">
                            <img src="{{ asset($data->banner_image) }}"
                                style="width:120px; border-radius:6px;">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                        Banner Short Description <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" name="banner_description" required>{{ $data->banner_description ?? ''  }}</textarea>
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

