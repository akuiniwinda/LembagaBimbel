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
@endsection
