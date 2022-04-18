@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Tentang Kami</h1>
        <p>Solusi atas kebutuhan pengiriman paket anda yang aman dan terpercaya.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
    </ol>
</header>

<section class="about-content intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-5 text-center">
                <div class="img-box">
                    <img src="{{ asset('images/about.png') }}" alt="Image">
                </div>
            </div>
            <div class="col-md-10 col-lg-5">
                <h2 class="mb-2">Rosalia Express</h2>
                <p>Rosalia Express adalah salah satu bagian dari unit bisnis Rosalia Indah Group yang khusus melayani
                    customer dalam hal pengiriman paket barang. Rosalia Express berawal dari Rosalia Indah dengan armada
                    Bus yang sering mendapat titipan paket ke berbagai tujuan yang diletakkan di bagasi bus, sehingga
                    seiring berjalannya waktu dan seiring kemajuan serta perkembangan usaha, pada tanggal 6 Maret 2004
                    resmi berdiri PT. Rosalia Express yang fokus hanya menangani jasa pengiriman paket. Hingga sekarang
                    Rosalia Express memiliki jaringan 14 Area Perwakilan dan lebih dari 200 Agen yang tersebar di
                    seluruh Jawa dan Sumatera dan saat dapat melayani pengiriman 37 Provinsi di Indonesia.
                </p>

                <p>Pelayanan paket Rosalia Express tidak hanya melayani pengiriman dalam segmen retail, kami juga
                    melayani pengiriman paket dalam skala besar untuk memenuhi kebutuhan pengiriman bisnis. Dalam upaya
                    peningkatan kepuasan pelanggan Rosalia Express melakukan pembenahan dan penyempurnaan pada semua
                    lini dan jenjang manajerial, melakukan pelatihan untuk meningkatkan kompetensi kepada lebih dari 360
                    karyawan yang tersebar diseluruh area perwakilan, menggunakan teknologi yang terintegrasi dalam
                    manajemen distribusi dan didukung oleh armada yang prima.
                </p>
            </div>

            <div class="col-md-10 mb-5">
                <h4 class="heading dark"><strong>Kebijakan Mutu</strong></h4>
                <p>
                    Perusahaan berkomitmen untuk selalu memenuhi persyaratan pelanggan dan peraturan yang berlaku demi
                    tercapainya kepuasan pihak - pihak terkait dan terus melakukan peningkatan di dalam tubuh perusahaan
                    dan perusahaan berkomitmen untuk mengkomunikasikan dan memberikan pemahaman kepada seluruh elemen
                    perusahaan agar diimplementasikan pada semua tingkatan. Oleh karena itu, demi tercapainya cita-cita
                    perusahaan, maka dalam operasional setiap waktunya perusahaan berkomitmen untuk melaksanakan
                    nilai-nilai luhur perusahaan dan budaya perusahaan "5B", yaitu :
                </p>
                <ol>
                    <li> Bersikap jujur dan amanah</li>
                    <li> Bekerja disiplin, teratur, tetap, dan konsisten</li>
                    <li> Berpikir cepat, cerdas, dan cermat</li>
                    <li> Berkomunikasi jelas dan ramah</li>
                    <li> Berfokus pada target dan orientasi pada hasil.</li>
                </ol>
            </div>

            <div class="col-md-10">
                <h4 class="heading dark">Layanan di Rosalia Express</h4>
                <p class="sub-heading">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna
                    aliqua.
                </p>

                <livewire:front::front.services :isHomePage="true" />

                <a class="btn btn-primary text-white" href="#">
                    Lihat Selengkapnya
                    <svg width="24" height="24" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.075 22.5C12.6825 22.4977 12.2948 22.4125 11.9375 22.25C11.551 22.0796 11.2218 21.8017 10.989 21.4492C10.7563 21.0968 10.6299 20.6848 10.625 20.2625V9.7375C10.6299 9.31518 10.7563 8.9032 10.989 8.55077C11.2218 8.19834 11.551 7.92034 11.9375 7.74999C12.3822 7.53995 12.8769 7.45906 13.3653 7.51652C13.8538 7.57398 14.3162 7.76749 14.7 8.075L21.075 13.3375C21.325 13.5365 21.5269 13.7894 21.6657 14.0772C21.8044 14.365 21.8765 14.6805 21.8765 15C21.8765 15.3195 21.8044 15.635 21.6657 15.9228C21.5269 16.2106 21.325 16.4635 21.075 16.6625L14.7 21.925C14.2405 22.2977 13.6666 22.5007 13.075 22.5Z"
                            fill="white" />
                    </svg>
                </a>
            </div>

            <div class="col-md-10">
                <blockquote>
                    <p>Song such eyes had and off. Removed winding ask explain delight out few behaved lasting</p>
                    <strong>Zaga Construction Lead Engineer</strong>
                </blockquote>
            </div>
        </div>
    </div>
</section>
@endsection
