<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{ cache('favicon') }}" type="image/png" />
    <!-- loader-->
    <link href="{{asset('assets/app/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/app/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/app/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets/app/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('assets/app/css/icons.css')}}" rel="stylesheet">
    <title>{{ cache('app_name') }} | @yield('title')</title>

    @stack('extra-styles')
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="{{ cache('default_logo_16_9') }}" width="180" alt="" />
                            @stack('alert')
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="form-body py-5">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/app/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/app/js/bootstrap.bundle.min.js')}}"></script>
    @stack('extra-scripts')

</html>
