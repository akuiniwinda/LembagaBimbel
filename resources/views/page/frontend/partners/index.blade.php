@extends('layout.frontend.app')
@section('content')
    <!-- Partners -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Partners</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse($activePartner as $partner)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item text-center p-3">
                            <div class="position-relative overflow-hidden">
                                <img 
                                    class="img-fluid mx-auto d-block w-50" 
                                    src="{{ asset('storage/' . $partner->photo) }}" 
                                    alt="{{ $partner->name }}"
                                >
                            </div>
                            <!-- Opsional: tampilkan nama atau deskripsi -->
                            <!-- <h5 class="mt-3">{{ $partner->name }}</h5> -->
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No active partners available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Partners End -->
@endsection