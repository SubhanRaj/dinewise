$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
    }
})

// function to destroy a chart 

function destroyChart(canvas_id) {
    let canvas = document.getElementById(canvas_id);
    let chartInstance = Chart.getChart(canvas);
    if (chartInstance) {
        chartInstance.destroy();
    }
}
// get color for labes and axis
let setColor
if (localStorage.getItem('theme') == 'dark-theme') {
    setColor = '#fff';
} else {
    setColor = "#000";
}

// booking chart started 
// booking chart started 


if (sessionStorage.getItem('booking_chart_year') !== null) {
    let year = sessionStorage.getItem('booking_chart_year');
    getBookingChart(year);
    $('#booking-chart').val(year)
} else {
    let date = new Date()
    let y = date.getFullYear();
    getBookingChart(y);
}

function getBookingChartOnClick(id) {
    let year = $('#' + id).val()
    sessionStorage.setItem('booking_chart_year', year)
    getBookingChart(year)
    destroyChart('booking-chart-canvas')
}

function getBookingChart(year) {

    let chart = document.getElementById('booking-chart-canvas')

    $.ajax({
        type: "POSt",
        url: "/admin/ajax-request",
        data: {
            isset_get_booking_chart: true,
            year: year
        },
        success: function (response) {

            let data = response['data']
            let nonCancelled = data['non-cancelled']
            let Cancelled = data['cancelled']
            let totalBooking = response['totalBooking']
            let totalNonCancelled = response['totalNonCancelled']
            let totalCancelled = response['totalCancelled']

            $("#booking-chart-total").text(totalBooking);
            $("#booking-chart-non-cancelled").text(totalNonCancelled);
            $("#booking-chart-cancelled").text(totalCancelled);

            var chart_canvas = document.getElementById("booking-chart-canvas").getContext('2d');
            var chart_canvas_gradientStroke1 = chart_canvas.createLinearGradient(0, 0, 0, 300);
            var chart_canvas_gradientStroke2 = chart_canvas.createLinearGradient(0, 0, 0, 300);
            var chart_canvas_BGgradientStroke1 = chart_canvas.createLinearGradient(0, 0, 0, 300);
            var chart_canvas_BGgradientStroke2 = chart_canvas.createLinearGradient(0, 0, 0, 300);


            chart_canvas_gradientStroke1.addColorStop(0, '#00ff55');
            chart_canvas_gradientStroke1.addColorStop(1, '#ffc107');
            chart_canvas_BGgradientStroke1.addColorStop(0, 'rgba(33, 125, 246, 0.216)');
            chart_canvas_BGgradientStroke1.addColorStop(1, 'rgba(71, 110, 161, 0.011)');

            chart_canvas_gradientStroke2.addColorStop(0, '#ff0000');
            chart_canvas_gradientStroke2.addColorStop(1, '#ff9999');
            chart_canvas_BGgradientStroke2.addColorStop(0, 'rgba(255, 77, 77, 0.216)');
            chart_canvas_BGgradientStroke2.addColorStop(1, 'rgba(255, 179, 179,0.011)');

            var booking_chart = new Chart(document.getElementById('booking-chart-canvas'), {
                type: 'line',
                data: {
                    labels: [
                        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
                        "Aug", "Sept", "Oct", "Nov", "Dec"
                    ],
                    datasets: [
                        {
                            label: 'Non-Cancelled',
                            // data: [70, 59, 80, 81, 65, 59, 80, 81, 59, 80, 81, 65],
                            data: nonCancelled,
                            borderColor: chart_canvas_gradientStroke1,
                            backgroundColor: chart_canvas_BGgradientStroke1,
                            pointBackgroundColor: chart_canvas_gradientStroke1,
                            pointHoverBackgroundColor: '#ffc107',
                        },
                        {
                            label: 'Cancelled',
                            // data: [56, 20, 75, 36, 40, 68, 33, 49, 64, 84, 62, 114],
                            data: Cancelled,
                            borderColor: chart_canvas_gradientStroke2,
                            backgroundColor: chart_canvas_BGgradientStroke2,
                            pointBackgroundColor: chart_canvas_gradientStroke2,
                            pointHoverBackgroundColor: '#ff9999',
                        }
                    ]
                },

                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            display: true,
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                pointStyle: 'circle',
                                color: setColor
                            },
                        },
                    },
                    tooltips: {
                        displayColors: false,
                    },
                    scales: {
                        y: {
                            ticks: {
                                color: setColor,

                            }
                        },
                        x: {
                            ticks: {
                                color: setColor,

                            }
                        }
                    },
                    borderJoinStyle: 'round',
                    borderCapStyle: 'round',
                    borderWidth: 2,
                    fill: true,
                    pointRadius: 4,
                    tension: .4,
                    pointHoverRadius: 8,
                }
            })

        }
    });
}

// booking chart ended
// booking chart ended 

// Order Chart Started 
// Order Chart Started 

if (sessionStorage.getItem('order_chart_year') !== null) {
    let year = sessionStorage.getItem('order_chart_year');
    getOrderChart(year);
    $('#order-chart').val(year)
} else {
    let date = new Date()
    let y = date.getFullYear();
    getOrderChart(y);
}

function getOrderChartOnClick(id) {
    let year = $('#' + id).val()
    sessionStorage.setItem('order_chart_year', year)
    getOrderChart(year)
    destroyChart('order-chart-canvas')
}

function getOrderChart(year) {

    let chart = document.getElementById('order-chart-canvas')

    $.ajax({
        type: "POSt",
        url: "/admin/ajax-request",
        data: {
            isset_get_order_chart: true,
            year: year
        },
        success: function (response) {

            let data = response['data']
            let nonCompleted = data['non-completed']
            let Completed = data['completed']
            let totalOrder = response['totalOrder']
            let totalNonCompleted = response['totalNonCompleted']
            let totalCompleted = response['totalCompleted']

            $("#order-chart-total").text(totalOrder);
            $("#order-chart-non-completed").text(totalNonCompleted);
            $("#order-chart-completed").text(totalCompleted);

            var chart_canvas = document.getElementById("order-chart-canvas").getContext('2d');
            var chart_canvas_gradientStroke1 = chart_canvas.createLinearGradient(0, 0, 0, 300);
            var chart_canvas_gradientStroke2 = chart_canvas.createLinearGradient(0, 0, 0, 300);
            var chart_canvas_BGgradientStroke1 = chart_canvas.createLinearGradient(0, 0, 0, 300);
            var chart_canvas_BGgradientStroke2 = chart_canvas.createLinearGradient(0, 0, 0, 300);


            chart_canvas_gradientStroke1.addColorStop(0, '#00ff55');
            chart_canvas_gradientStroke1.addColorStop(1, '#ffc107');
            chart_canvas_BGgradientStroke1.addColorStop(0, 'rgba(33, 125, 246, 0.216)');
            chart_canvas_BGgradientStroke1.addColorStop(1, 'rgba(71, 110, 161, 0.011)');

            chart_canvas_gradientStroke2.addColorStop(0, '#ff0000');
            chart_canvas_gradientStroke2.addColorStop(1, '#ff9999');
            chart_canvas_BGgradientStroke2.addColorStop(0, 'rgba(255, 77, 77, 0.216)');
            chart_canvas_BGgradientStroke2.addColorStop(1, 'rgba(255, 179, 179,0.011)');

            var booking_chart = new Chart(document.getElementById('order-chart-canvas'), {
                type: 'line',
                data: {
                    labels: [
                        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
                        "Aug", "Sept", "Oct", "Nov", "Dec"
                    ],
                    datasets: [
                        {
                            label: 'Non-Completed',
                            // data: [70, 59, 80, 81, 65, 59, 80, 81, 59, 80, 81, 65],
                            data: nonCompleted,
                            borderColor: chart_canvas_gradientStroke1,
                            backgroundColor: chart_canvas_BGgradientStroke1,
                            pointBackgroundColor: chart_canvas_gradientStroke1,
                            pointHoverBackgroundColor: '#ffc107',
                        },
                        {
                            label: 'Completed',
                            // data: [56, 20, 75, 36, 40, 68, 33, 49, 64, 84, 62, 114],
                            data: Completed,
                            borderColor: chart_canvas_gradientStroke2,
                            backgroundColor: chart_canvas_BGgradientStroke2,
                            pointBackgroundColor: chart_canvas_gradientStroke2,
                            pointHoverBackgroundColor: '#ff9999',
                        }
                    ]
                },

                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            display: true,
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                pointStyle: 'circle',
                                color: setColor
                            },
                        },
                    },
                    tooltips: {
                        displayColors: false,
                    },
                    scales: {
                        y: {
                            ticks: {
                                color: setColor,

                            }
                        },
                        x: {
                            ticks: {
                                color: setColor,

                            }
                        }
                    },
                    borderJoinStyle: 'round',
                    borderCapStyle: 'round',
                    borderWidth: 2,
                    fill: true,
                    pointRadius: 4,
                    tension: .4,
                    pointHoverRadius: 8,
                }
            })

        }
    });
}

// Order Chart Started
// Order Chart Started 

