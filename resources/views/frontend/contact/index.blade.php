@extends('layouts.frontend.main')
@section('title', 'Kontak')
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
                                    <a href="{{ route('contact.index') }}">@yield('title')</a>
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
                            <div class="g-map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.2856503602125!2d108.25545111749452!3d-6.734964286802522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ed9b4bfb70333%3A0x568a484f3f82ba04!2sOlivia%20Cell%20Merah!5e0!3m2!1sid!2sid!4v1718695186887!5m2!1sid!2sid"
                                    style="width: 100%; height:500px" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="contact-o u-h-100">
                                <div class="contact-o__wrap">
                                    <div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>

                                    <span class="contact-o__info-text-1">TELEPON</span>

                                    <span class="contact-o__info-text-2"><a href="https://wa.me/6285315922275">(+62)
                                            853-1592-2275</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="contact-o u-h-100">
                                <div class="contact-o__wrap">
                                    <div class="contact-o__icon"><i class="fas fa-map-marker-alt"></i></div>

                                    <span class="contact-o__info-text-1">LOKASI</span>

                                    <span class="contact-o__info-text-2">Dusun Pahing RT.002 RW. 013</span>

                                    <span class="contact-o__info-text-2">Desa Mekarsari, Kec.Jatiwangi Kab. Majalengka
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="contact-o u-h-100">
                                <div class="contact-o__wrap">
                                    <div class="contact-o__icon"><i class="far fa-clock"></i></div>

                                    <span class="contact-o__info-text-1">JAM KERJA</span>

                                    <span class="contact-o__info-text-2">Setiap Hari</span>

                                    <span class="contact-o__info-text-2">Dari 08:00 - 21:00 WIB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->


        <!--====== Section 4 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-area u-h-100">
                                @if (session('success'))
                                    <strong style="color: #DB4540">{{ session('success') }}</strong>
                                @endif
                                <div class="contact-area__heading">
                                    <h2>Hubungi</h2>
                                </div>
                                <form class="contact-f" method="post" action="{{ route('contact.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 u-h-100">
                                            <div class="u-s-m-b-30">

                                                <label for="c-name"></label>
                                                <input
                                                    class="input-text input-text--border-radius input-text--primary-style"
                                                    type="text" id="c-name" name="name"
                                                    placeholder="Nama (Wajib diisi)" required>
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label for="c-email"></label>

                                                <input
                                                    class="input-text input-text--border-radius input-text--primary-style"
                                                    type="text" id="c-email" name="email"
                                                    placeholder="Email (Wajib diisi)" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 u-h-100">
                                            <div class="u-s-m-b-30">
                                                <label for="c-message"></label>
                                                <textarea class="text-area text-area--border-radius text-area--primary-style" id="c-message" name="message"
                                                    placeholder="Pesan (Wajib diisi)" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="btn btn--e-brand-b-2" type="submit">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 4 ======-->
    </div>
    <!--====== End - App Content ======-->

@endsection

@section('script')
    <!--====== Google Map Init ======-->
    <script src="{{ asset('frontend/assets') }}/js/map-init.js"></script>

@endsection
