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
                            <h4 class="mb-0 font-size-18">Form Modul</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="page-content-wrapper">
                <div id="formTambahSoal" style="display:none;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Tambah Soal</h5>

                                    <form action="{{ route('soal-multiple.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="modul" value="{{ $modul }}">

                                        <div class="mb-3">
                                            <label>No Soal</label>
                                            <input type="text" name="no" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Soal</label>
                                            <textarea id="elm_soal" name="soal" rows="3"></textarea>
                                        </div>

                                        <hr>

                                        <h6 class="fw-bold">Pilihan Jawaban</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban A</label>
                                                <textarea name="j1" id="elm_j1"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban B</label>
                                                <textarea name="j2" id="elm_j2"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban C</label>
                                                <textarea name="j3" id="elm_j3"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban D</label>
                                                <textarea name="j4" id="elm_j4"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban E</label>
                                                <textarea name="j5" id="elm_j5"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Pembahasan</label>
                                            <textarea id="elm_pembahasan" name="pembahasan" rows="3"></textarea>
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" id="batalBtn" class="btn btn-secondary">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="formEditSoal" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Edit Soal</h5>

                                    <form id="editSoalForm" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" id="edit_id">
                                        <input type="hidden" name="modul" id="edit_modul">

                                        <div class="mb-3">
                                            <label>No Soal</label>
                                            <input type="text" name="no" id="edit_no" class="form-control"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Soal</label>
                                            <textarea id="edit_soal" name="soal" rows="3"></textarea>
                                        </div>

                                        <hr>

                                        <h6 class="fw-bold">Pilihan Jawaban</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban A</label>
                                                <textarea name="j1" id="edit_j1"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban B</label>
                                                <textarea name="j2" id="edit_j2"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban C</label>
                                                <textarea name="j3" id="edit_j3"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban D</label>
                                                <textarea name="j4" id="edit_j4"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label>Jawaban E</label>
                                                <textarea name="j5" id="edit_j5"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Pembahasan</label>
                                            <textarea id="edit_pembahasan" name="pembahasan" rows="3"></textarea>
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" id="batalEditBtn"
                                                class="btn btn-secondary">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    Daftar Modul
                                </h4>
                                <p class="card-title-desc">
                                    Silahkan Bisa Menambahkan Dan Juga Meng Edit Data Modul Disini
                                </p>
                                <div class="mb-3">
                                    <button type="button" id="tambahSoalBtn" class="btn btn-success">
                                        + Tambah Soal
                                    </button>
                                </div>

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

                                            <th>Soal</th>
                                            <th>Pembahasan</th>

                                            <th>Gambar 1</th>
                                            <th>Gambar 2</th>
                                            <th>Gambar 3</th>
                                            <th>Gambar 4</th>
                                            <th>Gambar 5</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($data2 as $item)
                                            <tr>
                                                <td>{{ $item->no }}</td>

                                                <td>
                                                    {{ $item->soal }}
                                                </td>
                                                <td>
                                                    {{ $item->pembahasan }}
                                                </td>
                                                <td>
                                                    {{ $item->j1 }}
                                                </td>
                                                <td>
                                                    {{ $item->j2 }}
                                                </td>
                                                <td>
                                                    {{ $item->j3 }}
                                                </td>
                                                <td>
                                                    {{ $item->j4 }}
                                                </td>
                                                <td>
                                                    {{ $item->j5 }}
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        onclick="showEditForm('{{ $item->id }}', '{{ $item->modul }}', `{{ $item->soal }}`,`{{ $item->pembahasan }}`, `{{ $item->no }}`, `{{ $item->j1 }}`, `{{ $item->j2 }}`, `{{ $item->j3 }}`, `{{ $item->j4 }}`, `{{ $item->j5 }}`)">
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
                                                <td colspan="9" class="text-center">Belum ada soal untuk modul ini.
                                                </td>
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
                                        <label>Soal</label>
                                        <textarea name="soal2" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->
            <div class="container-fluid mt-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between">
                        <h5 class="mb-0">📷 Manajemen Galeri</h5>
                        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data"
                            class="d-flex">
                            @csrf
                            <input type="file" name="img" class="form-control form-control-sm me-2" required>
                            <button class="btn btn-light btn-sm">Tambah</button>
                        </form>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                         <div class="row">
                            @foreach ($galeri as $item)
                                <div class="col-md-3 mb-4">
                                    <div class="card shadow-sm">
                                        <img src="{{ asset('storage/' . $item->img) }}" class="card-img-top"
                                            alt="img">
                                        <div class="card-body text-center">
                                            <small class="d-block text-muted mb-2">
                                                <input type="text" class="form-control form-control-sm text-center"
                                                    readonly value="{{ asset('storage/' . $item->img) }}"
                                                    onclick="navigator.clipboard.writeText(this.value); alert('Link disalin!');">
                                            </small>
                                            <form action="{{ route('admin.galeri.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data" class="d-inline">
                                                @csrf
                                                <input type="file" name="img"
                                                    class="form-control form-control-sm mb-2">
                                                <button class="btn btn-warning btn-sm">Ubah</button>
                                            </form>
                                            <form action="{{ route('admin.galeri.delete', $item->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Container-Fluid -->
    </div>





@endsection
