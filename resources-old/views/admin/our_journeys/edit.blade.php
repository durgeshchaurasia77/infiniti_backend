<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Edit Our Journey</h5>
            <button class="btn-close custom-btn-close border p-1 me-0 text-dark"
                    data-bs-dismiss="modal" aria-label="Close">
                <i class="ti ti-x"></i>
            </button>
        </div>

        <form action="{{ route('our-journey-update') }}"
              method="POST"
              class="formSubmit"
              enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">

            <div class="modal-body">

                {{-- Year --}}
                <div class="mb-3">
                    <label class="col-form-label">Year</label>
                    <input type="text"
                           class="form-control"
                           name="year"
                           placeholder="e.g. 2023"
                           value="{{ old('year', $data->year ?? '') }}">
                </div>

                {{-- Title --}}
                <div class="mb-3">
                    <label class="col-form-label">
                        Title <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           class="form-control"
                           name="title"
                           required
                           value="{{ old('title', $data->title ?? '') }}">
                </div>

                {{-- Short Description --}}
                <div class="mb-3">
                    <label class="col-form-label">Short Description</label>
                    <textarea class="form-control"
                              name="short_description"
                              rows="3">{{ old('short_description', $data->short_description ?? '') }}</textarea>
                </div>

                {{-- Image --}}
                <div class="mb-3">
                    <label class="col-form-label">Image</label>
                    <input type="file" class="form-control" name="image">

                    @if(!empty($data->image))
                        <img src="{{ asset($data->image) }}"
                             class="img-thumbnail mt-2"
                             width="100">
                    @endif
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="col-form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ ($data->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ ($data->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <a href="javascript:void(0)"
                   class="btn btn-light me-2"
                   data-bs-dismiss="modal">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary loderButton">
                    <span class="spinner-grow spinner-grow-sm loderIcon"
                          style="display:none;"></span>
                    Save Changes
                </button>
            </div>

        </form>
    </div>
</div>
