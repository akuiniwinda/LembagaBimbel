@extends('layout.frontend.app')
@section('content')
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
                    <p>{{ $testimoni->rating }}</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">{{ $testimoni->description }}</p>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
