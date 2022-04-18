@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Layanan & Produk</h1>
        <p>Bergabunglah menjadi agen mitra rosalia express dan dapatkan berbagai keuntungannya.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Layanan & Produk</li>
    </ol>
</header>
<section class="about-content intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="media mb-3">
                    <img src="{{ $service->thumbnail }}" alt="{{ $service->name }}">
                    <div class="media-body">
                        <h4 class="mb-0 font-weight-bold">{{ $service->name }}</h4>
                        {!! $service->description !!}

                        <hr>

                        <div class="d-flex mb-3">
                            @if ($service->duration)
                            <div>
                                <div class="btn btn-primary d-inline-flex mr-3">
                                    <i class="bx bxs-time"></i>
                                </div>
                            </div>
                            <div>
                                {!! $service->duration !!}
                            </div>
                            @endif

                        </div>

                        <div class="d-flex">
                            @if ($service->terms_n_conditions)
                            <div>
                                <div class="btn btn-primary d-inline-flex mr-3">
                                    <i class="bx bxs-notepad"></i>
                                </div>
                            </div>
                            <div>
                                {!! $service->terms_n_conditions !!}
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
