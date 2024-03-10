@extends('customer.main')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 
@endpush
@section('main-section')
    <main class="customer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login-form">
                        <div class="card w-100">
                            <div class="card-body">
                                <form method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('assets/authenticity.png') }}" height="80">
                                    </div>
                                    <h4 class="welcome-title">Welcome Back !</h4>
                                    <div class="input-group mb-3 mt-2">
                                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                        <input type="text" class="form-control" placeholder="Registered phone number">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="custom-btn">Sign In</button>
                                    </div>
                                    <div class="text-center">
                                        <p> Do'nt have account?<a href="{{ route('customer.signUp') }}" class="underline"> Create an account!</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
