@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <!-- Row 1 -->
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
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aboutes as $bout)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $bout->photo) }}" width="100">
                                            </td>
                                            <td>
                                                <h6 class="fw-semibold mb-1">{{ $bout->description }}</h6>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input toggle-active" type="checkbox"
                                                        id="is_active_{{ $bout->id }}" name="is_active"
                                                        {{ $bout->is_active === 'active' ? 'checked' : '' }}
                                                        data-id="{{ $bout->id }}">

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a class="badge bg-success rounded-3 fw-semibold"
                                                        href="/adminpanel/about/edit/{{ $bout->id }}">Edit</a>
                                                    <a class="badge bg-danger rounded-3 fw-semibold"
                                                        href="/adminpanel/about/delete/{{ $bout->id }}">Delete</a>
                                                </div>
                                            </td>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".toggle-active").forEach(toggle => {
                toggle.addEventListener("change", function() {
                    let aboutId = this.dataset.id;
                    let is_active = this.checked ? 1 : 0;

                    fetch(`/adminpanel/about/toggle-active/${aboutId}`, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({
                                is_active: is_active
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                console.log("Status updated:", data.is_active);
                            } else {
                                alert("Gagal update status");
                                this.checked = !this.checked; // rollback
                            }
                        })
                        .catch(err => {
                            console.error("Error:", err);
                            alert("Terjadi kesalahan, coba lagi!");
                            this.checked = !this.checked; // rollback
                        });
                });
            });
        });
    </script>
@endsection
