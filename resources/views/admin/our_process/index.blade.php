@extends('admin.layout.app')
@section('title')
Our Process
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
									<h4 class="page-title">Our Process List</h4>
								</div>
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
										<a href="{{ route('our-process-list')}}" data-bs-toggle="tooltip" data-bs-placement="top"
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
												data-bs-target="#add_category" title="Add Our Process"><i
													class="ti ti-square-rounded-plus me-2"></i>Add Our Process</a>
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
                                                <th>Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lists as $key => $data)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td style="max-width: 200px; white-space: normal;">
                                                        {{ optional($data->parent)->name}}
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a type="button" href="{{ route('our-process-edit', [$data->id]) }}" class="btn btn-secondary" title="Edit">
                                                                <i class="feather-edit"></i>
                                                            </a>
                                                            <button id="delete" href="{{ route('our-process.delete',[$data->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
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
												Showing {{$lists->firstItem()}} to {{$lists->lastItem()}} of {{$lists->total()}} entries
											</div>
									    </div>
									    <div class="col-md-6">
									    	<div class="datatable-paginate">
									    		{!! $lists->appends(request()->input())->links('custom') !!}
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
                        <h5 class="modal-title">
                            Add New Our Process
                        </h5>
                        <button class="btn-close custom-btn-close border p-1 me-0 text-dark"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>

                    <form action="{{ route('our-process-store') }}"
                        method="POST"
                        class="formSubmit"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">
                            <div class="mb-3">
                            <label class="col-form-label">
                                        Category <span class="text-danger">*</span>
                                    </label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                    {{ isset($data) ? 'Update' : 'Create' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
		<!-- /Add New Contact Stage -->
@endsection
