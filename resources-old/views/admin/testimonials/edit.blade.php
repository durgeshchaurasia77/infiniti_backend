<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Testimonial</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
		<form action="{{ route('testimonials-update') }}" method="post" id="" class="formSubmit" enctype="multipart/form-data">
    		@csrf
    		<input type="hidden" name="id" value="{{ $testimonialsData->id }}">
			<div class="modal-body">
				<div class="modal-body">
					<div class="mb-3">
						<label class="col-form-label">Full Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name" required value="{{ $testimonialsData->name ?? '' }}">
					</div>
                    <div class="mb-3">
                        <label class="col-form-label">Designation<span class="text-danger">*</span></label>
                       <input type="text" class="form-control" name="designation" id="designation" required value="{{ $testimonialsData->designation ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Rating<span class="text-danger">*</span></label>
                       {{-- <input type="text" class="form-control" name="rating" id="rating" required value="{{ $testimonialsData->rating ?? '' }}"> --}}
                       <select class="form-control" name="rating" id="rating" required>
                        <option value="">Select Rating</option>
                        <option value="1" @if ($testimonialsData->rating == 1) selected @endif>1</option>
                        <option value="2" @if ($testimonialsData->rating == 2) selected @endif>2</option>
                        <option value="3" @if ($testimonialsData->rating == 3) selected @endif>3</option>
                        <option value="4" @if ($testimonialsData->rating == 4) selected @endif>4</option>
                        <option value="5" @if ($testimonialsData->rating == 5) selected @endif>5</option>
                    </select>

                    </div>
                    <div class="mb-3">
                        <label>Upload Video<span class="text-danger">*</span></label>
                        <input type="file" name="video" class="form-control" accept="video/*"><br>
                        @if(!empty($testimonialsData->video_path))
                            <video width="200" controls>
                                <source src="{{ asset($testimonialsData->video_path) }}" type="video/mp4">
                            </video>
                        @endif
                    </div>
                    {{-- <div class="mb-3">
                        <label>Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="3" id="description" required>{{ $testimonialsData->description ?? '' }}</textarea>
                    </div> --}}
				</div>
			</div>

			<div class="modal-footer">
				<div class="d-flex align-items-center justify-content-end m-0">
					<a href="javascript:void(0)" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>

					<button type="submit" class="btn btn-primary loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Save Changes</button>
				</div>
			</div>
		</form>
	</div>
</div>

