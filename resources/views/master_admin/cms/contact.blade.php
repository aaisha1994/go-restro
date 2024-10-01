@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Contact Us</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
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
                                    <label class="form-label">Phone No *</label>
                                    <input type="tel" class="form-control" value="+91 5623589656" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Email *</label>
                                    <input type="email" class="form-control" value="gorestro@gmail.com" required>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Address *</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <h5 class="mb-4">Social Media Links</h5>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Facbook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/gorestro">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" value="https://www.instagram.com/gorestro">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="https://www.twitter.com/gorestro">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 card">
                        <div class="card-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.998218543723!2d72.84843857464732!3d21.15246918351924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e2defa78461%3A0x8ada40aee51ef52c!2sARROWMECH%20INSTRUMENTS%20%26%20AUTOMATION!5e0!3m2!1sen!2sin!4v1712554983879!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
@endsection