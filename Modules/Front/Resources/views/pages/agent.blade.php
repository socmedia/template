@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Lokasi Agen</h1>
        <p>Solusi atas kebutuhan pengiriman paket anda yang aman dan terpercaya.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lokasi Agen</li>
    </ol>
</header>

<section class="about-content intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <livewire:front::float-card.agent-location :isHomePage="$isHomePage" />
            </div>
        </div>
    </div>
</section>
@endsection
