@extends('Restro.layouts.master')
@section('title', 'Passport')
@section('toolbar', 'Passport')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card card-flush">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Passport</h3>
                    </div>
                    <div class="mt-5">
                        <button class="btn btn-primary btn-sm align-self-center" data-bs-toggle="modal" data-bs-target="#add_validity">Add Validity</button>
                        <button class="btn btn-primary btn-sm align-self-center" data-bs-toggle="modal" data-bs-target="#add_passport">Add<i class="bi bi-plus fs-3 py-0 my-0"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($Coupons as $Coupon)
                            <div class="col-md-4 mb-5" id="row_{{ $Coupon->id }}">
                                <div class="rounded border-gray-300 border-1 border-gray-300 border-dashed">
                                    <div class="d-flex">
                                        <div class="col-md-4">
                                            <img src="{{ asset($Coupon->image_path) }}" class="img-fluid rounded-start h-100" alt="{{ $Coupon->name }}">
                                        </div>
                                        <div class="col-md-8 p-3">
                                            <div class="d-flex flex-stack">
                                                <span class="card-title fs-3 text-primary fw-bolder">{{ $Coupon->name }}</span>
                                                @if($Coupon->status == 0)<span><i class="bi bi-clock-history text-warning fs-4 fw-bolder"></i></span>@endif
                                            </div>
                                            <p class="card-text fw-bolder">{{ $Coupon->details }}</p>
                                            <div class="d-flex flex-stack">
                                                <span class="text-success">Coupons: {{ $Coupon->quantity }} </span>
                                                <span class="text-warning">Validity: {{ $Coupon->Restro->validity }} Days</span>
                                            </div>
                                            <div class="text-end mt-3">
                                                <a href="javascript:void(0)" class="delete" data-id="{{ $Coupon->id }}"><i class="bi bi-trash fs-3 text-primary me-4"></i></a>
                                                <a href="javascript:void(0)" class="edit" data-id="{{ $Coupon->id }}" data-bs-toggle="modal" data-bs-target="#edit_passport"><i class="bi bi-pencil-square fs-3 text-primary"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
    <!-- add validity modal-->
    <div class="modal fade" tabindex="-1" id="add_validity">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('restro.passport.validity') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Passport Validity</h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Coupons Validity</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="validity" placeholder="45 Days" value="{{ $Restaurant->validity }}" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button value="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- add passport modal -->
    <div class="modal fade" tabindex="-1" id="add_passport">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="{{ route('restro.passport.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header p-3">
                        <h5 class="modal-title">Add New Passport</h5>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body">
                        <div class="scroll-y me-n7 pe-7" id="add_passport" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                            <div class="row mb-5 mt-5">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Passport Image</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('restaurant/media/svg/avatars/blank.svg') }})">
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('restaurant/media/logos/logo1.png') }})"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Offer Name</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="name" placeholder="Buy 1 Get 1 Free" required>
                            </div>
                            <div class="mb-5">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Offer Text</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="details" placeholder="(Buy 1 Burger (Rs.100) Get 1 Pizza (Free)" required>
                            </div>
                            <div class="mb-5">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Coupons Quantity</span>
                                </label>
                                <input type="number" class="form-control form-control-solid" name="quantity" placeholder="15" required>
                            </div>
                            <div class="mb-5">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Terms & Conditions</span>
                                </label>
                                <textarea name="terms" id="kt_docs_ckeditor_classic"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- edit passport modal -->
    <div class="modal fade" tabindex="-1" id="edit_passport">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" id="editform" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-header p-3">
                        <h5 class="modal-title">Edit Passport</h5>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body">
                        <div class="scroll-y me-n7 pe-7" id="edit_passport" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-offset="300px">
                            <div class="row mb-5 mt-5">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Passport Image</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('restaurant/media/svg/avatars/blank.svg') }})">
                                        <div class="image-input-wrapper w-125px h-125px" id="edit_image" style="background-image: url({{ asset('restaurant/media/logos/logo1.png') }})"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Offer Name</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="name" id="edit_name" placeholder="Buy 1 Get 1 Free" required>
                            </div>
                            <div class="mb-5">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Offer Text</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="details" id="edit_details" placeholder="(Buy 1 Burger (Rs.100) Get 1 Pizza (Free)" required>
                            </div>
                            <div class="mb-5">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Coupons Quantity</span>
                                </label>
                                <input type="number" class="form-control form-control-solid" name="quantity" id="edit_quantity" placeholder="15" required>
                            </div>
                            <div class="mb-5">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Terms & Conditions</span>
                                </label>
                                <textarea name="terms" id="kt_docs_ckeditor_classic2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Modal -->

@endsection
@section('js')
    <script src="{{asset('restaurant/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
    <script type="text/javascript">
        let editor;
        ClassicEditor.create(document.querySelector('#kt_docs_ckeditor_classic')).catch(error => { console.error(error); });
        ClassicEditor.create(document.querySelector('#kt_docs_ckeditor_classic2')).then( newEditor => {
            editor = newEditor;
        }).catch(error => { console.error(error); });

        $(document).on('click', '.delete', function(e) {
            let id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('restro.passport.delete', ['_id']) }}".replace('_id', id),
                        dataType: "json",
                        success: function(response) {
                            if (response.status) {
                                toastCall("success", response.message);
                                $('#row_' + id).remove();
                            } else {
                                toastCall("error", response.message);
                            }
                        },
                    });
                }
            })
        });

        $(document).on('click', '.edit', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: "get",
                url: "{{ route('restro.passport.edit', ['_id']) }}".replace('_id', id),
                dataType: "json",
                success: function(response) {
                    let url = "{{ route('restro.passport.update',['_id']) }}".replace('_id', id);
                    let edit_name = response.data.name;
                    let edit_details = response.data.details;
                    let edit_quantity = response.data.quantity;
                    let terms = response.data.terms;
                    let img = "url("+ response.data.image_path +")";

                    $('#edit_image').css('background-image', img);
                    $('#editform').prop('action', url);
                    $('#edit_name').val(edit_name);
                    $('#edit_details').val(edit_details);
                    $('#edit_quantity').val(edit_quantity);
                    editor.setData(terms);
                },
            });
        });


    </script>
@endsection
