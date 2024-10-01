@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Terms & Condition</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-primary">Clear</button>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#restaurant" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Restaurant</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#affiliate" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Affiliate</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#users" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                        <span class="d-none d-sm-block">Users</span>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="restaurant" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label" for="title">Title *</label>
                                            <input type="text" class="form-control" id="title" value="Restaurant" required>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label" for="description">Description *</label>
                                            <textarea class="form-control" rows="8" id="editor" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="affiliate" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label" for="title">Title *</label>
                                            <input type="text" class="form-control" id="title" value="Affiliate" required>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label" for="description">Description *</label>
                                            <textarea class="form-control" rows="8" id="editor2" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="users" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label" for="title">Title *</label>
                                            <input type="text" class="form-control" id="title" value="Users" required>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label" for="description">Description *</label>
                                            <textarea class="form-control" rows="8" id="editor3" required></textarea>
                                        </div>
                                    </div>
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
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

      ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
