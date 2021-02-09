<!DOCTYPE html>
{{-- pageConfigs variable pass to Helper's updatePageConfig function to update page configuration  --}}
@isset($pageConfigs)
  {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
// confiData variable layoutClasses array in Helper.php file.
  $configData = Helper::applClasses();
@endphp

<html class="loading" lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
 data-textdirection="{{$configData['direction'] == 'rtl' ? 'rtl' : 'ltr' }}" data-asset-path="{{ asset('/')}}">
  <!-- BEGIN: Head-->

    <head>
    <meta  charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - GreateEPayments</title>
    <link rel="apple-touch-icon" href="{{asset('images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/ico/favicon.ico')}}">

    {{-- Include core + vendor Styles --}}
    @include('panels.styles')
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body class="vertical-layout vertical-menu-modern 2-columns
    @if($configData['theme'] === 'dark'){{'dark-layout'}} @elseif($configData['theme'] === 'semi-dark'){{'semi-dark-layout'}} @else {{'light-layout'}} @endif
    {{$configData['bodyCustomClass']}}" data-framework="laravel">

      <!-- BEGIN: Content-->
      <div class="app-content content-new">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
      <!-- END: Content-->

      @include('panels.scripts')
    </body>
    <!-- END: Body-->
</html>


