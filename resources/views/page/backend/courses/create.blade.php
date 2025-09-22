@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/adminpanel/courses/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Photo</label>
                      <input type="file" class="form-control" name="photo">
                        @error('photo')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Tittle</label>
                      <input type="text" class="form-control" name="title">
                        @error('title')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Harga</label>
                      <input type="text" class="form-control" name="harga">
                        @error('harga')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name">
                        @error('name')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Time</label>
                      <input type="text" class="form-control" name="time">
                        @error('time')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Student</label>
                      <input type="text" class="form-control" name="student">
                        @error('student')
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
