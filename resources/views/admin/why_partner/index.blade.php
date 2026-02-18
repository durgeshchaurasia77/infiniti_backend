@extends('admin.layout.app')
@section('title')
Why Partner
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
									<h4 class="page-title">Why Partner List</h4>
								</div>
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
										<a href="{{ route('why-partner-list')}}" data-bs-toggle="tooltip" data-bs-placement="top"
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
												data-bs-target="#add_category" title="Add Why Partner"><i
													class="ti ti-square-rounded-plus me-2"></i>Add Why Partner</a>
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
                                                {{-- <th scope="col">Status</th> --}}
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

                                                    {{-- <td style="max-width: 250px; white-space: normal;">
                                                        {{ $data->sub_description ?? '' }}
                                                    </td> --}}
                                                    {{-- <td>
                                                        @if($data->status == 1)
                                                            <span class="badge bg-success active_btn">Active</span>
                                                        @else
                                                            <span class="badge bg-danger inactive_btn">Inactive</span>
                                                        @endif
                                                    </td> --}}
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a type="button" href="{{ route('why-partner-edit', [$data->id]) }}" class="btn btn-secondary" title="Edit">
                                                                <i class="feather-edit"></i>
                                                            </a>
                                                            {{-- <button @if($data->status == 1) class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('why-partner-status-update', [$data->id]) }}" title="Status">
                                                                @if($data->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif
                                                            </button> --}}
                                                            <button id="delete" href="{{ route('why-partner.delete',[$data->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
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
                            Add New Why Partner
                        </h5>
                        <button class="btn-close custom-btn-close border p-1 me-0 text-dark"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>

                    <form action="{{ route('why-partner-store') }}"
                        method="POST"
                        class="formSubmit"
                        enctype="multipart/form-data">
                        @csrf


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
                        {{-- ID for update --}}
                        {{-- <input type="hidden" name="id" value="{{ $data->id ?? '' }}"> --}}

                        <div class="modal-body">

                            {{-- Title --}}
                            {{-- <div class="mb-3">
                                <label class="col-form-label">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Enter name"
                                    required>
                            </div> --}}
                            {{-- Heading One --}}
                            <div class="col-md-6 mb-3">
                                <label>Heading One</label>
                                <input type="text"
                                    class="form-control"
                                    name="heading_one">
                            </div>

                            {{-- Description One --}}
                            <div class="col-md-6 mb-3">
                                <label>Short Description One</label>
                                <textarea class="form-control"
                                        name="short_description_one"
                                        rows="3"></textarea>
                            </div>

                            {{-- Heading Two --}}
                            <div class="col-md-6 mb-3">
                                <label>Heading Two</label>
                                <input type="text"
                                    class="form-control"
                                    name="heading_two">
                            </div>

                            {{-- Description Two --}}
                            <div class="col-md-6 mb-3">
                                <label>Short Description Two</label>
                                <textarea class="form-control"
                                        name="short_description_two"
                                        rows="3"></textarea>
                            </div>

                            {{-- Heading Three --}}
                            <div class="col-md-6 mb-3">
                                <label>Heading Three</label>
                                <input type="text"
                                    class="form-control"
                                    name="heading_three">
                            </div>

                            {{-- Description Three --}}
                            <div class="col-md-6 mb-3">
                                <label>Short Description Three</label>
                                <textarea class="form-control"
                                        name="short_description_three"
                                        rows="3"></textarea>
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
