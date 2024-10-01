@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Add FAQ</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('faqs-list')}}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                    <label class="form-label" for="question">Question *</label>
                                    <input type="text" class="form-control" id="question" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="type-of-affiliate" class="form-label">Type *</label>
                                    <select class="form-select" id="type-of-affiliate" title="Type of Affiliate" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Users</option>
                                        <option>Restaurant</option>
                                        <option>Affiliate</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Answer *</label>
                                    <textarea class="form-control" rows="5" id="editor" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
