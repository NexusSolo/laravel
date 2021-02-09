@extends('layouts.contentLayoutMaster1')
{{-- page title --}}
@section('title', 'Payments - G-Payments')
{{-- vendor styles --}}
@section('vendor-styles')
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="/css/plugins/intlTel/intlTelInput.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" integrity="sha512-yye/u0ehQsrVrfSd6biT17t39Rg9kNc+vENcCXZuMz2a+LWFGvXUnYuWUW6pbfYj1jcBb/C39UZw2ciQvwDDvg==" crossorigin="anonymous" />
@endsection

@section('content')
<section id="customers">
  <div class="d-flex position-relative">
    <h2>Payments</h2>

    <div class="position-absolute customers-buttons">
      <div class="btn btn-sm btn-white"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--filter-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.994.004c.555 0 1.006.448 1.006 1a.997.997 0 0 1-.212.614l-5.782 7.39L9 13.726a1 1 0 0 1-.293.708L7.171 15.97A.1.1 0 0 1 7 15.9V9.008l-5.788-7.39A.996.996 0 0 1 1.389.214a1.01 1.01 0 0 1 .617-.21z" fill-rule="evenodd"></path>
          </svg> Filter</span></div>
      <div class="btn btn-sm btn-white"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowExport-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 10.006a1 1 0 1 1-2 0v-5.6L2.393 15.009a.992.992 0 1 1-1.403-1.404L11.595 3.002h-5.6a1 1 0 0 1 0-2.001h8.02a1 1 0 0 1 .284.045.99.99 0 0 1 .701.951z" fill-rule="evenodd"></path>
          </svg> Export</span></div>
      <a class="btn btn-sm btn-primary" href="{{ route('payments.create') }}"> <span><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg Button-icon-svg Icon-color-svg Icon-color--white-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd">
            </path>
          </svg> Create payment</span>
      </a>
    </div>
  </div>

  <div class="ek-tab">
    <a class="ek-tab-item @if(Request::get('status')=='Succeeded') active @endif" href="{{ route('payments.index') }}?status=Succeeded">Succeeded</a>
    <a class="ek-tab-item @if(Request::get('status')=='Refunded') active @endif" href="{{ route('payments.index') }}?status=Refunded">Refunded</a>
    <a class="ek-tab-item @if(Request::get('status')=='Uncaptured') active @endif" href="{{ route('payments.index') }}?status=Uncaptured">Uncaptured</a>
    <a class="ek-tab-item @if(Request::get('status')!='Succeeded' && Request::get('status')!='Refunded' && Request::get('status')!='Uncaptured') active @endif" href="{{ route('payments.index') }}">All</a>
  </div>
  @if (count($payments) > 0)
  <div>
    <div class="table-responsive">
      <table class="table mb-0 customers-table">
        <thead>
          <tr>
            <th style="width:20px">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="customCheck" id="checkAll">
                <label class="custom-control-label" for="checkAll"></label>
              </div>
            </th>
            <th class="text-right" style="width:10px">Amount</th>
            <th style="width:30px"></th>
            <th style="width:110px"></th>
            <th>Description</th>
            <th>Customer</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($payments as $index => $payment)
          <tr>
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input each-checkbox" name="customCheck" id="customCheck{{$payment}}">
                <label class="custom-control-label" for="customCheck{{$payment}}"></label>
              </div>
            </td>
            <td class="text-right">
              <a href="{{ route('payments.show', $payment->id) }}">
                ${{number_format($payment->amount,2)}}
              </a>
            </td>
            <td>{{ $payment->currency->currency_symbol }}</td>
            <td><div class="badge badge-light-success compact d-inline-flex align-items-center">{{ $payment->payment_status }}<i class="bx bx-check ml-25"></i></div></td>
            <td>{{$payment->id}}</td>
            <td></td>
            <td>
              {{(new \Carbon\Carbon($payment->created_at))->format('jS F h:i A')}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="table-summary mt-1">
      <div class="float-left font-small-3"><span>{{ count($payments) }} results</span></div>
      <div class="float-right">
        <div class="btn btn-sm btn-white disabled">Previous</div>
        <div class="btn btn-sm btn-white disabled">Next</div>
      </div>
    </div>
  </div>
  @else
  <div class="empty-state">
    <div class="empty-state-inner">
      <div class="empty-state-icon"><i class="bx bxs-credit-card-alt"></i></div>
      <div class="empty-state-title">No {{ Request::get('status') }} payments</div>
      <div class="empty-state-content">Authorized test payments whose funds haven't been captured will show up here.</div>
      <div class="empty-state-more">
        <a href="">Learn more&nbsp;
          <svg aria-hidden="true" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M12.583 7L7.992 2.409A1 1 0 1 1 9.407.993l6.3 6.3a1 1 0 0 1 0 1.414l-6.3 6.3a1 1 0 0 1-1.415-1.416L12.583 9H1a1 1 0 1 1 0-2z" fill-rule="evenodd"></path></svg>
        </a>
      </div>
      <div class="empty-state-action">
        <a class="btn btn-sm btn-primary" href="{{ route('payments.create') }}"> <span><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg Button-icon-svg Icon-color-svg Icon-color--white-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd">
            </path>
          </svg> Create payment</span>
        </a>
      </div>
    </div>
  </div>
  @endif

</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('js/scripts/forms/select/form-select2.js') }}"></script>
<script src="{{ asset('js/scripts/pages/customer.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>
@endsection
