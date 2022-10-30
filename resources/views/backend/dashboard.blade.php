@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    {!! __('strings.backend.welcome') !!}
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
    <div class="row">        
        <div class="col-md-6">
            <div id="myChart1" style="width:100%; max-width:600px; height:500px;"></div>
        </div>      
        <div class="col-md-6">
            <div id="myChart2" style="width:100%; max-width:600px; height:500px;"></div>
        </div>
    </div>
    <div class="row">        
        <div class="col-md-6">
            <div id="myChart3" style="width:100%; max-width:600px; height:500px;"></div>
        </div>      
        <div class="col-md-6">
            <div id="myChart4" style="width:100%; max-width:600px; height:500px;"></div>
        </div>
    </div>
    <script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart1);
google.charts.setOnLoadCallback(drawChart2);
google.charts.setOnLoadCallback(drawChart3);
google.charts.setOnLoadCallback(drawChart4);

function drawChart1() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Price', 'Order'],
  [50,7],[60,8],[70,8],[80,9],[90,9],
  [100,9],[110,10],[120,11],
  [130,14],[140,14],[150,15]
]);
// Set Options
var options = {
  title: 'Prices vs. Order',
  hAxis: {title: 'Square Meters'},
  vAxis: {title: 'Price in Millions'},
  legend: 'none'
};
// Draw
var chart1 = new google.visualization.LineChart(document.getElementById('myChart1'));
chart1.draw(data, options);
}
function drawChart2() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Price', 'Order'],
  [50,7],[60,8],[70,8],[80,9],[90,9],
  [100,9],[110,10],[120,11],
  [130,14],[140,14],[150,15]
]);
// Set Options
var options = {
  title: 'Prices vs. Order',
  hAxis: {title: 'Square Meters'},
  vAxis: {title: 'Price in Millions'},
  legend: 'none'
};
// Draw
var chart2 = new google.visualization.LineChart(document.getElementById('myChart2'));
chart2.draw(data, options);
}

function drawChart3() {
    var data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  ['Italy',55],
  ['France',49],
  ['Spain',44],
  ['USA',24],
  ['Argentina',15]
]);

var options = {
  title:'World Wide Order'
};

var chart = new google.visualization.BarChart(document.getElementById('myChart3'));
  chart.draw(data, options);
}
     
function drawChart4() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Price', 'Order'],
  [50,7],[60,8],[70,8],[80,9],[90,9],
  [100,9],[110,10],[120,11],
  [130,14],[140,14],[150,15]
]);
// Set Options
var options = {
  title: 'Prices vs. Order',
  hAxis: {title: 'Square Meters'},
  vAxis: {title: 'Price in Millions'},
  legend: 'none'
};
// Draw
var chart4 = new google.visualization.LineChart(document.getElementById('myChart4'));
chart4.draw(data, options);
}
</script>
@endsection
