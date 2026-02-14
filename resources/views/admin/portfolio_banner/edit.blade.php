<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Portfolio Banner</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
        <form action="{{ route('marketing-banner-update') }}"
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
                        Growth Count <span class="text-danger">*</span>
                    </label>
                    <input type="number"
                        class="form-control"
                        name="growth"
                        min="1"
                        placeholder="Enter growth"
                        required
                        value="{{ old('growth', $data->growth ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">
                        Result Count <span class="text-danger">*</span>
                    </label>
                    <input type="number"
                        class="form-control"
                        name="result"
                        min="1"
                        placeholder="Enter result"
                        required
                        value="{{ old('result', $data->result ?? '') }}">
                </div>
                {{-- Sub Title --}}
                <div class="mb-3">
                    <label class="col-form-label">Short Description</label>
                    <textarea
                        class="form-control"
                        name="short_description"
                        placeholder="Enter sub description">{{ $data->short_description ?? '' }}</textarea>
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
                                alt="Portfolio Banner"
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

