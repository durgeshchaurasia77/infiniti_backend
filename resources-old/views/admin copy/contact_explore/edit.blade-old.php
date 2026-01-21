<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Contact Explore</h5>
				<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
				aria-label="Close">
				<i class="ti ti-x"></i>
			</button>
		</div>
		<form action="{{ route('contact-explore-update') }}" method="post" id="" class="formSubmit" enctype="multipart/form-data">
    		@csrf
    		<input type="hidden" name="id" value="{{ $contact_exploreData->id }}">
			<div class="modal-body">
				<div class="modal-body">
					<div class="mb-3">
						<label class="col-form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name" required value="{{ $contact_exploreData->name ?? '' }}">
					</div>
                    <div class="mb-3">
						<label>Upload Image</label>
                        <input type="file" class="form-control" name="image" id="image" >
                            @if (isset($contact_exploreData->image))
                            <img src="{{asset($contact_exploreData->image)}}"  width="90px" height="90px" style="padding:11px">
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

