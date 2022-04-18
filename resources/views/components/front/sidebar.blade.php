<div class="side-navigation">
    <div class="menu">
        <ul>
            <li class="{{ activeRouteis('front.index', 'active') }}">
                <a href="{{ route('front.index') }}">Beranda</a>
            </li>
            <li class="{{ activeRouteis('front.receipt', 'active') }}">
                <a href="{{ route('front.receipt') }}">Cek Paket</a>
            </li>
            <li class="{{ activeRouteis('front.shippingRate', 'active') }}">
                <a href="{{ route('front.shippingRate') }}">Cek Tarif</a>
            </li>
            <li class="{{ activeRouteis('front.service.*', 'active') }}">
                <a href="{{ route('front.service.index') }}">Produk & Layanan</a>
            </li>
            <li class="{{ activeRouteis('front.agentLocation', 'active') }}">
                <a href="{{ route('front.agentLocation') }}">Lokasi Agen</a>
            </li>
            <li class="{{ activeRouteis('front.contact', 'active') }}">
                <a href="{{ route('front.contact') }}">Hubungi Kami</a>
            </li>
            <li>
                <a class="btn btn-primary rounded-pill" href="{{ route('front.sohib') }}">Sobat Rosalia
                    Express</a>
            </li>
        </ul>
    </div>

    <div class="side-content">
        @if (cache('company_address'))
        <p class="mb-0">Alamat:</p>
        <h6>
            <address>{{ cache('company_address')}}</address>
        </h6>
        @endif

        @if (cache('phone_1'))
        <p class="mb-0">Call Center:</p>
        <h6><a class="text-white" href="tel:{{ cache('phone_1') }}">{{ cache('phone_1') }}</a></h6>
        @endif

        @if (cache('email'))
        <p class="mb-0">Email:</p>
        <h6><a href="mailto:{{ cache('email') }}">{{ cache('email') }}</a></h6>
        @endif

        <ul class="social-media">
            <li><a href="#"><i class="bx bxl-facebook"></i></a></li>
            <li><a href="#"><i class="bx bxl-instagram"></i></a></li>
            <li>
                <a href="{{ cache('whatsapp_link') }}?text={{ urlencode(cache('whatsapp_message')) }}">
                    <i class="bx bxl-whatsapp"></i>
                </a>
            </li>
        </ul>
        <small>{{ cache('copyright') }}</small>
    </div>
</div>
