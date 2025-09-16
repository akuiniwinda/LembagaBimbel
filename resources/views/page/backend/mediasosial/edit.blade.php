@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms Media Sosial</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/adminpanel/mediasosial/update/{{ $datamediasosial->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Photo</label>
                      <input type="file" class="form-control" name="photo">
                        @error('photo')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Link</label>
                      <input type="text" class="form-control" name="Link" value="{{$datamediasosial->link}}">
                        @error('link')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Name Account</label>
                      <input type="text" class="form-control" name="nameaccount" value="{{$datamediasosial->nameaccount}}">
                        @error('nameaccount')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Name Media Sosial</label>
                      <input type="text" class="form-control" name="namemediasosial" value="{{$datamediasosial->namemediasosial}}">
                        @error('namemediasosial')
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
