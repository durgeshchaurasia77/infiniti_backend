<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Edit Client Satisfation</h5>
            <button class="btn-close custom-btn-close border p-1 me-0 text-dark"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                <i class="ti ti-x"></i>
            </button>
        </div>

        <form action="{{ route('client-satisfaction-update') }}"
              method="POST"
              class="formSubmit"
              enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
            <div class="modal-body">

                {{-- Name --}}
                <div class="mb-3">
                    <label class="col-form-label">
                         Name <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           placeholder="Enter  name"
                           required
                           value="{{ old('name', $data->name ?? '') }}">
                </div>

                    <div class="mb-3">
                        <label class="col-form-label">
                            Image <span class="text-danger">*</span>
                        </label>
                        <input type="file"
                                class="form-control"
                                name="image"
                                accept="image/*"
                                >
                        @if($data->image)
                            <img src="{{ asset($data->image) }}"
                                    class="mt-2"
                                    width="120">
                        @endif
                    </div>
                {{-- Short Description --}}
                <div class="mb-3">
                    <label class="col-form-label">
                        Short Description <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control"
                              name="short_description"
                              rows="3"
                              placeholder="Enter short description"
                              required>{{ old('short_description', $data->short_description ?? '') }}</textarea>
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
