"use strict";
var KTSignupGeneral = function () {
    var e, t, a, s, r = function () {
        return 100 === s.getScore()
    };
    return {
        init: function () {
            e = document.querySelector("#kt_sign_up_form"), t = document.querySelector("#kt_sign_up_submit"), s = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]')), a = FormValidation.formValidation(e, {
                fields: {
                    "first_name": {
                        validators: {
                            notEmpty: {
                                message: "First Name is required"
                            }
                        }
                    },
                    "last_name": {
                        validators: {
                            notEmpty: {
                                message: "Last Name is required"
                            },
                            stringLength: {
                                max: 10,
                                message: "The mobile must be less than 10 characters long"
                            }
                        }
                    },
                    "mobile": {
                        validators: {
                            notEmpty: {
                                message: "Mobile No is required"
                            }
                        }
                    },
                    "affiliate_type": {
                        validators: {
                            notEmpty: {
                                message: "Affiliate Type is required"
                            }
                        }
                    },
                    "email": {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    "address": {
                        validators: {
                            notEmpty: {
                                message: "Address is required"
                            }
                        }
                    },
                    "state_id": {
                        validators: {
                            notEmpty: {
                                message: "State is required"
                            }
                        }
                    },
                    "city": {
                        validators: {
                            notEmpty: {
                                message: "City is required"
                            }
                        }
                    },
                    "zip_code": {
                        validators: {
                            notEmpty: {
                                message: "Zip Code is required"
                            }
                        }
                    },
                    "password": {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            },
                            stringLength: {
                                min: 8,
                                message: "Password must be at least 8 characters long"
                            }
                            // callback: {
                            //     message: "Please enter valid password",
                            //     callback: function (e) {
                            //         if (e.value.length > 0) return r()
                            //     }
                            // }
                        }
                    },
                    "confirm_password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function () {
                                    return e.querySelector('[name="password"]').value
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    },
                    toc: {
                        validators: {
                            notEmpty: {
                                message: "You must accept the terms and conditions"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: !1
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function (r) {
                r.preventDefault(), a.revalidateField("password"), a.validate().then((function (a) {
                    "Valid" == a ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0,
                    axios.post(t.closest("form").getAttribute("action"), new FormData(e))
                    .then(function (t) {
                        Swal.fire({
                            text: "You have successfully Registration!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn font-weight-bold btn-light-primary" },
                        }).then(function (t) {
                            t.isConfirmed && (location.href = '/affiliate/login')
                        });
                    })
                    .catch(function (e) {
                        let t = e.response.data.error.error_message,
                        r = e.response.data.errors;
                        for (const e in r) r.hasOwnProperty(e) && (t += "\r\n" + r[e]);
                        e.response && Swal.fire({ text: t, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                    })
                    .then(function () {
                        t.removeAttribute("data-kt-indicator"), (t.disabled = !1);
                    }))
                     :
                    //  Swal.fire({
                    //     text: "Sorry, looks like there are some errors detected, please try again.",
                    //     icon: "error",
                    //     buttonsStyling: !1,
                    //     confirmButtonText: "Ok, got it!",
                    //     customClass: {
                    //         confirmButton: "btn btn-primary"
                    //     }
                    // })
                    ''
                }))
            })), e.querySelector('input[name="password"]').addEventListener("input", (function () {
                this.value.length > 0 && a.updateFieldStatus("password", "NotValidated")
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTSignupGeneral.init()
}));
