@extends('layout.frontend.app')
@section('content')
    <!-- Partners -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Partners</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item text-center p-3">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid mx-auto d-block w-50" src="{{ asset('assetsfrontend/img/partners-1.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item text-center p-3">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid mx-auto d-block w-50" src="{{ asset('assetsfrontend/img/partners-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item text-center p-3">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid mx-auto d-block w-50" src="{{ asset('assetsfrontend/img/partners-3.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Partners End -->
@endsection