<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Certificate Software</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
        <form action="{{ route('certificate-software-update') }}"
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

                {{-- Sub Title --}}
                <div class="mb-3">
                    <label class="col-form-label">Sub Title</label>
                    <input type="text"
                        class="form-control"
                        name="sub_title"
                        placeholder="Enter sub title"
                        value="{{ old('sub_title', $data->sub_title ?? '') }}">
                </div>

                {{-- Image --}}
                <div class="mb-3">
                    <label class="col-form-label">Upload Image</label>
                    <input type="file"
                        name="image"
                        class="form-control"
                        accept="image/*">

                    @if(!empty($data->image))
                        <div class="mt-2">
                            <img src="{{ asset($data->image) }}"
                                alt="Our People"
                                style="max-width:120px; border-radius:6px;">
                        </div>
                    @endif
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

