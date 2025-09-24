@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <p>Semoga berhasil</p>
        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Recent Testimoni</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Photo Profile</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Description</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Rating</h6>
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
                        @foreach ($testimonis as $testimonal)
                            <tr>
                                <td class="border-bottom-0">
                                <img src="{{asset('storage/'.$testimonal->photo_profile)}}" width="100">
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$testimonal->name}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$testimonal->description}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{$testimonal->rating}}</h6>
                                </td>
                                <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2" >
                                    <div class="form-check form-switch float-left custom-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active_{{$testimonal->id}}" name="is_active" {{ $testimonal->is_active === 'active' ? 'checked' : '' }} data-id="{{ $testimonal->id }}">
                                    </div>
                                </div>
                                </td>
                                <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <a class="badge bg-success rounded-3 fw-semibold" href="/adminpanel/testimoni/edit/{{$testimonal->id}}">Edit</a>
                                    <a class="badge bg-danger rounded-3 fw-semibold" href="/adminpanel/testimoni/delete/{{$testimonal->id}}">Delete</a>
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
        <a href="/adminpanel/testimoni/create" class="btn btn-elearning m-1 btn-custom">Tambah data</a>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".toggle-active").forEach(toggle => {
            toggle.addEventListener("change", function() {
                let testimoniId = this.dataset.id;  // Asumsi: data-id="${testimoni.id}" di HTML input
                let is_active = this.checked ? 1 : 0;  // 1 untuk active (checked), 0 untuk inactive

                fetch(`/adminpanel/testimoni/toggle-active/${testimoniId}`, {  // Perbaiki: Tambah backtick untuk template literal
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",  // Pastikan ini di Blade template Laravel
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        is_active: is_active  // PERBAIKAN: Ganti dari 'status: status' menjadi 'is_active: is_active'
                        // (sebelumnya 'status' undefined, sekarang konsisten dengan variabel)
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log("Status updated:", data);
                    // Opsional: Tampilkan notifikasi sukses, misalnya alert(data.message);
                    if (data.success) {
                        // Update UI jika perlu, misalnya ubah teks label
                    }
                })
                .catch(err => {
                    console.error("Error:", err);
                    // Opsional: Tampilkan error ke user, misalnya alert('Gagal update status');
                    // Rollback checkbox jika error
                    this.checked = !this.checked;
                });
            });
        });
    });
</script>
@endsection
