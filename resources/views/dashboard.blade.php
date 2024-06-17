@extends('layouts.main_adminkit')

@section('content')
    <div class="container-fluid p-0">

        {{-- <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Chart.js</h1>
            <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                Get more chart examples
            </a>
        </div> --}}
        <div class="row">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Kendaraan</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $vehicle->total }}</h1>
                            <div class="mb-0">
                                {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                <span class="text-muted">Since last week</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Pegawai</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $user->total }}</h1>
                            <div class="mb-0">
                                {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                <span class="text-muted">Since last week</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title">Grafik Pemakaian Kendaraan</h5>
                            <h6 class="card-subtitle text-muted">@bulan.</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chartjs-line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Bar Chart</h5>
                        <h6 class="card-subtitle text-muted">A bar chart provides a way of showing data values represented
                            as vertical bars.</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chartjs-bar"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Doughnut Chart</h5>
                        <h6 class="card-subtitle text-muted">Doughnut charts are excellent at showing the relational
                            proportions between data.</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-doughnut"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Pie Chart</h5>
                        <h6 class="card-subtitle text-muted">Pie charts are excellent at showing the relational proportions
                            between data.</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart chart-sm">
                            <canvas id="chartjs-pie"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/chart')
                .then(response => response.json())
                .then(data => {
                    new Chart(document.getElementById("chartjs-line"), {
                        type: "line",
                        data: {
                            labels: data.labelsTransaction,

                            datasets: [{
                                label: "Total",
                                fill: true,
                                backgroundColor: "transparent",
                                borderColor: window.theme.primary,
                                data: data.valuesTransaction
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                intersect: false
                            },
                            hover: {
                                intersect: true
                            },
                            plugins: {
                                filler: {
                                    propagate: false
                                }
                            },
                            scales: {
                                xAxes: [{
                                    reverse: true,
                                    gridLines: {
                                        color: "rgba(0,0,0,0.05)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        stepSize: 10
                                    },
                                    display: true,
                                    borderDash: [5, 5],
                                    gridLines: {
                                        color: "rgba(0,0,0,0)",
                                        fontColor: "#fff"
                                    }
                                }]
                            }
                        }
                    });
                });
            // Line chart
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    datasets: [{
                        label: "Last year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }, {
                        label: "This year",
                        backgroundColor: "#dee2e6",
                        borderColor: "#dee2e6",
                        hoverBackgroundColor: "#dee2e6",
                        hoverBorderColor: "#dee2e6",
                        data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Doughnut chart
            new Chart(document.getElementById("chartjs-doughnut"), {
                type: "doughnut",
                data: {
                    labels: ["Social", "Search Engines", "Direct", "Other"],
                    datasets: [{
                        data: [260, 125, 54, 146],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.success,
                            window.theme.warning,
                            "#dee2e6"
                        ],
                        borderColor: "transparent"
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutoutPercentage: 65,
                    legend: {
                        display: false
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-pie"), {
                type: "pie",
                data: {
                    labels: ["Social", "Search Engines", "Direct", "Other"],
                    datasets: [{
                        data: [260, 125, 54, 146],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger,
                            "#dee2e6"
                        ],
                        borderColor: "transparent"
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Radar chart
            new Chart(document.getElementById("chartjs-radar"), {
                type: "radar",
                data: {
                    labels: ["Speed", "Reliability", "Comfort", "Safety", "Efficiency"],
                    datasets: [{
                        label: "Model X",
                        backgroundColor: "rgba(0, 123, 255, 0.2)",
                        borderColor: window.theme.primary,
                        pointBackgroundColor: window.theme.primary,
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: window.theme.primary,
                        data: [70, 53, 82, 60, 33]
                    }, {
                        label: "Model S",
                        backgroundColor: "rgba(220, 53, 69, 0.2)",
                        borderColor: window.theme.danger,
                        pointBackgroundColor: window.theme.danger,
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: window.theme.danger,
                        data: [35, 38, 65, 85, 84]
                    }]
                },
                options: {
                    maintainAspectRatio: false
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Polar Area chart
            new Chart(document.getElementById("chartjs-polar-area"), {
                type: "polarArea",
                data: {
                    labels: ["Speed", "Reliability", "Comfort", "Safety", "Efficiency"],
                    datasets: [{
                        label: "Model S",
                        data: [35, 38, 65, 70, 24],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.success,
                            window.theme.danger,
                            window.theme.warning,
                            window.theme.info
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false
                }
            });
        });
    </script>
@endsection