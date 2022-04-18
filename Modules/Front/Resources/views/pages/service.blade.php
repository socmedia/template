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
        <livewire:front::front.services :isHomePage="$isHomePage" />
    </div>
</section>
@endsection
