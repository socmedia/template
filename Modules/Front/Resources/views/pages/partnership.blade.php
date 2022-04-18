@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Kemitraan Agen</h1>
        <p>Bergabunglah menjadi agen mitra rosalia express dan dapatkan berbagai keuntungannya.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kemitraan Agen</li>
    </ol>
</header>
<section class="about-content intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="heading dark mb-2"><strong>Kemitraan Agen</strong></h4>
                <p class="sub-heading">
                    Kemitraan agen rosalia express membuka kesempatan bagi masyarakat untuk bergabung menjadi mitra
                    agen. Dapatkan kemudahan
                    dalam pendaftaran dan berbagai keuntungan lainnya.
                </p>

                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bx-file"></i>
                                </h2>

                                <p class="fw-600 mb-2">Persyaratan Dokumen :</p>

                                <ul>
                                    <li> Fotocopy KTP Pemohon</li>
                                    <li> Fotocopy KK Pemohon</li>
                                    <li> Surat Keterangan Usaha</li>
                                    <li> Foto 4 x 6 berwarna 2 lembar</li>
                                    <li> Bukti sewa tempat (jika tempat usaha sewa)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bx-gift"></i>
                                </h2>

                                <p class="fw-600 mb-2">Keuntungan menjadi Mitra Rosalia Expess :</p>

                                <ul>
                                    <li> Gratis Biaya Kemitraan</li>
                                    <li> Gratis media branding</li>
                                    <li> Gratis biaya pembekalan/training</li>
                                    <li> Komisi kemitraan yang menarik</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card card-with-icon">
                            <div class="card-body">
                                <h2 class="icon mb-3">
                                    <i class="bx bx-building-house"></i>
                                </h2>

                                <p class="fw-600 mb-2">Persyaratan Sarana & Prasarana :</p>

                                <ul>
                                    <li> Menyediakan ruang tempat usaha minimal 3 x 3 meter</li>
                                    <li> Menyedikan Komputer, printer dan koneksi internet</li>
                                    <li> Menyediakan timbangan kapasitas minimal 100 Kg</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
