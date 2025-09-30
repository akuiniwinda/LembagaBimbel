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
                          <h6 class="fw-semibold mb-0">Photo</h6>
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
                        @foreach ($aboutes as $bout)
                            <tr>
                                <td class="border-bottom-0">
                                <img src="{{asset('storage/'.$bout->photo)}}" width="100">
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$bout->description}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="form-check form-switch custom-switch">
                                        <input
                                            class="form-check-input toggle-active"
                                            type="checkbox"
                                            name="is_active"
                                            data-id="{{ $bout->id }}"
                                            {{ $bout->is_active === 'active' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <a class="badge bg-success rounded-3 fw-semibold" href="/adminpanel/about/edit/{{$bout->id}}">Edit</a>
                                    <a class="badge bg-danger rounded-3 fw-semibold" href="/adminpanel/about/delete/{{$bout->id}}">Delete</a>
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
        <a href="/adminpanel/about/create" class="btn btn-elearning m-1 btn-custom">Tambah data</a>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on('change', '.toggle-active', function() {
    let aboutId = $(this).data('id');
    let status = $(this).is(':checked') ? 'active' : 'no_active';

    $.ajax({
        url: "/adminpanel/about/toggle-active/" + aboutId,
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            is_active: status
        },
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Status Updated',
                    text: "Status: " + response.status,
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr) {
            Swal.fire('Error!', 'Gagal update status!', 'error');
        }
    });
});

// Delete dengan SweetAlert2
$(document).on('click', '.btn-delete', function(e) {
    e.preventDefault();
    let form = $(this).closest("form");
    let name = $(this).data("name");

    Swal.fire({
        title: 'Yakin hapus?',
        text: "Data partner \"" + name + "\" akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

// Flash message sukses (dari session)
@if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
@endif
</script>

@endsection
