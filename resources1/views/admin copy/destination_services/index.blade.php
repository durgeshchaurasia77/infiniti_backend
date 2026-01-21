@extends('admin.layout.app')
@section('title')
Destination Services
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-sm-8">
                                <h4 class="page-title">Destination Services List</h4>
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
                                        <a href="{{ route('destination-services-create') }}" class="btn btn-primary"
                                            title="Add Destination Services"><i class="ti ti-square-rounded-plus me-2"></i>Add
                                            Destination Services</a>
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
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($destinationservicesList as $key => $destinationservices)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td style="max-width: 300px; white-space: normal; word-break: break-word;">
                                                    {{ $destinationservices->title ?? '' }}
                                                </td>
                                                <td>
                                                    @if($destinationservices->status == 1)
                                                        <span class="badge bg-success active_btn">Active</span>
                                                    @else
                                                        <span class="badge bg-danger inactive_btn">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a type="button" href="{{ route('destination-services-edit', [$destinationservices->id]) }}" class="btn btn-secondary edit_model"  title="Edit">
                                                            <i class="feather-edit"></i>
                                                        </a>
                                                        <button @if($destinationservices->status == 1) class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('destination-services-status-update', [$destinationservices->id]) }}" title="Status">
                                                            @if($destinationservices->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif
                                                        </button>
                                                        <button id="delete" href="{{ route('destination-services.delete',[$destinationservices->id]) }}" class="btn btn-danger btn-xs mr-2 jsgrid-delete-button" type="button" title="Delete"><i class="fa fa-trash"></i>
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
                                            Showing {{$destinationservicesList->firstItem()}} to {{$destinationservicesList->lastItem()}} of {{$destinationservicesList->total()}} entries
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="datatable-paginate">
                                            {!! $destinationservicesList->appends(request()->input())->links('custom') !!}
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
@endsection
