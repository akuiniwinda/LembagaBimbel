@extends('layout.frontend.app')
@section('content')

<!-- Galeri Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Gallery</h6>
                <h1 class="mb-5">Mengabadikan Dokumentasi eLearning</h1>
            </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="/dataanalisis">
                                <img class="img-fluid" src="{{ asset('assetsfrontend/img/layanankami-1.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="/digitalmarketing">
                                <img class="img-fluid" src="{{ asset('assetsfrontend/img/layanankami-2.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="/desaingrafis">
                                <img class="img-fluid" src="{{ asset('assetsfrontend/img/layanankami-3.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="/programmer">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assetsfrontend/img/layanankami-4.jpg') }}" alt="" style="object-fit: cover;">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="owl-carousel testimonial-carousel position-relative">
                @foreach ( $activeGallery as $GAllery )
                <div class="testimonial-item text-center">
                    <img class="p-2 border mx-auto mb-3" src="{{ asset('storage/' . $GAllery->photo) }}" style="width: 100%; aspect-ratio: 4 / 4; object-fit: contain;">
                    <h5 class="mb-0">{{ $GAllery->name }}</h5>
                    <div class="mb-2">
                    <p>{{ $GAllery->title }}</p>
                    </div>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">{{ $GAllery->description }}</p>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
    </div>
    <!-- Galeri End -->
@endsection
