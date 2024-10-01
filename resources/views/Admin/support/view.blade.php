@extends('Admin.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <form action="{{ route('admin.support.store',[$Support->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-md-0">Customer Support</h4>
                            <div class=" ">
                                <div class="d-grid gap-2 d-flex justify-content-end">
                                    <a href="{{ route('admin.support.index') }}" type="button" class="btn btn-sm btn-primary">Back</a>
                                    @if($Support->status == 0)
                                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                    @endif
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
                                    <div class="col-md-12 mb-4">
                                        <h5 class="mb-4">{{ __(App\Models\Support::$AccountType[$Support->account_type]) }} :
                                        @if ($Support->account_type == 1)
                                            {{ $Support->User->name }}
                                        @elseif ($Support->account_type == 2)
                                            {{ $Support->Restro->name }}
                                        @else
                                            {{ $Support->Affiliate->first_name }}
                                        @endif</h5>
                                        <div class="border">
                                            <h4 class="fs-5 pt-3 ps-3">{{ $Support->subject }}</h4>
                                            <p class="fs-5 p-3">{{ $Support->message }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Reply *</label>
                                        @if($Support->status == 1)
                                            {!! $Support->reply !!}
                                        @else
                                            <textarea class="form-control" rows="5" id="editor" name="reply">{{ $Support->reply }}</textarea>
                                        @endif
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
