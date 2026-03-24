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

        .table-responsive {
            overflow-x: auto;
        }

        .td-text {
            max-width: 350px;
            white-space: normal;
            word-break: break-word;
        }

        .td-text img {
            max-width: 100%;
            height: auto;
        }

        .td-img img {
            max-width: 120px;
            height: auto;
            display: block;
            margin: 5px auto;
        }

        .table td,
        .table th {
            vertical-align: top !important;
            white-space: normal !important;
            word-wrap: break-word;
            max-width: 300px;
        }

        /* Scroll responsif */
        .table-responsive {
            overflow-x: auto;
        }

        /* Agar kolom Opsi tidak terlalu lebar */
        .opsi-col {
            width: 120px;
        }
    </style>


    <div class="page-content">
        <div id="formTambahSoal" style="display:none;">
            <div class="row">
                <div class="col-12">
                    <div class="wrapper">
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

                                <div id="pilihan-wrapper" class="row g-3">
                                    <!-- DEFAULT -->
                                    <div class="col-5 pilihan-item">
                                        <label>Jawaban A</label>
                                        <textarea name="j1" id="elm_j1"></textarea>
                                    </div>

                                    <div class="col-5 pilihan-item">
                                        <label>Jawaban B</label>
                                        <textarea name="j2" id="elm_j2"></textarea>
                                    </div>

                                    <!-- HIDDEN OPTIONS -->
                                    <div class="col-5 pilihan-item d-none">
                                        <label>Jawaban C</label>
                                        <textarea name="j3" id="elm_j3"></textarea>
                                    </div>

                                    <div class="col-5 pilihan-item d-none">
                                        <label>Jawaban D</label>
                                        <textarea name="j4" id="elm_j4"></textarea>
                                    </div>

                                    <div class="col-5 pilihan-item d-none">
                                        <label>Jawaban E</label>
                                        <textarea name="j5" id="elm_j5"></textarea>
                                    </div>
                                </div>

                                <!-- BUTTONS -->
                                <div class="mt-2 mb-5">
                                    <button type="button" id="btnAdd" class="btn btn-primary btn-sm">Tambah
                                        Pilihan</button>
                                    <button type="button" id="btnRemove" class="btn btn-danger btn-sm d-none">Hapus
                                        Pilihan</button>
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
                    <div class="wrapper">
                        <div class="card-body">
                            <h5 class="mb-3">Edit Soal</h5>

                            <form id="editSoalForm" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" id="edit_id">
                                <input type="hidden" name="modul" id="edit_modul">

                                <div class="mb-3">
                                    <label>No Soal</label>
                                    <input type="text" name="no" id="edit_no" class="form-control" required>
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
                                    <button type="button" id="batalEditBtn" class="btn btn-secondary">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                <form id="formUploadWord" action="{{ route('soal.importWord') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="modul" value="{{ $modul }}">
                    <div class="d-flex align-items-center gap-3">
                        <input type="file" name="word_file" accept=".docx" class="form-control" style="max-width: 300px;" required>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload Soal Word
                        </button>
                    </div>
                </form>

                <!-- Progress Bar Container -->
                <div id="uploadProgressContainer" style="display:none; margin-top:20px; width: 100%;">
                    <div class="progress" style="height: 25px; border-radius: 12px; overflow: hidden; background-color: #e9ecef; box-shadow: inset 0 1px 2px rgba(0,0,0,.1);">
                        <div id="uploadProgressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%; background-color: #F4C542; color: #0E2542; font-weight: bold; line-height: 25px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                    <p id="uploadStatusText" class="text-center mt-2 fw-bold" style="color: #0E2542;">Sedang mengunggah... 0%</p>
                    <div class="alert alert-warning text-center mt-2" style="border-radius: 8px; border-left: 5px solid #ffc107;">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Jangan di refresh, mohon tunggu sampai proses selesai!</strong>
                    </div>
                </div>

            </div>
            <div class="row">
                <a href="{{ route('download.template.soal') }}" class="text-decoration-none fw-bold text-primary">
                    📥 Download Template Soal (Word)
                </a>
            </div>
        </div>
        <div class="wrapper mt-5">
            <div class="row">
                <div class="col-12">

                    <div class="card-body">
                        <h4 class="card-title">
                            Daftar Modul
                        </h4>
                        <p class="card-title-desc">
                            Silahkan Bisa Menambahkan Dan Juga Meng Edit Data Modul Disini
                        </p>
                        <div class="mb-3">

                        </div>

                        <form id="formDeleteAll" action="{{ route('soal.deleteAll') }}" method="POST">
                            @csrf
                            <div class="mt-2 mb-5">
                                <button type="button" id="tambahSoalBtn" class="btn btn-success">
                                    + Tambah Soal
                                </button>
                                <button type="button" id="btnDeleteSelected" class="btn btn-danger ">
                                    Hapus Terpilih
                                </button>
                            </div>


                            <input type="hidden" name="type_template" value="{{ $type_template }}">

                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th>NO</th>
                                            <th>Soal</th>
                                            <th>Pembahasan</th>
                                            <th class="opsi-col">Opsi A</th>
                                            <th class="opsi-col">Opsi B</th>
                                            <th class="opsi-col">Opsi C</th>
                                            <th class="opsi-col">Opsi D</th>
                                            <th class="opsi-col">Opsi E</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($data2 as $item)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="ids[]" value="{{ $item->id }}"
                                                        class="checkItem">
                                                </td>

                                                <td>{{ $item->no }}</td>

                                                <!-- Render HTML TinyMCE -->
                                                <td>{!! $item->soal !!}</td>
                                                <td>{!! $item->pembahasan !!}</td>

                                                <td>{!! $item->j1 !!}</td>
                                                <td>{!! $item->j2 !!}</td>
                                                <td>{!! $item->j3 !!}</td>
                                                <td>{!! $item->j4 !!}</td>
                                                <td>{!! $item->j5 !!}</td>

                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        onclick="showEditForm('{{ $item->id }}','{{ $item->modul }}',`{{ $item->soal }}`,`{{ $item->pembahasan }}`,`{{ $item->no }}`,`{{ $item->j1 }}`,`{{ $item->j2 }}`,`{{ $item->j3 }}`,`{{ $item->j4 }}`,`{{ $item->j5 }}`)">
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="deleteSingle({{ $item->id }})">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">Belum ada soal untuk modul ini.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>






                        </form>

                    </div>

                </div>
                <!-- end col -->
            </div>
        </div>
        <!-- End Row -->
        {{-- <div class="wrapper">
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
                                <img src="{{ asset('storage/' . $item->img) }}" class="card-img-top" alt="img">
                                <div class="card-body text-center">
                                    <small class="d-block text-muted mb-2">
                                        <input type="text" class="form-control form-control-sm text-center" readonly
                                            value="{{ asset('storage/' . $item->img) }}"
                                            onclick="navigator.clipboard.writeText(this.value); alert('Link disalin!');">
                                    </small>
                                    <form action="{{ route('admin.galeri.update', $item->id) }}" method="POST"
                                        enctype="multipart/form-data" class="d-inline">
                                        @csrf
                                        <input type="file" name="img" class="form-control form-control-sm mb-2">
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
        </div> --}}


    </div>
    <!-- End Page-content -->

    <!-- Premium Upload Overlay -->
    <div id="uploadOverlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(14, 37, 66, 0.9); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); z-index:10000; flex-direction:column; justify-content:center; align-items:center; color:white; text-align:center; padding: 20px;">
        <div class="spinner-container mb-4" style="position: relative;">
            <div class="custom-spinner" style="width: 90px; height: 90px; border: 8px solid rgba(255, 255, 255, 0.1); border-top: 8px solid #F4C542; border-radius: 50%; animation: spin 1s linear infinite; box-shadow: 0 0 20px rgba(244, 197, 66, 0.3);"></div>
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <i class="bi bi-cloud-arrow-up-fill text-warning fs-1"></i>
            </div>
        </div>
        <h2 id="overlayStatusText" style="font-weight: 800; letter-spacing: 1px; font-size: 2.5rem; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">Sedang Mengunggah... 0%</h2>
        <p class="fs-4 mb-4" style="opacity: 0.9; font-weight: 300;">Mohon tunggu sampai proses selesai.</p>
        
        <div style="width: 100%; max-width: 600px; background: rgba(255,255,255,0.1); border-radius: 30px; overflow: hidden; height: 16px; border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
            <div id="overlayProgressBar" style="width: 0%; height: 100%; background: linear-gradient(90deg, #F4C542, #e1b63b, #F4C542); background-size: 200% 100%; animation: gradientMove 2s linear infinite; transition: width 0.4s cubic-bezier(0.1, 0.7, 1.0, 0.1);"></div>
        </div>
        
        <div class="mt-5 p-4 shadow-lg" style="background: rgba(244, 197, 66, 0.15); border: 2px solid #F4C542; border-radius: 20px; max-width: 600px; animation: pulseGlow 2s infinite;">
            <p class="mb-1 fw-bold text-warning" style="font-size: 1.4rem;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> PENTING: JANGAN REFRESH HALAMAN!
            </p>
            <p class="mb-0" style="opacity: 0.9; font-size: 1rem;">Sistem sedang mengekstrak soal dan merender gambar dari file Word Anda.</p>
        </div>
    </div>

    <style>
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @keyframes gradientMove {
        0% { background-position: 100% 0%; }
        100% { background-position: -100% 0%; }
    }
    @keyframes pulseGlow {
        0% { box-shadow: 0 0 0px rgba(244, 197, 66, 0); }
        50% { box-shadow: 0 0 30px rgba(244, 197, 66, 0.2); }
        100% { box-shadow: 0 0 0px rgba(244, 197, 66, 0); }
    }
    </style>

    </div>
    <!-- Container-Fluid -->
    </div>
@endsection

@section('scripts')
    <script>
        // ===========================
        // CENTANG SEMUA
        // ===========================
        document.getElementById('checkAll').addEventListener('change', function() {
            document.querySelectorAll('.checkItem').forEach(cb => cb.checked = this.checked);
        });

        // ===========================
        // HAPUS TERPILIH
        // ===========================
        document.getElementById('btnDeleteSelected').addEventListener('click', function() {

            let checked = document.querySelectorAll('.checkItem:checked');

            if (checked.length === 0) {
                alert("Tidak ada data yang dipilih!");
                return;
            }

            // hanya konfirmasi biasa tanpa tampilkan ID
            if (confirm("Yakin ingin menghapus data yang dipilih?")) {
                document.getElementById('formDeleteAll').submit();
            }
        });

        // ===========================
        // HAPUS SATU DATA
        // ===========================
        function deleteSingle(id) {

            if (!confirm("Yakin hapus data ini?")) return;

            // form delete dinamis (anti nested form)
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/soal/' + id;

            form.innerHTML = `
        @csrf
        @method('DELETE')
    `;

            document.body.appendChild(form);
            form.submit();
        }
    </script>

    {{-- js untuk menampilkan danmenghapus opsi yaa  bang --}}
    <script>
        let counter = 2; // A,B visible
        const max = 5; // sampai E

        const wrapper = document.getElementById("pilihan-wrapper");
        const items = wrapper.querySelectorAll(".pilihan-item");
        const btnAdd = document.getElementById("btnAdd");
        const btnRemove = document.getElementById("btnRemove");

        function updateButtons() {
            // sembunyikan tombol hapus kalau cuma 2
            btnRemove.classList.toggle("d-none", counter <= 2);

            // sembunyikan tombol tambah kalau sudah 5
            btnAdd.classList.toggle("d-none", counter >= max);
        }

        btnAdd.addEventListener("click", function() {
            if (counter >= max) return;

            counter++;
            items[counter - 1].classList.remove("d-none");

            // refresh tinymce
            tinymce.init({
                selector: `#elm_j${counter}`
            });

            updateButtons();
        });

        btnRemove.addEventListener("click", function() {
            if (counter <= 2) return;

            items[counter - 1].classList.add("d-none");
            counter--;

            updateButtons();
        });

        updateButtons();
    </script>




    <script>
        $(document).ready(function() {
            // Handle Word Upload Loading with AJAX Progress
            $('#formUploadWord').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                let overlayProgressBar = $('#overlayProgressBar');
                let uploadOverlay = $('#uploadOverlay');
                let overlayStatusText = $('#overlayStatusText');
                let submitBtn = $(this).find('button[type="submit"]');

                // Reset and show overlay
                overlayProgressBar.css('width', '0%');
                overlayStatusText.text('Sedang Mengunggah... 0%');
                uploadOverlay.css('display', 'flex').hide().fadeIn();
                
                submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Memproses...');

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhr: function() {
                        let xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                let percentComplete = Math.round((evt.loaded / evt.total) * 100);
                                if (percentComplete < 100) {
                                    overlayProgressBar.css('width', percentComplete + '%');
                                    overlayStatusText.text('Sedang Mengunggah... ' + percentComplete + '%');
                                } else {
                                    overlayProgressBar.css('width', '100%');
                                    overlayStatusText.text('Hampir Selesai, Sedang Menyimpan Soal...');
                                }
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            overlayProgressBar.css('width', '100%');
                            overlayStatusText.text('Selesai! Berhasil Impor Soal.');
                            
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        } else {
                            alert('Gagal: ' + response.message);
                            uploadOverlay.fadeOut();
                            submitBtn.prop('disabled', false).html('<i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload Soal Word');
                        }
                    },
                    error: function(xhr) {
                        let errorMsg = 'Terjadi kesalahan saat mengunggah file.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        alert(errorMsg);
                        uploadOverlay.fadeOut();
                        submitBtn.prop('disabled', false).html('<i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload Soal Word');
                    }
                });
            });
        });
    </script>
@endsection
