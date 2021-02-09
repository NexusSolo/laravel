@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Forgot Password')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- forgot password start -->
<section class="row flexbox-container">
  <div class="col-xl-3 col-sm-6 col-11 px-0">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- left section-forgot password -->
        <div class="col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="text-center mb-2">Forgot Password?</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="text-muted text-center mb-2"><small>Enter the email you used
              when you joined and we will send you temporary password</small></div>
              <form class="mb-2" action="{{route('password.email')}}" method="POST">
                @csrf
                @if (Session::has('status'))
                <div class="alert bg-rgba-primary mb-1" role="alert">
                  {{ Session::get('status') }}
                </div>
                @endif
                <div class="form-group mb-2">
                  <label class="text-bold-600" for="exampleInputEmailPhone1">Email</label>
                  <input type="text" class="form-control" id="exampleInputEmailPhone1" placeholder="Email" name="email">
                  @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary glow w-100 position-relative">SEND PASSWORD<i
                  id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
              </form>
              <div class="text-center mb-2">
                <a href="{{asset('login')}}"><small class="text-muted">I remembered my password</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- forgot password ends -->
@endsection
