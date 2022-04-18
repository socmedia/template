@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Sohib Rosalia Express</h1>
        <p>Bergabunglah menjadi sohib Rosalia Express dan dapatkan banyak keuntungannya.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sohib Rosalia Express</li>
    </ol>
</header>

<section class="about-content intro">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-sm-10 col-lg-5 text-center">
                <div class="img-box">
                    <img style="border-radius: 24px;" src="{{ asset('images/sohib_rosalia_express.png') }}" alt="Image">
                </div>
            </div>

            <div class="col-md-10 col-lg-5">
                <h2 class="mb-2">Rosalia Express</h2>
                <p>Sohib Rosalia Express adalah program eksklusif bagi pelanggan setia Rosalia Express. Dengan bergabung
                    menjadi Sohib Rosalia Express, Anda akan mendapatkan berbagai keuntungan dan promo yang menarik.
                </p>
            </div>

            <div class="col-md-10">
                <div class="row justify-content-center mt-5">
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bx-receipt"></i>
                                </h2>

                                <p class="mb-2">Pendaftaran mudah, cepat, dan secara online.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bxs-discount"></i>
                                </h2>

                                <p class="mb-2">Keuntungan menjadi Sohib Rosalia Express :</p>

                                <ul>
                                    <li>Diskon Promo 20% setiap pengiriman paket min. transaksi Rp. 100.000,-</li>
                                    <li>Dikson promo khusus pada momen-momen tertentu</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bx-edit-alt"></i>
                                </h2>

                                <p class="mb-2">Biaya pendaftaran GRATIS dan berlaku seumur hidup.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="heading dark my-4">Bergabung menjadi bagian dari Sohib Rosalia Express Sekarang!</h6>
                <iframe src="https://rosin-group.com/holding/pendaftaran_privillage#" frameborder="0" width="100%"
                    height="800"></iframe>
                <div class="card bg-dark text-white rounded-0 mt-5">
                    <div class="card-body py-5">
                        <h6 class="text-center dark my-4">Atau kunjungi link pendaftaran dibawah!</h6>
                        <div class="text-center">
                            <a href="https://rosin-group.com/holding/pendaftaran_privillage" target="_blank"
                                class="btn btn-primary py-3 px-5 cursor-pointer" style="font-size: 1rem">Daftar
                                Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
