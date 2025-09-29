@extends('layout.frontend.app')
@section('content')
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
            <h2 class="section-title">Our Services</h2>
            <p class="text-muted">Discover the solutions we offer to empower your journey</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($activeService as $service)
                <div class="col-lg-3 col-md-6 col-sm-10 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-card h-100 d-flex flex-column align-items-center text-center p-4 rounded-3 shadow-sm border-0 transition-all"
                         style="background: #fff; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="mb-4">
                            <div class="service-icon d-flex justify-content-center align-items-center rounded-circle bg-light p-3" style="width: 80px; height: 80px;">
                                <img src="{{ asset('storage/' . $service->photo) }}" 
                                     alt="{{ $service->title }}" 
                                     class="img-fluid" 
                                     style="max-height: 60px; object-fit: contain;">
                            </div>
                        </div>
                        <h5 class="mb-3 fw-bold">{{ $service->title }}</h5>
                        <p class="text-muted mb-0 flex-grow-1">{{ Str::limit($service->description, 100) }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No services available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Service End -->

<style>
.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12) !important;
}
.service-card {
    will-change: transform;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Optional: Add subtle animation on scroll if Wow.js is properly loaded
});
</script>
@endsection