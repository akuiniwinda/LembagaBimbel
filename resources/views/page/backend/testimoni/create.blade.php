@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms Testimoni</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/adminpanel/testimoni/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Photo</label>
                      <input type="file" class="form-control" name="photo_profile">
                        @error('photo')
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
                      <label class="form-label">Description</label>
                      <input type="text" class="form-control" name="description">
                        @error('description')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Rating</label>

                        <div class="rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                                <label for="star{{ $i }}">★</label>
                            @endfor
                        </div>
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
