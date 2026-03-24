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
    </style>

    <div class="page-content">




        <!-- Start Page-content-Wrapper -->
        <div class="wrapper">
            <div class="row">
                <div class="col-12">


                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="border-radius: 12px; border-left: 5px solid #28a745;">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <strong>Berhasil!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="border-radius: 12px; border-left: 5px solid #dc3545;">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <strong>Gagal!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <h4 class="card-title">Form Kumpulan Soal</h4>
                        <p class="card-title-desc">Untuk Mengelompokan Soal</p>

                        <form
                            action="{{ isset($kumpulanModul) ? route('kumpulan-modul.update', $kumpulanModul) : route('kumpulan-modul.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($kumpulanModul))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label>Nama Kumpulan Modul</label>
                                <input type="text" name="nama" class="form-control"
                                    value="{{ $kumpulanModul->nama ?? old('nama') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold mb-2">Pilih Modul</label>

                                <div class="modul-list-container" style="max-height: 500px; overflow-y: auto; padding-right: 10px;">
                                    {{-- MODUL BIASA --}}
                                    <h6 class="text-muted mt-2 mb-2 p-1 border-bottom" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Modul Standar</h6>
                                    @foreach ($modul as $m)
                                        <div class="form-check d-flex align-items-center justify-content-between mb-1">
                                            <div class="d-flex align-items-center">
                                                <input class="form-check-input modul-checkbox" type="checkbox"
                                                    value="{{ $m->modul }}" @if (isset($kumpulanModul) && in_array($m->id, $kumpulanModul->modul_ids ?? [])) checked @endif id="modul_{{ $m->id }}">
                                                <label class="form-check-label ms-2" for="modul_{{ $m->id }}">{{ $m->modul }}</label>
                                            </div>
                                            <button type="button" class="btn btn-link text-danger p-0" title="Hapus Modul" onclick="deleteStandaloneModul('{{ $m->id }}', '{{ $m->modul }}')">
                                                <i class="bi bi-trash-fill" style="font-size: 1.1rem;"></i>
                                            </button>
                                        </div>
                                    @endforeach

                                    {{-- GRUP DAN ISI --}}
                                    <h6 class="text-muted mt-4 mb-2 p-1 border-bottom" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">Grup Kolom (Angka Hilang)</h6>
                                    @foreach ($kAngkahilang as $k)
                                        <div class="form-check d-flex align-items-center justify-content-between mb-1">
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" class="form-check-input checkbox-grup"
                                                    data-grup="{{ $k->nama_grup }}" id="grup_{{ $k->id }}">
                                                <label class="form-check-label ms-2 fw-bold" for="grup_{{ $k->id }}">{{ $k->nama_grup }}</label>
                                            </div>
                                            <button type="button" class="btn btn-link text-danger p-0" title="Hapus Grup" onclick="deleteGrupModul('{{ $k->nama_grup }}')">
                                                <i class="bi bi-trash-fill" style="font-size: 1.1rem;"></i>
                                            </button>
                                        </div>

                                        @php
                                            $items = explode(', ', $k->isi);
                                        @endphp

                                        <div class="ms-4 border-start ps-3 mb-3">
                                            @foreach ($items as $item)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input modul-checkbox checkbox-isi"
                                                        data-parent="{{ $k->nama_grup }}" value="{{ $item }}" id="isi_{{ Str::slug($item) }}">
                                                    <label class="form-check-label" for="isi_{{ Str::slug($item) }}">{{ $item }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>

                                <!-- hidden inputs -->
                                <div id="modul-inputs"></div>

                            </div>

                            <div class="mt-4 text-end">
                                <a href="{{ route('kumpulan-modul.index') }}" class="btn btn-secondary me-2">Kembali</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan Kumpulan</button>
                            </div>
                        </form>

                        <script>
                            // --- Fungsi Hapus Standalone Modul ---
                            function deleteStandaloneModul(id, name) {
                                if (!confirm(`🚨 PERINGATAN! \n\nSemua data soal di dalam modul "${name}" akan ikut terhapus permanen. \n\nYakin ingin menghapus modul ini?`)) return;
                                
                                let form = document.createElement('form');
                                form.method = 'POST';
                                form.action = `/tarik-modul/${id}`;
                                form.innerHTML = `@csrf @method('DELETE')`;
                                document.body.appendChild(form);
                                form.submit();
                            }

                            // --- Fungsi Hapus Grup Modul ---
                            function deleteGrupModul(name) {
                                if (!confirm(`🚨 PERINGATAN KRITIS! \n\nGrup "${name}" dan SEMUA modul di dalamnya (beserta soalnya) akan dihapus permanen. \n\nYakin ingin menghapus grup ini?`)) return;
                                
                                let form = document.createElement('form');
                                form.method = 'POST';
                                form.action = `/destroy/${name}`;
                                form.innerHTML = `@csrf @method('DELETE')`;
                                document.body.appendChild(form);
                                form.submit();
                            }

                            document.addEventListener('DOMContentLoaded', function() {
                                const container = document.getElementById('modul-inputs');
                                let orderCounter = 0;

                                // ADD ORDER KETIKA DICENTANG
                                document.querySelectorAll('.form-check-input').forEach(cb => {
                                    cb.addEventListener('change', function() {
                                        if (this.checked) {
                                            this.dataset.order = orderCounter++;
                                        } else {
                                            delete this.dataset.order;
                                        }
                                        updateHidden();
                                    });
                                });

                                // AUTO CENTANG ISI KETIKA GRUP DICENTANG
                                document.querySelectorAll('.checkbox-grup').forEach(grup => {
                                    grup.addEventListener('change', function() {
                                        const grupName = this.getAttribute('data-grup');

                                        const items = document.querySelectorAll(
                                            `.checkbox-isi[data-parent="${grupName}"]`);

                                        items.forEach(cb => {
                                            cb.checked = this.checked;

                                            if (this.checked) {
                                                cb.dataset.order = orderCounter++;
                                            } else {
                                                delete cb.dataset.order;
                                            }
                                        });

                                        updateHidden();
                                    });
                                });

                                // UPDATE HIDDEN INPUT SESUAI URUTAN CENTANG
                                function updateHidden() {
                                    container.innerHTML = '';

                                    let allChecked = Array.from(
                                        document.querySelectorAll('.modul-checkbox:checked')
                                    );


                                    // SORT BERDASARKAN ORDER
                                    allChecked.sort((a, b) => {
                                        return (a.dataset.order ?? 0) - (b.dataset.order ?? 0);
                                    });

                                    // BUAT HIDDEN INPUT SESUAI URUTAN
                                    allChecked.forEach(cb => {
                                        const inp = document.createElement('input');
                                        inp.type = 'hidden';
                                        inp.name = 'modul_ids[]';
                                        inp.value = cb.value;
                                        container.appendChild(inp);
                                    });
                                }
                            });
                        </script>

                    </div>

                    <!-- End Cardbody -->

                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->



        </div>
        <!-- End Page-content -->


        <!-- Container-Fluid -->
    </div>
@endsection
