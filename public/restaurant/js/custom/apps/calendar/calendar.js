"use strict";
var KTAppCalendar = function () {
    var e, t, n, a, o, r, l, s, m, v, f, p, y, D, _, b, k, g, S, Y, h, T, M, w, E, L, x = {
        id: "",
        eventName: "",
        eventDescription: "",
        eventLocation: "",
        startDate: "",
        endDate: "",
        allDay: !1
    },
        B = !1;
    const q = e => {
        C();
        const n = x.allDay ? moment(x.startDate).format("Do MMM, YYYY") : moment(x.startDate).format("Do MMM, YYYY - h:mm a"),
            a = x.allDay ? moment(x.endDate).format("Do MMM, YYYY") : moment(x.endDate).format("Do MMM, YYYY - h:mm a");
        var o = {
            container: "body",
            trigger: "manual",
            boundary: "window",
            placement: "auto",
            dismiss: !0,
            html: !0,
            title: "Event Summary",
            content: '<div class="fw-bolder mb-2">' + x.eventName + '</div><div class="fs-7"><span class="fw-bold">Start:</span> ' + n + '</div><div class="fs-7 mb-4"><span class="fw-bold">End:</span> ' + a + '</div><div id="kt_calendar_event_view_button" type="button" class="btn btn-sm btn-light-primary">View More</div>'
        };
        (t = KTApp.initBootstrapPopover(e, o)).show(), B = !0, F()
    },
        C = () => {
            B && (t.dispose(), B = !1)
        },

        A = () => {
            var e, t, n;
            w.show(), x.allDay ? (e = "All Day", t = moment(x.startDate).format("Do MMM, YYYY"), n = moment(x.endDate).format("Do MMM, YYYY")) : (e = "", t = moment(x.startDate).format("Do MMM, YYYY - h:mm a"), n = moment(x.endDate).format("Do MMM, YYYY - h:mm a")), g.innerText = x.eventName, S.innerText = e, Y.innerText = x.eventDescription ? x.eventDescription : "--", h.value = x.eventLocation, T.innerText = t
        },
        F = () => {
            document.querySelector("#kt_calendar_event_view_button").addEventListener("click", (e => {
                e.preventDefault(), C(), A()
            }))
        },
        P = e => {
            x.id = e.id, x.eventName = e.title, x.eventDescription = e.description, x.eventLocation = e.location, x.startDate = e.startStr, x.endDate = e.endStr, x.allDay = e.allDay
        }
    return {
        init: function () {
            const t = document.getElementById("kt_modal_add_event");
            p = t.querySelector("#kt_modal_add_event_form"), n = p.querySelector('[name="calendar_event_name"]'), a = p.querySelector('[name="calendar_event_description"]'), o = p.querySelector('[name="calendar_event_location"]'), r = p.querySelector("#kt_calendar_datepicker_start_date"), l = p.querySelector("#kt_calendar_datepicker_end_date"), s = p.querySelector("#kt_calendar_datepicker_start_time"), m = p.querySelector("#kt_calendar_datepicker_end_time"), D = document.querySelector('[data-kt-calendar="add"]'), _ = p.querySelector("#kt_modal_add_event_submit"), b = p.querySelector("#kt_modal_add_event_cancel"), k = t.querySelector("#kt_modal_add_event_close"), f = p.querySelector('[data-kt-calendar="title"]'), v = new bootstrap.Modal(t);
            const B = document.getElementById("kt_modal_view_event");
            var F, O, I, R, G, K;
            w = new bootstrap.Modal(B), g = B.querySelector('[data-kt-calendar="event_name"]'), S = B.querySelector('[data-kt-calendar="all_day"]'), Y = B.querySelector('[data-kt-calendar="event_description"]'), h = B.querySelector('[data-kt-calendar="event_location"]'), T = B.querySelector('[data-kt-calendar="event_start_date"]'), M = B.querySelector('[data-kt-calendar="event_end_date"]'), E = B.querySelector("#kt_modal_view_event_edit"), L = B.querySelector("#kt_modal_view_event_delete"), F = document.getElementById("kt_calendar_app"), O = moment().startOf("day"), I = O.format("YYYY-MM"), R = O.clone().subtract(1, "day").format("YYYY-MM-DD"), G = O.format("YYYY-MM-DD"), K = O.clone().add(1, "day").format("YYYY-MM-DD"), (e = new FullCalendar.Calendar(F, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay"
                },
                initialDate: G,
                navLinks: !0,
                selectable: !0,
                selectMirror: !0,
                eventClick: function (e) {
                    C(), P({
                        id: e.event.id,
                        title: e.event.title,
                        description: e.event.extendedProps.description,
                        location: e.event.id,
                        startStr: e.event.startStr,
                        endStr: e.event.startStr,
                        allDay: e.event.allDay
                    }), A()
                },
                eventMouseEnter: function (e) {
                    P({
                        id: e.event.id,
                        title: e.event.title,
                        description: e.event.extendedProps.description,
                        location: e.event.id,
                        startStr: e.event.startStr,
                        endStr: e.event.startStr,
                        allDay: e.event.allDay
                    }), q(e.el)
                },
                editable: !0,
                dayMaxEvents: !0,
                events: JSON.parse($('#calanderdata').val()),
                datesSet: function () {
                    C()
                }
            })).render(), (e => {
                e.addEventListener("hidden.bs.modal", (e => {
                    y && y.resetForm(!0)
                }))
            })(t)
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTAppCalendar.init()
}));
