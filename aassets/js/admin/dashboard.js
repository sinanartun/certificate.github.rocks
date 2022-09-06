"use strict";
const KTDashboard = function () {


    let e = function (e, a, t, i) {
        if (0 !== e.length) {
            let n = {
                type: "line",
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                    datasets: [{
                        label: "",
                        borderColor: t,
                        borderWidth: i,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 12,
                        pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                        pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                        pointHoverBackgroundColor: KTApp.getStateColor("danger"),
                        pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                        fill: !1,
                        data: a
                    }]
                },
                options: {
                    title: {display: !1},
                    tooltips: {enabled: !1, intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10},
                    legend: {display: !1, labels: {usePointStyle: !1}},
                    responsive: !0,
                    maintainAspectRatio: !0,
                    hover: {mode: "index"},
                    scales: {xAxes: [{display: !1, gridLines: !1, scaleLabel: {display: !0, labelString: "Month"}}], yAxes: [{display: !1, gridLines: !1, scaleLabel: {display: !0, labelString: "Value"}, ticks: {beginAtZero: !0}}]},
                    elements: {point: {radius: 4, borderWidth: 12}},
                    layout: {padding: {left: 0, right: 10, top: 5, bottom: 0}}
                }
            };
            return new Chart(e, n)
        }
    };


    return {
        init: function () {

            !function () {
                let e = KTUtil.getByID("kt_chart_daily_sales");
                if (e) {
                    let a = {
                        labels: ["1. Gün", "2. Gün", "3. Gün", "4. Gün", "5. Gün", "6. Gün", "7. Gün", "8. Gün", "9. Gün", "10. Gün", "11. Gün", "12. Gün", "13. Gün", "14. Gün", "15. Gün", "16. Gün", "17. Gün", "18. Gün", "19. Gün", "20. Gün", "21. Gün", "22. Gün", "23. Gün", "24. Gün", "25. Gün", "26. Gün", "27. Gün", "28. Gün", "29. Gün", "30. Gün"],
                        datasets: [{backgroundColor: KTApp.getStateColor("success"), data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30]}, {backgroundColor: "#f3f3fb", data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16,                         17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30]}]
                    };
                    new Chart(e, {
                        type: "bar",
                        data: a,
                        options: {
                            title: {display: !1},
                            tooltips: {
                                intersect: !1,
                                titleFontSize: 12,
                                titleFontFamily: 'Poppins,Helvetica,sans-serif',
                                titleFontStyle: 'Bold',
                                bodyFontSize: 12,
                                bodyFontFamily: 'Poppins,Helvetica,sans-serif',
                                bodyFontStyle: 'normal',
                                mode: "nearest",
                                xPadding: 10,
                                yPadding: 10,
                                caretPadding: 10
                            },
                            legend: {display: !1},
                            responsive: !0,
                            maintainAspectRatio: !1,
                            barRadius: 4,
                            scales: {xAxes: [{display: !1, gridLines: !1, stacked: !0}], yAxes: [{display: !1, stacked: !0, gridLines: !1}]},
                            layout: {padding: {left: 0, right: 0, top: 0, bottom: 0}}
                        }
                    })
                }
            }(),


                function () {
                    if (0 !== $("#kt_chart_latest_trends_map").length) try {
                        new GMaps({div: "#kt_chart_latest_trends_map", lat: 59.334591, lng: 18.063240})
                    } catch (e) {
                        console.log(e)
                    }
                }(),


            0 !== $("#kt_chart_revenue_change").length && Morris.Donut({
                element: "kt_chart_revenue_change",
                data: [{label: "New York", value: 10}, {label: "London", value: 7}, {label: "Paris", value: 20}],
                colors: [KTApp.getStateColor("success"), KTApp.getStateColor("danger"), KTApp.getStateColor("brand")]
            }),


            0 !== $("#kt_chart_support_tickets").length && Morris.Donut({
                element: "kt_chart_support_tickets",
                data: [
                    {
                        label: "takipli",
                        value: 70

                    }, {
                        label: "gir/çık",
                        value: 20
                    }, {
                        label: "anlık",
                        value: 10
                    }],
                labelColor: "#a7a7c2",
                colors: [KTApp.getStateColor("success"), KTApp.getStateColor("brand"), KTApp.getStateColor("danger")]
            }),

                function () {
                    let e = KTUtil.getByID("kt_chart_order_statistics");
                    if (e) {
                        let a = Chart.helpers.color, t = {
                            labels: ["1 Şubat", "2 Şubat", "3 Şubat", "4 Şubat", "5 Şubat", "6 Şubat", "7 Şubat"],
                            datasets: [{
                                fill: !0,
                                backgroundColor: a(KTApp.getStateColor("brand")).alpha(.6).rgbString(),
                                borderColor: a(KTApp.getStateColor("brand")).alpha(0).rgbString(),
                                pointHoverRadius: 4,
                                pointHoverBorderWidth: 12,
                                pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                pointHoverBackgroundColor: KTApp.getStateColor("brand"),
                                pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                                data: [20, 30, 20, 40, 30, 60, 30]
                            }, {
                                fill: !0,
                                backgroundColor: a(KTApp.getStateColor("brand")).alpha(.2).rgbString(),
                                borderColor: a(KTApp.getStateColor("brand")).alpha(0).rgbString(),
                                pointHoverRadius: 4,
                                pointHoverBorderWidth: 12,
                                pointBackgroundColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                pointBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
                                pointHoverBackgroundColor: KTApp.getStateColor("brand"),
                                pointHoverBorderColor: Chart.helpers.color("#000000").alpha(.1).rgbString(),
                                data: [15, 40, 15, 30, 40, 30, 50]
                            }]
                        }, i = e.getContext("2d");
                        new Chart(i, {
                            type: "line", data: t, options: {
                                responsive: !0,
                                maintainAspectRatio: !1,
                                legend: !1,
                                scales: {
                                    xAxes: [{categoryPercentage: .35, barPercentage: .7, display: !0, scaleLabel: {display: !1, labelString: "Month"}, gridLines: !1, ticks: {display: !0, beginAtZero: !0, fontColor: '#82848d', fontFamily: 'Poppins,Helvetica,sans-serif', fontSize: 13, padding: 10}}],
                                    // xAxes: [{categoryPercentage: .35, barPercentage: .7, display: !0, scaleLabel: {display: !1, labelString: "Month"}, gridLines: !1, ticks: {display: !0, beginAtZero: !0, fontColor: KTApp.getBaseColor("shape", 3), fontSize: 13, padding: 10}}],
                                    yAxes: [{
                                        categoryPercentage: .35,
                                        barPercentage: .7,
                                        display: !0,
                                        scaleLabel: {display: !1, labelString: "Value"},
                                        gridLines: {color: KTApp.getBaseColor("shape", 2), drawBorder: !1, offsetGridLines: !1, drawTicks: !1, borderDash: [3, 4], zeroLineWidth: 1, zeroLineColor: KTApp.getBaseColor("shape", 2), zeroLineBorderDash: [3, 4]},
                                        ticks: {max: 70, stepSize: 10, display: !0, beginAtZero: !0, fontColor: '#82848d', fontFamily: 'Poppins,Helvetica,sans-serif', fontSize: 13, padding: 10}
                                        // ticks: {max: 70, stepSize: 10, display: !0, beginAtZero: !0, fontColor: 'KTApp.getBaseColor("shape", 3)', fontSize: 13, padding: 10}
                                    }]
                                },
                                title: {display: !1},
                                hover: {mode: "index"},
                                tooltips: {
                                    titleFontSize: 12,
                                    titleFontFamily: 'Poppins,Helvetica,sans-serif',
                                    titleFontStyle: 'Bold',
                                    bodyFontSize: 12,
                                    bodyFontFamily: 'Poppins,Helvetica,sans-serif',
                                    bodyFontStyle: 'normal',
                                    enabled: !0,
                                    intersect: !1,
                                    mode: "nearest",
                                    bodySpacing: 5,
                                    yPadding: 10,
                                    xPadding: 10,
                                    caretPadding: 0,
                                    displayColors: !1,
                                    backgroundColor: KTApp.getStateColor("brand"),
                                    titleFontColor: "#ffffff",
                                    ornerRadius: 4,
                                    footerSpacing: 0,
                                    titleSpacing: 0
                                },
                                layout: {padding: {left: 0, right: 0, top: 5, bottom: 5}},
                            }
                        })
                    }
                }()


        }
    }
}();
jQuery(document).ready(function () {
    KTDashboard.init()
});
//# sourceMappingURL=dashboard.js.map
