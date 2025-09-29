@extends('layout.frontend.app')
@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            @if ($activeAbout)
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('storage/' . $activeAbout->photo) }}" alt="About" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to eLEARNING</h1>
                    <p class="mb-4">{{ $activeAbout->description }}</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="/about">Read More</a>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- About End -->
@endsection
