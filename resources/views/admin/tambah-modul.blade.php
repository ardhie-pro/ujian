@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <style>
        body {
            background: #f4f6fb;
            padding: 0;
            font-family: "Inter", Arial, sans-serif;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            font-weight: 800;
            color: #222;
            margin: 0;
        }

        h2 {
            color: #4b4b4b;
            text-align: center;
            margin-top: 6px;
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        /* WRAPPER */
        .wrapper {
            border: 2px solid #cdd6e4;
            border-radius: 14px;
            padding: 25px;
            background: #fff;
            margin: 40px auto;
            width: 90%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .title {
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 18px;
            background: #F4C542 !important;
            color: #0E2542 !important;
            padding: 8px 14px;
            border-radius: 8px;
            width: max-content;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr !important;
            }
        }

        /* CARD */
        .card {
            background: #ffffff;
            border-radius: 14px;
            padding: 22px;
            border: 1px solid #dde3ee;
            box-shadow:
                0 3px 6px rgba(0, 0, 0, 0.05),
                0 1px 2px rgba(0, 0, 0, 0.04);
            transition: 0.25s ease;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.14),
                0 4px 10px rgba(0, 0, 0, 0.08);
            border-color: #b8c6df;
        }

        /* ROW */
        .row {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        /* FIELD BOX */
        .box {
            flex: 1;
            background: #e7e9ef;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #4d4d4d;
            letter-spacing: 0.3px;
            min-width: 0;
            word-break: break-word;
        }

        /* BUTTON */
        .btn-custom {
            width: 95px;
            background: #F4C542 !important;
            color: #0E2542 !important;
            padding: 10px 0;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: 0.25s;
            border: none !important;
            flex-shrink: 0;
        }

        .btn-custom:hover {
            background: #e1b63b !important;
        }

        .btn-danger-sm {
            background: #c0392b !important;
            color: white !important;
        }

        .btn-danger-sm:hover {
            background: #962d22 !important;
        }

        .dataTables_length {
            display: none !important;
        }

        .dataTables_filter {
            display: none !important;
        }

        .dataTables_info {
            display: none !important;
        }

        .card-animate {
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 1.6s ease-out forwards;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-answered {
            background-color: #244e9b;
            /* biru Bootstrap */
            color: white;
        }
    </style>


    <div class="page-content">
        {{-- =====================  TABEL REVIEW  ===================== --}}
        <div class="wrapper card card-animate mt-5">
            <div class="title mb-5">Daftar Soal -----</div>
            <button class="btn btn-answered col-2" data-bs-toggle="modal" data-bs-target="#addModal">
                Tambah Soal
            </button>
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
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
                                <form action="{{ route('tarik-modul.destroy', $row->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade bs-example-modal-lg" id="editModal{{ $row->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('tarik-modul.update', $row->id) }}" method="POST">
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





    <!-- start page title -->

    <!-- end page title -->

    <!-- Start Page-content-Wrapper -->


    <!-- End Row -->
    <!-- Modal Tambah -->
    <div class="modal fade bs-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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



    <!-- End Page-content -->

    </div>
    <!-- Container-Fluid -->
    </div>
@endsection
