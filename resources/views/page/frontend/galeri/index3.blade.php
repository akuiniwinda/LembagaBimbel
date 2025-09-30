@extends('layout.frontend.app')
@section('content')
        <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('assetsfrontend/img/layanankami-3.jpg') }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="mb-4">Desain Grafis</h1>
                    <p class="mb-4">
                    Program <strong>Desain Grafis</strong> dirancang untuk membantu peserta
                    menguasai keterampilan visual kreatif, mulai dari dasar hingga tingkat lanjut.
                    Peserta akan belajar bagaimana mengolah ide menjadi karya desain
                    yang menarik, komunikatif, dan memiliki nilai estetika.
                </p>

                <p class="mb-4">
                    Materi meliputi penguasaan software desain populer seperti Adobe Photoshop,
                    Illustrator, dan CorelDRAW, hingga teknik tipografi, layout, ilustrasi digital,
                    serta branding visual. Program ini cocok untuk siswa, mahasiswa, maupun
                    profesional yang ingin meningkatkan kemampuan desain grafis
                    demi kebutuhan akademik maupun industri kreatif.
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
