@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<form class="row g-3" action="{{ route('register') }}" method="POST">
    @csrf

    <div class="col-12">
        <h4 class="font-weight-bold">{{ $register_title }}</h4>
        <p class="text-muted">{{ $register_caption }}</p>
    </div>

    <div class="col-12">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" placeholder="Your name" name="name" value="{{old('name')}}">
        @error('name')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="col-12">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" placeholder="example@domain.com" name="email"
            value="{{old('email')}}">
        @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="col-12">
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
    <div class="col-12">
        <label for="password_confirmation" class="form-label">Re-Type Password</label>
        <div class="input-group" id="show_hide_password">
            <input type="password" class="form-control border-end-0" id="password_confirmation" value=""
                name="password_confirmation" placeholder="Re-Type Password">
            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
        </div>
    </div>
    {{-- <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
            <label class="form-check-label" for="flexSwitchCheckChecked">I read
                and agree to Terms & Conditions</label>
        </div>
    </div> --}}
    <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
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
