@extends('template')
@section('content')
    <h2>Perhitungan suara</h2>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<p id="demo"></p>





<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var frequency = @json($votingDatas);
    var chartData = JSON.parse(frequency);
    var data = []
    chartData.forEach((item) => {
        data.push([item.nama, item.total_votes]);
    })
    var data = google.visualization.arrayToDataTable(data, true);

    // Optional; add a title and set the width and height of the chart
    var options = {'width':1100, 'height':800};

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
</script>

@endsection
{{-- https://stackoverflow.com/questions/56811250/passing-an-array-onto-google-charts --}}
