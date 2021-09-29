@extends('layouts.auth')

@section('title', 'Login')

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
<form class="row g-3" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="col-12">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
            value="{{old('email')}}">

        @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="col-12">
        <label for="password" class="form-label">Enter
            Password</label>
        <div class="input-group" id="show_hide_password">
            <input type="password" class="form-control border-end-0" id="password" placeholder="Enter Password"
                name="password">
            <a href="javascript:;" class="input-group-text bg-transparent">
                <i class='bx bx-hide'></i>
            </a>
        </div>
        @error('password')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="remember" id="flexSwitchCheckChecked">
            <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
        </div>
    </div>
    <div class="col-md-6 text-end">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Forgot Password?</a>
        @endif
    </div>
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-log-in"></i>Sign in
            </button>
        </div>
    </div>
</form>
@endsection

@push('extra-scripts')
<script>
    $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
</script>
@endpush
