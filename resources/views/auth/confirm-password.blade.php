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
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    @if (cache('confirm_password_title'))
    <h4 class="font-weight-bold">{{ cache('confirm_password_title') }}</h4>
    @endif

    @if (cache('confirm_password_caption'))
    <p class="text-muted">{{ cache('confirm_password_caption') }}</p>
    @endif

    <div class="my-4">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" id="password" class="block mt-1 w-full" type="password" name="password" />
        @error('password')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-primary btn-block">Confirm</button>
    </div>
</form>
@endsection
