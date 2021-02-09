@extends('layouts.contentLayoutMaster1')
{{-- page title --}}
@section('title', 'Settings - G-Payments')
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
  <div class="row">
    <div class="col-4">
      <div class="row">
        <div class="col-12 form-group">
          <div>
            <span style="color:black;font-size: 28px;"><b>{{$customer->account_name}}</b></span>
          </div>
          <div style="min-width: 32px;">
            <span>{{$customer->account_email}}</span>
          </div>
        </div>
        <div class="col-12 form-group">
          <div class="row">
            <div class="col-4">
              <div class="" style="min-width: auto;">
                <div><span class="">Spent</span></div>
                <div style="min-width: 32px;">
                  <span style="border-bottom: 1px dashed rgb(193, 201, 210);">
                    <span class="UnstyledLink">€0.00</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="" style="min-width: auto;">
                <div><span class="">Since</span></div>
                <div style="min-width: 32px;">
                  <span style="border-bottom: 1px dashed rgb(193, 201, 210);">
                    <span class="UnstyledLink">Jan 2021</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="" style="min-width: auto;">
                <div><span class="">Disputes</span></div>
                <div style="min-width: 32px;">
                  <span style="border-bottom: 1px dashed rgb(193, 201, 210);">
                    <span class="UnstyledLink">0</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 form-group">
          <div>
            <h4 class="mb-2 mt-2 cursor-pointer">
              <div class="row">
                <div class="col-8 toggle-info" id="toggle-details-info">
                  <svg fill="#8792a2" aria-hidden="true" class="rotate-90 SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--caretRight-svg Icon-color-svg Icon-color--gray-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.689 14.709l6.021-6.01a.986.986 0 0 0 0-1.397L6.69 1.292C6.066.668 5 1.11 5 1.99v12.02c0 .88 1.066 1.32 1.689.699z" fill-rule="evenodd"></path>
                  </svg>
                  <span style="color:black;font-size:17px;"><b>Details</b></span>
                </div>
                <div class="col-4 text-right">
                  <a id="details-info-a" class="detail-a" data-toggle="modal" data-target="#customer-edit-modal" href="">Edit</a>
                </div>
              </div>
            </h4>
            <div class="detail-info" id="details-info">
              <span>Account details</span>
              <p>{{$customer->account_name}}</p>
              <p>{{$customer->account_email}}</p>
              <p>{{$customer->account_description}}</p>
              <span>Billing emails</span>
              <p>{{$customer->account_email}}</p>
              <div id="show-info" style="display: none;">
                <span>Billing details</span>
                <p>No details</p>
                <span>Language</span>
                <p>English</p>
                <span>Tax status and IDs</span>
                <p>Taxable</p>
              </div>
              <h4 class="mb-2 mt-2 font-medium-1 showless" id="detail-show-info">
                <a>Show more</a>
                <a style="display: none;">Show less</a>
              </h4>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div>
            <h4 class="mb-2 mt-2 cursor-pointer">
              <div class="row">
                <div class="col-8 toggle-info" id="toggle-metadata-info">
                  <svg fill="#8792a2" aria-hidden="true" class="rotate-90 SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--caretRight-svg Icon-color-svg Icon-color--gray-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.689 14.709l6.021-6.01a.986.986 0 0 0 0-1.397L6.69 1.292C6.066.668 5 1.11 5 1.99v12.02c0 .88 1.066 1.32 1.689.699z" fill-rule="evenodd"></path>
                  </svg>
                  <span style="color:black;font-size:17px;"><b>Metadata</b></span>
                </div>
                <div class="col-4 text-right">
                  <a id="metadata-info-a" href="" class="metadata-a">Edit</a>
                </div>
              </div>
            </h4>
            <div class="meta-info" id="metadata-info">
              <span>No metadata</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-8">
      <div class="ek-tab">
        <div class="ek-items">
          <div class="row">
            <div class="col-8">
              <div class="ek-tab-item active" target="#overview">Overview</div>
              <div class="ek-tab-item" target="#event_log">Events and logs</div>
            </div>
            <div class="col-4 text-right">
              <!-- <div class="ek-tab-item"> -->
              <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Actions
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);">Option 1</a>
                  <a class="dropdown-item" href="javascript:void(0);">Option 2</a>
                  <a class="dropdown-item" href="javascript:void(0);">Option 3</a>
                </div>
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ek-contents">
        <div class="ek-content active" id="overview">
          <div>
            <h4 class="mb-2 mt-2 overview-detail">
              <div class="row">
                <div class="col-8 overview-content" id="">
                  <p>Payments</p>
                </div>
                <div class="col-4 text-right">
                  <a id="" href="" class="">Create</a>
                </div>
              </div>
            </h4>
            <div class="" id="">
              <span>No payments</span>
            </div>
          </div>
          <div>
            <h4 class="mb-2 mt-2 overview-detail">
              <div class="row">
                <div class="col-8 overview-content" id="">
                  <p>Payment methods</p>
                </div>
                <div class="col-4 text-right">
                  <a id="" href="" class="">Add</a>
                </div>
              </div>
            </h4>
            <div class="" id="">
              <span>No payment methods</span>
            </div>
          </div>
          <div>
            <h4 class="mb-2 mt-2 overview-detail">
              <div class="row">
                <div class="col-8 overview-content" id="">
                  <p>Credit balance</p>
                </div>
                <div class="col-4 text-right">
                  <a id="" href="" class="">Adjust balance</a>
                </div>
              </div>
            </h4>
            <div class="" id="">
              <span style="color:black;font-size:20px;">€0.00 </span><span> EUR</span>
            </div>
          </div>
          <div>
            <h4 class="mb-2 mt-2 overview-detail">
              <div class="row">
                <div class="col-8 overview-content" id="">
                  <p>Invoices</p>
                </div>
                <div class="col-4 text-right">
                  <a id="" href="" class="">Create</a>
                </div>
              </div>
            </h4>
            <div class="" id="">
              <span>No invoices</span>
            </div>
          </div>
          <div>
            <h4 class="mb-2 mt-2 overview-detail">
              <div class="row">
                <div class="col-8 overview-content" id="">
                  <p>Subscriptions</p>
                </div>
                <div class="col-4 text-right">
                  <a id="" href="" class="">Create</a>
                </div>
              </div>
            </h4>
            <div class="" id="">
              <span>No subscriptions</span>
            </div>
          </div>
          <div>
            <h4 class="mb-2 mt-2 overview-detail">
              <div class="row">
                <div class="col-8 overview-content" id="">
                  <p>Recent activity</p>
                </div>
                <div class="col-4 text-right">
                  <a id="" href="" class="">Add note</a>
                </div>
              </div>
            </h4>
            <div class="" id="">
              <span>No metadata</span>
            </div>
          </div>
        </div>
        <div class="ek-content" id="event_log">
          <div>
            <h4 class="mb-2 mt-2 overview-detail overview-content">
              <p>Logs</p>
            </h4>
            <div class="" id="">
              <div class="row">
                <div class="col-8 metadata-content" id="">
                  <p>200 OK POST /v1/customers</p>
                </div>
                <div class="col-4 text-right">
                  <span id="" href="" class="">1/28/21, 7:02:22 PM</span>
                </div>
              </div>
            </div>
          </div>
          <div>
            <h4 class="mb-2 mt-2 overview-detail overview-content">
              <p>Events</p>
            </h4>
            <div class="" id="">
              <div class="row">
                <div class="col-8 metadata-content" id="">
                  <p>jane@email.com is a new customer</p>
                </div>
                <div class="col-4 text-right">
                  <span id="" href="" class="">1/28/21, 7:02:22 PM</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- edit modal -->
  <form id="customer-edit-form" method="POST" action="{{ route('customers.update', $customer->id) }}">
    @csrf
    {{method_field('put')}}
    <div class="modal fade text-left" id="customer-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel1">Update customer</h3>
          </div>
          <div class="modal-body">

            <p class="mb-0">
            <h4 class="mb-2 font-medium-1">Account information</h4>
            <div class="form-group mt-2">
              <label for="account_name">Name</label>
              <input name="account_name" type="text" class="form-control form-control-sm" id="account_name" value="{{$customer->account_name}}" required placeholder="Jane Doe">
            </div>
            <div class="form-group mt-2">
              <label for="account_email">Account email</label>
              <input name="account_email" type="email" class="form-control form-control-sm" id="account_email" value="{{$customer->account_email}}" required placeholder="jane@example.com">
            </div>
            <div class="form-group mt-2">
              <label for="account_description">Description</label>
              <input name="account_description" type="text" class="form-control form-control-sm" id="account_description" value="{{$customer->account_description}}" required placeholder="">
            </div>

            <h4 class="mb-2 mt-2 font-medium-1" id="toggle-billing-info">
              Billing information
              <svg class="rotate-180" aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--chevronUp-svg Icon-color-svg Icon-color--gray-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.591 11.008L8 5.417l-5.591 5.591A1 1 0 0 1 .993 9.593l6.3-6.3a1 1 0 0 1 1.414 0l6.3 6.3a1 1 0 0 1-1.416 1.415z" fill-rule="evenodd"></path>
              </svg>
            </h4>
            <div id="billing-info">
              <div class="form-group mt-2">
                <label for="account_billing_email" class="mt-1">Billing email</label>
                <div class="custom-control custom-checkbox mt-1 mb-3">
                  <input type="checkbox" class="custom-control-input" name="sameasaccountemail" checked id="sameasaccountemail">
                  <label class="custom-control-label" for="sameasaccountemail" id="same_as_email"> Same as account email</label>
                </div>
                <div id="same_email" style="display:none; margin-top:-5%;">
                  <div class="form-group mt-2">
                    <input name="account_billing_email" type="email" class="form-control form-control-sm" id="account_billing_email" placeholder="billing@example.com">
                  </div>
                  <div id="add_recipient">
                    <p>Add more recipients</p>
                  </div>
                  <div class="form-group mt-2" style="display: none;" id="show_more">
                    <label for="account_same_email">Emails to CC</label>
                    <input name="account_same_email" type="email" class="form-control form-control-sm" id="account_same_email" placeholder="jane@example.com">
                  </div>
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="country_array">Billing details</label>
                <select name="account_country" class="form-control form-control-sm" id="country_array"></select>

                <div class="form-group mt-2 billing-details-hidden">
                  <input name="account_street_address_1" type="text" class="form-control form-control-sm" id="account_street_address_1" placeholder="Address line 1">
                  <input name="account_street_address_2" type="text" class="form-control form-control-sm" id="account_street_address_2" placeholder="Address line 2">
                  <input name="account_postal_code" type="text" class="form-control form-control-sm" id="account_postal_code" placeholder="Postal code">
                  <input name="account_city" type="text" class="form-control form-control-sm" id="account_city" placeholder="City">
                </div>
              </div>
              <div class="form-group">
                <input name="phone" type="text" class="form-control form-control-sm" id="phone" placeholder="Phone Number" />
              </div>
              <div class="form-group mt-2">
                <label class="mt-1">Shipping details</label>
                <div class="custom-control custom-checkbox mt-1 mb-3">
                  <input type="checkbox" class="custom-control-input" checked name="sameasbillingdetails" id="sameasbillingdetails">
                  <label class="custom-control-label" for="sameasbillingdetails" id="same_as_billing"> Same as billing details</label>
                </div>
                <div class="billing-details-show-hidden" id="same_billing">
                  <input name="account_same_name" type="text" class="form-control form-control-sm" id="account_same_name" placeholder="Jane Doe">
                  <select name="account_country2" class="form-control form-control-sm country_array" id="country_array2"></select>
                  <input name="account_street_address_3" type="text" class="form-control form-control-sm" id="account_street_address_3" placeholder="Address line 1">
                  <input name="account_street_address_4" type="text" class="form-control form-control-sm" id="account_street_address_4" placeholder="Address line 2">
                  <input name="account_postal_code_2" type="text" class="form-control form-control-sm" id="account_postal_code_2" placeholder="Postal code">
                  <input name="account_city_2" type="text" class="form-control form-control-sm" id="account_city_2" placeholder="City">
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="timezone_id">Time zone</label>
                <select name="timezone_id" class="form-control-sm form-control" id="timezone_array"></select>
              </div>
              <div class="form-group mt-2">
                <label for="description">Language</label>
                <select class="form-control-sm form-control" id="language_array"></select>
              </div>
              <div class="form-group mt-2">
                <label for="description">Currency</label>
                <select class="form-control-sm form-control" id="currency_array"></select>
              </div>
              <div class="form-group mt-2">
                <label for="description">Tax status</label>
                <select name="tax_status" class="form-control-sm form-control" id="tax_array"></select>
              </div>
              <div class="form-group mt-2 tax_part">
                <div class="row">
                  <div class="col-12">
                    <label for="description">Tax ID</label>
                  </div>
                  <div class="col-12 parent-tax-info">
                    @foreach ($taxids as $index => $taxid)
                    <div class="tax-id-info" id="tax-id-info_tax_account_number1">
                      <div style="width: 40%;">
                        <select name="tax_id1" class="form-control-sm form-control" id="tax_id_array"></select>
                      </div>
                      <div style="width: 53%; position: relative;top: 2px;">
                        <input name="tax_account_number1" value="{{$taxid->tax_account_number}}" type="number" onblur="start_validate('tax_account_number1')" onkeyup="validate('tax_account_number1')" class="form-control-sm form-control tax_account_number" id="tax_account_number1" required>
                      </div>
                      <div style="cursor: pointer; margin-left: 3px">
                        <svg margin="[object Object]" aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--cancel-svg Icon-color-svg Icon-color--blue-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 6.585l4.593-4.592a1 1 0 0 1 1.415 1.416L9.417 8l4.591 4.591a1 1 0 0 1-1.415 1.416L8 9.415l-4.592 4.592a1 1 0 0 1-1.416-1.416L6.584 8l-4.59-4.591a1 1 0 1 1 1.415-1.416z" fill-rule="evenodd"></path>
                        </svg>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="form-group mt-2">
                <p class="add-taxtid">Add another ID</p>
              </div>
            </div>
            </p>
          </div>
          <div class="modal-footer">
            <div class="btn btn-sm btn-white" id="cancel">
              <span href="#">Cancel</span>
            </div>
            <button class="btn btn-sm btn-primary">
              <span href="#">Update customer</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('js/scripts/forms/select/form-select2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>
<script src="{{ asset('js/scripts/pages/customer.js') }}"></script>
@endsection
