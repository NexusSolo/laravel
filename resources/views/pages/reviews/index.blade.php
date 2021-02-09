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
<style>

</style>
@endsection

@section('content')
<section id="customers">
  <div class="d-flex position-relative">
    <h2>Reviews</h2>

    <div class="position-absolute customers-buttons">
      <div class="btn btn-sm btn-white"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--filter-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.994.004c.555 0 1.006.448 1.006 1a.997.997 0 0 1-.212.614l-5.782 7.39L9 13.726a1 1 0 0 1-.293.708L7.171 15.97A.1.1 0 0 1 7 15.9V9.008l-5.788-7.39A.996.996 0 0 1 1.389.214a1.01 1.01 0 0 1 .617-.21z" fill-rule="evenodd"></path>
          </svg> Filter</span></div>
      <div class="btn btn-sm btn-white"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowExport-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 10.006a1 1 0 1 1-2 0v-5.6L2.393 15.009a.992.992 0 1 1-1.403-1.404L11.595 3.002h-5.6a1 1 0 0 1 0-2.001h8.02a1 1 0 0 1 .284.045.99.99 0 0 1 .701.951z" fill-rule="evenodd"></path>
          </svg> Export</span></div>
    </div>
  </div>
  @if($datas)
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
            <th>Amount</th>
            <th>Description</th>
            <th>Customer</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $index => $data)
          <tr class='clickable-row' data-id={{ $data->id }}>
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input each-checkbox" name="customCheck" id="customCheck{{$data}}">
                <label class="custom-control-label" for="customCheck{{$data}}"></label>
              </div>
            </td>
            <td>

                {{$data->amount}}

            </td>
            <td>{{$data->description}}</td>
            <td>{{$data->account ? $data->account->account_email : '---'}}</td>
            <td>
              {{(new \Carbon\Carbon($data->created))->format('jS F h:i A')}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="table-summary mt-1">
      <div class="float-left font-small-3"><span>{{ count($datas) }} member</span></div>
      <div class="float-right">
        <div class="btn btn-sm btn-white disabled">Previous</div>
        <div class="btn btn-sm btn-white disabled">Next</div>
      </div>
    </div>
  </div>
  @else
  <div class="empty-state">
    <div class="empty-state-inner">
      <div class="empty-state-icon"><i class="bx bxs-show"></i></div>
      <div class="empty-state-title">No payments to review</div>
      <div class="empty-state-content"></div>
      <div class="empty-state-more">
        <a href="">Learn more&nbsp;
          <svg aria-hidden="true" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M12.583 7L7.992 2.409A1 1 0 1 1 9.407.993l6.3 6.3a1 1 0 0 1 0 1.414l-6.3 6.3a1 1 0 0 1-1.415-1.416L12.583 9H1a1 1 0 1 1 0-2z" fill-rule="evenodd"></path></svg>
        </a>
      </div>
    </div>
  </div>
  @endif
  <!--Basic Modal -->

</section>
  <!--Basic Modal -->
    <div class="modal fade text-left" id="review-transaction-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel1">Review Transaction</h3>
          </div>
          <div class="modal-body">
            <div class="form-group mt-2">
              <label for="review_reason">Review reason</label>
              <input name="note" type="text" class="form-control form-control-sm" id="review_reason" required placeholder="Enter Text">
            </div>
            <div class="form-group mt-2">
              <div class="custom-control custom-checkbox mt-1 mb-3">
                <input type="checkbox" class="custom-control-input" name="for_review" checked id="for_review">
                <label class="custom-control-label" for="for_review"> For Review</label>
              </div>
            </div>
            <div class="reviews-notes">
              <div class="card">
                <div class="card-body p-0 pb-1">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                      <div class="list-left d-flex">
                        <div class="list-icon mr-1">
                          <div class="avatar bg-rgba-primary m-0">
                            <div class="avatar-content">
                              <div class="empty-avatar">AB</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-content">
                          <span class="list-title">User Input Comment</span>
                          <small class="text-muted d-block">02/05/2021</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                      <div class="list-left d-flex">
                        <div class="list-icon mr-1">
                          <div class="avatar bg-rgba-primary m-0">
                            <div class="avatar-content">
                              <div class="empty-avatar">AB</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-content">
                          <span class="list-title">User Input Comment</span>
                          <small class="text-muted d-block">02/05/2021</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                      <div class="list-left d-flex">
                        <div class="list-icon mr-1">
                          <div class="avatar bg-rgba-primary m-0">
                            <div class="avatar-content">
                              <div class="empty-avatar">AB</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-content">
                          <span class="list-title">User Input Comment</span>
                          <small class="text-muted d-block">02/05/2021</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                      <div class="list-left d-flex">
                        <div class="list-icon mr-1">
                          <div class="avatar bg-rgba-primary m-0">
                            <div class="avatar-content">
                              <div class="empty-avatar">AB</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-content">
                          <span class="list-title">User Input Comment</span>
                          <small class="text-muted d-block">02/05/2021</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                      <div class="list-left d-flex">
                        <div class="list-icon mr-1">
                          <div class="avatar bg-rgba-primary m-0">
                            <div class="avatar-content">
                              <div class="empty-avatar">AB</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-content">
                          <span class="list-title">User Input Comment</span>
                          <small class="text-muted d-block">02/05/2021</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                      <div class="list-left d-flex">
                        <div class="list-icon mr-1">
                          <div class="avatar bg-rgba-primary m-0">
                            <div class="avatar-content">
                              <div class="empty-avatar">AB</div>
                            </div>
                          </div>
                        </div>
                        <div class="list-content">
                          <span class="list-title">User Input Comment</span>
                          <small class="text-muted d-block">02/05/2021</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn btn-sm btn-white" id="cancel">
              <span href="#">Cancel</span>
            </div>
            <button class="btn btn-sm btn-primary">
              <span href="#">Add Note</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
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

<script>
  $(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".clickable-row").click(function() {
        var id = $(this).data("id");
        var url = "{{ route('reviews.edit',':id') }}";
        url = url.replace(':id', id);
        $.ajax({
          type: "GET",
          url: url,
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function (data, status, jqXHR) {
            $('.reviews-notes .card-body').empty();
            data.forEach(element => {
              console.log(element);

              var short_name = '';
              var fullname = element.user_name.split(" ");
              if(fullname.length>1)
                  shortname = fullname[0].charAt(0) + fullname[1].charAt(0)
              else if(fullname.length == 1)
                  shortname = element.user_name.charAt(0);

              $('.reviews-notes .card-body').append(
                    '<ul class="list-group list-group-flush">'
                      + '<li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">'
                        + '<div class="list-left d-flex">'
                          +'<div class="list-icon mr-1">'
                            + '<div class="avatar bg-rgba-primary m-0">'
                              + '<div class="avatar-content">'
                                + '<div class="empty-avatar">' + shortname + '</div>'
                              + '</div>'
                            + '</div>'
                          + '</div>'
                          + '<div class="list-content">'
                            + '<span class="list-title">' + element.note +'</span>'
                            + '<small class="text-muted d-block">' + element.created_at + '</small>'
                          + '</div>'
                        + '</div>'
                      + '</li>'
                    + '</ul>'
                );
            });
            $("#review-transaction-modal").modal('show')

          },
          error: function (jqXHR, status) {
            console.log('F');
          }
        });
    });
    if ($(".reviews-notes .card-body").length > 0) {
    var widget_earnings = new PerfectScrollbar(".reviews-notes .card-body");
  }
});
</script>
@endsection
