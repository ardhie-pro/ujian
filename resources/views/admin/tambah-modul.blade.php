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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    Daftar Soal
                                </h4>
                                <p class="card-title-desc">
                                    Silahkan Bisa Menambahkan Dan Juga Meng Edit Data Soal Disini
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
                                            <th>Nama Soal</th>
                                            <th>Type Soal</th>
                                            <th>waktu</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($data as $index => $row)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $row->modul }}</td>
                                                <td>{{ $row->type_template }}</td>
                                                <td>{{ $row->waktu }}</td>
                                                <td>
                                                    <a href="{{ url('/soal?modul=' . urlencode($row->modul) . '&type_template=' . urlencode($row->type_template)) }}"
                                                        class="btn btn-info btn-sm">
                                                        Kasih Soal
                                                    </a>
                                                    <a href="{{ route('kunci-jawaban.show', ['modul' => $row->modul, 'type_template' => $row->type_template]) }}"
                                                        class="btn btn-success btn-sm">
                                                        Kunci Jawaban
                                                    </a>
                                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $row->id }}">Edit</button>
                                                    <form action="{{ route('tarik-modul.destroy', $row->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Yakin hapus?')"
                                                            class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit -->
                                            <div class="modal fade bs-example-modal-lg" id="editModal{{ $row->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Edit Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('tarik-modul.update', $row->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label>Modul</label>
                                                                    <textarea name="modul" class="form-control">{{ $row->modul }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Type Template</label>
                                                                    <textarea name="type_template" class="form-control">{{ $row->type_template }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Waktu</label>
                                                                    <textarea name="waktu" class="form-control">{{ $row->waktu }}</textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-success">Simpan
                                                                    Perubahan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- End Row -->
                <!-- Modal Tambah -->
                <div class="modal fade bs-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('tarik-modul.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Modul</label>
                                        <textarea name="modul" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="type_template" class="form-label">Type Template</label>
                                        <select name="type_template" id="type_template" class="form-select" required>
                                            <option value="">-- Pilih Type Template --</option>
                                            <option value="data-nama">Data Nama</option>
                                            <option value="angka-hilang">Angka-Hilang</option>
                                            <option value="multiple-chois">Multiple-Chois</option>
                                            <option value="tanpa-kembali">Tanpa-Kembali</option>
                                            <option value="istirahat">Istirahat</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Waktu</label>
                                        <textarea name="waktu" class="form-control"></textarea>
                                    </div>
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
