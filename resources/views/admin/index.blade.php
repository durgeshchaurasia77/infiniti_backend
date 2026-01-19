@extends('admin.layout.app')
@section('title')
Dashboard
@endsection
@section('content')

<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="page-header">
							<div class="row align-items-center ">
								<div class="col-md-4">
									<h3 class="page-title">Deals Dashboard</h3>
								</div>
								<div class="col-md-8 float-end ms-auto">
									<div class="d-flex title-head">
										<div class="daterange-picker d-flex align-items-center justify-content-center">
											<div class="head-icons mb-0">
												<a href="{{route('home')}}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh"><i class="ti ti-refresh-dot"></i></a>
												<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header"><i class="ti ti-chevrons-up"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('ourServices-list')}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa fa-wrench fa-3x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Our Services</p>
                                                <h4 class="card-title"> {{$ourServices_count ?? ''}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('blogs-list')}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa-solid fa-blog fa-3x"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Blogs & News </p>
                                                <h4 class="card-title">{{$blogsNews_count ?? '0'}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('testimonials-list')}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa fa-quote-left fa-3x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Testimonials</p>
                                                <h4 class="card-title">{{$testimonials_count ?? '0'}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('contact-us')}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa fa-address-book fa-3x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Contact Us</p>
                                                <h4 class="card-title">{{$contactUs_count ?? '0'}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('get-enquiry')}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa fa-question-circle fa-3x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Enquiry</p>
                                                <h4 class="card-title">{{$getEnquiry_count ?? '0'}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('get-expact')}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa fa-question-circle fa-3x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Expacted Enquiry</p>
                                                <h4 class="card-title">{{$expactEnquery_count ?? '0'}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('get-comments')}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa fa-comment fa-3x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Comment</p>
                                                <h4 class="card-title">{{$comment_count ?? '0'}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('videolibrary-list')}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa-solid fa-video fa-3x"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Video Library</p>
                                                <h4 class="card-title">{{$videoLibrary_count ?? '0'}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-stats card-primary card-round user-card">
                            <a href="{{route('report-consultation')}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <i class="fa fa-file fa-3x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Report & Consultation</p>
                                                <h4 class="card-title">{{$reportConsultation_count ?? '0'}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
<!-- /Page Wrapper -->

@endsection
