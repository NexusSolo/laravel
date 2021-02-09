@extends('layouts.contentLayoutMaster1')
{{-- page title --}}
@section('title', 'Payment Details - G-Payments')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/maps/leaflet.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/intlTel/intlTelInput.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" integrity="sha512-yye/u0ehQsrVrfSd6biT17t39Rg9kNc+vENcCXZuMz2a+LWFGvXUnYuWUW6pbfYj1jcBb/C39UZw2ciQvwDDvg==" crossorigin="anonymous" />
<style>
.inline-table th {
    border-top:none!important;
}
.table.inline-table tbody tr:last-child td {
    border-bottom: none !important;
}
.leaflet-map{height:200px;z-index:1}.leaflet-map .leaflet-marker-icon:focus{outline:0}
#show-page .mb-1 {margin-bottom: 10px!important}
#show-page .mb-2 {margin-bottom: 20px!important}
#show-page span i {position:relative;top:3px}
</style>
@endsection

@section('content')
<section id="show-page">
    <section class="border-bottom mb-2" style="padding-bottom: 12px">
        <div class="text-muted" style="margin-bottom: 8px;">
            <span class="float-right font-small-2">{{ $payment->id }}<i class="bx bxs-paste"></i></span>
            <span><i class="bx bxs-credit-card-alt"></i>&nbsp; PAYMENT</span>
        </div>
        <div class="btn btn-sm btn-white float-right mt-1"><i class="bx bx-undo"></i> <span href="#">Refund</span></div>
        <span class="text-bold-700 font-large-1">${{number_format($payment->amount,2)}}</span>&nbsp;<span class="font-large-1">{{ $payment->currency->currency_symbol }}</span>&nbsp;&nbsp;&nbsp;<div class="badge badge-light-success compact d-inline-flex align-items-center" style="position:relative;top:-7px">{{ $payment->payment_status }}<i class="bx bx-check ml-25"></i></div>
    </section>
    <div class="mb-3">
        <div class="d-inline-block border-right pr-1">
            <div class="text-muted mb-1">Date</div>
            <div>{{(new \Carbon\Carbon($payment->created_at))->format('jS F h:i A')}}</div>
        </div>
        <div class="d-inline-block border-right px-1">
            <div class="text-muted mb-1">Customer</div>
            <div>None</div>
        </div>
        <div class="d-inline-block border-right px-1">
            <div class="text-muted mb-1">Payment method</div>
            <div>•••• {{ substr($payment->payment_number, -4) }}</div>
        </div>
        <div class="d-inline-block pl-1">
            <div class="text-muted mb-1">Risk evaluation</div>
            <div><span class="badge badge-circle badge-circle-sm badge-light-success d-inline" style="padding:2px!important;">32</span> &nbsp;Normal</div>
        </div>
    </div>
    <section class="border-bottom mb-2" style="padding-bottom: 10px">
        <div class="btn btn-sm btn-white float-right"><i class="bx bx-plus"></i> <span href="#">Add note</span></div>
        <h5 class="text-bold-600">Timeline</h5>
    </section>
    <div class="mb-3">
        <ul class="timeline">
            <li class="timeline-item timeline-icon-success active">
              <h6 class="timeline-title">Payment succeeded</h6>
              <div class="text-muted">
                {{(new \Carbon\Carbon($payment->created_at))->format('jS F h:i A')}}
              </div>
            </li>
            <li class="timeline-item timeline-icon-secondary">
                <h6 class="timeline-title">Payment started</h6>
                <div class="text-muted">
                {{(new \Carbon\Carbon($payment->created_at))->format('jS F h:i A')}}
                </div>
              </li>
          </ul>
    </div>
    <section class="border-bottom mb-2" style="padding-bottom: 10px">
        <h5 class="text-bold-600">Payment details</h5>
    </section>
    <div class="mb-3 row">
        <div class="col-md-6">
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Statement descriptor</div>
                <div class="col-md-9">{{ $payment->description }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Amount</div>
                <div class="col-md-9">${{number_format($payment->amount,2)}}</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Fee</div>
                <div class="col-md-9">${{number_format($payment->payment_fee,2)}}</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Net</div>
                <div class="col-md-9">${{number_format($payment->amount-$payment->payment_fee,2)}}</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Status</div>
                <div class="col-md-9">{{ $payment->payment_status }}</div>
            </div>
            <div class="row">
                <div class="col-md-3 text-muted">Description</div>
                <div class="col-md-9 meta-info">No description</div>
            </div>
        </div>
    </div>
    <section class="border-bottom mb-2" style="padding-bottom: 10px">
        <h5 class="text-bold-600">Payment method</h5>
    </section>
    <div class="mb-3 row">
        <div class="col-md-6">
            <div class="row mb-1">
                <div class="col-md-3 text-muted">ID</div>
                <div class="col-md-9">{{ $payment->id }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Number</div>
                <div class="col-md-9">•••• {{ substr($payment->payment_number, -4) }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Fingerprint</div>
                <div class="col-md-9">{{ $payment->fingerprint_number }}</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Expires</div>
                <div class="col-md-9">11 / 2042</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Type</div>
                <div class="col-md-9">{{ $payment->payment_type }}</div>
            </div>
            <div class="row">
                <div class="col-md-3 text-muted">Issuer</div>
                <div class="col-md-9">{{ $payment->payment_providers }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Address</div>
                <div class="col-md-9 meta-info">No address</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Origin</div>
                <div class="col-md-9">United States &nbsp;<svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg" height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g fill="none" fill-rule="evenodd"><path fill="#E25950" fill-rule="nonzero" d="M14 14H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2z"></path><path fill="#F6F9FC" fill-rule="nonzero" d="M0 11h16v1H0v-1zm14 3H2a2 2 0 0 1-1.732-1h15.464A2 2 0 0 1 14 14zM0 9h16v1H0V9zm8-2h8v1H8V7zm0-2h8v1H8V5zm0-2h7.723c.171.295.277.634.277 1H8V3z"></path><path fill="#E25950" fill-rule="nonzero" d="M14 14H2a2 2 0 0 1-2-2V8h1v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H8V2h6a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2z" opacity=".1"></path><path fill="#43458B" fill-rule="nonzero" d="M0 8V3.714C0 2.768.796 2 1.778 2H8v6H0z"></path><path fill="#FFF" fill-rule="nonzero" d="M7.026 5.501a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM5.518 5a.5.5 0 1 1-.038-1 .5.5 0 0 1 .038 1zm-.492.501a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM3.518 5a.5.5 0 1 1-.038-1 .5.5 0 0 1 .038 1zm-.492.501a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm4-2a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.507 1.5a.5.5 0 1 1-.038-.999.5.5 0 0 1 .038 1zm.014 1A.5.5 0 1 1 1.57 7a.5.5 0 0 1-.037-1zm2 0A.5.5 0 1 1 3.57 7a.5.5 0 0 1-.037-1zm2 0A.5.5 0 1 1 5.57 7a.5.5 0 0 1-.037-1z"></path><path fill="#FFF" d="M6.533 7a.5.5 0 1 1 .037 1 .5.5 0 0 1-.037-1zm-2 0a.5.5 0 1 1 .037 1 .5.5 0 0 1-.037-1zm-2 0a.5.5 0 1 1 .037 1 .5.5 0 0 1-.037-1zM.482 7a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1zm0-2a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1zm0-2a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1zm1-1a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1zm2 0a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1zm2 0a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1zm2 0a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1zm0 2a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1zm0 2a.5.5 0 1 1 .036 1 .5.5 0 0 1-.036-1z" opacity=".5"></path></g></svg></div>
            </div>
            <div class="row">
                <div class="col-md-3 text-muted">CVC check</div>
                <div class="col-md-9">Passed &nbsp;<i class="bx bxs-check-circle" style="color:#1ea672;top: 3px;position: relative;"></i></div>
            </div>
        </div>
    </div>
    <section class="border-bottom mb-2" style="padding-bottom: 10px">
        <h5 class="text-bold-600"><svg height="20" width="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none"><circle cx="16" cy="16" fill="#a450b5" r="15"></circle><path d="M27.333 4.706A16 16 0 1 0 19.086 31.7 16 16 0 0 0 32 16.04a15.947 15.947 0 0 0-4.667-11.334zm-1.866 20.76c-.167.134-.34.26-.52.387l.4 1.02c-2.453 1.98-5.153 2.5-8.846 2.5-7.167 0-11.833-4.813-11.833-12 0-6.453 3.626-10.667 9.68-10.667 4 0 6.8 1.654 7.332 3.674l3.727-3.727a1.333 1.333 0 0 1 1.926.053c2.32 2.78 3.087 5.767 3.087 9.334.007 2.94-1.753 6.88-4.973 9.446z" fill="#f0b4e4"></path><path d="M17.927 28.093c-6.5 0-9.7-4.92-9.7-8.806 0-3.887 2.4-5.94 4.666-5.94a2.92 2.92 0 0 1 2.434 1.166 1.333 1.333 0 0 0 2.006.154l4.334-4.334c-.514-2-3.287-4.586-7.334-4.586-6.04.013-10.826 5.106-10.826 11.586A12.78 12.78 0 0 0 16.5 30.067a14.667 14.667 0 0 0 9.3-3.207.667.667 0 0 0-.807-1.06 11.853 11.853 0 0 1-7.066 2.293z" fill="#fff"></path></g></svg> &nbsp;Risk insights&nbsp;<span><svg aria-hidden="true" style="fill:#8792a2" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 8a1 1 0 0 0-1-1H5.5a1 1 0 1 0 0 2H7v4a1 1 0 0 0 2 0zM4 0h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4zm4 5.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" fill-rule="evenodd"></path></svg></span></h5>
    </section>
    <div class="row">
        <div class="col-md-6">
            <h6 class="font-small-2 text-bold-500 text-uppercase">Customer</h6>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Customer email</div>
                <div class="col-md-9 meta-info">Not provided</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Cardholder name</div>
                <div class="col-md-9 meta-info">Not provided</div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 text-muted">Are customer name and email similar?</div>
                <div class="col-md-9 meta-info">No email or cardholder name provided</div>
            </div>
            <div class="row">
                <div class="col-md-3 text-muted">Authorization rate for transactions associated with this email (all time)</div>
                <div class="col-md-9 meta-info">No email provided</div>
            </div>
        </div>
        <div class="col-md-6">
            <h6 class="font-small-2 text-bold-500">LOCATION</h6>
            <div class="border rounded">
                <div class="leaflet-map" id="basic-map"></div>
                <div style="padding:15px">
                    <div class="text-left font-small-1 clearfix text-muted" style="margin-bottom:5px">IP address<span class="meta-info float-right">United States</span></div>
                    <div class="text-left font-small-1 clearfix text-muted" style="margin-bottom:5px">Distance between billing and IP address<span class=" meta-info float-right">No billing address provided</span></div>
                    <div class="text-left font-small-1 clearfix text-muted" style="margin-bottom:5px">Distance between billing and shipping address<span class="meta-info float-right">No billing address or shipping address provided</span></div>
                    <div class="text-left font-small-1 clearfix text-muted">Distance between shipping and IP address<span class="meta-info float-right">No shipping address provided</span></div>
                </div>
            </div>
        </div>
    </div>
    <section class="border-bottom" style="padding-bottom: 10px">
        <h5 class="text-bold-600">Related payments</h5>
    </section>
    <table class="table mb-3 inline-table">
        <thead>
        <tr>
            <th style="width:10px">Risk</th>
            <th class="text-right" style="width:30px">Amount</th>
            <th style="width:110px"></th>
            <th>Source Type</th>
            <th>Customer</th>
            <th>Device</th>
            <th>Device IP Address</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($payments as $index => $payment)
        <tr>
            <td><div class="badge badge-circle badge-circle-sm badge-light-success">{{ $index*12+3 }}</div></td>  
            <td class="text-right">
            <a href="{{ route('payments.show', $payment->id) }}">
                ${{number_format($payment->amount,2)}}
            </a>
            </td>
            <td><div class="badge badge-light-success compact d-inline-flex align-items-center">{{ $payment->payment_status }}<i class="bx bx-check ml-25"></i></div></td>
            <td>{{$payment->payment_type}}</td>
            <td></td>
            <td><i class="bx bx-desktop"></i>&nbsp; PC</td>
            <td>{{$payment->payment_ip}}</td>
            <td>
            {{(new \Carbon\Carbon($payment->created_at))->format('jS F h:i A')}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <section class="border-bottom mb-2" style="padding-bottom: 10px">
        <div class="btn btn-sm btn-white float-right"><i class="bx bxs-pencil"></i> <span href="#">Edit metadata</span></div>
        <h5 class="text-bold-600">Metadata</h5>
    </section>
    <div class="mb-3 meta-info" >No metadata</div>
    <section class="border-bottom mb-2" style="padding-bottom: 10px">
        <h5 class="text-bold-600">Connections</h5>
    </section>
    <div class="row mb-3">
        <div class="col-md-2 text-muted">Latest charge</div>
        <div class="col-md-10">{{ $payment->id }}</div>
    </div>
    <section class="border-bottom mb-2" style="padding-bottom: 10px">
        <div class="btn btn-sm btn-white float-right ml-1"><span href="#">Send receipt</span></div>
        <div class="btn btn-sm btn-white float-right"><span href="#">View receipt</span></div>
        <h5 class="text-bold-600">Receipt history</h5>
    </section>
    <div class="mb-3">No receipts sent</div>
    <section class="border-bottom mb-2" style="padding-bottom: 10px">
        <h5 class="text-bold-600">Events and logs</h5>
    </section>
    <div class="">LATEST ACTIVITY</div>
    <div class="font-small-2 border-bottom pb-1" style="margin-top:8px"><span class="font-small-2 text-muted">PaymentIntent status:</span> succeeded</div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/maps/leaflet.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/maps/maps-leaflet.js')}}"></script>
@endsection
