@extends('layout.backend.appform')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="mb-5">Hubungi Kami Untuk Info Lebih Lanjut</h1>
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
          <div class="card">
            <div class="card-body">
              <div class="card">
                <div class="card-body">
                  <form action="/adminpanel/contact/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Nama Depan</label>
                      <input type="text" class="form-control" name="first_name">
                        @error('first_name')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nama Belakang</label>
                      <input type="text" class="form-control" name="last_name">
                        @error('last_name')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Subject</label>
                      <select class="form-control" name="subject">
                        <option value="" disabled selected>Pilih Subject</option>
                        <option value="Pendaftaran Bimbel">Pendaftaran Bimbel</option>
                        <option value="Informasi Program">Informasi Program</option>
                        <option value="Konsultasi Jadwal">Konsultasi Jadwal</option>
                        <option value="Kerjasama">Kerjasama</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <input type="text" class="form-control" name="description">
                        @error('description')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-custom" align="center">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
