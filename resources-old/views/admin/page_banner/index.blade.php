@extends('admin.layout.app')
@section('title')
Page Banner
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
                                <h4 class="page-title">Page Banner List</h4>
                            </div>
                            <div class="col-sm-4 text-sm-end">
                                <div class="head-icons">
                                    <a href="{{ route('page-banner') }}" data-bs-toggle="tooltip" data-bs-placement="top"
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
                                            data-bs-target="#add_category" title="Add Flash news"><i
                                                class="ti ti-square-rounded-plus me-2"></i>Add Page Banner</a>
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
                                            {{-- <th scope="col">Status</th> --}}
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($pageBanners as $key => $pageBanner)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td>
                                                    {{ $pageBanner->page_name ?? '' }}
                                                </td>

                                                <td>
                                                    <img src="{{ asset($pageBanner->image) }}" width="100" height="100"
                                                        alt="">
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button"
                                                            data-href="{{ route('page-banner-edit', [$pageBanner->id]) }}"
                                                            class="btn btn-secondary edit_model" data-bs-toggle="modal"
                                                            data-bs-target="#edit_model" title="Edit">
                                                            <i class="feather-edit"></i>
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
                                            Showing {{ $pageBanners->firstItem() }} to {{ $pageBanners->lastItem() }} of
                                            {{ $pageBanners->total() }} entries
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="datatable-paginate">
                                            {!! $pageBanners->appends(request()->input())->links('custom') !!}
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
                    <h5 class="modal-title">Add New Page Banner</h5>
                    <button class="btn-close custom-btn-close border p-1 me-0 text-dark" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="{{ route('page-banner-store') }}" method="post" class="formSubmit"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="col-form-label">Select Page <span class="text-danger">*</span></label>
                            <select class="form-control" name="page_name" id="page_name" required>
                                <option value="">Select Page</option>
                                <option value="Home">Home</option>
                                <option value="About">About</option>
                                <option value="FFRO Location">FFRO Location</option>
                                <option value="Destination">Destination</option>
                                <option value="Expact Services">Expact Services</option>
                                <option value="Our Services">Our Services</option>
                                <option value="Blog News">Blog News</option>
                                <option value="Faq">Faq</option>
                                <option value="Abreviation">Abreviation</option>
                                <option value="Video Library">Video Library</option>
                                <option value="CMS">CMS</option>
                                <option value="Contact Us">Contact Us</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Images <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" id="image" required>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex align-items-center justify-content-end m-0">
                            <a href="javascript:void(0)" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary loderButton"><span
                                    class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true"
                                    style="display: none;"></span>Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add New Contact Stage -->
@endsection
