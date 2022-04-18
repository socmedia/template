<div class="fixed-top">
    {{-- <div class="bg-dark d-flex px-3 py-2">
        <div>
            <span class="text-light">
                <svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.7798 15.7117L15.0535 12.3237C14.8774 12.1636 14.6459 12.0782 14.408 12.0855C14.1701 12.0929 13.9443 12.1924 13.7784 12.3631L11.5848 14.619C11.0568 14.5182 9.99535 14.1872 8.90268 13.0973C7.81001 12.0037 7.4791 10.9395 7.38101 10.4152L9.6351 8.22066C9.80597 8.05486 9.90564 7.82908 9.91299 7.5911C9.92035 7.35312 9.83482 7.12162 9.67451 6.94558L6.28743 3.22025C6.12705 3.04366 5.90415 2.93654 5.66607 2.92165C5.42799 2.90676 5.19348 2.98527 5.01235 3.1405L3.02318 4.84641C2.8647 5.00547 2.77011 5.21716 2.75735 5.44133C2.7436 5.6705 2.48143 11.099 6.69076 15.3102C10.3629 18.9814 14.9628 19.25 16.2296 19.25C16.4148 19.25 16.5284 19.2445 16.5587 19.2427C16.7828 19.2301 16.9944 19.1351 17.1527 18.9759L18.8577 16.9858C19.0135 16.8053 19.0926 16.571 19.078 16.3329C19.0635 16.0948 18.9564 15.8719 18.7798 15.7117Z"
                        fill="#E5E5E5" />
                </svg>
                <strong>Call Center:</strong>
                <a class="text-light" href="javascript:void(0)"> 0271-826442</a>
            </span>
        </div>
    </div> --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="d-flex w-100">
            <a class="navbar-brand" href="{{ route('front.index') }}">
                <img src="{{ cache('default_logo_16_9') }}" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ activeRouteis('front.index', 'active') }}">
                        <a class="nav-link" href="{{ route('front.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item {{ activeRouteis('front.receipt', 'active') }}">
                        <a class="nav-link" href="{{ route('front.receipt') }}">Cek Paket</a>
                    </li>
                    <li class="nav-item {{ activeRouteis('front.shippingRate', 'active') }}">
                        <a class="nav-link" href="{{ route('front.shippingRate') }}">Cek Tarif</a>
                    </li>
                    <li class="nav-item {{ activeRouteis('front.service.*', 'active') }}">
                        <a class="nav-link" href="{{ route('front.service.index') }}">Produk & Layanan</a>
                    </li>
                    <li class="nav-item {{ activeRouteis('front.agentLocation', 'active') }}">
                        <a class="nav-link" href="{{ route('front.agentLocation') }}">Lokasi Agen</a>
                    </li>
                    <li class="nav-item {{ activeRouteis('front.contact', 'active') }}">
                        <a class="nav-link" href="{{ route('front.contact') }}">Hubungi Kami</a>
                    </li>
                    <li class="nav-item pl-2">
                        <a class="btn btn-primary rounded-pill" href="{{ route('front.sohib') }}">Sobat Rosalia
                            Express</a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler hamburger" type="button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
</div>
