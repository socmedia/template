@extends('front::layouts.master')

@section('content')
<header class="page-header" data-background="{{ asset('images/forklift.png') }}">
    <div class="container">
        <h1>Syarat & Ketentuan Pengiriman</h1>
        <p>Solusi atas kebutuhan pengiriman paket anda yang aman dan terpercaya.</p>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Syarat & Ketentuan Pengiriman</li>
    </ol>
</header>
<section class="about-content intro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="heading dark mb-2"><strong>Syarat & Ketentuan Pengiriman</strong></h4>
                <div class="card">
                    <div class="card-body">
                        <ol class="tnc">
                            <li>
                                Kami berhak memeriksa barang dan atau dokumen yang dikirimkan oleh konsumen, baik
                                mengenai isi
                                maupun pengepakannya. Jika isi tidak sesuai dengan yang disebutkan dalam Surat
                                Pengiriman bukan
                                menjadi tanggungjawab PT. Rosalia Express, dan merupakan suatu pelanggaran yang dapat
                                dituntut
                                secara hukum yang berlaku.
                            </li>
                            <li>
                                Paket elektronik, Sepeda Motor dan semua barang kiriman yang bernilai lebih besar sama
                                dengan
                                Rp. 500.000,- wajib diansurasikan (Kecuali makanan dan pecah belah).
                            </li>
                            <li>
                                PT. Rosalia Express bekerja sama dengan pihak yang ditunjuk untuk menangani asuransi
                                terkait
                                dengan barang yang atas permintaan pengirim untuk diasuransikan.
                            </li>
                            <li>
                                Barang yang oleh Pengirim sudah diasuransikan maka jika terjadi kerusakan akan dilakukan
                                perbaikan dan atau pergantian sesuai dengan ketentuan yang berlaku di asuransi.
                            </li>
                            <li>
                                Terhadap titipan yang dicurigai, pihak pengangkut berhak untuk mengadakan pemeriksaan,
                                tanpa
                                adanya persetujuan dari pengirim, sesuai dengan ketentuan yang berlaku di Indonesia.
                            </li>
                            <li>
                                Dilarang memasukkan ke dalam barang, berupa :
                                <ol>
                                    <li>
                                        Uang tunai, Surat berharga, perhiasan, atau barang berharga sejenisnya.
                                    </li>
                                    <li>
                                        Barang yang mudah meledak, barang kimia, barang beracun, barang yang dapat
                                        merusak
                                        barang lain.
                                    </li>
                                    <li>
                                        Narkotika, Ganja, Morphin, Miras atau jenis obat terlarang lainnya.
                                    </li>
                                    <li>
                                        Barang cetakan, foto, film dan barang sejenis lainnya yang dapat melanggar
                                        aturan
                                        kesusilaan (pornografi).
                                    </li>
                                </ol>
                            </li>
                            <li>
                                Pihak Pengangkut tidak bertanggungjawab atas hal- hal sebagai berikut :
                                <ol>
                                    <li>
                                        Semua resiko teknis yang terjadi selama dalam pengangkutan yang menyebabkan
                                        barang yang
                                        dikirim tidak berfungsi atau berubah fungsi, baik yang menyangkut mesin atau
                                        barang
                                        sejenis, maupun barang elektronik seperti : TV, Kulkas, Komputer, Video, Mesin
                                        Cuci,
                                        Kamera , Accu dan barang elektronik sejenis lainnya.
                                    </li>
                                    <li>
                                        Keterlambatan pengiriman barang ke kota tujuan yang disebabkan oleh keadaan yang
                                        memaksa
                                        (kerusakan armada, kemacetan jalan)
                                    </li>
                                    <li>
                                        Semua penahanan/penyitaan serta pemusnahan terhadap barang/dokumen oleh instansi
                                        pemerintah sebagai akibat hukum dari keadaan jenis barang/dokumen yang
                                        bersangkutan.
                                    </li>
                                    <li>
                                        Kerusakan, kehilangan dan atau keterlambatan barang/dokumen yang disebabkan
                                        karena
                                        bencana alam, huru-hara, perang, pencurian, perampokan dan pembajakan (Force
                                        majure).
                                    </li>
                                    <li>
                                        Kebocoran, kerusakan, busuk atau matinya untuk jenis barang yang berupa : barang
                                        cair,
                                        barang pecah belah, makanan, buah-buahan, binatang hidup, dan tumbuh-tumbuhan.
                                    </li>
                                    <li>
                                        Kerusakan atau kehilangan barang atau dokumen yang yang disebabkan karena
                                        pembungkusnya
                                        (packing) yang tidak sempurna.
                                    </li>
                                </ol>
                            </li>
                            <li>
                                Bila tidak ada keluhan atau klaim dari pihak PENERIMA pada saat barang atau dokumen
                                diterima,
                                maka barang atau dokumen tersebut dianggap telah diterima dengan baik dan benar.
                            </li>
                            <li>
                                Pengaduan dari pihak PENGIRIM/PENERIMA harus disampaikan secara tertulis
                                selambat-lambatnya 1 x
                                24 jam setelah penyerahan barang kiriman.
                            </li>
                            <li>
                                Semua pengaduan/ klaim dapat dilayani di PT. Rosalia Express dengan dilampiri :
                                <ol>
                                    <li>
                                        Berita acara yang ditandatangani penerima dan petugas pengangkut di tujuan.
                                    </li>
                                    <li>
                                        Dokumen pendukung antara lain, bukti surat tanda terima barang/SP tanda pengenal
                                        pengirim/penerima.
                                    </li>
                                    <li>
                                        Berita acara kehilangan yang dibuat oleh pihak berwajib. (Jika terjadi
                                        kehilangan).
                                    </li>
                                </ol>
                            </li>
                            <li>
                                Bila terjadi kehilangan seluruhnya atau sebagian atas barang atau dokumen yang dikirim,
                                dengan
                                catatan kerusakan atau kehilangan ini disebabkan karena kelalaian PT. Rosalia Express,
                                karyawan,
                                perwakilan atau agen dan barang tersebut tidak diasuransikan oleh pengirim maka akan
                                dilakukan
                                penggantian maksimal 10 kali biaya pengiriman atau maksimal nominal Rp. 500.000,-
                            </li>
                            <li>
                                Barang atau dokumen dengan instruksi ambil di Agen dan pihak Pengangkut telah melakukan
                                kewajibannya untuk menghubungi penerima dan ternyata dalam jangka waktu 5 hari barang
                                tidak
                                diambil, maka PT. Rosalia Express tidak menerima tuntutan dalam bentuk apapun, dan
                                apabila dalam
                                jangka waktu 10 hari barang tidak diambil maka akan dikenakan biaya gudang sebesar 1 %
                                total
                                biaya, dan selambat-lambatnya 2 bulan barang tidak di ambil maka PT. Rosalia Express
                                tidak
                                bertanggungjawab atas kiriman barang tersebut dan tidak dapat dituntut secara hukum dan
                                tuntutan
                                dalam bentuk apapun.
                            </li>
                            <li>
                                Apabila terjadi pembatalan pengiriman atas permintaan pengirim dan hal lain maka
                                pengirim
                                dikenakan biaya administrasi sebesar Rp. 5000,-
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
