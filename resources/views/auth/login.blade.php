@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Login Page')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- login page start -->
<section id="auth-login" class="row flexbox-container">
  <div class="col-xl-3 col-sm-6 col-11">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- left section-login -->
        <div class="col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="text-center mb-2">Sign in to your account</h4>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('login')}}" method="POST">
                  @csrf
                  @if (Session::has('status'))
                  <div class="alert bg-rgba-primary mb-1" role="alert">
                    {{ Session::get('status') }}
                  </div>
                  @endif
                  <div class="form-group mb-80">
                      <label class="text-bold-600 mb-50" for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                          placeholder="Email address">
                      @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label class="text-bold-600 mb-50" for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                          placeholder="Password">
                      @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div
                      class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                      <div class="text-left">
                          <div class="checkbox checkbox-sm">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="checkboxsmall" for="exampleCheck1"><small>Keep me logged
                                      in</small></label>
                          </div>
                      </div>
                      <div class="text-right"><a href="{{route('password.request')}}"
                              class="card-link"><small>Forgot Password?</small></a></div>
                  </div>
                  <button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i
                          id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
              </form>
              <hr>
              <div class="text-center">
                <small class="mr-25">Don't have an account?</small>
                <a href="{{route('register')}}"><small>Sign up</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- login page ends -->

@endsection
