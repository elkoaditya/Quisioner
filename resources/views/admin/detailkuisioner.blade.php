@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')

@endsection
{{--untuk JS--}}
@section('js')
    <script src="../../../app-assets/vendors/chartjs/chart.min.js"></script>
    <script>
        $(window).on("load", function() {
            var ctx = $("#line-chart");
            var config = {
                type: "radar",
                options: chartOptions,

                data: chartData
            };
            var radarChart = new Chart(ctx, config);
            var ctx = $("#polar-chart");
            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration: 500,
                legend: {
                    position: "top"
                },
                title: {
                    display: false,
                    text: "Chart.js Polar Area Chart"
                },
                scale: {
                    ticks: {
                        beginAtZero: true
                    },
                    reverse: false
                },
                animation: {
                    animateRotate: true
                }
            };

            // Chart Data
            var chartData = {
                labels: [
                    @php
                        foreach ($pil as $p){
    echo "'".$p."',";
}
                    @endphp
                ],
                datasets: [
                    {
                        data: [
                            @php
                                foreach ($answer as $p){
            echo $p.',';
        }
                            @endphp
                        ],
                        backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"],
                        label: "My dataset" // for legend
                    }
                ]
            };

            var config = {
                type: "polarArea",

                // Chart Options
                options: chartOptions,

                data: chartData
            };

            // Create the chart
            var polarChart = new Chart(ctx, config);
        });

    </script>
@endsection


@section('content')

    <div class="row">
        <div class="col l4 m4 s12">
            <div class="card">
                <div id="chartjs-polar-chart" class="card">
                    <div class="card-content">
                        <h4 class="card-title">Polar Chart</h4>
                        <div class="row">
                            <div class="col s12">
                                <div class="sample-chart-wrapper"><canvas id="polar-chart" height="400"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
