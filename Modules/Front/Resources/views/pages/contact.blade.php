@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Hubungi Kami</h1>
        <p>Punya pertanyaan untuk Rosalia Express? Konsultasikan dengan kami yang siap beroperasi setiap hari.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
    </ol>
</header>

<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <iframe class="mb-5"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d326016.90633419756!2d110.924081369905!3d-7.411337302091848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17754d947239%3A0xb588ae6bf28c4879!2sPT.%20Rosalia%20Express%20(Kantor%20Pusat)!5e0!3m2!1sid!2sid!4v1649859460053!5m2!1sid!2sid"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                <address class="mb-3">
                    <strong>Kunjungi Kami</strong>
                    <p>{{ cache('company_address') }}</p>
                </address>
                <address class="mb-3">
                    <strong>Jam Operasional</strong>
                    <p>{{ cache('operational_hour') }}</p>
                </address>
                <address class="mb-3">
                    <strong>Call Center</strong>
                    <p><a href="tel:{{ cache('phone_1') }}">{{ cache('phone_1') }}</a></p>
                </address>
            </div>
            <div class="col-lg-6">
                <livewire:front::front.contact.form />
            </div>
        </div>
    </div>
</section>
@endsection
