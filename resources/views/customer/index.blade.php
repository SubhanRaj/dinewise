@extends('customer.main')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
@section('main-section')
    <main class="customer-wrapper">
        <header class="cust-header">
            <div class="cust-topbar">
                <div class="cust-topbar-logo">
                    <img src="{{ asset('assets/logo.png') }}" alt="">
                </div>
                <div class="cust-topbar-account">
                    <button type="button" class="cust-topbar-account-btn">
                        <i class="fa-regular fa-circle-user"></i>
                    </button>
                </div>
            </div>
            <div class="cust-middle-header">
                <div class="cust-middle-header-search">
                    <form method="get">
                        @csrf
                        <div class="cust-middle-search">
                            <button type="submit" class="cust-search-icon">
                                <i class="fa-regular fa-magnifying-glass"></i>
                            </button>
                            <input type="text" placeholder="Search for products & categories.....">
                            <button type="button" onclick="runSpeechRecog()" class="cust-search-icon">
                                <i class="fa-solid fa-microphone"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="cust-bottom-text-box">
                <div class="cust-bottom">
                    <h2 class="cust-bottom-title">Delicious Food</h2>
                    <p class="cust-bottom-text">Starting at just ₹99/-</p>
                </div>
            </div>
        </header>
        <div class="content-wrapper">
            <section class="shop-by-cat-container">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="shop-by-cat-title">Shop By Category</h5>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                        <div class="col-3 p-1 d-flex justify-center align-items-center">
                            <div class="category-box">
                                <div class="category-img-box">
                                    <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                        alt="">
                                </div>
                                <p class="category-name-box">Vegetables & Fruits</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="trending-products pt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="section-title">Starters</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="trending-products pt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="section-title">Main</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-image-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href=""> <img src="{{ asset('admin-assets/assets/images/banner/banner.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="swiper-slide">
                            <a href=""> <img src="{{ asset('admin-assets/assets/images/banner/banner.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="swiper-slide">
                            <a href=""> <img src="{{ asset('admin-assets/assets/images/banner/banner.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="swiper-slide">
                            <a href=""> <img src="{{ asset('admin-assets/assets/images/banner/banner.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
            <section class="veg-container">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="section-title">Vegeterian Products</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                        <div class="col-12">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/paneer.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/paneer.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/paneer.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <section class="veg-container">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="section-title">Non-vegeterian Products</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                        <div class="col-12">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/paneer.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/paneer.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/paneer.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <section class="cat-wise-container p-2">
                <div class="container">
                    <div class="row">
                        <div class="col-8 px-1">
                            <h3 class="section-title">Paneer Products</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 px-1">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cat-wise-container fast-food-container p-2">
                <div class="container">
                    <div class="row">
                        <div class="col-8 px-1">
                            <h3 class="section-title">Fast Food</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 px-1">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cat-wise-container soft-drink-container p-2">
                <div class="container">
                    <div class="row">
                        <div class="col-8 px-1">
                            <h3 class="section-title">Soft Drink</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 px-1">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="category-box">
                                            <div class="category-img-box">
                                                <img src="{{ asset('admin-assets/assets/images/category/cat-img.png') }}"
                                                    alt="">
                                            </div>
                                            <p class="category-name-box">Vegetables & Fruits</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="four-img-block-container p-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-1">
                            <h3 class="section-title">Trending Offers</h3>
                        </div>
                        <div class="col-6 mb-2 px-1">
                            <div class="trending-offers-img">
                                <img src="{{ asset('admin-assets/assets/images/banner/offer.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="col-6 mb-2 px-1">
                            <div class="trending-offers-img">
                                <img src="{{ asset('admin-assets/assets/images/banner/offer.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="col-6 mb-2 px-1">
                            <div class="trending-offers-img">
                                <img src="{{ asset('admin-assets/assets/images/banner/offer.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="col-6 mb-2 px-1">
                            <div class="trending-offers-img">
                                <img src="{{ asset('admin-assets/assets/images/banner/offer.jpg') }}" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="trending-products">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="section-title">Top Selling</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="trending-products">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="section-title">Product Under ₹99</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-style-1">
                                            <div class="product-style-img">
                                                <img src="{{ asset('admin-assets/assets/images/pizza.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="product-style-content">
                                                <div class="product-style-cat">
                                                    <span>Category</span>
                                                </div>
                                                <strong class="product-style-name">Product Name</strong>
                                                <div class="product-style-price-box">
                                                    <strong class="product-style-price">₹200</strong>
                                                    <div class="add-product">

                                                        <div class="qty-btn">
                                                            <button type="button">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span>2</span>
                                                            <button type="button">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        <div class="add-btn"><button type="button"> Add</button></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="veg-container">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="section-title">Desserts</h3>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <a href="" class="see-all">See all <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                        <div class="col-12">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/desserts.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/desserts.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="veg-box">
                                            <a href="">
                                                <div class="veg-img">
                                                    <img src="{{ asset('admin-assets/assets/images/banner/desserts.jpeg') }}"
                                                        alt="">
                                                </div>
                                                <div class="veg-content">
                                                    <p class="veg-content-cat">Category</p>
                                                    <strong class="veg-box-title">Paneer</strong>
                                                    <p class="veg-box-price"><span><i
                                                                class="fa-regular fa-indian-rupee-sign"></i></span>200 for
                                                        one</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
 
        </div>
 
    </main>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            var Product_image_swiper = new Swiper(".product-image-slider .swiper", {
                slidesPerView: 1,
                loop: true,
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
            var veg_swiper = new Swiper(".veg-container .swiper", {
                loop: true,
                spaceBetween: 10,
                slidesPerView: 2,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });


            var cat_wise_product_swiper = new Swiper(".cat-wise-container .swiper", {
                loop: true,
                spaceBetween: 5,
                slidesPerView: 4,

            });
            var trending_product_swiper = new Swiper(".trending-products .swiper", {
                loop: true,
                spaceBetween: 5,
                slidesPerView: 2.1,

            });



            runSpeechRecog = () => {
                document.getElementById("output").innerHTML = "Loading text...";
                var output = document.getElementById('output');
                var action = document.getElementById('action');
                let recognization = new webkitSpeechRecognition();
                recognization.onstart = () => {
                    action.innerHTML = "Listening...";
                }
                recognization.onresult = (e) => {
                    var transcript = e.results[0][0].transcript;
                    output.innerHTML = transcript;
                    output.classList.remove("hide")
                    action.innerHTML = "";
                }
                recognization.start();
            }
        </script>
    @endpush
@endsection
