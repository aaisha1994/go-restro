@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Offer</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('restro-offer-list')}}" type="button" class="btn btn-sm btn-primary">Back</a>
                                <!-- <button type="submit" class="btn btn-sm btn-primary">Submit</button> -->
                                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Preview</button>
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
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Select Restraurant *</label>
                                    <select class="form-select" title="Select Restraurant" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="offer-name">Offer Name *</label>
                                    <input type="text" class="form-control" id="offer-name" placeholder="Offer Name" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="offer-text">Offer Text *</label>
                                    <input type="text" class="form-control" id="offer-text" placeholder="Offer Text" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="coupon-quantity">Coupon Quantity *</label>
                                    <input type="number" class="form-control" id="coupon-quantity"  required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="validity">Validity </label>
                                    <input type="date" class="form-control" id="validity"  required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="image">image *</label>
                                    <input class="form-control" name="user_image" id="image" type="file" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <label class="form-label" for="terms-condition">Terms & Condition *</label>
                                    <textarea class="form-control" rows="3" placeholder="Terms & Condition" required></textarea>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ url('upload/no_image.jpg') }}" alt="User image">
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

 <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Preview Coupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="card fw-bolder text-dark">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-3">
                              <div class="qr-code">
                                  <img src="{{asset('assets/images/coupon-logo/1.png')}}" alt="logo" width="100">
                              </div>
                          </div>
                          <div class="col-md-1 align-items-center border-end border-2"></div>
                          <div class="col-md-8">
                              <div class="align-items-center flote-end">
                                  <h3>15% <span class="fs-5">Discount</span>
                                   <span class="position-absolute top-0 end-0">
                                      <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                        <i class="ri-information-line fs-4"></i>
                                      </a>
                                   </span>
                                   </h3>
                                  <span>Orders from 160,000 VND</span><br>
                                  <span>October 25 - 26, 2023</span><br>
                                   <span class="position-absolute bottom-0 end-0">
                                      <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="Total Coupon Quantity">
                                         <span class="badge bg-primary text-end">50</span>
                                      </a>
                                   </span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
   $(document).ready(function(){
       $('#image').change(function(e){
           var reader = new FileReader();
           reader.onload = function(e){
               $('#showImage').attr('src',e.target.result);
           }
           reader.readAsDataURL(e.target.files['0']);
       });
   });
</script>
@endsection
