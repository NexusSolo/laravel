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
  <div class="d-flex position-relative">
    <h2>Customers</h2>

    <div class="position-absolute customers-buttons">
      <div class="btn btn-sm btn-white"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--filter-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.994.004c.555 0 1.006.448 1.006 1a.997.997 0 0 1-.212.614l-5.782 7.39L9 13.726a1 1 0 0 1-.293.708L7.171 15.97A.1.1 0 0 1 7 15.9V9.008l-5.788-7.39A.996.996 0 0 1 1.389.214a1.01 1.01 0 0 1 .617-.21z" fill-rule="evenodd"></path>
          </svg> Filter</span></div>
      <div class="btn btn-sm btn-white"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowExport-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 10.006a1 1 0 1 1-2 0v-5.6L2.393 15.009a.992.992 0 1 1-1.403-1.404L11.595 3.002h-5.6a1 1 0 0 1 0-2.001h8.02a1 1 0 0 1 .284.045.99.99 0 0 1 .701.951z" fill-rule="evenodd"></path>
          </svg> Export</span></div>
      <div class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#customer-add-modal"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg Button-icon-svg Icon-color-svg Icon-color--white-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd">
            </path>
          </svg> Add customer</span></div>
    </div>
  </div>

  <div class="ek-tab">
    <div class="ek-tab-item active" target="#all">All</div>
    <div class="ek-tab-item" target="#tops">Top 100</div>
  </div>

  <div class="">
    <div class="table-responsive">
      <table class="table mb-0 customers-table">
        <thead>
          <tr>
            <th>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="customCheck" id="checkAll">
                <label class="custom-control-label" for="checkAll"></label>
              </div>
            </th>
            <th>EMAIL<svg fill="#8792a2" padding="[object Object]" aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--settings-svg Icon-color-svg Icon-color--gray-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.74 15.901l-.227-2.432a5.632 5.632 0 0 1-1.329-.55l-1.88 1.558a8.046 8.046 0 0 1-1.781-1.78l1.558-1.881a5.632 5.632 0 0 1-.55-1.329L.099 9.26a8.06 8.06 0 0 1 0-2.518l2.432-.228c.127-.47.313-.916.55-1.329l-1.558-1.88a8.046 8.046 0 0 1 1.78-1.781L5.185 3.08a5.632 5.632 0 0 1 1.329-.55L6.74.099a8.06 8.06 0 0 1 2.518 0l.228 2.432c.47.127.916.313 1.329.55l1.88-1.558a8.046 8.046 0 0 1 1.781 1.78L12.92 5.185c.237.413.423.859.55 1.329l2.432.228a8.06 8.06 0 0 1 0 2.518l-2.432.228c-.127.47-.313.916-.55 1.329l1.558 1.88a8.046 8.046 0 0 1-1.78 1.781l-1.881-1.558a5.632 5.632 0 0 1-1.329.55l-.228 2.432a8.06 8.06 0 0 1-2.518 0zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill-rule="evenodd"></path>
              </svg></th>
            <th>DESCRIPTION<svg fill="#8792a2" padding="[object Object]" aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--settings-svg Icon-color-svg Icon-color--gray-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.74 15.901l-.227-2.432a5.632 5.632 0 0 1-1.329-.55l-1.88 1.558a8.046 8.046 0 0 1-1.781-1.78l1.558-1.881a5.632 5.632 0 0 1-.55-1.329L.099 9.26a8.06 8.06 0 0 1 0-2.518l2.432-.228c.127-.47.313-.916.55-1.329l-1.558-1.88a8.046 8.046 0 0 1 1.78-1.781L5.185 3.08a5.632 5.632 0 0 1 1.329-.55L6.74.099a8.06 8.06 0 0 1 2.518 0l.228 2.432c.47.127.916.313 1.329.55l1.88-1.558a8.046 8.046 0 0 1 1.781 1.78L12.92 5.185c.237.413.423.859.55 1.329l2.432.228a8.06 8.06 0 0 1 0 2.518l-2.432.228c-.127.47-.313.916-.55 1.329l1.558 1.88a8.046 8.046 0 0 1-1.78 1.781l-1.881-1.558a5.632 5.632 0 0 1-1.329.55l-.228 2.432a8.06 8.06 0 0 1-2.518 0zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" fill-rule="evenodd"></path>
              </svg></th>
            <th>DEFAULT SOURCE</th>
            <th>CREATED</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($customers as $index => $customer)
          <tr>
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input each-checkbox" name="customCheck" id="customCheck{{$customer}}">
                <label class="custom-control-label" for="customCheck{{$customer}}"></label>
              </div>
            </td>
            <td>
              <a href="{{ route('customers.show', $customer->id) }}">
                {{$customer->account_email}}
              </a>
            </td>
            <td>{{$customer->account_description}}</td>
            <td>---</td>
            <td>
              {{(new \Carbon\Carbon($customer->created))->format('jS F h:i A')}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="table-summary mt-1">
      <div class="float-left font-small-3"><span>{{ count($customers) }} member</span></div>
      <div class="float-right">
        <div class="btn btn-sm btn-white disabled">Previous</div>
        <div class="btn btn-sm btn-white disabled">Next</div>
      </div>
    </div>
  </div>
  <!--Basic Modal -->

  <form id="customer-add-form" method="POST" action="{{ route('customers.store') }}">
    @csrf
    <div class="modal fade text-left" id="customer-add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel1">Add customer</h3>
          </div>
          <div class="modal-body">

            <p class="mb-0">
            <h4 class="mb-2 font-medium-1">Account information</h4>
            <div class="form-group mt-2">
              <label for="account_name">Name</label>
              <input name="account_name" type="text" class="form-control form-control-sm" id="account_name" required placeholder="Jane Doe">
            </div>
            <div class="form-group mt-2">
              <label for="account_email">Account email</label>
              <input name="account_email" type="email" class="form-control form-control-sm" id="account_email" required placeholder="jane@example.com">
            </div>
            <div class="form-group mt-2">
              <label for="account_description">Description</label>
              <input name="account_description" type="text" class="form-control form-control-sm" id="account_description" required placeholder="">
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
                  <input name="account_name_same" type="text" class="form-control form-control-sm" id="account_name_same" placeholder="Jane Doe">
                  <select name="account_country2" class="form-control form-control-sm" id="country_array2"></select>
                  <input name="account_street_same_address_1" type="text" class="form-control form-control-sm" id="account_street_same_address_1" placeholder="Address line 1">
                  <input name="account_street_same_address_2" type="text" class="form-control form-control-sm" id="account_street_same_address_2" placeholder="Address line 2">
                  <input name="account_postal_code_same" type="text" class="form-control form-control-sm" id="account_postal_code_same" placeholder="Postal code">
                  <input name="account_city_same" type="text" class="form-control form-control-sm" id="account_city_same" placeholder="City">
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
                    <div class="tax-id-info" id="tax-id-info_tax_account_number1">
                      <div style="width: 40%;">
                        <select name="tax_id1" class="form-control-sm form-control" id="tax_id_array"></select>
                      </div>
                      <div style="width: 53%; position: relative;top: 2px;">
                        <input name="tax_account_number1" type="text" onblur="start_validate('tax_account_number1')" onkeyup="validate('tax_account_number1')" class="form-control-sm form-control tax_account_number" id="tax_account_number1" required>
                      </div>
                      <div style="cursor: pointer; margin-left: 3px">
                        <svg margin="[object Object]" aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--cancel-svg Icon-color-svg Icon-color--blue-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 6.585l4.593-4.592a1 1 0 0 1 1.415 1.416L9.417 8l4.591 4.591a1 1 0 0 1-1.415 1.416L8 9.415l-4.592 4.592a1 1 0 0 1-1.416-1.416L6.584 8l-4.59-4.591a1 1 0 1 1 1.415-1.416z" fill-rule="evenodd"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 validation" id="validation" style="color: red;"></div>
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
              <span href="#">Add customer</span>
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
<script src="{{ asset('js/scripts/pages/customer.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>
@endsection
