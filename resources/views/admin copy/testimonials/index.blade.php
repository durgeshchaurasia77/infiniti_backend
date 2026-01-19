@extends('admin.layout.app')
@section('title')
Testimonial
@endsection
@section('content')

<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<div class="row">
					<div class="col-md-12">

						<!-- Page Header -->
						<div class="page-header">
							<div class="row align-items-center">
								<div class="col-sm-8">
									<h4 class="page-title">Testimonial List</h4>
								</div>
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
										<a href="{{ route('testimonials-list')}}" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
										<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
											data-bs-original-title="Collapse" id="collapse-header"><i
												class="ti ti-chevrons-up"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Page Header -->

						<div class="card">
							<div class="card-header">
								<!-- Search -->
								<div class="row align-items-center">
									<div class="col-sm-4">
                                        {{-- anything --}}
									</div>
									<div class="col-sm-8">
										<div class="text-sm-end">
											<a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal"
												data-bs-target="#add_category" title="Add Testimonial"><i
													class="ti ti-square-rounded-plus me-2"></i>Add Testimonial</a>
										</div>
									</div>
								</div>
								<!-- /Search -->
							</div>
							<div class="card-body">
								<!-- Contact Stage List -->
								<div class="table-responsive">
									<table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr. No.</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Rating</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($testimonialsList as $key => $testimonials)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $testimonials->name ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $testimonials->designation ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $testimonials->rating ?? '0' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        @if (isset($testimonials->image))
                                                            <img src="{{asset($testimonials->image)}}" width="50px" height="50px" alt="Testimonials Image" loading="lazy" onerror="this.src='{{ asset('notImage.jpg') }}'">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($testimonials->status == 1)
                                                            <span class="badge bg-success active_btn">Active</span>
                                                        @else
                                                            <span class="badge bg-danger inactive_btn">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-href="{{ route('testimonials-edit', [$testimonials->id]) }}" class="btn btn-secondary edit_model" data-bs-toggle="modal" data-bs-target="#edit_model" title="Edit">
                                                                <i class="feather-edit"></i>
                                                            </button>
                                                            <button @if($testimonials->status == 1) class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('testimonials-status-update', [$testimonials->id]) }}" title="Status">
                                                                @if($testimonials->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif
                                                            </button>
                                                            <button id="delete" href="{{ route('testimonials.delete',[$testimonials->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

									<div class="row align-items-center mt-2 mb-2">
										<div class="col-md-6">
											<div class="datatable-length">
												Showing {{$testimonialsList->firstItem()}} to {{$testimonialsList->lastItem()}} of {{$testimonialsList->total()}} entries
											</div>
									    </div>
									    <div class="col-md-6">
									    	<div class="datatable-paginate">
									    		{!! $testimonialsList->appends(request()->input())->links('custom') !!}
									    	</div>
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- /Page Wrapper -->

		<!-- Add New Contact Stage -->
		<div class="modal fade" id="add_category" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add New Testimonial</h5>
						<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="{{ route('testimonials-store') }}" method="post" class="formSubmit" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
                            <div class="mb-3">
								<label class="col-form-label">Full Name<span class="text-danger">*</span></label>
							    <input type="text" class="form-control" name="name" id="name" placeholder="Please enter full name ..." required>
							</div>
                            <div class="mb-3">
								<label class="col-form-label">Designation<span class="text-danger">*</span></label>
							    <input type="text" class="form-control" name="designation" placeholder="Please enter designation ..." id="designation" required>
							</div>
                            <div class="mb-3">
								<label class="col-form-label">Rating<span class="text-danger">*</span></label>
							    {{-- <input type="text" class="form-control" name="rating" id="rating" required> --}}
                                <select class="form-control" name="rating" id="rating" required>
                                    <option value="">Select Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
							</div>
                            <div class="mb-3">
                                <label>Upload Photo<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" id="image" required>
							</div>
                            <div class="mb-3">
                                <label>Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description" placeholder="Please enter description ..." required></textarea>
							</div>
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
		</div>
		<!-- /Add New Contact Stage -->
@endsection
