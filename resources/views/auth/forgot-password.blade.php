@extends('layouts.auth')

@section('title', 'Forgot Password')

@push('alert')
@if (session('status'))
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white" style="text-align: left">Success</h6>
            <div class="text-white">{{session('status')}}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endpush

@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="text-left">
        <img src="{{asset('assets/app/images/icons/forgot-2.png')}}" width="80" alt="" />
    </div>
    <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
    <p class="text-muted">Enter your registered email ID to reset the password</p>
    <div class="my-4">
        <label class="form-label">Email Address</label>
        <input type="text" class="form-control form-control-lg" placeholder="example@user.com" name="email" />
        @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-primary btn-block">Send Password Reset Link</button>
        <a href="{{ route('login') }}" class="btn btn-light btn-block">
            <i class='bx bx-arrow-back me-1'></i>Back to Login
        </a>
    </div>
</form>
@endsection
