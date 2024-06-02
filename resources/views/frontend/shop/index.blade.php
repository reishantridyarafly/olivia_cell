@extends('layouts.frontend.main')
@section('title', 'Belanja')
@section('content')
    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="shop-w-master">
                            <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>
                                <span>FILTERS</span>
                            </h1>

                            <div class="shop-w-master__sidebar sidebar--bg-snow">
                                <div class="u-s-m-b-30">
                                    <div class="shop-w shop-w--style">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">KATALOG</h1>

                                            <span class="fas fa-minus shop-w__toggle" data-target="#s-category"
                                                data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse show" id="s-category">
                                            <ul class="shop-w__category-list gl-scroll">
                                                @forelse ($catalogs as $catalog)
                                                    <li>
                                                        <a
                                                            href="{{ route('shop.catalog', $catalog->slug) }}">{{ $catalog->name }}</a>
                                                        <span
                                                            class="category-list__text u-s-m-l-6">({{ $catalog->activeProductsCount() }})</span>
                                                    </li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="shop-p">
                            <div class="shop-p__toolbar u-s-m-b-30">
                                <div class="shop-p__tool-style">
                                    <div class="tool-style__group u-s-m-b-8">

                                        <span class="js-shop-grid-target is-active">Grid</span>

                                        <span class="js-shop-list-target">List</span>
                                    </div>
                                    <form>
                                        <div class="tool-style__form-wrap">
                                            <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                    <option>Show: 8</option>
                                                    <option selected>Show: 12</option>
                                                    <option>Show: 16</option>
                                                    <option>Show: 28</option>
                                                </select></div>
                                            <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                    <option selected>Sort By: Newest Items</option>
                                                    <option>Sort By: Latest Items</option>
                                                    <option>Sort By: Best Selling</option>
                                                    <option>Sort By: Best Rating</option>
                                                    <option>Sort By: Lowest Price</option>
                                                    <option>Sort By: Highest Price</option>
                                                </select></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="shop-p__collection">
                                <div class="row is-grid-active">
                                    @forelse ($products as $product)
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product-m">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                        href="{{ route('shop.detail', $product->slug) }}">

                                                        <img class="aspect__img"
                                                            src="{{ asset('storage/uploads/products/' . $product->photos->first()->photo_name) }}"
                                                            alt=""></a>
                                                    <div class="product-m__add-cart">
                                                        <a class="btn--e-brand" id="addCart"
                                                            data-id="{{ $product->id }}">Tambah Keranjang</a>
                                                    </div>
                                                    <input type="hidden" name="qty" id="qty" value="1">
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a href="shop-side-version-2.html">{{ $product->catalog->name }}</a>
                                                    </div>
                                                    <div class="product-m__name">

                                                        <a
                                                            href="{{ route('shop.detail', $product->slug) }}">{{ $product->name }}</a>
                                                    </div>
                                                    <div class="product-m__rating gl-rating-style"><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                            class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i
                                                            class="far fa-star"></i>

                                                        <span class="product-m__review">(23)</span>
                                                    </div>
                                                    <div class="product-m__price">
                                                        {{ 'Rp ' . number_format($product->after_price, 0, ',', '.') }}

                                                        <span
                                                            class="product-m__discount">{{ 'Rp ' . number_format($product->before_price, 0, ',', '.') }}</span>
                                                    </div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">
                                                            <span>{{ $product->short_description }}</span>
                                                        </div>
                                                        <div class="product-m__wishlist">

                                                            <a class="far fa-heart" href="#" data-tooltip="tooltip"
                                                                data-placement="top" title="Add to Wishlist"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-lg-12">
                                            <div class="empty">
                                                <div class="empty__wrap">

                                                    <span class="empty__big-text" style="font-size: 50px;">Tidak
                                                        Tersedia</span>

                                                    <span class="empty__text-1">Produk yang anda cari tidak tersedia</span>

                                                    <a class="empty__redirect-link btn--e-brand"
                                                        href="{{ route('shop.index') }}">Lanjut Belanja</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <!--====== Pagination ======-->
                            <div class="u-s-p-y-60">
                                <ul class="shop-p__pagination">
                                    <!-- Tombol Sebelumnya -->
                                    @if (!$products->onFirstPage())
                                        <li>
                                            <a class="fas fa-angle-left" href="{{ $products->previousPageUrl() }}"></a>
                                        </li>
                                    @endif

                                    <!-- Nomor Halaman -->
                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                        <li class="{{ $products->currentPage() == $page ? 'is-active' : '' }}">
                                            <a href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    <!-- Tombol Selanjutnya -->
                                    @if ($products->hasMorePages())
                                        <li>
                                            <a class="fas fa-angle-right" href="{{ $products->nextPageUrl() }}"></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!--====== End - Pagination ======-->

                        </div>
                    </div>
                </div>
            </div>
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
                        qty:qty,
                    },
                    dataType: 'json',
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
        })
    </script>
@endsection
