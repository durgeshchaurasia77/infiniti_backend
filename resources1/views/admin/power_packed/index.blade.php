@extends('admin.layout.app')
@section('title')
Power Packed
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
                            <h4 class="page-title">Power Packed List</h4>
                        </div>
                        <div class="col-sm-4 text-sm-end">
                            <div class="head-icons">
                                <a href="{{ route('power-packed-list') }}"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="Refresh">
                                    <i class="ti ti-refresh-dot"></i>
                                </a>
                                <a href="javascript:void(0);"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="Collapse"
                                   id="collapse-header">
                                    <i class="ti ti-chevrons-up"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                {{-- anything --}}
                            </div>
                            <div class="col-sm-8 text-sm-end">
                                <a href="javascript:void(0);"
                                   class="btn btn-primary"
                                   data-bs-toggle="modal"
                                   data-bs-target="#add_case_study"
                                   title="Add Power Packed">
                                    <i class="ti ti-square-rounded-plus me-2"></i>
                                    Add Power Packed
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
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

                                                    {{-- Edit --}}
                                                    <button type="button"
                                                            data-href="{{ route('power-packed-edit', [$data->id]) }}"
                                                            class="btn btn-secondary edit_model"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit_model"
                                                            title="Edit">
                                                        <i class="feather-edit"></i>
                                                    </button>

                                                    {{-- Status --}}
                                                    <button
                                                        @if($data->status == 1)
                                                            class="btn btn-danger btn-xs ml-2"
                                                            id="activateBtn"
                                                        @else
                                                            class="btn btn-success btn-xs ml-2"
                                                            id="deactivateBtn"
                                                        @endif
                                                        href="{{ route('power-packed-status-update', [$data->id]) }}"
                                                        title="Status">
                                                        @if($data->status == 1)
                                                            <i class="feather-lock"></i>
                                                        @else
                                                            <i class="feather-unlock"></i>
                                                        @endif
                                                    </button>

                                                    {{-- Delete --}}
                                                    <button id="delete"
                                                            href="{{ route('power-packed.delete', [$data->id]) }}"
                                                            class="btn btn-danger btn-xs ml-2"
                                                            type="button"
                                                            title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Pagination --}}
                            <div class="row align-items-center mt-2 mb-2">
                                <div class="col-md-6">
                                    <div class="datatable-length">
                                        Showing {{ $lists->firstItem() }}
                                        to {{ $lists->lastItem() }}
                                        of {{ $lists->total() }} entries
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

<!-- Add / Edit Power Packed -->
<div class="modal fade" id="add_case_study" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Power Packed</h5>
                <button class="btn-close custom-btn-close border p-1 me-0 text-dark"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            </div>

            <form action="{{ route('power-packed-store') }}"
                  method="POST"
                  class="formSubmit"
                  enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="col-form-label">
                            Power Packed Name <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               placeholder="Enter Power Packed name"
                               required>
                    </div>

                    {{-- Short Description --}}
                    <div class="mb-3">
                        <label class="col-form-label">
                            Short Description <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control"
                                  name="short_description"
                                  rows="3"
                                  placeholder="Enter short description"
                                  required></textarea>
                    </div>

                    {{-- Image --}}
                    {{-- <div class="mb-3">
                        <label class="col-form-label">
                            Image <span class="text-danger">*</span>
                        </label>
                        <input type="file"
                               class="form-control"
                               name="image"
                               accept="image/*"
                               required>
                    </div> --}}

                </div>

                <div class="modal-footer">
                    <a href="javascript:void(0)"
                       class="btn btn-light me-2"
                       data-bs-dismiss="modal">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary loderButton">
                        <span class="spinner-grow spinner-grow-sm loderIcon"
                              style="display:none;"></span>
                        Create
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- /Add / Edit Power Packed -->

@endsection
