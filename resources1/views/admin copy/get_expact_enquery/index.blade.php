@extends('admin.layout.app')
@section('title')
Expact Enquery
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
									<h4 class="page-title">Expact Enquery List</h4>
								</div>
								<div class="col-sm-4 text-sm-end">
									<div class="head-icons">
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Email Id</th>
                                                <th scope="col">Phone No.</th>
                                                <th scope="col">Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($expactEnqueryData as $key => $expactEnquery)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $expactEnquery->name ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $expactEnquery->email ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $expactEnquery->phone ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        @foreach($GetExpactServices as $GetExpactService)
															@if($GetExpactService->id == $expactEnquery->expact_type)
																{{ $GetExpactService->title ?? '' }}
															@endif
														@endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

									<div class="row align-items-center mt-2 mb-2">
										<div class="col-md-6">
											<div class="datatable-length">
												Showing {{$expactEnqueryData->firstItem()}} to {{$expactEnqueryData->lastItem()}} of {{$expactEnqueryData->total()}} entries
											</div>
									    </div>
									    <div class="col-md-6">
									    	<div class="datatable-paginate">
									    		{!! $expactEnqueryData->appends(request()->input())->links('custom') !!}
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
