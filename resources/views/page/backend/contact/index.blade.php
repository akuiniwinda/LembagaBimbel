@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <p>Semoga berhasil</p>
        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Recent About</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">First Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Last Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Subject</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Description</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Opsi</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $kontak)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$kontak->first_name}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$kontak->last_name}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$kontak->subject}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$kontak->description}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2" >
                                    <div class="form-check form-switch float-left custom-switch">
                                        <input class="form-check-input" type="checkbox" id="status" name="status">
                                    </div>
                                </div>
                                </td>
                                <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <a class="badge bg-success rounded-3 fw-semibold" href="/adminpanel/contact/edit/{{$kontak->id}}">Edit</a>
                                    <a class="badge bg-danger rounded-3 fw-semibold" href="/adminpanel/contact/delete/{{$kontak->id}}">Delete</a>
                                </div>
                                </td>
                                </tr>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="/adminpanel/contact/create" class="btn btn-elearning m-1 btn-custom">Tambah data</a>
    </div>
@endsection
