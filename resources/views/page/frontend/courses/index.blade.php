@extends('layout.frontend.app')
@section('content')
<!-- Courses Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Popular Courses</h1>
        </div>
        <div class="row g-4 justify-content-center flex-nowrap overflow-auto" align="center">
            @foreach ($activePopularCourses as $kursus)
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

    <br>

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
@endsection
