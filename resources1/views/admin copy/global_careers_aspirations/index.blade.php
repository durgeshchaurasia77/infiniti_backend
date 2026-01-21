@extends('admin.layout.app')
@section('title')
Global Careers Aspirations
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
									<h4 class="page-title">Global Careers Aspirations List</h4>
								</div>
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
										<a href="{{ route('global-careers-list')}}" data-bs-toggle="tooltip" data-bs-placement="top"
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

									</div>
									<div class="col-sm-8">
										<div class="text-sm-end">
											<a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal"
												data-bs-target="#add_category" title="Add Global Careers Aspirations"><i
													class="ti ti-square-rounded-plus me-2"></i>Add Global Careers Aspirations</a>
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
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($global_careersList as $key => $global_careers)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $global_careers->title ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        @if (isset($global_careers->image))
                                                            <img src="{{asset($global_careers->image)}}" width="50px" height="50px" alt="Testimonials Image" loading="lazy" onerror="this.src='{{ asset('notImage.jpg') }}'">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($global_careers->status == 1)
                                                            <span class="badge bg-success active_btn">Active</span>
                                                        @else
                                                            <span class="badge bg-danger inactive_btn">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-href="{{ route('global-careers-edit', [$global_careers->id]) }}" class="btn btn-secondary edit_model" data-bs-toggle="modal" data-bs-target="#edit_model" title="Edit">
                                                                <i class="feather-edit"></i>
                                                            </button>
                                                            <button @if($global_careers->status == 1) class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('global-careers-status-update', [$global_careers->id]) }}" title="Status">
                                                                @if($global_careers->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif
                                                            </button>
                                                            <button id="delete" href="{{ route('global-careers.delete',[$global_careers->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
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
												Showing {{$global_careersList->firstItem()}} to {{$global_careersList->lastItem()}} of {{$global_careersList->total()}} entries
											</div>
									    </div>
									    <div class="col-md-6">
									    	<div class="datatable-paginate">
									    		{!! $global_careersList->appends(request()->input())->links('custom') !!}
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
						<h5 class="modal-title">Add New Global Careers Aspirations</h5>
						<button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="{{ route('global-careers-store') }}" method="post" class="formSubmit" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
                            <div class="mb-3">
								<label class="col-form-label">Title<span class="text-danger">*</span></label>
							   <input type="text" class="form-control" placeholder="Please enter title..." name="title" id="title" >
							</div>
                            <div class="mb-3">
                                <label>Upload Image<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" id="image" >
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
