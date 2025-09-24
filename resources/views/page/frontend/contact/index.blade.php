@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Ajukan Pendaftaran</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/adminpanel/contact/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">First Name</label>
                      <input type="text" class="form-control" name="first_name">
                        @error('first_name')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Last Name</label>
                      <input type="text" class="form-control" name="last_name">
                        @error('last_name')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Subject</label>
                      <input type="text" class="form-control" name="subject">
                        @error('subject')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
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
