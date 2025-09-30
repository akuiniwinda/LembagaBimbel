@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Service</h5>
              <div class="card">
                <div class="card-body">
                  <form action="/adminpanel/service/update/{{ $dataservises->id }}" method="POST" enctype="multipart/form-data">
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
                      <input type="text" class="form-control" name="title" value="{{$dataservises->title}}">
                        @error('title')
	                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <input type="text" class="form-control" name="description" value="{{$dataservises->description}}">
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
