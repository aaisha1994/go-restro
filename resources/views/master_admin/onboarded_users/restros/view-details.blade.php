@extends('Admin.layouts.master')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <!-- start page title -->
       <div class="row">
          <div class="col">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-md-0">View Restro Details</h4>
                   <div class="d-grid gap-2 d-flex justify-content-end">
                       <a href="{{ route('admin.restro.index') }}" type="button" class="btn btn-sm btn-primary ">Back</a>
                        <a href="{{ route('admin.restro.index') }}" type="submit" class="btn btn-sm btn-primary">Edit</a>
                   </div>
              </div>
          </div>
      </div>
      <!-- end page title -->
      <div class="row">
         <div class="col-lg-12">
            <div class="card mb-4 mb-xxl-8">
               <div class="card-body pt-9 pb-0">
                  <div class="d-flex flex-wrap flex-sm-nowrap">
                     <div class="me-7 mb-4">
                        <img class="rounded me-3" alt="user profile" width="180" src="{{asset('assets/images/users/restro.webp')}}" data-holder-rendered="true">
                     </div>
                     <div class="flex-grow-1">
                        <div class="justify-content-between align-items-start mb-2">
                           <div class="d-flex flex-column">
                              <div class="d-flex align-items-center mb-3">
                                 <a href="#" class="fs-2 text-dark fw-bolder me-1">Restro Name</a>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Contact Person Name</h6>
                                    <p class="fw-bolder">Max Smith</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Email</h6>
                                    <p class="fw-bolder">maxsmith@gmail.com</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Contact No.</h6>
                                    <p class="fw-bolder">+91 8666362669</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Alternate contact No.</h6>
                                    <p class="fw-bolder">+91 8666362669</p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Approx price for person</h6>
                                    <p class="fw-bolder">100-200</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">Food Category</h6>
                                    <p class="fw-bolder">Fruit and vegetables ,Starchy food.</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <h6 class="fw-bolder">City</h6>
                                    <p class="fw-bolder">Surat</p>
                                 </div>
                                 <div class="col-sm-12 col-md mb-4">
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-expand" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10"></path>
                                       </svg>
                                    </button>
                                 </div>
                              </div>
                              <div class="row collapse multi-collapse" id="multiCollapseExample1">
                                 <div class="col-sm-12 col-md-3 mb-4">
                                    <h6 class="fw-bolder">State</h6>
                                    <p class="fw-bolder">Gujarat</p>
                                 </div>
                                 <div class="col-sm-12 col-md-3 mb-4">
                                    <h6 class="fw-bolder">Zip / Postal code </h6>
                                    <p class="fw-bolder">341504</p>
                                 </div>
                                 <div class="col-sm-12 col-md-6 mb-4">
                                    <h6 class="fw-bolder">Address</h6>
                                    <p class="fw-bolder">Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End -->
      <div class="d-grid gap-2 d-flex justify-content-end mb-4">
         <a class="popup-form btn-sm btn btn-primary" href="#test-form">Add Image & Menu</a>
      </div>
      <div class="card mfp-hide mfp-popup-form mx-auto" id="test-form">
        <div class="card-body">
            <h4 class="mb-4">Add Restro Images & Menu</h4>
            <form method="" action="" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="name">Select one</label>
                              <select class="form-select" aria-label="Default select example" required>
                                <option selected="" disabled="" value="">Choose...</option>
                                 <option value="1">Restro Image</option>
                                 <option value="2">Restro Menu</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="restro-image">Restro Image & Menu</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <!-- coupon -->
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <!-- <h4 class="card-title">Custom Tabs</h4> -->
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#restrocoupons" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-gift"></i></span>
                        <span class="d-none d-sm-block fw-bolder">Restro Coupons</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#restroimages" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-images"></i></span>
                        <span class="d-none d-sm-block fw-bolder">Restro Images</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#restromenus" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-file-alt"></i></span>
                        <span class="d-none d-sm-block fw-bolder">Restro Menus</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#terms-condition" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-file-alt"></i></span>
                        <span class="d-none d-sm-block fw-bolder">Terms & Condition</span>
                        </a>
                     </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content pt-3 text-muted">
                     <div class="tab-pane active" id="restrocoupons" role="tabpanel">
                        <div class="row">
                           <div class="col-sm-12 col-md">
                              <div class="card fw-bolder text-dark">
                                  <div class="rubber_stamp">
                                        <img src="{{asset('assets/images/coupon-logo/redeened-stamp.png')}}" alt="stamp" width="150">
                                   </div>
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="qr-code">
                                             <img src="{{asset('assets/images/coupon-logo/1.png')}}" alt="qr-code" width="70">
                                          </div>
                                       </div>
                                       <div class="col-md-1 align-items-center border-end border-1"></div>
                                       <div class="col-md-8">
                                          <div class="align-items-center">
                                             <!-- <span class="badge bg-success">Success</span> -->
                                             <h3>15% <span class="fs-5">Discount</span>
                                                <span class="position-absolute top-0 end-0">
                                                <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                                <i class="ri-information-line fs-5"></i>
                                                </a>
                                                </span>
                                             </h3>
                                             <span>Orders from 160,000 VND</span>
                                             <span>October 25 - 26, 2023</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md">
                              <div class="card fw-bolder text-dark">
                                  <div class="rubber_stamp">
                                        <img src="{{asset('assets/images/coupon-logo/redeened-stamp.png')}}" alt="stamp" width="150">
                                   </div>
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="qr-code">
                                             <img src="{{asset('assets/images/coupon-logo/1.png')}}" alt="qr-code" width="70">
                                          </div>
                                       </div>
                                       <div class="col-md-1 align-items-center border-end border-1"></div>
                                       <div class="col-md-8">
                                          <div class="align-items-center">
                                             <!-- <span class="badge bg-success">Success</span> -->
                                             <h3>15% <span class="fs-5">Discount</span>
                                                <span class="position-absolute top-0 end-0">
                                                <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                                <i class="ri-information-line fs-5"></i>
                                                </a>
                                                </span>
                                             </h3>
                                             <span>Orders from 160,000 VND</span>
                                             <span>October 25 - 26, 2023</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md">
                              <div class="card fw-bolder text-dark">
                                  <div class="rubber_stamp">
                                        <img src="{{asset('assets/images/coupon-logo/redeened-stamp.png')}}" alt="stamp" width="150">
                                   </div>
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="qr-code">
                                             <img src="{{asset('assets/images/coupon-logo/1.png')}}" alt="qr-code" width="70">
                                          </div>
                                       </div>
                                       <div class="col-md-1 align-items-center border-end border-1"></div>
                                       <div class="col-md-8">
                                          <div class="align-items-center">
                                             <!-- <span class="badge bg-success">Success</span> -->
                                             <h3>15% <span class="fs-5">Discount</span>
                                                <span class="position-absolute top-0 end-0">
                                                <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="privacy policy">
                                                <i class="ri-information-line fs-5"></i>
                                                </a>
                                                </span>
                                             </h3>
                                             <span>Orders from 160,000 VND</span>
                                             <span>October 25 - 26, 2023</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end::tab -->
                     <div class="tab-pane" id="restroimages" role="tabpanel">
                        <div class="popup-gallery">
                           <div class="row">
                              <div class="col mt-2">
                                 <a class="float-start" href="{{asset('assets/images/small/img-1.jpg')}}" title="Project 1">
                                    <div class="img-fluid">
                                       <img src="{{asset('assets/images/small/img-1.jpg')}}" class="rounded " alt="img-1" width="200">
                                    </div>
                                 </a>
                              </div>
                              <div class="col mt-2">
                                 <a class="float-start" href="{{asset('assets/images/small/img-2.jpg')}}" title="Project 1">
                                    <div class="img-fluid">
                                       <img src="{{asset('assets/images/small/img-2.jpg')}}" class="rounded " alt="img-1" width="200">
                                    </div>
                                 </a>
                              </div>
                              <div class="col mt-2">
                                 <a class="float-start" href="{{asset('assets/images/small/img-3.jpg')}}" title="Project 2">
                                    <div class="img-fluid">
                                       <img src="{{asset('assets/images/small/img-3.jpg')}}" class="rounded " alt="img-2" width="200">
                                    </div>
                                 </a>
                              </div>
                              <div class="col mt-2">
                                 <a class="float-start" href="{{asset('assets/images/small/img-4.jpg')}}" title="Project 3">
                                    <div class="img-fluid">
                                       <img src="{{asset('assets/images/small/img-4.jpg')}}" class="rounded " alt="img-3" width="200">
                                    </div>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end::teb -->
                     <div class="tab-pane" id="restromenus" role="tabpanel">
                        <div class="zoom-gallery">
                           <div class="row">
                              <div class="col mt-2">
                                 <a class="float-start" href="{{asset('assets/images/menu/1.jpg')}}" title="restro menus 1">
                                    <div class="img-fluid">
                                       <img src="{{asset('assets/images/menu/1.jpg')}}" class="rounded " alt="img-1" width="200">
                                    </div>
                                 </a>
                              </div>
                              <div class="col mt-2">
                                 <a class="float-start" href="{{asset('assets/images/menu/2.jpg')}}" title="restro menus 1">
                                    <div class="img-fluid">
                                       <img src="{{asset('assets/images/menu/2.jpg')}}" class="rounded " alt="img-1" width="200">
                                    </div>
                                 </a>
                              </div>
                              <div class="col mt-2">
                                 <a class="float-start" href="{{asset('assets/images/menu/3.jpg')}}" title="restro menus 2">
                                    <div class="img-fluid">
                                       <img src="{{asset('assets/images/menu/3.jpg')}}" class="rounded " alt="img-2" width="200">
                                    </div>
                                 </a>
                              </div>
                              <div class="col mt-2">
                                 <a class="float-start" href="{{asset('assets/images/menu/1.jpg')}}" title="restro menus 3">
                                    <div class="img-fluid">
                                       <img src="{{asset('assets/images/menu/1.jpg')}}" class="rounded " alt="img-3" width="200">
                                    </div>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end::tab -->
                     <div class="tab-pane" id="terms-condition" role="tabpanel">
                        <div class="row">
                           <form method="" action="">
                              <div class="col-md-12 mb-4">
                                 <label class="form-label" for="description">Terms & Condition</label>
                                 <textarea class="form-control" rows="5" id="editor"></textarea>
                              </div>
                              <div class="col-md-12 text-end">
                                 <button type="button" class="btn btn-md btn-primary">Save</button>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!-- end::tab -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end row -->
   </div>
   <!-- container-fluid -->
</div>
@endsection
@section('js')
   <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
   </script>
@endsection
