@extends('Admin.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.profile.update') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Profile Details</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Name *</label>
                                    <div class="col-sm-10 mb-4">
                                        <input class="form-control" type="text" name="name" value="{{ $Admins->name }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Email *</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" name="email" value="{{ $Admins->email }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Contact Phone *</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" name="mobile" value="{{ $Admins->mobile }}">
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="labelreferral">Referral Link</div>
                            <div class="copy-text">
                                <select class="form-select form-select-solid" id="restro_id" data-control="select2" data-placeholder="Select Restaurant">
                                    <option value="" disabled></option>
                                    @foreach ($Restros as $Restro)
                                        <option value="{{ $Restro->id }}" @if($Admins->restro_id == $Restro->id) @selected(true) @endif>{{ $Restro->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="text form-control" value="https://go-restro.com/?ref={{ $Admins->ref_code }}" />
                                <button><i class="fa fa-clone"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });


        let copyText = document.querySelector(".copy-text");
        copyText.querySelector("button").addEventListener("click", function() {
            let input = copyText.querySelector("input.text");
            input.select();
            document.execCommand("copy");
            copyText.classList.add("active");
            window.getSelection().removeAllRanges();
            setTimeout(function() {
                copyText.classList.remove("active");
            }, 2500);
        });

        $(document).on("change", "#restro_id", function() {
            var id = $(this).val();
            $.ajax({
                type: "post",
                url: "{{ route('admin.restrolink', ['_id']) }}".replace('_id', id),
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        toastCall("success", response.message);
                    } else {
                        toastCall("error", response.message);
                    }
                },
            });
        });
    </script>
@endsection
