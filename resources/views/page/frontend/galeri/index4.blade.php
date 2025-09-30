@extends('layout.frontend.app')
@section('content')
        <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assetsfrontend/img/layanankami-4.jpg') }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Programmer</h1>
                    <p class="mb-4">
                        Program <strong>Programmer</strong> dirancang untuk melatih peserta agar
                        mampu memahami logika pemrograman, menulis kode yang efisien, serta
                        membangun aplikasi sesuai kebutuhan industri modern.
                    </p>

                    <p class="mb-4">
                        Materi meliputi pengenalan bahasa pemrograman populer (seperti Python, PHP,
                        dan JavaScript), pengembangan aplikasi web, pemrograman berbasis objek (OOP),
                        serta dasar-dasar database. Program ini sangat cocok untuk pemula yang baru
                        belajar coding maupun peserta yang ingin meningkatkan keterampilan
                        pemrograman profesional.
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
