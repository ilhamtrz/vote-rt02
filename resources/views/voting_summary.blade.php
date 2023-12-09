@extends('template')
@section('content')
    <h2>Riwayat Pemilihan</h2>
    <select id="voteSelector" class="form-select form-select-lg mb-3" aria-label="Large select example">
        @foreach ($votingDatas as $votingData)
            <option value={{$votingData->vote_id}}>{{$votingData->desc}}</option>
        @endforeach
    </select>

    <div id="piechart"></div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#voteSelector").val(1);
            showVoteChart(1);
        });

        $("#voteSelector").on("change", function(){
            var vote = $("#voteSelector option:selected").val();
            showVoteChart(vote);


        });

        function showVoteChart(vote){
            var resultSummary=[];
            // ajax request
            $.ajax({
            type: "GET",
            url: "list_summary/" + vote,
            success: function (data) {
                data.forEach(showSummary)
                // get summary from data
                function showSummary(item, index){
                    resultSummary.push([item.name, item.count_vote]);
                }

                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                console.log(resultSummary);
                function drawChart(){
                    var data = google.visualization.arrayToDataTable(resultSummary, true);

                    // Optional; add a title and set the width and height of the chart
                    var options = {'width':1100, 'height':800};

                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            }
            });
        }






    </script>

{{-- <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
</script> --}}

@endsection
{{-- https://stackoverflow.com/questions/56811250/passing-an-array-onto-google-charts --}}
