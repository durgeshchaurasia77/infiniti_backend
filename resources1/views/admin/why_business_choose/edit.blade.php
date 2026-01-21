@extends('admin.layout.app')
@section('title')
Why Business Choose
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
                            <h4 class="page-title">Edit Why Business Choose</h4>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('why-business-choose-update') }}"
                                method="POST"
                                class="formSubmit">
                                @csrf

                                <div class="modal-body">
                                    <div class="row">

                                        {{-- AI --}}
                                        <div class="col-md-6 mb-3">
                                            <label>AI Title</label>
                                            <input type="text"
                                                class="form-control"
                                                name="ai_title"
                                                value="{{ $data->ai_title ?? '' }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>AI Description</label>
                                            <textarea class="form-control"
                                                    name="ai_description"
                                                    rows="3">{{ $data->ai_description ?? '' }}</textarea>
                                        </div>

                                        {{-- Scalable --}}
                                        <div class="col-md-6 mb-3">
                                            <label>Scalable Title</label>
                                            <input type="text"
                                                class="form-control"
                                                name="scalable_title"
                                                value="{{ $data->scalable_title ?? '' }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Scalable Description</label>
                                            <textarea class="form-control"
                                                    name="scalable_description"
                                                    rows="3">{{ $data->scalable_description ?? '' }}</textarea>
                                        </div>

                                        {{-- Reliable --}}
                                        <div class="col-md-6 mb-3">
                                            <label>Reliable Title</label>
                                            <input type="text"
                                                class="form-control"
                                                name="reliable_title"
                                                value="{{ $data->reliable_title ?? '' }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Reliable Description</label>
                                            <textarea class="form-control"
                                                    name="reliable_description"
                                                    rows="3">{{ $data->reliable_description ?? '' }}</textarea>
                                        </div>

                                        {{-- Security --}}
                                        <div class="col-md-6 mb-3">
                                            <label>Security Title</label>
                                            <input type="text"
                                                class="form-control"
                                                name="security_title"
                                                value="{{ $data->security_title ?? '' }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Security Description</label>
                                            <textarea class="form-control"
                                                    name="security_description"
                                                    rows="3">{{ $data->security_description ?? '' }}</textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary loderButton">
                                        <span class="spinner-grow spinner-grow-sm loderIcon" style="display:none;"></span>
                                        Save Changes
                                    </button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

