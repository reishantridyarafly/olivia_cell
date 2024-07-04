@extends('layouts.frontend.main')
@section('title', 'FAQ')
@section('content')
    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">
            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">
                                    <a href="{{ route('beranda.index') }}">Beranda</a>
                                </li>
                                <li class="is-marked">
                                    <a href="{{ route('faq.index') }}">@yield('title')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="faq">
                                <h3 class="faq__heading">FREQUENTLY QUESTIONS</h3>
                                <h3 class="faq__heading">Di bawah ini adalah pertanyaan yang sering diajukan, 
                                    Anda mungkin menemukan jawabannya dirimu sendiri.</h3>
                                <p class="faq__text">F.A.Q. ini memberikan jawaban atas pertanyaan yang sering diajukan oleh pelanggan, 
                                    sehingga membantu mereka mendapatkan informasi yang dibutuhkan dengan mudah dan cepat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->


        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="faq-accordion-group">
                                <div class="faq__list">

                                    <a class="faq__question collapsed" href="#faq-1" data-toggle="collapse">Apa saja produk yang tersedia di Toko Olivia Cell Merah?</a>
                                    <div class="faq__answer collapse" id="faq-1" data-parent="#faq-accordion-group">
                                        <p class="faq__text">Kami menyediakan berbagai produk elektronik seperti ponsel, tablet, aksesoris ponsel, dan gadget lainnya. 
                                            Kami selalu memperbarui koleksi kami dengan produk-produk terbaru di pasar.</p>
                                    </div>
                                </div>
                                <div class="faq__list">

                                    <a class="faq__question collapsed" href="#faq-2" data-toggle="collapse">Bagaimana cara memesan produk di Toko Olivia Cell Merah?</a>
                                    <div class="faq__answer collapse" id="faq-2" data-parent="#faq-accordion-group">
                                        <p class="faq__text">Anda dapat memesan produk melalui website kami dengan memilih produk yang diinginkan, menambahkannya ke keranjang belanja, dan mengikuti langkah-langkah pembayaran. 
                                            Kami menerima berbagai metode pembayaran seperti transfer bank, kartu kredit, dan e-wallet.</p>
                                    </div>
                                </div>
                                <div class="faq__list">

                                    <a class="faq__question collapsed" href="#faq-3" data-toggle="collapse">Apakah Toko Olivia Cell Merah menyediakan layanan pengiriman?</a>
                                    <div class="faq__answer collapse" id="faq-3" data-parent="#faq-accordion-group">
                                        <p class="faq__text">Ya, kami menyediakan layanan pengiriman cepat ke seluruh wilayah Indonesia. 
                                            Waktu pengiriman tergantung lokasi Anda, namun kami selalu berusaha untuk mengirimkan barang secepat mungkin.</p>
                                    </div>
                                </div>
                                <div class="faq__list">

                                    <a class="faq__question collapsed" href="#faq-4" data-toggle="collapse">Bagaimana cara melacak pesanan saya?</a>
                                    <div class="faq__answer collapse" id="faq-4" data-parent="#faq-accordion-group">
                                        <p class="faq__text">Setelah pesanan Anda diproses dan dikirim, Anda akan menerima email konfirmasi yang berisi nomor resi dan link untuk melacak pengiriman Anda. 
                                            Anda juga bisa melacak pesanan melalui akun Anda di website kami.</p>
                                    </div>
                                </div>
                                <div class="faq__list">

                                    <a class="faq__question collapsed" href="#faq-5" data-toggle="collapse"> Apakah ada kebijakan pengembalian barang di Toko Olivia Cell Merah?</a>
                                    <div class="faq__answer collapse" id="faq-5" data-parent="#faq-accordion-group">
                                        <p class="faq__text">Ya, kami memiliki kebijakan pengembalian barang. Jika Anda menerima produk yang cacat atau tidak sesuai dengan pesanan, Anda dapat mengajukan pengembalian dalam waktu 7 hari setelah menerima barang. 
                                            Silakan hubungi layanan pelanggan kami untuk informasi lebih lanjut tentang proses pengembalian.</p>
                                    </div>
                                </div>
                                <div class="faq__list">

                                    <a class="faq__question collapsed" href="#faq-6" data-toggle="collapse">Bagaimana cara menghubungi layanan pelanggan Toko Olivia Cell Merah?</a>
                                    <div class="faq__answer collapse" id="faq-6" data-parent="#faq-accordion-group">
                                        <p class="faq__text">Anda dapat menghubungi layanan pelanggan kami melalui email di oliviacellmerahofficial@gmail.com atau melalui telepon di (+62) 853-1592-2275. 
                                            Tim kami siap membantu Anda setiap hari dari pukul 08.00 hingga 20.00.</p>
                                    </div>
                                </div>
                                <div class="faq__list">

                                    <a class="faq__question collapsed" href="#faq-7" data-toggle="collapse">Apakah Toko Olivia Cell Merah menyediakan garansi untuk produknya?</a>
                                    <div class="faq__answer collapse" id="faq-7" data-parent="#faq-accordion-group">
                                        <p class="faq__text">Ya, semua produk yang kami jual dilengkapi dengan garansi resmi dari pabrikan. 
                                            Durasi garansi tergantung pada jenis produk dan pabrikan masing-masing.</p>
                                    </div>
                                </div>
                                <div class="faq__list">

                                    <a class="faq__question collapsed" href="#faq-8" data-toggle="collapse">Apakah Toko Olivia Cell Merah memiliki program loyalitas atau diskon khusus?</a>
                                    <div class="faq__answer collapse" id="faq-8" data-parent="#faq-accordion-group">
                                        <p class="faq__text">Kami sering menawarkan diskon dan promo khusus untuk pelanggan setia kami. 
                                            Pastikan untuk berlangganan newsletter kami dan mengikuti media sosial kami untuk mendapatkan informasi terbaru tentang penawaran spesial dan program loyalitas..</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
    </div>
    <!--====== End - App Content ======-->
@endsection
