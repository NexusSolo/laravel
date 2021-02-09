@extends('layouts.contentLayoutMaster1')
{{-- page title --}}
@section('title','Settings - G-Payments')
{{-- vendor styles --}}
@section('vendor-styles')
@endsection
{{-- page styles --}}
@section('page-styles')
@endsection

@section('content')
<section id="settings">
  <div class="">
    <h2>Team</h2>
    @if (Session::has('status'))
    <div class="alert bg-rgba-success mb-1" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      {{ Session::get('status') }}
    </div>
    @endif
    <div class="table-filter mt-2">
      <fieldset class="form-label-group form-group position-relative has-icon-left float-left" style="max-width:360px;">
        <input type="text" class="form-control form-control-sm" id="iconLabelLeft" placeholder="Filter by name or email...">
        <div class="form-control-position form-control-sm">
          <i class="bx bx-search"></i>
        </div>
        <label for="iconLabelLeft">Filter by name or email...</label>
      </fieldset>
      <fieldset class="form-group form-control-sm float-left" style="min-width:180px;">
        <select class="custom-select form-control-sm" id="customSelect">
          <option selected="">All roles</option>
          @foreach ($roles as $role)
          <option value="{{ $role->id }}">{{ $role->role_name }}</option>
          @endforeach
        </select>
      </fieldset>
      <button class="btn btn-sm btn-white float-right ml-1"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowExport-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M15 10.006a1 1 0 1 1-2 0v-5.6L2.393 15.009a.992.992 0 1 1-1.403-1.404L11.595 3.002h-5.6a1 1 0 0 1 0-2.001h8.02a1 1 0 0 1 .284.045.99.99 0 0 1 .701.951z" fill-rule="evenodd"></path></svg> Export team</span></button>
      <button class="btn btn-sm btn-white float-right" data-toggle="modal" data-target="#invite-modal"><span href="#"><svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--add-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M9 7h6a1 1 0 0 1 0 2H9v6a1 1 0 0 1-2 0V9H1a1 1 0 1 1 0-2h6V1a1 1 0 1 1 2 0z" fill-rule="evenodd"></path></svg> New member</span></button>
    </div>
    <div class="table-responsive">
      <table class="table mb-0">
        <thead>
          <tr>
            <th>Team Member</th>
            <th>Role</th>
            <th>Last Login</th>
            <th>Two-Step</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($members as $index => $member)
          <tr>
            <td><strong>{{ $member->user_name }}</strong> @if ($member->id==$user->id)<div class="badge badge-light-primary ml-1 px-1">You</div>@endif <br>{{ $member->email }}</td>
            <td>{{ $member->role->role_name }} {{ $member->master_account_id==$member->id?'(Owner)':'' }}</td>
            <td><div class="badge badge-light-success px-1">Today</div></td>
            <td></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="table-summary mt-1">
    <div class="float-left font-small-3"><span>{{ count($members) }} member</span></div>
    <div class="float-right">
      <div class="btn btn-sm btn-white disabled">Previous</div>
      <div class="btn btn-sm btn-white disabled">Next</div>  
    </div>
  </div>

  <div class="modal fade" id="invite-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog">
      <form id="invite-form" method="POST" action="{{ route('invite-send') }}">
      <div class="modal-content">
          @csrf
        <div class="modal-header d-block p-2">
          <h6 class="text-bold-600">Invite new users</h6>
          <p class="font-small-3 mb-0">Enter the email addresses of the users you'd like to invite, and choose the role they should have.</p>
        </div>
        <div class="modal-body p-0">
          <div class="px-2 py-1 border-bottom">
              <input type="text" name="email" class="form-control font-small-3" id="email_input" placeholder="Enter email">
          </div>
          @foreach ($roles as $index => $role)
          <div class="px-0 py-1 m-0 row font-small-3 @if ($index+1 < count($roles)) border-bottom @endif">
            <div class="col-md-4">
              <fieldset>
                <div class="radio radio-primary radio-glow">
                    <input type="radio" name="role" id="id_{{ $role->id }}" value="{{ $role->id }}" @if ($index==0)checked @endif>
                    <label for="id_{{ $role->id }}" class="font-small-3">{{ $role->role_name }}</label>
                </div>
              </fieldset>
            </div>
            <div class="col-md-8">{{ $role->role_description }}</div>
          </div>
          @endforeach
        </div>
        <div class="modal-footer d-block p-1">
          <button type="submit" class="btn btn-primary btn-sm float-right" id="btn_invite">&nbsp;Invite&nbsp;</button>
          <button type="button" class="btn btn-white btn-sm float-right" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script>
$(function () {
  'use strict';

  var jqForm = $('#invite-form');
  if (jqForm.length) {
    jqForm.validate({
      rules: {
        'email': {
          required: true,
          email: true
        },
        'role': {
          required: true
        },
        customFile: {
          required: true
        },
        validationRadiojq: {
          required: true
        },
        validationBiojq: {
          required: true
        },
        validationCheck: {
          required: true
        }
      }
    });
  }
});

</script>
@endsection
