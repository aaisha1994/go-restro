<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Recover Password | GoRestro</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="GoRestro" name="description" />
      <meta content="GoRestro" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
      <!-- Bootstrap Css -->
      <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
   </head>
   <body class="auth-body-bg">
      <div>
         <div class="container-fluid p-0">
            <div class="row g-0">
               <div class="col-lg-5">
                  <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                     <div class="w-100">
                        <div class="row justify-content-center">
                           <div class="col-lg-9">
                              <div>
                                 <div class="text-center">
                                    <div>
                                       <a href="#" class="">
                                       <img src="{{asset('assets/images/logo-sm-dark.png')}}" alt="" height="100" class="auth-logo logo-dark mx-auto">
                                       <img src="{{asset('assets/images/logo-sm-dark.png')}}" alt="" height="100" class="auth-logo logo-light mx-auto">
                                       </a>
                                    </div>
                                    <h4 class="font-size-18 mt-4">Reset Password</h4>
                                    <p class="text-muted">Reset your password to <span class="fw-bold">GoRestro.</span>.</p>
                                 </div>
                                 <div class="p-2 mt-5">
                                    <div class="alert alert-success mb-4" role="alert">
                                       Enter your Email and instructions will be sent to you!
                                    </div>
                                    <form action="" class="needs-validation" novalidate>
                                       <div class="auth-form-group-custom mb-4">
                                          <i class="ri-mail-line auti-custom-input-icon"></i>
                                          <label for="useremail">Email</label>
                                          <input type="email" class="form-control" id="useremail" placeholder="Enter email" required>
                                          <div class="invalid-feedback">
                                             Please provide a valid Email.
                                         </div>
                                       </div>
                                       <div class="mt-4 text-center">
                                          <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="mt-5 text-center">
                                    <p>Don't have an account ? <a href="{{Route('login')}}" class="fw-medium text-primary"> Log in </a> </p>
                                    <p>
                                       © <script>document.write(new Date().getFullYear())</script> GoRestro. Crafted with <i class="mdi mdi-heart text-danger"></i> by Arrowmuse
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-7">
                  <div class="authentication-bg">
                     <div class="bg-overlay"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- JAVASCRIPT -->
      <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
      <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
      <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
      <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
      <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
      <script src="{{asset('assets/js/app.js')}}"></script>
   </body>
</html>
