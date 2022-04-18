@extends('front::layouts.master')

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
    integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<livewire:front::front.banner />

<section class="float-card bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <livewire:front::front.float-card :isHomePage="$isHomePage" />
            </div>

            <div class="col-md-10 offset-md-1">
                <h2 class="heading dark">Promo terbaru dari kami.</h2>
                <p class="sub-heading">
                    Nikmati berbagai penawaran yang hanya ada di Rosalia Express, mulai dari promo pengiriman, diskon,
                    hingga cashback!
                </p>

                <livewire:front::front.promos :isHomePage="$isHomePage" />
            </div>
        </div>
    </div>
</section>

<section class="intro">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10 col-lg-5 text-center">
                <div class="img-box">
                    <img src="{{ asset('images/about.png') }}" alt="Image">
                </div>
            </div>

            <div class="col-md-10 col-lg-5 wow">
                <div class="content-box">
                    <h3 class="heading dark">Sekilas Tentang Rosalia Express</h3>
                    <p>Rosalia Express adalah salah satu bagian dari unit bisnis Rosalia Indah Group yang khusus
                        melayani customer dalam hal pengiriman paket barang. Rosalia Express berawal dari Rosalia Indah
                        dengan armada Bus yang sering mendapat titipan paket ke berbagai tujuan yang diletakkan di
                        bagasi bus, sehingga seiring berjalannya waktu dan seiring kemajuan serta perkembangan usaha,
                        pada tanggal 6 Maret 2004 resmi berdiri PT. Rosalia Express yang fokus hanya
                        menangani jasa pengiriman paket. Hingga sekarang Rosalia Express memiliki jaringan 14 Area
                        Perwakilan dan lebih dari 200 Agen yang tersebar di seluruh Jawa dan Sumatera dan dapat melayani
                        pengiriman 27 Provinsi di Indonesia.
                    </p>
                    <a class="btn btn-primary text-white" href="{{ route('front.about') }}">
                        Lihat Selengkapnya
                        <svg width="24" height="24" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.075 22.5C12.6825 22.4977 12.2948 22.4125 11.9375 22.25C11.551 22.0796 11.2218 21.8017 10.989 21.4492C10.7563 21.0968 10.6299 20.6848 10.625 20.2625V9.7375C10.6299 9.31518 10.7563 8.9032 10.989 8.55077C11.2218 8.19834 11.551 7.92034 11.9375 7.74999C12.3822 7.53995 12.8769 7.45906 13.3653 7.51652C13.8538 7.57398 14.3162 7.76749 14.7 8.075L21.075 13.3375C21.325 13.5365 21.5269 13.7894 21.6657 14.0772C21.8044 14.365 21.8765 14.6805 21.8765 15C21.8765 15.3195 21.8044 15.635 21.6657 15.9228C21.5269 16.2106 21.325 16.4635 21.075 16.6625L14.7 21.925C14.2405 22.2977 13.6666 22.5007 13.075 22.5Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10 offset-md-1">
                <h2 class="heading dark">Layanan di Rosalia Express</h2>
                <p class="sub-heading">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna
                    aliqua.
                </p>

                <livewire:front::front.services :isHomePage="$isHomePage" />

                <a class="btn btn-primary text-white" href="#">
                    Lihat Selengkapnya
                    <svg width="24" height="24" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.075 22.5C12.6825 22.4977 12.2948 22.4125 11.9375 22.25C11.551 22.0796 11.2218 21.8017 10.989 21.4492C10.7563 21.0968 10.6299 20.6848 10.625 20.2625V9.7375C10.6299 9.31518 10.7563 8.9032 10.989 8.55077C11.2218 8.19834 11.551 7.92034 11.9375 7.74999C12.3822 7.53995 12.8769 7.45906 13.3653 7.51652C13.8538 7.57398 14.3162 7.76749 14.7 8.075L21.075 13.3375C21.325 13.5365 21.5269 13.7894 21.6657 14.0772C21.8044 14.365 21.8765 14.6805 21.8765 15C21.8765 15.3195 21.8044 15.635 21.6657 15.9228C21.5269 16.2106 21.325 16.4635 21.075 16.6625L14.7 21.925C14.2405 22.2977 13.6666 22.5007 13.075 22.5Z"
                            fill="white" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="review">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-1">
                <h2 class="heading">Inilah yang ulasan mereka.</h2>
                <p class="sub-heading">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna
                    aliqua.
                </p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-10 offset-md-1">
                <livewire:front::front.reviews />
            </div>
        </div>
    </div>
</section>

<section class="logos">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h2 class="heading dark">Partner Kami.</h2>
                <p class="sub-heading mb-4">
                    Kami telah dipercaya oleh banyak perusahaan untuk menangani pengiriman paket bervolume, surat
                    menyurat, dan lain lain.
                </p>

                <livewire:front::front.partners />
            </div>
        </div>
    </div>

</section>

@endsection


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        document.addEventListener('init-select', function(data) {
            $('[data-searchable]').select2({
                theme: 'bootstrap',
            });
        });
    })
</script>
@endpush
