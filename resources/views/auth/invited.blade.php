@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Register Page')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- register section starts -->
<section class="row flexbox-container">
  <div class="col-xl-3 col-sm-6 col-11">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
          <!-- register section left -->
          <div class="col-12 px-0">
            <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
              <div class="card-header pb-1">
                  <div class="card-title">
                      <h4 class="text-center mb-2">Thank you for accept to our invitation</h4>
                  </div>
              </div>
              <div class="text-center">
                <p> <small> Please enter your details to sign up and be part of our great community</small>
                </p>
              </div>
              <div class="card-body">
                <form action="{{route('invite-accept')}}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $data->token }}"/>
                    <div class="form-group mb-80">
                        <label class="text-bold-600 mb-50" for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            placeholder="Email address" value="{{ $data->email }}" disabled>
                    </div>
                    <div class="form-group mb-80">
                      <label class="text-bold-600 mb-50" for="use_name">User name</label>
                      <input type="text" class="form-control" id="user_name" name="user_name"
                          placeholder="User name">
                      @error('user_name')
                          <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group mb-80">
                      <label class="text-bold-600 mb-50" for="use_salt">User salt</label>
                      <input type="text" class="form-control" id="user_salt" name="user_salt"
                          placeholder="User salt">
                      @error('user_salt')
                          <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group mb-80">
                        <label class="text-bold-600 mb-50" for="pass1">Password</label>
                        <input type="password" class="form-control" id="pass1" name="password"
                            placeholder="Password">
                    </div>
                    <div class="form-group mb-2">
                        <label class="text-bold-600 mb-50" for="pass2">Confirm New Password</label>
                        <input type="password" class="form-control" id="pass2" name="password_confirmation"
                            placeholder="Confirm your new password">
                    </div>
                    <button type="submit" class="btn btn-primary glow position-relative w-100">SIGN UP<i
                            id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                </form>
                <hr>
                <div class="text-center">
                  <small class="mr-25">Already have an account?</small>
                  <a href="{{route('login')}}"><small>Sign in</small> </a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- register section endss -->
@endsection
