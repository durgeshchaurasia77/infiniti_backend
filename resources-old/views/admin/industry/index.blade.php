@extends('admin.layout.app')
@section('title')
Industry
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
                            <h4 class="page-title">Industry List</h4>
                        </div>
                        <div class="col-sm-4 text-sm-end">
                            <div class="head-icons">
                                <a href="{{ route('industry-list') }}"
                                   data-bs-toggle="tooltip"
                                   title="Refresh">
                                    <i class="ti ti-refresh-dot"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6 text-sm-end">
                                <a href="{{ route('industry-create') }}"
                                   class="btn btn-primary">
                                    <i class="ti ti-square-rounded-plus me-2"></i>
                                    Add Industry
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
                                        <th>Title</th>
                                        {{-- <th>Publish Date</th> --}}
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lists as $key => $data)
                                        <tr>
                                            <td>{{ $key + $lists->firstItem() }}</td>

                                            {{-- Title --}}
                                            <td style="max-width: 250px; white-space: normal;">
                                                {{ $data->title }}
                                            </td>

                                            {{-- Publish Date --}}
                                            {{-- <td>
                                                {{ \Carbon\Carbon::parse($data->publish_date)->format('d M Y') }}
                                            </td> --}}

                                            {{-- Image --}}
                                            <td>
                                                @if($data->image)
                                                    <img src="{{ asset($data->image) }}"
                                                         width="60"
                                                         height="60"
                                                         style="object-fit:cover;border-radius:6px;">
                                                @else
                                                    -
                                                @endif
                                            </td>

                                            {{-- Status --}}
                                            <td>
                                                @if($data->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>

                                            {{-- Action --}}
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('industry-edit', base64_encode($data->id)) }}"
                                                       class="btn btn-secondary"
                                                       title="Edit">
                                                        <i class="feather-edit"></i>
                                                    </a>

                                                    {{-- <button
                                                        class="btn btn-warning btn-xs"
                                                        id="statusBtn"
                                                        href="{{ route('industry-status-update', $data->id) }}"
                                                        title="Status">
                                                        @if($data->status == 1)
                                                            <i class="feather-lock"></i>
                                                        @else
                                                            <i class="feather-unlock"></i>
                                                        @endif
                                                    </button> --}}
                                                    <button @if($data->status == 1)
                                                        class="btn btn-danger btn-xs mw-75 ml-2 mr-2" id="activateBtn" @else class="btn btn-success btn-xs mw-75 ml-2 mr-2" id="deactivateBtn" @endif href="{{ route('industry-status-update', [$data->id]) }}" title="Status">
                                                        @if($data->status == 1) <i class="feather-lock"></i> @else <i class="feather-unlock"></i> @endif
                                                    </button>

                                                    <button
                                                        class="btn btn-danger btn-xs"
                                                        id="delete"
                                                        href="{{ route('industry-delete', $data->id) }}"
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
                            <div class="row align-items-center mt-2">
                                <div class="col-md-6">
                                    Showing {{ $lists->firstItem() }} to {{ $lists->lastItem() }}
                                    of {{ $lists->total() }} entries
                                </div>
                                <div class="col-md-6 text-end">
                                    {!! $lists->links('custom') !!}
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
