<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Testimonial</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
		<form action="{{ route('technology-store-update') }}"
                        method="POST"
                        class="formSubmit"
                        enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="{{ $technology->id ?? '' }}">

                        <div class="mb-3">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control"
                                name="name"
                                value="{{ old('name', $technology->name ?? '') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Images</label>
                            <input type="file"
                                class="form-control"
                                name="images[]"
                                multiple
                                accept="image/*">
                        </div>

                        {{-- Existing Images --}}
                        {{-- @if(!empty($technology->images))
                            <div class="row">
                                @foreach($technology->images as $img)
                                    <div class="col-md-3 mb-2">
                                        <img src="{{ asset($img) }}"
                                            class="img-thumbnail"
                                            style="height:80px;">
                                    </div>
                                @endforeach
                            </div>
                        @endif --}}
                        @if(!empty($technology->images))
                            <div class="row">
                                @foreach($technology->images as $img)
                                    <div class="col-md-3 mb-2 position-relative">

                                        {{-- Delete Button --}}
                                        <a href="{{ route('technology-image-delete', $technology->id) }}?image={{ urlencode($img) }}"
                                        id="deleteImage"
                                        class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                        style="border-radius:50%; padding:2px 6px;">
                                            ✕
                                        </a>

                                        {{-- Image --}}
                                        <img src="{{ asset($img) }}"
                                            class="img-thumbnail"
                                            style="height:80px; width:100%; object-fit:cover;">
                                    </div>
                                @endforeach
                            </div>
                        @endif


                    </div>
                    <div class="modal-footer">
                            <div class="d-flex align-items-center justify-content-end m-0">
                            <a href="javascript:void(0)" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Create</button>
                        </div>
                    </div>
        </form>
	</div>
</div>
