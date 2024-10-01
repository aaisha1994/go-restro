@extends('Admin.layouts.master')
@section('title', 'UTM Campaign Create')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.utmcampaign.store') }}" method="POST" id="form">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">UTM Campaign</h4>
                            <div class="">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.utmcampaign.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="campaign-name">Campaign Name *</label>
                                        <input type="text" class="form-control" id="campaign-name" name="name">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Select Restraurant *</label>
                                        <select class="form-select" title="Select Restraurant" name="restro_id">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            @foreach ($Restros as $co)
                                                <option value="{{ $co->id }}">{{ $co->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
<script>
    window.addEventListener('load', function() {
        $("#form").validate({
            rules: {
                restro_id: { required: true },
                name: { required: true },
            },
            messages: {
                restro_id: { required: "Restro is required" },
                name: { required: "Name is required" },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endsection
