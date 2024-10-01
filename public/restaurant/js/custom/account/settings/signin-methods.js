"use strict";
var KTAccountSettingsSigninMethods = {
   init: function () {
      var e = document.getElementById("kt_signin_change_password");
      var passwordValidator = FormValidation.formValidation(e, {
         fields: {
             currentpassword: {
                  validators: {
                      notEmpty: {
                          message: "Current Password is required"
                      }
                  }
              },
              newpassword: {
                  validators: {
                      notEmpty: {
                          message: "New Password is required"
                      },
                      stringLength: {
                          min: 8,
                          message: "Password must be at least 8 characters long"
                      }
                  }
              },
              confirmpassword: {
                  validators: {
                      notEmpty: {
                          message: "Confirm Password is required"
                      },
                      identical: {
                          compare: function() {
                              return passwordForm.querySelector('[name="newpassword"]').value;
                          },
                          message: "The password and its confirm are not the same"
                      }
                  }
              }
          },
         plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
               rowSelector: ".fv-row"
            })
         }
      });

      // Handle form submission
      document.querySelector("#kt_password_submit").addEventListener("click", function (event) {
         event.preventDefault(); // Prevent default form submission

         // Validate the form
         passwordValidator.validate().then(function (status) {
            if (status === "Valid") {
               // Form is valid, display success message and reset form
               swal.fire({
                  text: "Sent password reset. Please check your email",
                  icon: "success",
                  buttonsStyling: false,
                  confirmButtonText: "Ok, got it!",
                  customClass: {
                     confirmButton: "btn font-weight-bold btn-light-primary"
                  }
               }).then(function () {
                  e.reset(); // Reset form
                  passwordValidator.resetForm(); // Reset FormValidation instance
               });
            } else {
               // Form is invalid, display error message
               swal.fire({
                  text: "Sorry, looks like there are some errors detected, please try again.",
                  icon: "error",
                  buttonsStyling: false,
                  confirmButtonText: "Ok, got it!",
                  customClass: {
                     confirmButton: "btn font-weight-bold btn-light-primary"
                  }
               });
            }
         });
      });
   }
};

// Initialize KTAccountSettingsSigninMethods on DOMContentLoaded event
KTUtil.onDOMContentLoaded(function () {
   KTAccountSettingsSigninMethods.init();
});
