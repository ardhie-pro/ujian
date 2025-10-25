@extends('layouts.main')

@section('title', 'Daftar Kode Ujian')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18 fw-bold">📘 Daftar Kode Ujian</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('review.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Kode Ujian</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Start Page-content-Wrapper -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <div class="table-responsive" style="max-height: 75vh; overflow-y: auto;">
                                <table class="table table-bordered align-middle mb-0">
                                    <thead class="table-light sticky-top" style="top: 0; z-index: 10;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode</th>
                                            <th>Status</th>
                                            <th>Modul ID</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    @foreach ($data as $index => $row)
                                        <tr class="{{ $row->status == 0 ? 'table-success' : 'table-danger' }}">
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>{{ $row->kode }}</strong></td>
                                            <td>{{ $row->nama_peserta ?? '-' }}</td>
                                            <td>{{ $row->nama_modul ?? '-' }}</td>
                                            <td>{{ $row->waktu }} menit</td>
                                            <td>{{ ucfirst($row->status) }}</td>
                                            <td>
                                                    <a href="{{ route('review.show', $row->kode) }}" class="btn btn-sm btn-primary">
                                                        Lihat Modul
                                                    </a>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
        <!-- End Page-content-Wrapper -->

    </div>
    <!-- End Container-Fluid -->
</div>
@endsection
