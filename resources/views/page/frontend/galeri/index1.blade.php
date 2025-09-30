@extends('layout.frontend.app')
@section('content')
        <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assetsfrontend/img/layanankami-1.jpg') }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Data Analisis</h1>
                     <p class="mb-4">
                        Program bimbingan belajar <strong>Data Analisis</strong> dirancang untuk membantu siswa dan profesional
                        memahami bagaimana mengolah, membaca, serta menginterpretasi data dengan baik.
                        Peserta akan diperkenalkan pada konsep dasar hingga teknik lanjutan
                        dalam menganalisis data.
                    </p>
                    <br>
                    <p class="mb-4">
                        Materi yang diajarkan mencakup statistik dasar, penggunaan perangkat lunak analisis,
                        serta penerapan analisis data dalam berbagai bidang seperti bisnis, penelitian,
                        maupun akademik. Dengan bimbingan dari pengajar berpengalaman,
                        peserta diharapkan mampu membuat keputusan berbasis data yang akurat
                        dan relevan dengan kebutuhan.
                    </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="/">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
