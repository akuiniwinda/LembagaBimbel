@extends('layout.backend.app')
@section('content')
    <div class="container-fluid">
        <!-- Row 1: Header -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Detail Kontak</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap mb-0 align-middle"> <!-- table-bordered untuk mirip form create -->
                                <thead class="text-dark fs-4 bg-light"> <!-- Header ringan untuk pisah -->
                                    <tr>
                                        <th class="border-bottom-0 fw-semibold" style="width: 30%;">Field</th>
                                        <th class="border-bottom-0 fw-semibold">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border-bottom-0 fw-semibold">Nama Depan</td>
                                        <td class="border-bottom-0">{{$datacontacts->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 fw-semibold">Nama Belakang</td>
                                        <td class="border-bottom-0">{{$datacontacts->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 fw-semibold">Subject</td>
                                        <td class="border-bottom-0">{{$datacontacts->subject}}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 fw-semibold">Description</td>
                                        <td class="border-bottom-0">{{$datacontacts->description}}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 fw-semibold">Status (Dilihat?)</td>
                                        <td class="border-bottom-0">
                                            @if($datacontacts->is_active)
                                                <span class="badge bg-success rounded-3 fw-semibold" title="Sudah Dilihat">
                                                    Sudah Dilihat
                                                </span>
                                            @else
                                                <span class="badge bg-danger rounded-3 fw-semibold" title="Belum Dilihat">
                                                    Belum Dilihat
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Tombol Opsi (Mirip di index) -->
                        <div class="d-flex align-items-center gap-2 mt-4">
                            <a href="/adminpanel/contact" class="badge bg-secondary rounded-3 fw-semibold">Kembali ke List</a>
                            <a href="/adminpanel/contact/delete/{{ $datacontacts->id }}" class="badge bg-danger rounded-3 fw-semibold" onclick="return confirm('Yakin hapus data ini?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
