@extends('restaurant_admin.layouts.master')
@section('content')
<!--begin::Toolbar-->
@section('toolbar')
Account Settings
@endsection
<!--end::Toolbar-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <!-- Profile -->
      @include('restaurant_admin.account.profile')
      <!-- end:: profile -->
      <div class=" mb-5 mb-xl-10">
         <div class="card card-xl-stretch mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
               <h3 class="card-title align-items-start flex-column">
                  <span class="card-label fw-bolder fs-3 mb-1">User Allocation</span>
               </h3>
               <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
                  <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#add_user">
                     <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                           <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                           <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                        </svg>
                     </span>
                     New Member
                  </a>
               </div>
            </div>
            <!--end::Header-->
            <div class="card-body py-3">
               <div class="table-responsive">
                  <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                     <thead>
                        <tr class="fw-bolder text-muted">
                           <th class="w-25px">
                              <div class="form-check form-check-sm form-check-custom form-check-solid">
                                 <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                              </div>
                           </th>
                           <th class="min-w-200px">Users</th>
                           <th class="min-w-150px">Email</th>
                           <th class="min-w-150px">Mobile No</th>
                           <th class="min-w-100px text-end">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              <div class="form-check form-check-sm form-check-custom form-check-solid">
                                 <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                              </div>
                           </td>
                           <td>
                              <div class="d-flex align-items-center">
                                 <div class="symbol symbol-45px me-5">
                                    <img src="{{asset('restaurant/media/avatars/300-14.jpg')}}" alt="" />
                                 </div>
                                 <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Ana Simmons</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">Admin</span>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">anasimmons@gmail.com</a>
                           </td>
                           <td>
                              <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">+91 5623 562 5326</a>
                           </td>
                           <td>
                              <div class="d-flex justify-content-end flex-shrink-0">
                                 <a href="#" data-bs-toggle="modal" data-bs-target="#edit_user" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                          <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                 </a>
                                 <a href="#" id="sweetalert" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <span class="svg-icon svg-icon-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                          <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                          <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                 </a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="form-check form-check-sm form-check-custom form-check-solid">
                                 <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                              </div>
                           </td>
                           <td>
                              <div class="d-flex align-items-center">
                                 <div class="symbol symbol-45px me-5">
                                    <img src="{{asset('restaurant/media/avatars/300-2.jpg')}}" alt="" />
                                 </div>
                                 <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Jessie Clarcson</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">Admin</span>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">jessieclarcson@gmail.com</a>
                           </td>
                           <td>
                              <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">+91 5623 562 5326</a>
                           </td>
                           <td>
                              <div class="d-flex justify-content-end flex-shrink-0">
                                 <a href="#" data-bs-toggle="modal" data-bs-target="#edit_user" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                          <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                 </a>
                                 <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <span class="svg-icon svg-icon-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                          <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                          <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                 </a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="form-check form-check-sm form-check-custom form-check-solid">
                                 <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                              </div>
                           </td>
                           <td>
                              <div class="d-flex align-items-center">
                                 <div class="symbol symbol-45px me-5">
                                    <img src="{{asset('restaurant/media/avatars/300-5.jpg')}}" alt="" />
                                 </div>
                                 <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Lebron Wayde</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">Admin</span>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">lebronwayde@gmail.com</a>
                           </td>
                           <td>
                              <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">+91 5623 562 5326</a>
                           </td>
                           <td>
                              <div class="d-flex justify-content-end flex-shrink-0">
                                 <a href="#" data-bs-toggle="modal" data-bs-target="#edit_user" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                          <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                 </a>
                                 <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <span class="svg-icon svg-icon-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                          <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                          <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                       </svg>
                                    </span>
                                 </a>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--end::Container-->
<!-- User Add Modal -->
<div class="modal fade" tabindex="-1" id="add_user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Allocation</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <form action="" method="" class="form" id="kt_docs_formvalidation_text">
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6 mb-8">
                     <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                           <span class="required">User Name</span>
                        </label>
                     <input type="text" class="form-control form-control-solid" name="" required>
                  </div>
                  <div class="col-md-6 mb-8">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Email</span>
                        </label>
                     <input type="email" class="form-control form-control-solid" name="" required>
                  </div>
                  <div class="col-md-6 mb-8">
                     <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                           <span class="required">Mobile No</span>
                        </label>
                     <input type="tel" class="form-control form-control-solid" name="" required>
                  </div>
                  <div class="col-md-6 mb-8">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">User Role</span>
                        </label>
                     <input type="text" class="form-control form-control-solid" name="" required>
                  </div>
                 <div class="col-md-6 mb-8 fv-row" data-kt-password-meter="true">
                     <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6">Password</label>
                        <div class="position-relative mb-3">
                           <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                           <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                              <i class="bi bi-eye-slash fs-2"></i>
                              <i class="bi bi-eye fs-2 d-none"></i>
                           </span>
                        </div>
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                           <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                           <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                           <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                           <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                     </div>
                     <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                  </div>
                  <div class="col-md-6 mb-8 fv-row ">
                     <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                     <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
                  </div>
                  <div class="col-md-6">
                     <div class="fv-row">
                       <label class="d-block fw-bold fs-6 mb-5">User Profile</label>
                       <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url('restaurant/media/svg/avatars/blank.svg')">
                           <div class="image-input-wrapper w-125px h-125px"></div>
                           <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                               <i class="bi bi-pencil-fill fs-7"></i>
                               <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
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
<!-- edit user modal -->
<div class="modal fade" tabindex="-1" id="edit_user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Allocation</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <form action="" method="" class="form" id="kt_docs_formvalidation_text">
            <div class="modal-body">
               <div class="row">
                  <div class="mb-5">
                    <label class="d-block fw-bold fs-6 mb-2">User Profile</label>
                    <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url('restaurant/media/avatars/300-1.jpg')">
                        <div class="image-input-wrapper w-125px h-125px"></div>
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                        </label>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                    </div>
                  </div>
                  <div class="mb-8">
                     <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                           <span class="required">User Name</span>
                        </label>
                     <input type="text" class="form-control form-control-solid" name="" value="Franklin Sierra" required>
                  </div>
                  <div class="mb-8">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">Email</span>
                        </label>
                     <input type="email" class="form-control form-control-solid" name="" value="Franklin@gmail.com" required>
                  </div>
                  <div class="mb-8">
                     <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                           <span class="required">Mobile No</span>
                        </label>
                     <input type="tel" class="form-control form-control-solid" name="" value="8523 526 325" required>
                  </div>
                  <div class="mb-8">
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required">User Role</span>
                        </label>
                     <input type="text" class="form-control form-control-solid" name="" value="manager" required>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Change</button>
            </div>
         </form>
        </div>
    </div>
</div>
@endsection

@section('js')
   <script type="text/javascript">
      const button = document.getElementById('sweetalert');

      button.addEventListener('click', e =>{
          e.preventDefault();

          Swal.fire({
              html: `Want to delete?`,
              icon: "info",
              buttonsStyling: false,
              showCancelButton: true,
              confirmButtonText: "Ok, got it!",
              cancelButtonText: 'Nope, cancel it',
              customClass: {
                  confirmButton: "btn btn-primary",
                  cancelButton: 'btn btn-danger'
              }
          });
      });
   </script>
@endsection
