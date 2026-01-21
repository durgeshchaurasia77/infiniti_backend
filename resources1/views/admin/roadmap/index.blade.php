@extends('admin.layout.app')
@section('title')
Road Map
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
									<h4 class="page-title">Road Map List</h4>
								</div>
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
										<a href="{{ route('roadmap-list')}}" data-bs-toggle="tooltip" data-bs-placement="top"
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
											<a href="{{ route('roadmap-create') }}" class="btn btn-primary"
												 title="Add Road Map"><i
													class="ti ti-square-rounded-plus me-2"></i>Add Road Map</a>
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
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lists as $key => $data)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    
                                                    <td style="max-width: 250px; white-space: normal;">
                                                        {{ $data->name ?? '' }}
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
                                                            <a href="{{ route('roadmap-edit', [base64_encode($data->id)]) }}" class="btn btn-secondary" title="Edit">
                                                                <i class="feather-edit"></i>
                                                            </a>
                                                            <button @if($data->status == 1)
                                                             class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('roadmap-status-update', [$data->id]) }}" title="Status">
                                                                @if($data->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif
                                                            </button>
                                                            <button id="delete" href="{{ route('roadmap.delete',[$data->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
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
@endsection
