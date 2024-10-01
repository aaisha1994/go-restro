"use strict";
var KTModalNewTarget = function () {
    var modal, form, submitButton, cancelButton, formValidator;

    return {
        init: function () {
            // Get references to modal and form elements
            modal = document.querySelector("#kt_modal_new_target");
            form = document.getElementById("kt_modal_new_target_form");
            submitButton = document.getElementById("kt_modal_new_target_submit");
            cancelButton = document.querySelector("[data-bs-dismiss='modal']");

            // Initialize FormValidation
            formValidator = FormValidation.formValidation(form, {
                fields: {
                    approx_price_person: {
                        validators: {
                            notEmpty: {
                                message: "Approx Price Person is required"
                            }
                        }
                    },
                    food_category: {
                        validators: {
                            notEmpty: {
                                message: "Food Category is required"
                            }
                        }
                    },
                    facilities: {
                        validators: {
                            notEmpty: {
                                message: "Facilities are required"
                            }
                        }
                    }
                    // Add validators for other fields as needed
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            // Submit button click event
            submitButton.addEventListener("click", function (event) {
               
            event.preventDefault(); // Prevent default form submission
                // Validate the form
                formValidator.validate().then(function (status) {
                    if (status === "Valid") {
                        // If form is valid, show success message and reset form
                        Swal.fire({
                            text: "Form has been successfully submitted!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function () {
                            form.reset();
                            modal.hide();
                        });
                    } else {
                        // If form is invalid, show error message
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            });

            // Cancel button click event
            cancelButton.addEventListener("click", function (event) {
                event.preventDefault(); // Prevent default action
                // Show confirmation message before closing the modal
                Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.reset(); // Reset form on cancellation
                        modal.hide(); // Hide modal
                    }
                });
            });
        }
    };
}();

// Initialize the modal functionality on DOMContentLoaded
KTUtil.onDOMContentLoaded(function () {
    KTModalNewTarget.init();
});