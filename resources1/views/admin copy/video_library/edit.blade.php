<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Video Library</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
		<form action="{{ route('videolibrary-update') }}" method="post" id="" class="formSubmit" enctype="multipart/form-data">
    		@csrf
    		<input type="hidden" name="id" value="{{ $videolibraryData->id }}">
			<div class="modal-body">
				<div class="modal-body">
					<div class="mb-3">
						<label class="col-form-label">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title"  placeholder="Enter title" required value="{{ $videolibraryData->title ?? '' }}">
					</div>
                    <div class="mb-3">
						<label>Upload Video Url<span class="text-danger">*</span></label>
                        <input type="url" class="form-control" name="video_url" id="video_url" value="{{ $videolibraryData->video_url ?? '' }}" required>
					</div>
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

