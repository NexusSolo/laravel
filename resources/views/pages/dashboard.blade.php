@extends('layouts.contentLayoutMaster1')
{{-- page Title --}}
@section('title','Dashboard E-commerce')
{{-- vendor css --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection

@section('content')
<section>
  <div class="">
    <h2>Today</h2>
  </div>
  <div class="row border-bottom border-top">
    <div class="col-md-8 border-right">
      <div class="py-1" style="min-height:230px">
        <div>
          <div class="d-inline-block" style="min-width:180px">
            <div class="btn-group">
              <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle border-0 pl-0 text-bold-500 text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gross Volume
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);">100$</a>
                  <a class="dropdown-item" href="javascript:void(0);">1000$</a>
                  <a class="dropdown-item" href="javascript:void(0);">10000$</a>
                </div>
              </div>
            </div>
            <p class="mb-1 font-medium-1">$0.00$</p>
          </div>
          <div class="d-inline-block" style="min-width:180px">
            <div class="btn-group">
              <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle border-0 pl-0 text-bold-500 text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Yesterday
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="javascript:void(0);">Today</a>
                  <a class="dropdown-item" href="javascript:void(0);">Yesterday</a>
                  <a class="dropdown-item" href="javascript:void(0);">One Week</a>
                </div>
              </div>
            </div>
            <p class="mb-1 font-medium-1">$0.00$</p>
          </div>
        </div>
        <div class="height-150" style="position: relative;top:20px">
          <canvas id="dash1-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-4 p-0">
      <div class="h-100">
        <div class="h-50 border-bottom p-1">
          <a href="#" class="float-right text-bold-500">View</a>
          <p class="mb-1 font-small-3 text-bold-700">USD Balance</p>
          <p class="mb-1 font-medium-3">$485.20$</p>
          <p class="font-small-2 mb-0" >Estimated future payouts</p>
        </div>
        <div class="h-50 p-1">
          <a href="#" class="float-right text-bold-500">View</a>
          <p class="mb-1 font-small-3 text-bold-700">Payouts</p>
          <p class="mb-1 font-medium-3">$485.20$</p>
          <p class="font-small-2 mb-0" >Expected Jan 19</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('vendor-scripts')
<script src="{{asset('vendors/js/charts/chart.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script>
$(window).on("load", function () {

var $primary = '#5A8DEE',
  $success = '#39DA8A',
  $danger = '#FF5B5C',
  $warning = '#FDAC41',
  $info = '#00CFDD',
  $label_color = '#475F7B',
  grid_line_color = '#dae1e7',
  scatter_grid_color = '#f3f3f3',
  $scatter_point_light = '#E6EAEE',
  $scatter_point_dark = '#5A8DEE',
  $white = '#fff',
  $black = '#000';

var themeColors = [$primary, $warning, $danger, $success, $info, $label_color];

// Line Chart
// ------------------------------------------

//Get the context of the Chart canvas element we want to select
var lineChartctx = $("#dash1-chart");

// Chart Options
var linechartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  legend: { display: false },
  hover: {
    mode: 'label'
  },
  scales: {
    xAxes: [{
      display: true,
      gridLines: {
        color: grid_line_color,
      },
      scaleLabel: {
        display: true,
      }
    }],
    yAxes: [{
      display: false,
      gridLines: {
        color: grid_line_color,
      },
      ticks: {
        beginAtZero: true
      },
      beginAtZero: true,
      scaleLabel: {
        display: false,
      }
    }]
  },
  title: {
    display: false
  }
};

// Chart Data
var linechartData = {
  labels: ["12:00 AM", "Now", "11:59 PM"],
  datasets: [{
    data: [0, 0, 0],
    borderColor: $primary,
    fill: false
  }]
};

var lineChartconfig = {
  type: 'line',

  // Chart Options
  options: linechartOptions,
  data: linechartData
};
// Create the chart
var lineChart = new Chart(lineChartctx, lineChartconfig);
});

</script>
@endsection
