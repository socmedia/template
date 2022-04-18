@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Cek Paket</h1>
        <p>Kemudahan dalam pengecekan posisi paket anda secara online dan realtime.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cek Paket</li>
    </ol>
</header>

<section class="about-content intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <livewire:front::float-card.tracking :isHomePage="$isHomePage" />
            </div>
        </div>
    </div>
</section>
@endsection
