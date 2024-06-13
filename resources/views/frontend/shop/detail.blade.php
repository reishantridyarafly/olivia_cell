@extends('layouts.frontend.main')
@section('title', 'Detail Produk')
@section('content')
    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-t-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">

                        <!--====== Product Breadcrumb ======-->
                        <div class="pd-breadcrumb u-s-m-b-30">
                            <ul class="pd-breadcrumb__list">
                                <li class="has-separator">
                                    <a href="{{ route('beranda.index') }}">Beranda</a>
                                </li>
                                <li class="has-separator">
                                    <a href="{{ route('shop.index') }}">Belanja</a>
                                </li>
                                <li class="is-marked">
                                    <a href="{{ route('shop.detail', $product->slug) }}">{{ $product->name }}</a>
                                </li>
                            </ul>
                        </div>
                        <!--====== End - Product Breadcrumb ======-->


                        <!--====== Product Detail Zoom ======-->
                        <div class="pd u-s-m-b-30">
                            <div class="slider-fouc pd-wrap">
                                <div id="pd-o-initiate">
                                    @foreach ($product->photos as $photo)
                                        <div class="pd-o-img-wrap"
                                            data-src="{{ asset('storage/uploads/products/' . $photo->photo_name) }}">
                                            <img class="u-img-fluid"
                                                src="{{ asset('storage/uploads/products/' . $photo->photo_name) }}"
                                                data-zoom-image="{{ asset('storage/uploads/products/' . $photo->photo_name) }}"
                                                alt="">
                                        </div>
                                    @endforeach
                                </div>

                                <span class="pd-text">Click for larger zoom</span>
                            </div>
                            <div class="u-s-m-t-15">
                                <div class="slider-fouc">
                                    <div id="pd-o-thumbnail">
                                        @foreach ($product->photos as $photo)
                                            <div>
                                                <img class="u-img-fluid"
                                                    src="{{ asset('storage/uploads/products/' . $photo->photo_name) }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Product Detail Zoom ======-->
                    </div>
                    <div class="col-lg-7">

                        <!--====== Product Right Side Details ======-->
                        <div class="pd-detail">
                            <div>

                                <span class="pd-detail__name">{{ $product->name }}</span>
                            </div>
                            <div>
                                <div class="pd-detail__inline">

                                    <span
                                        class="pd-detail__price">{{ 'Rp ' . number_format($product->after_price, 0, ',', '.') }}</span>

                                    <span class="pd-detail__discount"></span><del
                                        class="pd-detail__del">{{ $product->before_price ? 'Rp ' . number_format($product->before_price, 0, ',', '.') : '' }}</del>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star-half-alt"></i>

                                    <span class="pd-detail__review u-s-m-l-4">

                                        <a data-click-scroll="#view-review">23 Reviews</a></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__stock">{{ $product->stock }} Stok</span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">

                                <span class="pd-detail__preview-desc">{{ $product->short_description }}</span>
                            </div>
                            <div class="u-s-m-b-15">
                                <form class="pd-detail__form" method="POST"
                                    action="{{ route('checkout.directCheckout') }}">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                    <input type="hidden" name="weight" id="weight" value="{{ $product->weight }}">
                                    <div class="pd-detail-inline-2">
                                        <div class="u-s-m-b-15">

                                            <!--====== Input Counter ======-->
                                            <div class="input-counter">

                                                <span class="input-counter__minus fas fa-minus"></span>

                                                <input class="input-counter__text input-counter--text-primary-style"
                                                    id="qty" name="qty" value="1" type="text"
                                                    data-min="1" data-max="1000">

                                                <span class="input-counter__plus fas fa-plus"></span>
                                            </div>
                                            <!--====== End - Input Counter ======-->
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <button class="btn btn--e-brand-b-2" id="addCart" type="button"
                                                data-id="{{ $product->id }}">Tambah Keranjang</button>
                                            <button class="btn btn--e-brand-b-2" type="submit">Belanja
                                                Sekarang</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--====== End - Product Right Side Details ======-->
                    </div>
                </div>
            </div>
        </div>

        <!--====== Product Detail Tab ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pd-tab">
                            <div class="u-s-m-b-30">
                                <ul class="nav pd-tab__list">
                                    <li class="nav-item">

                                        <a class="nav-link active" data-toggle="tab" href="#pd-desc">DESCRIPTION</a>
                                    </li>
                                    <li class="nav-item">

                                        <a class="nav-link" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS

                                            <span>(23)</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">

                                <!--====== Tab 1 ======-->
                                <div class="tab-pane fade show active" id="pd-desc">
                                    <div class="pd-tab__desc">
                                        <div class="u-s-m-b-15">
                                            <p>{!! $product->description !!}</p>
                                        </div>

                                        <div class="u-s-m-b-15">
                                            <h4>INFORMASI PRODUK</h4>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-table gl-scroll">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Berat</td>
                                                            <td>{{ $product->weight }} Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jaringan</td>
                                                            <td>{{ $product->network }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Peluncuran</td>
                                                            <td>{{ \Carbon\Carbon::parse($product->launch)->translatedFormat('d F Y') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dimensi</td>
                                                            <td>{{ $product->dimension }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SIM</td>
                                                            <td>{{ $product->sim }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tipe Layar</td>
                                                            <td>{{ $product->type_display }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Resolusi Layar</td>
                                                            <td>{{ $product->resolution_display }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Memori</td>
                                                            <td>{{ $product->memory }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Baterai</td>
                                                            <td>{{ $product->battery }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Warna</td>
                                                            <td>{{ $product->colors }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Tab 1 ======-->

                                <!--====== Tab 3 ======-->
                                <div class="tab-pane" id="pd-rev">
                                    <div class="pd-tab__rev">
                                        <div class="u-s-m-b-30">
                                            <div class="pd-tab__rev-score">
                                                <div class="u-s-m-b-8">
                                                    <h2>23 Reviews - 4.6 (Overall)</h2>
                                                </div>
                                                <div class="gl-rating-style-2 u-s-m-b-8"><i class="fas fa-star"></i><i
                                                        class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                        class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                                                <div class="u-s-m-b-8">
                                                    <h4>We want to hear from you!</h4>
                                                </div>

                                                <span class="gl-text">Tell us what you think about this item</span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <form class="pd-tab__rev-f1">
                                                <div class="rev-f1__group">
                                                    <div class="u-s-m-b-15">
                                                        <h2>23 Review(s) for Man Ruched Floral Applique Tee</h2>
                                                    </div>
                                                    <div class="u-s-m-b-15">

                                                        <label for="sort-review"></label><select
                                                            class="select-box select-box--primary-style" id="sort-review">
                                                            <option selected>Sort by: Best Rating</option>
                                                            <option>Sort by: Worst Rating</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="rev-f1__review">
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name">John Doe</span>

                                                            <span class="review-o__date">27 Feb 2018 10:57:43</span>
                                                        </div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8"><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i>

                                                            <span>(4)</span>
                                                        </div>
                                                        <p class="review-o__text">Lorem Ipsum is simply dummy text of the
                                                            printing and typesetting industry. Lorem Ipsum has been the
                                                            industry's standard dummy text ever since the 1500s, when an
                                                            unknown printer took a galley of type and scrambled it to make a
                                                            type specimen book.</p>
                                                    </div>
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name">John Doe</span>

                                                            <span class="review-o__date">27 Feb 2018 10:57:43</span>
                                                        </div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8"><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i>

                                                            <span>(4)</span>
                                                        </div>
                                                        <p class="review-o__text">Lorem Ipsum is simply dummy text of the
                                                            printing and typesetting industry. Lorem Ipsum has been the
                                                            industry's standard dummy text ever since the 1500s, when an
                                                            unknown printer took a galley of type and scrambled it to make a
                                                            type specimen book.</p>
                                                    </div>
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name">John Doe</span>

                                                            <span class="review-o__date">27 Feb 2018 10:57:43</span>
                                                        </div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8"><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                class="far fa-star"></i>

                                                            <span>(4)</span>
                                                        </div>
                                                        <p class="review-o__text">Lorem Ipsum is simply dummy text of the
                                                            printing and typesetting industry. Lorem Ipsum has been the
                                                            industry's standard dummy text ever since the 1500s, when an
                                                            unknown printer took a galley of type and scrambled it to make a
                                                            type specimen book.</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <form class="pd-tab__rev-f2">
                                                <h2 class="u-s-m-b-15">Add a Review</h2>

                                                <span class="gl-text u-s-m-b-15">Your email address will not be published.
                                                    Required fields are marked *</span>
                                                <div class="u-s-m-b-30">
                                                    <div class="rev-f2__table-wrap gl-scroll">
                                                        <table class="rev-f2__table">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i>

                                                                            <span>(1)</span>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star-half-alt"></i>

                                                                            <span>(1.5)</span>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i>

                                                                            <span>(2)</span>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star-half-alt"></i>

                                                                            <span>(2.5)</span>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i>

                                                                            <span>(3)</span>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star-half-alt"></i>

                                                                            <span>(3.5)</span>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i>

                                                                            <span>(4)</span>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star-half-alt"></i>

                                                                            <span>(4.5)</span>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="gl-rating-style-2"><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i><i
                                                                                class="fas fa-star"></i>

                                                                            <span>(5)</span>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-1"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-1"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-1.5"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-1.5"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-2"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-2"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-2.5"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-2.5"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-3"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-3"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-3.5"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-3.5"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-4"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-4"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-4.5"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-4.5"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                    <td>

                                                                        <!--====== Radio Box ======-->
                                                                        <div class="radio-box">

                                                                            <input type="radio" id="star-5"
                                                                                name="rating">
                                                                            <div
                                                                                class="radio-box__state radio-box__state--primary">

                                                                                <label class="radio-box__label"
                                                                                    for="star-5"></label>
                                                                            </div>
                                                                        </div>
                                                                        <!--====== End - Radio Box ======-->
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="rev-f2__group">
                                                    <div class="u-s-m-b-15">

                                                        <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label>
                                                        <textarea class="text-area text-area--primary-style" id="reviewer-text"></textarea>
                                                    </div>
                                                    <div>
                                                        <p class="u-s-m-b-30">

                                                            <label class="gl-label" for="reviewer-name">NAME *</label>

                                                            <input class="input-text input-text--primary-style"
                                                                type="text" id="reviewer-name">
                                                        </p>
                                                        <p class="u-s-m-b-30">

                                                            <label class="gl-label" for="reviewer-email">EMAIL *</label>

                                                            <input class="input-text input-text--primary-style"
                                                                type="text" id="reviewer-email">
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>

                                                    <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Tab 3 ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Product Detail Tab ======-->
        <div class="u-s-p-b-90">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO VIEWED</h1>

                                <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER VIEWED</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="slider-fouc">
                        <div class="owl-carousel product-slider" data-item="4">
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="product-detail.html">

                                            <img class="aspect__img"
                                                src="images/product/electronic/product1.08a132534e9a3d225f5d3c2b8ef690da.jpg"
                                                alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                        data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                            class="fas fa-search-plus"></i></a>
                                                </li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Email me When the price drops"><i
                                                            class="fas fa-envelope"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                        <a href="product-detail.html">Beats Bomb Wireless Headphone</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>

                                        <span class="product-o__review">(20)</span>
                                    </div>

                                    <span class="product-o__price">$125.00

                                        <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="product-detail.html">

                                            <img class="aspect__img"
                                                src="images/product/electronic/product2.ea1932957badfdefe7e4a1e7d50f4ea9.jpg"
                                                alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                        data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                            class="fas fa-search-plus"></i></a>
                                                </li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Email me When the price drops"><i
                                                            class="fas fa-envelope"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                        <a href="product-detail.html">Red Wireless Headphone</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>

                                        <span class="product-o__review">(20)</span>
                                    </div>

                                    <span class="product-o__price">$125.00

                                        <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="product-detail.html">

                                            <img class="aspect__img"
                                                src="images/product/electronic/product3.207dd89cb8b11937ace9524c6c84fb78.jpg"
                                                alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                        data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                            class="fas fa-search-plus"></i></a>
                                                </li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Email me When the price drops"><i
                                                            class="fas fa-envelope"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                        <a href="product-detail.html">Yellow Wireless Headphone</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>

                                        <span class="product-o__review">(20)</span>
                                    </div>

                                    <span class="product-o__price">$125.00

                                        <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="product-detail.html">

                                            <img class="aspect__img"
                                                src="images/product/electronic/product23.0396d3b9726043121035dc21ca04667a.jpg"
                                                alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                        data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                            class="fas fa-search-plus"></i></a>
                                                </li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Email me When the price drops"><i
                                                            class="fas fa-envelope"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                        <a href="product-detail.html">Razor Gear Ultra Slim 8GB Ram</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>

                                        <span class="product-o__review">(20)</span>
                                    </div>

                                    <span class="product-o__price">$125.00

                                        <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="product-detail.html">

                                            <img class="aspect__img"
                                                src="images/product/electronic/product26.b73b22477f27a27e373fe484836e94a6.jpg"
                                                alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                        data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                            class="fas fa-search-plus"></i></a>
                                                </li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Email me When the price drops"><i
                                                            class="fas fa-envelope"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                        <a href="product-detail.html">Razor Gear Ultra Slim 12GB Ram</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>

                                        <span class="product-o__review">(20)</span>
                                    </div>

                                    <span class="product-o__price">$125.00

                                        <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="product-detail.html">

                                            <img class="aspect__img"
                                                src="images/product/electronic/product30.4a4450fc843892eecd4574ad549b11aa.jpg"
                                                alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#quick-look"
                                                        data-tooltip="tooltip" data-placement="top" title="Quick View"><i
                                                            class="fas fa-search-plus"></i></a>
                                                </li>
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Email me When the price drops"><i
                                                            class="fas fa-envelope"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                        <a href="shop-side-version-2.html">Electronics</a></span>

                                    <span class="product-o__name">

                                        <a href="product-detail.html">Razor Gear Ultra Slim 16GB Ram</a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>

                                        <span class="product-o__review">(20)</span>
                                    </div>

                                    <span class="product-o__price">$125.00

                                        <span class="product-o__discount">$160.00</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#addCart', function() {
                let id = $(this).data('id');
                let qty = $('#qty').val();
                $.ajax({
                    type: "POST",
                    url: "/keranjang/tambah/" + id,
                    data: {
                        id: id,
                        qty: qty,
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#addCart').attr('disable', 'disabled');
                        $('#addCart').text('Proses...');
                    },
                    complete: function() {
                        $('#addCart').removeAttr('disable');
                        $('#addCart').text('Tambah Keranjang');
                    },
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: response.message
                        });
                        updateCartCount();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
