@extends('master_admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <form action="" method="" class="needs-validation" novalidate>
            <div class="row">
                <div class="col">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-md-0">Edit Restaurant</h4>
                        <div class=" ">
                            <div class="d-grid gap-2 d-flex justify-content-end">
                                <a href="{{Route('restros-list')}}" type="button" class="btn btn-sm btn-primary">Back</a>
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
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="restaurant-name">Restaurant Name *</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="contact-person">Contact person Name *</label>
                                    <input type="text" class="form-control" id="contact-person" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="email-address">Email Address *</label>
                                    <input type="email" class="form-control" id="email-address" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="phone">Contact No. *</label>
                                    <input type="tel" class="form-control" id="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="alternate-contact">Alternate contact no *</label>
                                     <input type="tel" class="form-control" id="alternate-contact" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                                  <div class="col-md-4 mb-4">
                                    <label class="form-label" for="alternate-contact">Approx price for person *</label>
                                    <input type="number" class="form-control" id="zip-code" pattern="[0-9]*" inputmode="numeric" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label for="form-label" class="form-label">State *</label>
                                    <select class="form-select" title="State" required>
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="billing-city">City *</label>
                                    <input type="text" class="form-control" id="billing-city" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="zip-code">Zip / Postal code *</label>
                                    <input type="number" class="form-control" id="zip-code" pattern="[0-9]*" inputmode="numeric" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="image">Restaurant Logo *</label>
                                    <input class="form-control" name="Restaurant_logo" id="image" type="file" required>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Food Category</label>
                                    <select class="select2 form-control select2-multiple"
                                        multiple="multiple" data-placeholder="Choose Food Category...">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Facility Select</label>
                                    <select class="select2 form-control select2-multiple"
                                        multiple="multiple" data-placeholder="Choose ...">
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <img id="showImage" class="rounded avatar-lg mt-3" src="{{ url('upload/no_image.jpg') }}" alt="Restaurant Logo">
                                </div>
                                <div class="col mt-4">
                                        <label class="form-label">Meal preference</label>
                                        <div>
                                            <input type="checkbox" class="form-check-input" name="vag">
                                            <label class="form-check-label me-4" for="formCheck1">Veg </label>
                                            <input type="checkbox" class="form-check-input" name="nonvag">
                                            <label class="form-check-label me-4" for="formCheck1">Non-Veg</label>
                                            <input type="checkbox" class="form-check-input" name="vegans">
                                            <label class="form-check-label" for="formCheck1">Vegans </label>
                                        </div>
                                    </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label" for="billing-address">Address</label>
                                    <textarea class="form-control" id="billing-address" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.201586512519!2d72.75493232464707!3d21.144374433798756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04d80f5d96493%3A0x5f79790a213bd724!2sLuxuria%20Business%20Hub!5e0!3m2!1sen!2sin!4v1708678149943!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
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
