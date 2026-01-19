@extends('admin.layout.app')
@section('title')
Crafting Technology
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
									<h4 class="page-title">Crafting Technology List</h4>
								</div>
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
										<a href="{{ route('crafting-technology-list')}}" data-bs-toggle="tooltip" data-bs-placement="top"
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
												data-bs-target="#add_category" title="Add Crafting Technology"><i
													class="ti ti-square-rounded-plus me-2"></i>Add Crafting Technology</a>
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
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lists as $key => $data)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td style="max-width: 200px; white-space: normal;">
                                                        {{ $data->name ?? '' }}
                                                    </td>

                                                    <td style="max-width: 200px; white-space: normal;">
                                                        {{ $data->title ?? '' }}
                                                    </td>
                                                    <td>
                                                        @if(!empty($data->image))
                                                            <img src="{{ asset($data->image) }}"
                                                                style="width:60px; height:60px; object-fit:cover; border-radius:6px;">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($data->status == 1)
                                                            <span class="badge bg-success active_btn">Active</span>
                                                        @else
                                                            <span class="badge bg-danger inactive_btn">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button type="button" data-href="{{ route('crafting-technology-edit', [$data->id]) }}" class="btn btn-secondary edit_model" data-bs-toggle="modal" data-bs-target="#edit_model" title="Edit">
                                                                <i class="feather-edit"></i>
                                                            </button>
                                                            <button @if($data->status == 1) class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('crafting-technology-status-update', [$data->id]) }}" title="Status">
                                                                @if($data->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif
                                                            </button>
                                                            <button id="delete" href="{{ route('crafting-technology.delete',[$data->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
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
                            {{ isset($people) ? 'Edit Crafting Technology' : 'Add New Crafting Technology' }}
                        </h5>
                        <button class="btn-close custom-btn-close border p-1 me-0 text-dark"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>

                    <form action="{{ route('crafting-technology-store') }}"
                        method="POST"
                        class="formSubmit"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- ID for update --}}
                        <input type="hidden" name="id" value="{{ $people->id ?? '' }}">

                        <div class="modal-body">

                            {{-- Name --}}
                            <div class="mb-3">
                                <label class="col-form-label">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Enter name"
                                    value="{{ old('name', $people->name ?? '') }}"
                                    required>
                            </div>

                            {{-- Title --}}
                            <div class="mb-3">
                                <label class="col-form-label">
                                    Title <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control"
                                    name="title"
                                    placeholder="Enter title"
                                    value="{{ old('title', $people->title ?? '') }}"
                                    required>
                            </div>
                            {{-- Image --}}
                            <div class="mb-3">
                                <label class="col-form-label">
                                    Image <span class="text-danger">*</span>
                                </label>
                                <input type="file"
                                    class="form-control"
                                    name="image"
                                    accept="image/*">

                                {{-- Preview on edit --}}
                                @if(!empty($people->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($people->image) }}"
                                            alt="Crafting Technology"
                                            style="max-width:120px; border-radius:6px;">
                                    </div>
                                @endif
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
                                    {{ isset($people) ? 'Update' : 'Create' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
		<!-- /Add New Contact Stage -->
@endsection
