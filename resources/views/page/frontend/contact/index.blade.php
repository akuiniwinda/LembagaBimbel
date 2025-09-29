@extends('layout.backend.appform')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Isi form di bawah ini untuk mendaftar atau mendapatkan informasi lebih lanjut tentang program bimbingan belajar kami. Tim kami akan segera menghubungi anda</h5>
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
                    <button type="submit" class="btn btn-custom">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
