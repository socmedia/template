@extends('layouts.auth')

@section('title', 'Login')

@push('alert')
@if (session('status') == 'verification-link-sent')
<div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white" style="text-align: left">Success</h6>
            <div class="text-white" style="text-align: left">A new verification link has been sent to the email address
                you provided during
                registration.</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endpush

@section('content')
<div class="p-5">

    @if (cache('verify_email_title'))
    <h4 class="font-weight-bold">{{ cache('verify_email_title') }}</h4>
    @endif

    @if (cache('verify_email_caption'))
    <p class="text-muted">{{ cache('verify_email_caption') }}</p>
    @endif

    <div class="row">
        <div class="col-12 mb-3">
            <form method="POST" class="d-flex" action="{{ route('verification.send') }}">
                @csrf
                <button class="btn btn-primary w-100">Resend Verification Email</button>
            </form>
        </div>
        <div class="col-12 mb-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-light w-100">
                    <i class='bx bx-arrow-back mr-1'></i>Log Out
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
