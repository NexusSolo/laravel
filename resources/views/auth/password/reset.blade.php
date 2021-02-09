@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Reset Password')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- reset password start -->
<section class="row flexbox-container">
    <div class="col-xl-3 col-sm-6 col-11 px-0">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left section-login -->
                <div class="col-12 px-0">
                    <div class="card disable-rounded-right d-flex justify-content-center mb-0 p-2 h-100">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="text-center mb-2">Reset your Password</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="mb-2" action="{{route('password.update')}}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}"/>
                                <input type="hidden" name="email" value="{{ $email }}"/>
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group mb-80">
                                    <label class="text-bold-600 mb-50" for="exampleInputPassword1">New Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                        placeholder="Enter a new password">
                                    @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label class="text-bold-600 mb-50" for="exampleInputPassword2">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation"
                                        placeholder="Confirm your new password"></div>
                                <button type="submit" class="btn btn-primary glow position-relative w-100">Reset my
                                    password<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- reset password ends -->
@endsection
