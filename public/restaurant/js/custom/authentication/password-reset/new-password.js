"use strict";
var KTPasswordResetGeneral = function() {
    var t, e, i;
    return {
        init: function() {
            t = document.querySelector("#kt_password_reset_form"), e = document.querySelector("#kt_password_reset_submit"), i = FormValidation.formValidation(t, {
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
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), e.addEventListener("click", (function(o) {
                o.preventDefault(), i.validate().then((function(i) {
                    "Valid" == i ? (e.setAttribute("data-kt-indicator", "on"), e.disabled = !0,
                    // setTimeout((function() {
                    //     e.removeAttribute("data-kt-indicator"), e.disabled = !1, Swal.fire({
                    //         text: "You have successfully logged in!",
                    //         icon: "success",
                    //         buttonsStyling: !1,
                    //         confirmButtonText: "Ok, got it!",
                    //         customClass: {
                    //             confirmButton: "btn btn-primary"
                    //         }
                    //     }).then((function(e) {
                    //         e.isConfirmed && (t.querySelector('[name="email"]').value = "")
                    //     }))
                    // }), 1500))
                    axios.post(t.closest("form").getAttribute("action"), new FormData(t))
                    .then(function (e) {
                        Swal.fire({
                            text: "You have successfully Send email !",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn font-weight-bold btn-light-primary" },
                        }).then(function (e) {
                            e.isConfirmed && (location.href = $(".returnlogin").attr("href"))
                        });
                    })
                    .catch(function (e) {
                        let t = e.response.data.error.error_message,
                        r = e.response.data.errors;
                        for (const e in r) r.hasOwnProperty(e) && (t += "\r\n" + r[e]);
                        e.response && Swal.fire({ text: t, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                    })
                    .then(function () {
                        e.removeAttribute("data-kt-indicator"), (e.disabled = !1);
                        t.isConfirmed && (t.querySelector('[name="email"]').value = "")
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
KTUtil.onDOMContentLoaded((function() {
    KTPasswordResetGeneral.init()
}));
