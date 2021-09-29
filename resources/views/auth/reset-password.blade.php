@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <div class="p-5">
        <h4 class="font-weight-bold">Generate New Password</h4>
        <p class="text-muted">We received your reset password request. Please enter your new password!</p>
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="mb-3 mt-5">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                value="{{old('email') ?: request()->email }}">

            @error('email')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control border-end-0" id="password" value="" name="password"
                    placeholder="Enter Password">
                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
            </div>
            @error('password')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Re-Type Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control border-end-0" id="password_confirmation" value=""
                    name="password_confirmation" placeholder="Re-Type Password">
                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary">Change Password</button>
            <a href="{{ route('login') }}" class="btn btn-light">
                <i class='bx bx-arrow-back mr-1'></i>Back to Login
            </a>
        </div>
    </div>
</form>
@endsection

@push('extra-scripts')
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            const parent = $(this).parents('.input-group');
            console.log(parent)
            if (parent.find('input').attr("type") == "text") {
                parent.find('input').attr('type', 'password');
                parent.find('i').addClass("bx-hide");
                parent.find('i').removeClass("bx-show");
            } else if (parent.find('input').attr("type") == "password") {
                parent.find('input').attr('type', 'text');
                parent.find('i').removeClass("bx-hide");
                parent.find('i').addClass("bx-show");
            }
        });
    });
</script>
@endpush
