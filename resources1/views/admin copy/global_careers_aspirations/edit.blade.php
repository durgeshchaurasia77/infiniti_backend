<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Global Careers Aspirations</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
		<form action="{{ route('global-careers-update') }}" method="post" id="" class="formSubmit" enctype="multipart/form-data">
    		@csrf
    		<input type="hidden" name="id" value="{{ $global_careersData->id }}">
			<div class="modal-body">
				<div class="modal-body">
					<div class="mb-3">
						<label class="col-form-label">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title"  placeholder="Enter title" required value="{{ $global_careersData->title ?? '' }}">
					</div>
                    <div class="mb-3">
						<label>Upload Image</label>
                        <input type="file" class="form-control" name="image" id="image" >
                            @if (isset($global_careersData->image))
                            <img src="{{asset($global_careersData->image)}}"  width="90px" height="90px" style="padding:11px">
                            @endif
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

