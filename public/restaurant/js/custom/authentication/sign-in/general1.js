"use strict";
var KTSignupGeneral = function () {
    var e, t, a, s, r = function () {
        return 100 === s.getScore()
    };
    return {
        init: function () {
            e = document.querySelector("#kt_sign_in_form"), t = document.querySelector("#kt_sign_in_submit"), s = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]')), a = FormValidation.formValidation(e, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            }), t.addEventListener("click", (function (r) {
                r.preventDefault(), a.validate().then((function (a) {
                    "Valid" == a ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0,
                    // setTimeout((function () {
                    //     t.removeAttribute("data-kt-indicator"), t.disabled = !1, Swal.fire({
                    //         text: "You have successfully Registration!",
                    //         icon: "success",
                    //         buttonsStyling: !1,
                    //         confirmButtonText: "Ok, got it!",
                    //         customClass: {
                    //             confirmButton: "btn btn-primary"
                    //         }
                    //     }).then((function (t) {
                    //         t.isConfirmed && (location.href = 'restaurant-dashboard')
                    //     }))
                    // }), 1500))
                    axios.post(t.closest("form").getAttribute("action"), new FormData(e))
                    .then(function (t) {
                        console.log(t);
                        Swal.fire({
                            text: "You have successfully Login!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn font-weight-bold btn-light-primary" },
                        }).then(function (t) {
                            t.isConfirmed && (location.href = '/affiliate/dashboard')
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
                     : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTSignupGeneral.init()
}));
