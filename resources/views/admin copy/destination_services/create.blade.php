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
                                <h4 class="page-title">Add New Destination Services</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('destination-services-store') }}" method="post" class="formSubmit" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="first d-flex " style="gap:40px;">
                                        <div class="mb-2 w-100">
                                            <label class="col-form-label">Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title" required>
                                        </div>
                                    </div>
                                    <div class="first d-flex " style="gap:40px;">
                                        <div class="mb-2 w-100">
                                            <label class="col-form-label">Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="summernote" name="description"  rows="3" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="d-flex align-items-center justify-content-end m-0">
                                        <a href="{{route('destination-services-list')}}" class="btn btn-light me-2" >Cancel</a>
                                        <button type="submit" class="btn btn-primary loderButton"><span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
<script>
function validateLatitudeInput(event) {
    const char = String.fromCharCode(event.which);
    const input = event.target.value;

    // Allow digits, one dot, and a negative sign only at the start
    if (!char.match(/[0-9.-]/)) return false; // Only allow numbers, dot, and minus
    if (char === '.' && input.includes('.')) return false; // Prevent multiple dots
    if (char === '-' && input.length > 0) return false; // Minus sign only at the start
    return true;
}

function validateLatitudeRange(input) {
    const value = parseFloat(input.value);

    // Check latitude range (-90 to 90)
    if (value > 90) input.value = 90;
    else if (value < -90) input.value = -90;
}
</script>
<script>
    function validateInput(event, min, max) {
        const char = String.fromCharCode(event.which);
        const input = event.target.value;

        // Allow digits, one dot, and a negative sign only at the start
        if (!char.match(/[0-9.-]/)) return false; // Only allow numbers, dot, and minus
        if (char === '.' && input.includes('.')) return false; // Prevent multiple dots
        if (char === '-' && input.length > 0) return false; // Minus sign only at the start
        return true;
    }

    function validateRange(input, min, max) {
        const value = parseFloat(input.value);

        // Check value range
        if (value > max) input.value = max;
        else if (value < min) input.value = min;
    }
</script>
