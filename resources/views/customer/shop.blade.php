@extends('customer.main')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
@section('main-section')
    <main class="customer-wrapper">
        <section class="page-title-box">
            <div class="page-title">
                <strong>Shop</strong>
            </div>
            <div class="d-flex align-items-center">
                <div class="page-search">
                    <button type="button" onclick="showSearchBar('show')"><i
                            class="fa-regular fa-magnifying-glass"></i></button>
                </div>
                <div class="page-title-search-box">
                    <div class="page-title-search">
                        <button type="button"><i class="fa-regular fa-magnifying-glass"></i></button>
                        <input type="text" onkeyup="searchProduct(this.value)"
                            placeholder="Search products & categories....">
                        <button type="button" onclick="showSearchBar('hide')"><i class="fa-regular fa-xmark"></i></button>
                    </div>

                </div>
                <div class="d-flex justify-content-center align-items-center">
                    @if (!session()->has('customer_id'))
                        <div class="d-flex align-items-center">
                            <a class="account-btn" href="{{ route('customer.account') }}">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </div>
                    @else
                        <div class="dropdown">
                            <button class="dropdown-toggle account-btn" type="button" id="acc-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="acc-dropdown">
                                <a class="dropdown-item" href="{{ route('customer.account') }}">My Account</a>
                                <a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="shop-container">

            <div class="shop-category-container">
                <div>
                    @php
                        $category_data = DB::table('product_categories')
                            ->orderBy('cat_name', 'asc')
                            ->get();
                    @endphp
                    @if (count($category_data) > 0)
                        @foreach ($category_data as $single_category)
                            <div class="show-cat-box" data-catid="{{ $single_category->cat_id }}"
                                onclick="selectCategory('{{ $single_category->cat_id }}')">
                                <div class="show-cat-img">
                                    @if (!is_null($single_category->cat_img) && $single_category->cat_img != 'null')
                                        @php
                                            $cat_img_json = json_decode($single_category->cat_img, true);
                                            echo getMediaFile($cat_img_json[0]['file_id']);
                                        @endphp
                                    @else
                                        <img src="{{ asset('admin-assets/assets/images/icons/picture.png') }}"
                                            alt="">
                                    @endif
                                </div>
                                <p class="show-cat-name">{{ $single_category->cat_name }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="shop-product-container">
                <div class="shop-product-banner">
                    <img src="{{ asset('admin-assets/assets/images/banner/banner.jpg') }}" alt="">
                </div>

                <div class="shop-product-box product-row">

                </div>
            </div>
        </section>
    </main>

    @include('customer.footer-menu')

    @push('scripts')
        <script>
            sessionStorage.setItem('table_no', {{ Js::from($table_no) }})
            sessionStorage.setItem('shop_page', {{ Js::from(URL::current()) }})
            getOrderDetailsUsingOrderId({{ Js::from($order_id) }})

            footerMenuActiveClass('shop')
        </script>
    @endpush
@endsection
