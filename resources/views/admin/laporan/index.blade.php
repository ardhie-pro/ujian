@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Selamat Datang</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body py-4">
                            <h4>📘 Daftar Kode Ujian</h4>

                            <!-- 🔍 Search Bar -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="text" id="searchKode" class="form-control"
                                        placeholder="Cari berdasarkan kode ujian...">
                                </div>
                            </div>

                            <table class="table table-bordered table-hover" id="kodeTable">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Peserta</th>
                                        <th>Nama Modul</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $row)
                                        @php
                                            $rowColor = $row->status == 0 ? 'table-success' : 'table-danger';
                                        @endphp
                                        <tr class="{{ $rowColor }}">
                                            <td>{{ $index + 1 }}</td>
                                            <td class="kode-cell"><strong>{{ $row->kode }}</strong></td>
                                            <td>{{ $row->nama_peserta ?? '-' }}</td>
                                            <td>{{ $row->nama_modul ?? '-' }}</td>
                                            <td>{{ $row->waktu }} menit</td>
                                            <td>{{ ucfirst($row->status) }}</td>
                                            <td>
                                                <a href="{{ route('laporan.show', $row->kode) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="mdi mdi-eye"></i> Lihat Laporan
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 🔍 Script Search -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchKode");
        const tableRows = document.querySelectorAll("#kodeTable tbody tr");

        searchInput.addEventListener("keyup", function() {
            const keyword = this.value.toLowerCase();

            tableRows.forEach(row => {
                const kodeText = row.querySelector(".kode-cell").textContent.toLowerCase();
                row.style.display = kodeText.includes(keyword) ? "" : "none";
            });
        });
    });
</script>
@endsection
