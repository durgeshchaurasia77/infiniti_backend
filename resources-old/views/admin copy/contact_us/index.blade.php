@extends('admin.layout.app')
@section('title')
Contact Us
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
									<h4 class="page-title">Contact Us List</h4>
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
                                                <th scope="col">Phone</th>
                                                <th scope="col">Email Id</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contactusData as $key => $contactus)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $contactus->name ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $contactus->phone ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $contactus->email ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $contactus->subject ?? '' }}
                                                    </td>
                                                    <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                        {{ $contactus->message ?? '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

									<div class="row align-items-center mt-2 mb-2">
										<div class="col-md-6">
											<div class="datatable-length">
												Showing {{$contactusData->firstItem()}} to {{$contactusData->lastItem()}} of {{$contactusData->total()}} entries
											</div>
									    </div>
									    <div class="col-md-6">
									    	<div class="datatable-paginate">
									    		{!! $contactusData->appends(request()->input())->links('custom') !!}
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
