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
                            <h4 class="mb-0 font-size-18">Form Soal</h4>
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
                            <div class="card-body" id="editFormContainer" style="display:none;">
                                <form id="formEditSoal" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="modul" id="editModul">

                                    <div class="mb-3">
                                        <label>No Soal</label>
                                        <input type="text" name="no" class="form-control" id="editNo" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Kolom</label>
                                        <select name="kelompok" class="form-control" id="editKelompok" required>
                                            <option value="">-- Pilih Kolom --</option>
                                            @foreach ($kelompok as $k)
                                                <option value="{{ $k->judul }}">{{ $k->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label>Soal</label>
                                        <textarea name="soal2" class="form-control" id="editSoal" rows="3"></textarea>
                                    </div>

                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="mb-3">
                                            <label>Gambar J{{ $i }} (Opsional)</label>
                                            <input type="file" name="j{{ $i }}" class="form-control">
                                        </div>
                                    @endfor

                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="cancelEdit()">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {

                        // 🔹 Fungsi untuk menampilkan form edit dan isi otomatis
                        window.showEditForm = function(id, modul, kelompok, soal) {
                            const formContainer = document.getElementById('editFormContainer');
                            const form = document.getElementById('formEditSoal');

                            // tampilkan form edit
                            formContainer.style.display = 'block';

                            // isi data
                            document.getElementById('editModul').value = modul;
                            document.getElementById('editNo').value = id; // kalau id bukan no, ubah nanti
                            document.getElementById('editKelompok').value = kelompok;
                            document.getElementById('editSoal').value = soal;

                            // ubah action ke route update
                            form.action = `/soal/${id}`;
                        };

                        // 🔹 Fungsi untuk batal edit
                        window.cancelEdit = function() {
                            document.getElementById('editFormContainer').style.display = 'none';
                            document.getElementById('formEditSoal').reset();
                        };
                    });
                </script>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">
                                    Daftar Soal
                                </h4>
                                <p class="card-title-desc">
                                    Silahkan Bisa Menambahkan Dan Juga Meng Edit Data Modul Disini
                                </p>
                                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                                    Tambah Soal
                                </button>

                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="
                                                    border-collapse: collapse;
                                                    border-spacing: 0;
                                                    width: 100%;
                                                ">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kelompok Soal</th>
                                            <th>Soal</th>
                                            <th>Gambar 1</th>
                                            <th>Gambar 2</th>
                                            <th>Gambar 3</th>
                                            <th>Gambar 4</th>
                                            <th>Gambar 5</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($data as $item)
                                            <tr>
                                                <td>{{ $item->no }}</td>
                                                <td>{{ $item->kelompok }}</td>
                                                <td>
                                                    @if ($item->soal2)
                                                        {{ $item->soal2 }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->j1)
                                                        <img src="{{ asset('storage/' . $item->j1) }}" width="60">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->j2)
                                                        <img src="{{ asset('storage/' . $item->j2) }}" width="60">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->j3)
                                                        <img src="{{ asset('storage/' . $item->j3) }}" width="60">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->j4)
                                                        <img src="{{ asset('storage/' . $item->j4) }}" width="60">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->j5)
                                                        <img src="{{ asset('storage/' . $item->j5) }}" width="60">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        onclick="showEditForm('{{ $item->id }}', '{{ $item->modul }}', '{{ $item->kelompok }}', `{{ $item->soal2 }}`)">
                                                        Edit
                                                    </button>

                                                    <form action="{{ route('soal.destroy', $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf @method('DELETE')
                                                        <button onclick="return confirm('Yakin hapus?')"
                                                            class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">Belum ada soal untuk modul ini.</td>
                                            </tr>
                                            <!-- Modal Edit -->
                                        @endforelse
                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- End Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow p-4 mt-4">
                            <h5 class="card-title mb-3">🎯 Generate Soal Otomatis</h5>

                            <form action="{{ route('soal.generate') }}" method="POST">
                                @csrf

                                <input type="hidden" name="modul" value="{{ $modul }}">

                                <div class="mb-3">
                                    <label for="kelompok" class="form-label fw-bold">Pilih Kelompok Soal</label>
                                    <select name="kelompok" id="kelompok" class="form-select" required>
                                        <option value="">-- Pilih Kelompok --</option>
                                        @foreach ($kelompok as $k)
                                            <option value="{{ $k->judul }}">{{ $k->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="jumlah" class="form-label fw-bold">Jumlah Soal</label>
                                    <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan jumlah soal"
                                        min="1" class="form-control" required>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="btn btn-success">
                                        🚀 Generate Otomatis
                                    </button>


                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- Modal Tambah -->
                <!-- Modal Tambah -->
                <div class="modal fade bs-example-modal-lg" id="addModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Soal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('soal.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="modul" value="{{ $modul }}">
                                    <div class="mb-3">
                                        <label>No Soal</label>
                                        <input type="text" name="no" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Kolom</label>
                                        <select name="kelompok" class="form-control" required>
                                            <option value="">-- Pilih Kolom --</option>
                                            @foreach ($kelompok as $k)
                                                <option value="{{ $k->judul }}">{{ $k->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Soal</label>
                                        <textarea name="soal2" class="form-control"></textarea>
                                    </div>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="mb-3">
                                            <label>Gambar J{{ $i }} (Opsional)</label>
                                            <input type="file" name="j{{ $i }}" class="form-control">
                                        </div>
                                    @endfor
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->

        </div>
        <!-- Container-Fluid -->
    </div>

@endsection
