@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Solusi Bisnis</h1>
        <p>Kami hadir untuk memenuhi kebutuhan pengiriman bisnis anda.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Solusi Bisnis</li>
    </ol>
</header>
<section class="about-content intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="heading dark mb-2"><strong>Solusi Bisnis</strong></h4>
                <p class="sub-heading">
                    Kami memahami bahwa kebutuhan pengiriman personal berbeda dengan kebutuhan pengiriman oleh para
                    pelaku bisnis, Rosalia Express menyediakan solusi layanan yang disesuaikan spesifik dengan kebutuhan
                    proses distribusi dan logistik bisnis Anda.
                </p>

                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bx-package"></i>
                                </h2>

                                <p class="mb-2">Layanan pengiriman PARIKESIT (Pick-Up dan Antar Kiriman Sampai
                                    tujuan) yang menawarkan kemudahan dan kepraktisan dalam
                                    pengelolaan distribusi bisnis Anda</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bx-dollar"></i>
                                </h2>

                                <p class="mb-2">Tarif pengiriman yang lebih hemat melalui kontrak kerjasama yang
                                    saling menguntungkan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bx-credit-card-alt"></i>
                                </h2>

                                <p class="mb-2">Layanan BISMA (Bisa Invoice Sesuai Kiriman Anda) yang menawarkan
                                    Fleksibiltas Pembayaran dengan sistem tagihan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
