@extends('Restro.layouts.master')
@section('title', 'Support')
@section('toolbar', 'Support')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <!-- Profile -->
            @include('Restro.profile.profile')
            <!-- end:: profile -->
            <div class="d-flex flex-wrap flex-stack mb-6">
                <h3 class="fw-bolder my-2">Support</h3>
                <div class="d-flex flex-wrap my-2">
                    <div class="me-4">
                        <select name="status" data-control="select2" data-hide-search="true" class="status form-select form-select-sm bg-body border-body w-125px">
                            <option value="0" selected="selected">Open</option>
                            <option value="1">Close</option>
                        </select>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ticket_create">Add Ticket</a>
                </div>
            </div>
            <div class="row g-6 g-xl-9">
                @foreach ($Supports as $Support)
                    <div class="col-md-6 col-xl-4 @if($Support->status == 0) s0 @else s1 @endif" @if($Support->status == 1) style="display:none" @endif>
                        <a href="javascript:void(0)" class="card border-hover-primary edit" data-id="{{ $Support->id }}" data-bs-toggle="modal" data-bs-target="#ticket_detail">
                            <div class="card-header border-0 pt-9">
                                <div class="card-title m-0">
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="">{{ $Support->subject }}</div>
                                </div>
                                <div class="card-toolbar">
                                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">Ticket No : {{ $Support->id }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="fs-6 fw-bolder text-dark">Description</div>
                                <p class="text-dark fw-bold fs-6 mt-1 mb-3">{{ $Support->message }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="m-0">{{ date('d M Y', strtotime($Support->created_at)) }}</p>
                                    <p class="m-0 badge {{ $Support->status == 0 ? 'badge-light-primary' : 'badge-light-success' }}  fw-bolder px-4 py-2">Status: {{ $Support->status == 0 ? 'Pending' : 'Close' }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="ticket_create">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('restro.profile.supportstore') }}" method="POST" id="form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Ticket</h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Subject</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" name="subject">
                            </div>
                            <div class="col-lg-12 mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Description</span>
                                </label>
                                <textarea class="form-control form-control-solid" name="message"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="ticket_detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ticket Details</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="fs-6 fw-bolder text-dark tickettitle">Refund Related</div>
                        <p class="text-dark fw-bold fs-6 mt-1 mb-3 ticketdesc">Need a refund or have subscription concerns? Tap our
                            support screen for swift resolution and exceptional service.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="m-0 ticketcreate">15 Mar 2024</p>
                        </div>
                        <div class="border border-dashed border-2 mt-4 p-5 open">
                            <div class="fs-4 fw-bolder">Reply</div>
                            <div class="fs-6 text-dark">Go Restro Support Team</div>
                            <p class="pt-4 ticketreply">"Thank you for contacting us. We appreciate your patience. Our Financial
                                Department is processing your refund, and you can expect it to be completed within 48 hours.
                                If you have any further questions or concerns, please don't hesitate to reach out. Your
                                satisfaction is our priority."</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="m-0 ticketupdate">16 Mar 2024</p>
                                <p class="m-0 badge badge-light-primary fw-bolder px-4 py-2">Status: <span class="ticketstatus">Close</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    subject: { required: true },
                    message: { required: true },
                },
                messages: {
                    subject: { required: "Subject is required" },
                    message: { required: "Message is required" },
                },
                errorPlacement: function(error, element) {
                    error.addClass("error-message");
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        $(document).on('change', '.status', function(e) {
            let id = $(this).val();
            if(id == 0) {
                $('.s0').show();
                $('.s1').hide();
            } else {
                $('.s0').hide();
                $('.s1').show();
            }
        });

        $(document).on('click', '.edit', function(e) {
            let id = $(this).attr('data-id');
            $.ajax({
                type: "get",
                url: "{{ route('restro.profile.supportedit', ['_id']) }}".replace('_id', id),
                dataType: "json",
                success: function(response) {
                    let edit_name = response.data.name;
                    $('.tickettitle').html(response.data.subject);
                    $('.ticketdesc').html(response.data.message);
                    $('.ticketcreate').html(moment(response.data.created_at).format('d MMM YYYY'));
                    $('.ticketreply').html(response.data.reply);
                    $('.ticketupdate').html(moment(response.data.updated_at).format('d MMM YYYY'));
                    $('.ticketstatus').html(response.data.status == 1 ? 'Close' : 'Open' );
                    $('.open').css('display', response.data.status == 0 ? 'none' : '' );
                },
            });
        });
    </script>
@endsection
