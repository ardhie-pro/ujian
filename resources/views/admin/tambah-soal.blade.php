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
        <div class="card" id="editFormContainer" style="display:none;">
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
                    <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
        <div class="wrapper card card-animate mt-5">
            <div class="title mb-5">Daftar Soal -----</div>
            {{-- Alert sukses --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <script>
                document.addEventListener("DOMContentLoaded", function() {

                    // 🔹 Fungsi untuk menampilkan form edit dan isi otomatis
                    window.showEditForm = function(id, modul, kelompok, soal, no) {
                        const formContainer = document.getElementById('editFormContainer');
                        const form = document.getElementById('formEditSoal');

                        // tampilkan form edit
                        formContainer.style.display = 'block';

                        // isi data
                        document.getElementById('editModul').value = modul;
                        document.getElementById('editNo').value = no; // kalau id bukan no, ubah nanti
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

            <button class="btn btn-answered col-2 mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                + Tambah Soal
            </button>

            @php
                $firstKelompok = $data->first();
            @endphp

            <tbody id="tbody-kelompok">
                <tr>
                    <td colspan="9">
                        <div style="padding:10px; background:#f7f7f7; border:1px solid #ddd;">
                            <strong>Kelompok Soal: {{ $firstKelompok->kelompok }}</strong>

                            @if ($firstKelompok->kelompok_data)
                                <table class="table table-bordered mt-2">
                                    <tr>
                                        <th>A</th>
                                        <td>{{ $firstKelompok->kelompok_data->soal1_text ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>B</th>
                                        <td>{{ $firstKelompok->kelompok_data->soal2_text ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>C</th>
                                        <td>{{ $firstKelompok->kelompok_data->soal3_text ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>D</th>
                                        <td>{{ $firstKelompok->kelompok_data->soal4_text ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>E</th>
                                        <td>{{ $firstKelompok->kelompok_data->soal5_text ?? '-' }}</td>
                                    </tr>
                                </table>
                            @else
                                <em>Tidak ada data kelompok soal.</em>
                            @endif
                        </div>
                    </td>
                </tr>
            </tbody>


            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
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

                <tbody id="tbody-soal-biasa">
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->no }}</td>
                            <td>{{ $item->kelompok }}</td>
                            <td>{{ $item->soal2 ?? '-' }}</td>

                            <td>
                                @if ($item->j1)
                                    <img src="{{ asset('storage/' . $item->j1) }}" width="60">
                                @endif
                            </td>
                            <td>
                                @if ($item->j2)
                                    <img src="{{ asset('storage/' . $item->j2) }}" width="60">
                                @endif
                            </td>
                            <td>
                                @if ($item->j3)
                                    <img src="{{ asset('storage/' . $item->j3) }}" width="60">
                                @endif
                            </td>
                            <td>
                                @if ($item->j4)
                                    <img src="{{ asset('storage/' . $item->j4) }}" width="60">
                                @endif
                            </td>
                            <td>
                                @if ($item->j5)
                                    <img src="{{ asset('storage/' . $item->j5) }}" width="60">
                                @endif
                            </td>

                            <td>… tombol edit/hapus …</td>
                        </tr>
                    @endforeach
                </tbody>


            </table>

        </div>
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

    </div>
    {{-- ===================== MODAL TAMBAH ===================== --}}

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

@endsection
