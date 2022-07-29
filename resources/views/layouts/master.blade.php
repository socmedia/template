<!doctype html>


@auth
    <?php
    $preferences = auth()->user()->preferences;
    $theme = [
        'theme' => null,
        'header' => null,
        'sidebar' => null,
    ];

    if ($preferences) {
        $theme['theme'] = $preferences->general_theme;
        $theme['header'] = $preferences->navbar_theme;
        $theme['sidebar'] = $preferences->sidebar_theme;
    }
    ?>
    <html lang="en" class="{{ implode(' ', $theme) }}">
@else
    <html lang="en">
@endauth

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{ cache('favicon') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/app/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/app/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/app/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/app/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/app/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/app/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/app/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/icons.css') }}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/app/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/css/additional.css') }}">
    @livewireStyles


    {{-- Filepond --}}
    <link href="{{ asset('vendor/filepond/css/filepond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/filepond/plugins/image-preview/filepond-plugin-image-preview.min.css') }}"
          rel="stylesheet" />
    <link href="{{ asset('vendor/filepond/plugins/file-poster/filepond-plugin-file-poster.min.css') }}"
          rel="stylesheet" />

    {{-- Summernote --}}
    <link href="{{ asset('vendor/summernote/css/summernote-lite.min.css') }}" rel="stylesheet">

    @stack('style')
    <title>{{ cache('app_name') }} | @yield(' title')</title>
</head>

<body>
    <div class="wrapper">
        @include('layouts.header')

        @include('layouts.nav')

        @yield('wrapper')

        <div class="overlay toggle-icon"></div>

        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <footer class="page-footer">
            <p class="mb-0">{{ cache('copyright') }}</p>
        </footer>
    </div>

    <script src="{{ asset('assets/app/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/app/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('assets/app/js/app.js') }}"></script>
    <script src="{{ asset('assets/app/js/additional.js') }}"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    @stack('script')

    {{-- Summernote --}}
    <script src="{{ asset('vendor/summernote/js/summernote-lite.min.js') }}"></script>

    {{-- Filepond --}}
    <script src="{{ asset('vendor/filepond/js/filepond.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/file-poster/filepond-plugin-file-poster.min.js') }}"></script>
    <script src="{{ asset('vendor/filepond/plugins/jquery/filepond.jquery.js') }}"></script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const modalEl = document.getElementById('remove-modal');
            if (modalEl) {
                var removeModal = new bootstrap.Modal(modalEl, {
                    keyboard: false
                })

                $('#remove-button').click(function() {
                    removeModal.toggle()
                })
            }
        })
    </script>
</body>

</html>
