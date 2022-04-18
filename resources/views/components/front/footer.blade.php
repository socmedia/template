<footer class="footer">
    <div class="container">
        <img class="logo mb-4" src="{{ cache('default_logo_16_9') }}" alt="Logo">
        <div class="row">
            <div class="col-12 col-lg-3 mb-3 mb-md-0 ">

                <h4 class="text-white font-weight-bold mb-2">PT. Rosalia Express</h4>

                @if (cache('company_address'))
                <div class="mb-2">
                    <p class="text-uppercase m-0 font-weight-bold">Alamat</p>
                    <p>{{ cache('company_address') }}</p>
                </div>
                @endif

                @if (cache('operational_hour'))
                <div class="mb-2">
                    <p class="text-uppercase m-0 font-weight-bold">Jam Operasional</p>
                    <p>{{ cache('operational_hour') }}</p>
                </div>
                @endif

                <div class="mb-2">
                    <p class="text-uppercase m-0 font-weight-bold">Telp.</p>
                    <p class="m-0"><a href="tel:{{ cache('phone_1') }}">{{ cache('phone_1') }}</a></p>
                    <p class="m-0"><a href="tel:{{ cache('phone_2') }}">{{ cache('phone_2') }}</a></p>
                    <p class="m-0"><a href="tel:{{ cache('phone_3') }}">{{ cache('phone_3') }}</a></p>
                    <p class="m-0"><a href="tel:{{ cache('phone_4') }}">{{ cache('phone_4') }}</a></p>
                </div>
            </div>
            <div class="col-12 col-lg-3 mb-3 mb-md-0 ">
                <h5 class="heading text-white">Informasi</h5>
                <ul class="footer-menu">
                    <li><a href="{{ route('front.about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('front.tnc') }}">Syarat & Ketentuan Pengiriman</a></li>
                    <li><a href="{{ route('front.partnership') }}">Kemitraan Agen</a></li>
                    <li><a href="{{ route('front.bussinessSolution') }}">Solusi Bisnis</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-3 mb-3 mb-md-0 ">
                <h5 class="heading text-white">Produk & Layanan</h5>
                <div class="row">

                    @if (cache('backend_service'))
                    @foreach(cache('backend_service')->chunk(ceil(cache('backend_service')->count()/2)) as $services)
                    <div class="col-6 mb-3">
                        <ul class="footer-menu">
                            @foreach($services as $service)
                            <li>
                                <a href="{{ route('front.service.show', $service->slug_name) }}">
                                    {{ $service->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
            <div class="col-12 col-lg-3 mb-3 mb-md-0 ">
                <div class="contact-box">
                    <h5>Punya Pertanyaan?</h5>
                    <p>Hubungi kami dengan mudah dengan menekan tombol dibawah.</p>
                    <a href="{{ cache('whatsapp_link') }}?text={{ urlencode(cache('whatsapp_message')) }}"
                        class="btn btn-success d-inline-flex align-items-center" target="_blank">
                        <i class="bx bxl-whatsapp mb-1 mr-1"></i> Whatsapp
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="copyright-container">
                    <hr>
                    <span class="copyright">{{ cache('copyright') }}</span>
                </div>
            </div>
        </div>
    </div>
</footer>
