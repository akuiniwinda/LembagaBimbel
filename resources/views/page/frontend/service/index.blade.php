@extends('layout.frontend.app')
@section('content')
    <!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
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
@endsection

