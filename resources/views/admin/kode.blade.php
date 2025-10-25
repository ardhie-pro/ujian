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
                            <h4 class="mb-0 font-size-18">Generate Kode</h4>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4>Generate Kode Modul</h4>
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form action="{{ route('generate-kode.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Jumlah Kode</label>
                                        <input type="number" name="jumlah" class="form-control" min="1" required>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Pilih Modul</label>
                                        <select name="modul_id" class="form-control" required>
                                            <option value="">-- Pilih Modul --</option>
                                            @foreach ($modul as $m)
                                                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Tanggal Berlaku Mulai</label>
                                        <input type="date" name="tanggal_mulai" class="form-control" required>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Tanggal Berlaku Sampai</label>
                                        <input type="date" name="tanggal_selesai" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4">Generate</button>
                                </form>

                            </div>
                            <!-- End Cardbody -->
                        </div>
                        <!-- End Card-->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
          <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <h4 class="mb-4">📅 Daftar Kode Generator (Status = 0)</h4>

                    {{-- 🔍 Filter --}}
                    <form method="GET" action="{{ route('generate-kode.index') }}" class="mb-3">
                        <div class="row align-items-end">
                            <div class="col-md-3">
                                <label for="tanggal_mulai" class="form-label">Filter Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    class="form-control" value="{{ request('tanggal_mulai') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="modul_id" class="form-label">Filter Modul</label>
                                <select name="modul_id" id="modul_id" class="form-select">
                                    <option value="">-- Semua Modul --</option>
                                    @foreach ($modul as $m)
                                        <option value="{{ $m->id }}" {{ request('modul_id') == $m->id ? 'selected' : '' }}>
                                            {{ $m->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('generate-kode.index') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>

                    {{-- 📋 Tabel Data --}}
                    <div class="table-responsive">
                        <table id="datatable-buttons"
                            class="table table-striped table-bordered dt-responsive nowrap">
                            <thead class="table-primary">
                                <tr>
                                    <th>NO</th>
                                    <th>Kode</th>
                                    <th>Nama Modul</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $row)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><strong class="text-primary">{{ $row->kode }}</strong></td>
                                        <td>{{ $row->nama_modul }}</td>
                                        <td>{{ $row->waktu }} menit</td>
                                        <td>
                                            <span class="badge bg-success">0 (Belum Digunakan)</span>
                                        </td>
                                        <td>{{ $row->tanggal_mulai ? \Carbon\Carbon::parse($row->tanggal_mulai)->format('d M Y') : '-' }}</td>
                                        <td>{{ $row->tanggal_selesai ? \Carbon\Carbon::parse($row->tanggal_selesai)->format('d M Y') : '-' }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('generate-kode.destroy', $row->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus kode ini?')"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm">
                                                    <i class="mdi mdi-trash-can-outline"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            Tidak ada kode dengan status 0
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
