@extends('layouts.contentLayoutNew')
{{-- page title --}}
@section('title', 'New Payment - G-Payments')
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
@if (Session::has('action') && Session::get('action') == 'new')
<section class="content-header position-fixed w-100">
  <div class="d-flex align-items-center">
    <a class="btn btn-close" href="{{ route('payments.index') }}">
      <svg aria-hidden="true" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 6.585l4.593-4.592a1 1 0 0 1 1.415 1.416L9.417 8l4.591 4.591a1 1 0 0 1-1.415 1.416L8 9.415l-4.592 4.592a1 1 0 0 1-1.416-1.416L6.584 8l-4.59-4.591a1 1 0 1 1 1.415-1.416z" fill-rule="evenodd"></path></svg>
    </a>
    <div class="seperator"></div>
    <span class="header-title">Create a payment</span>
  </div>
  <div class="d-flex header-right">
    <div class="btn btn-sm btn-none"><span>Feedback?</span></div>
    <a class="btn btn-sm btn-white" href="{{ route('payments.index') }}"><span>Close</span></a>
  </div>
</section>
<section class="content-body">
  <div class="content-center">
    <div style="margin-top:150px;max-width:500px;text-align:center">
      <i class="bx bxs-check-circle" style="font-size:75px;color:#6c8eef"></i>
      <label class="mt-1 font-large-1 d-block text-bold-400">Payment successful</label>
      <label class="mt-1 font-medium-3 d-block text-bold-400" style="color:#3C4257">We've processed your charge for ${{ Session::get('payment')->amount }}.</label>
      <div style="margin:1rem auto;max-width:200px">
        <a class="btn btn-primary w-100" href="{{ route('payments.create') }}"><span class="font-medium-1">New payment</span></a>
        <div class="row" style="margin:8px 0 8px;">
          <div class="col-6 p-0" style="padding-right:4px!important;"><a class="btn btn-sm btn-white" href="{{ route('payments.show', Session::get('payment')->id) }}" style=""><span>View details</span></a></div>
          <div class="col-6 p-0" style="padding-left:4px!important;"><a class="btn btn-sm btn-white" href="{{ route('payments.show', Session::get('payment')->id) }}"><span>Send receipt</span></a></div>
        </div>
      </div>
    </div>
  </div>
</section>
@else
<form id="form-payment" method="POST" action="{{ route('payments.store') }}">
  @csrf
  <section class="content-header position-fixed w-100">
    <div class="d-flex align-items-center">
      <a class="btn btn-close" href="{{ route('payments.index') }}">
        <svg aria-hidden="true" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 6.585l4.593-4.592a1 1 0 0 1 1.415 1.416L9.417 8l4.591 4.591a1 1 0 0 1-1.415 1.416L8 9.415l-4.592 4.592a1 1 0 0 1-1.416-1.416L6.584 8l-4.59-4.591a1 1 0 1 1 1.415-1.416z" fill-rule="evenodd"></path></svg>
      </a>
      <div class="seperator"></div>
      <span class="header-title">Create a payment</span>
    </div>
    <div class="d-flex header-right">
      <div class="btn btn-sm btn-none"><span>Feedback?</span></div>
      <button class="btn btn-sm btn-white" type="submit" name="action" value="other"><span>Submit and create another</span></button>
      <button class="btn btn-sm btn-primary" type="submit" name="action" value="new"><span>Submit payment</span></button>
    </div>
  </section>
  <section class="content-body">
    <div class="content-center">
      @if (Session::has('action') && Session::get('action') == 'other')
      <div class="row my-2">
        <div class="col-12">
          <div style="border-radius: 4px;box-shadow: 0 0 0 1px #e3e8ee;padding:12px 20px;background:#efffed">
            <span class="float-left"><svg aria-hidden="true" style="fill:#1ea672" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 8a1 1 0 0 0-1-1H5.5a1 1 0 1 0 0 2H7v4a1 1 0 0 0 2 0zM4 0h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4zm4 5.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" fill-rule="evenodd"></path></svg></span>
            <div class="row m-0">
              <div class="col-md-6 pr-0">
                <label style="margin-bottom:2px">Payment successful</label><br>
                <label style="font-weight: 400;font-size:13px;">We've processed your charge for ${{ Session::get('payment')->amount }}.</label>
              </div>
              <div class="col-md-3 d-flex align-items-center"><a class="btn btn-sm btn-white" href="{{ route('payments.show', Session::get('payment')->id) }}"><span>View details</span></a></div>
              <div class="col-md-3 d-flex align-items-center"><a class="btn btn-sm btn-white" href="{{ route('payments.show', Session::get('payment')->id) }}"><span>Send receipt</span></a></div>
            </div>
          </div>
        </div>
      </div>
      @endif
      <div class="row my-2">
        <div class="col-md-6">
          <div class="btn btn-tab w-100 tab-actived"><span>One-time</span></div>
        </div>
        <div class="col-md-6">
          <div class="btn btn-tab w-100"><span>Recurring&nbsp;&nbsp;</span><svg aria-hidden="true" class="" height="8" width="8" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M15 10.006a1 1 0 1 1-2 0v-5.6L2.393 15.009a.992.992 0 1 1-1.403-1.404L11.595 3.002h-5.6a1 1 0 0 1 0-2.001h8.02a1 1 0 0 1 .284.045.99.99 0 0 1 .701.951z" fill-rule="evenodd"></path></svg></div>
        </div>
      </div>
      <div class="form-group mt-2">
        <label for="account_name">Amount</label>
        <div class="input-group w-50">
          <div class="input-group-prepend">
            <label class="input-group-text form-control-sm" for="inputGroupSelect01">$</label>
          </div>
          <input name="amount" type="number" step="0.01" class="form-control form-control-sm border-left-0" id="payment_amount" value="0" data-toggle="input-mask" data-mask-format="0.00">
          <div class="input-group-append">
            <select class="form-control-sm form-control" name="currency_id" id="currency_array"></select>
          </div>
        </div>
      </div>
      <div class="form-group mt-2">
        <label for="payment_customer">Customer <span>&nbsp;&nbsp;Optional</span></label>
        <input name="account_id" type="text" class="form-control form-control-sm" id="payment_customer" placeholder="Find or add a test customer...">
      </div>
      <div class="form-group mt-2">
        <label for="payment_description">Description <span>&nbsp;&nbsp;Optional</span></label>
        <input name="description" type="text" class="form-control form-control-sm" id="payment_description" placeholder="">
      </div>
      <div class="form-group mt-2">
        <label for="payment_description">Statement descriptor <span><svg aria-hidden="true" style="fill:#8792a2" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 8a1 1 0 0 0-1-1H5.5a1 1 0 1 0 0 2H7v4a1 1 0 0 0 2 0zM4 0h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4zm4 5.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" fill-rule="evenodd"></path></svg></span></label>
        <input name="payment_description" type="text" class="form-control form-control-sm" id="payment_description" placeholder="">
      </div>
      <h4 class="mt-2 mb-2 font-medium-3 text-bold-500">Payment method</h4>
      <hr>
      <fieldset>
        <div class="radio radio-primary">
            <input type="radio" name="payment-method" id="option-manual" value="manual" checked>
            <label for="option-manual" class="font-small-3">Manually enter card information</label>
        </div>
      </fieldset>
      <div class="form-group input-group w-75 ml-2 mt-1 mb-0">
        <div class="input-group-prepend">
          <label class="input-group-text form-control-sm" for="inputGroupSelect01"><i class="bx bxs-credit-card-alt" style="color:#a3acb9"></i></label>
        </div>
        <input name="payment_number" type="text" style="width:130px" class="form-control form-control-sm border-left-0 border-right-0" id="card_name" placeholder="Card number" data-toggle="input-mask" data-mask-format="0000 0000 0000 0000">
        <input name="card_expire" type="text" style="width:10px" class="form-control form-control-sm border-left-0 border-right-0" id="card_expire" placeholder="MM / YY" data-toggle="input-mask" data-mask-format="00 / 00">
        <div class="input-group-append">
          <input name="card_cvc" type="text" style="width:50px" class="form-control form-control-sm border-left-0" id="card_cvc" placeholder="CVC" data-toggle="input-mask" data-mask-format="000">
        </div>
      </div>
      <fieldset class="ml-2">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="customCheck" disabled="" id="save-card">
          <label class="custom-control-label" for="save-card" style="color:#a3acb9">Save card to customer <span> <svg aria-hidden="true" style="fill:#8792a2" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 8a1 1 0 0 0-1-1H5.5a1 1 0 1 0 0 2H7v4a1 1 0 0 0 2 0zM4 0h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4zm4 5.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" fill-rule="evenodd"></path></svg></span></label>
        </div>
      </fieldset>
      <hr>
      <fieldset>
        <div class="radio radio-primary">
            <input type="radio" name="payment-method" id="option-manual" value="manual">
            <label for="option-manual" class="font-small-3" style="color:#a3acb9">Use a customer's on file payment method</label>
        </div>
      </fieldset>
      <hr>
      <fieldset>
        <div class="radio radio-primary">
            <input type="radio" name="payment-method" id="option-manual" value="manual">
            <label for="option-manual" class="font-small-3" style="color:#a3acb9">Email your customer a hosted invoice with Stripe Billing</label>
        </div>
      </fieldset>
      <hr>
    </div>
  </section>
</form>
@endif
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('js/scripts/forms/select/form-select2.js') }}"></script>
<script src="{{ asset('js/scripts/forms/jquery.mask.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script>
  $(function(){
    var currencies = @json($currencies);
    $("#currency_array").select2({
      dropdownAutoWidth: true,
      width: '100%',
      data: $.map(currencies, function (item) {
                    return {
                        text: item.currency_symbol,
                        name: item.currency_symbol,
                        id: item.id
                    }
                })
    });

    $(".select2-selection__arrow").remove();
    $(".select2-selection--single").append(`<div aria-hidden="true" class="icon-arrow"><svg aria-hidden="true" height="12" width="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M11.891 9.992a1 1 0 1 1 1.416 1.415l-4.3 4.3a1 1 0 0 1-1.414 0l-4.3-4.3A1 1 0 0 1 4.71 9.992l3.59 3.591 3.591-3.591zm0-3.984L8.3 2.417 4.709 6.008a1 1 0 0 1-1.416-1.415l4.3-4.3a1 1 0 0 1 1.414 0l4.3 4.3a1 1 0 1 1-1.416 1.415z"></path></svg></div>`);

    $('[data-toggle="input-mask"]').each(function (idx, obj) {
      var maskFormat = $(obj).data("maskFormat");
      var reverse = $(obj).data("reverse");
      if (reverse != null)
          $(obj).mask(maskFormat, {'reverse': reverse});
      else
          $(obj).mask(maskFormat);
    });
  })
</script>
@endsection
