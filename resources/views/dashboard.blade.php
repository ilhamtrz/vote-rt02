@extends('template')
@section('content')
    <h2>Perhitungan suara</h2>

<div id="piechart"></div>

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var frequency = @json($votingDatas);
        var chartData = JSON.parse(frequency);
        var votingData = []
        chartData.forEach((item) => {
            votingData.push([item.nama, item.total_votes]);
        })
        // console.log(votingData);
        if(!votingData.length){
            document.getElementById("piechart").innerHTML = "<h2 class='my-5'>Data Suara Kosong</h2>";
        } else {
            var data = google.visualization.arrayToDataTable(votingData, true);

            // Optional; add a title and set the width and height of the chart
            var options = {'width':1100, 'height':800};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    }



    // Auto Refresh

    // function autoRefresh() {
    //     window.location = window.location.href;
    //     }
    //     setInterval('autoRefresh()', 5000);
    // </script>


@endsection
