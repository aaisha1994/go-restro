var options = {
    series: [{
        name: "2020",
        type: "column",
        data: $('#week1').val()
    }, {
        name: "2019",
        type: "line",
        data: $('#Month1').val()
    }],
    chart: {
        height: 280,
        type: "line",
        toolbar: {
            show: !1
        }
    },
    stroke: {
        width: [0, 3],
        curve: "smooth"
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "20%"
        }
    },
    dataLabels: {
        enabled: !1
    },
    legend: {
        show: !1
    },
    colors: ["#5664d2", "#1cbb8c"],
    labels: $('#week').val().split(",")
},
chart = new ApexCharts(document.querySelector("#line-column-chart"), options).render();
