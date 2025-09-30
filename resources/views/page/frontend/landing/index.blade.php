@extends('layout.frontend.app')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            @if ( $activeHeros )
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('storage/' . $activeHeros->photo) }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Bimbel Kekinian untuk Generasi Digital</h5>
                                <h1 class="display-3 text-white animated slideInDown">{{ $activeHeros->title }}</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" href="/about">Read More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight" href="/contact">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <!-- Judul Service -->
        <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
            <h1>Service</h1>
        </div>

        <div class="row g-4">
            @foreach ($activeService as $service)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 1.5rem;">
                    <div class="service-item text-center pt-3" style="border: 1px solid #ddd; border-radius: 8px; padding: 1rem; height: 100%;">
                        <div class="p-4">
                            <img src="{{ asset('storage/' . $service->photo) }}" width="80" alt="Service" class="mb-4">
                            <h5 class="mb-3">{{ $service->title }}</h5>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    <!-- Service End -->

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


    <!-- Galeri Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Galeri</h1>
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
    <!-- Galeri End -->


    <!-- Courses Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Courses Yang Tersedia</h1>
        </div>

        <div class="row g-4 justify-content-center flex-nowrap overflow-auto" align="center">
            @foreach ($activeCourses as $kursus)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-delay="0.1s" style="flex: 0 0 auto; width: 250px;">
                    <div class="course-item bg-light h-100 d-flex flex-column">
                        <div class="position-relative overflow-hidden course-image">
                            <img class="img-fluid" src="{{ asset('storage/' . $kursus->photo) }}" alt="{{ $kursus->title }}" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover;">
                        </div>
                        <div class="text align scenter p-3 pb-0 flex-grow-1">
                            <h5 class="mb-2 text-truncate">{{ $kursus->title }}</h5>
                            <h6 class="mb-2 text-primary">Rp {{ $kursus->harga }}</h6>
                        </div>
                        <div class="d-flex border-top mt-auto">
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-user-tie text-primary me-2"></i>{{ $kursus->name }}
                            </small>
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-clock text-primary me-2"></i>{{ $kursus->time }} Hrs
                            </small>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-user text-primary me-2"></i>{{ $kursus->student }} Students
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    <!-- Courses End -->



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Tenaga KErja</h6>
                <h1 class="mb-5">Tim eLearning</h1>
            </div>
            <div class="row g-4">
                @foreach ( $activeTenagakerja as $tenagakerja)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('storage/' . $tenagakerja->photo) }}" alt="" style="width: 100%; aspect-ratio: 3 / 4; object-fit: cover;">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{ $tenagakerja->name }}</h5>
                            <small><b>{{ $tenagakerja->position }}</b></small>
                            <br>
                            <small>{{ $tenagakerja->description }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                @foreach ( $activeTestimoni as $testimoni )
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="{{ asset('storage/' . $testimoni->photo_profile) }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">{{ $testimoni->name }}</h5>
                    <div class="star-rating mb-2">
                    @php
                        $fullStars = floor($testimoni->rating);
                        $hasHalfStar = $testimoni->rating - $fullStars >= 0.5;
                        $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                    @endphp
                        {{-- Bintang penuh --}}
                        @for ($i = 0; $i < $fullStars; $i++)
                            <span class="star">★</span>
                        @endfor

                        {{-- Setengah bintang --}}
                        @if ($hasHalfStar)
                            <span class="star">☆</span> {{-- Bisa diganti dengan setengah bintang SVG jika ingin lebih detail --}}
                        @endif

                        {{-- Bintang kosong --}}
                        @for ($i = 0; $i < $emptyStars; $i++)
                            <span class="star">☆</span>
                        @endfor
                    </div>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">{{ $testimoni->description }}</p>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Partners -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Partners</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach ( $activePartner as $partner )
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item text-center p-3">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid mx-auto d-block w-50" src="{{ asset('storage/' . $partner->photo) }}" alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    <!-- Partners End -->
@endsection
