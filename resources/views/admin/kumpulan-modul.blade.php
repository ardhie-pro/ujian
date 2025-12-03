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
                                <label>Pilih Modul</label>

                                @foreach ($modul as $m)
                                    <div class="form-check">
                                        <input class="form-check-input modul-checkbox" type="checkbox"
                                            value="{{ $m->modul }}" @if (isset($kumpulanModul) && in_array($m->id, $kumpulanModul->modul_ids ?? [])) checked @endif>
                                        <label class="form-check-label">{{ $m->modul }}</label>
                                    </div>
                                @endforeach

                                @foreach ($kAngkahilang as $k)
                                    <!-- Checkbox grup (TIDAK dikirim) -->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input checkbox-grup"
                                            data-grup="{{ $k->nama_grup }}">
                                        <label class="form-check-label">{{ $k->nama_grup }}</label>
                                    </div>

                                    @php
                                        $items = explode(', ', $k->isi);
                                    @endphp

                                    <!-- Checkbox isi (INI YANG DIKIRIM) -->
                                    @foreach ($items as $item)
                                        <div class="form-check ms-3">
                                            <input type="checkbox" class="form-check-input modul-checkbox checkbox-isi"
                                                data-parent="{{ $k->nama_grup }}" value="{{ $item }}">
                                            <label class="form-check-label">{{ $item }}</label>
                                        </div>
                                    @endforeach
                                @endforeach

                                <!-- hidden inputs -->
                                <div id="modul-inputs"></div>



                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const container = document.getElementById('modul-inputs');
                                // AUTO CENTANG SEMUA ISI KETIKA GRUP DICENTANG
                                document.querySelectorAll('.checkbox-grup').forEach(grup => {
                                    grup.addEventListener('change', function() {
                                        const grupName = this.getAttribute('data-grup');

                                        const items = document.querySelectorAll(
                                            `.checkbox-isi[data-parent="${grupName}"]`);
                                        items.forEach(cb => cb.checked = this.checked);

                                        updateHidden();
                                    });
                                });

                                // UPDATE hidden input saat isi grup dicentang manual
                                document.querySelectorAll('.checkbox-isi').forEach(isi => {
                                    isi.addEventListener('change', updateHidden);
                                });

                                // UPDATE hidden input saat modul biasa dicentang
                                document.querySelectorAll('.modul-checkbox:not(.checkbox-isi)').forEach(mod => {
                                    mod.addEventListener('change', updateHidden);
                                });

                                // FUNCTION UPDATE HIDDEN INPUT UNTUK SEMUA CHECKBOX
                                function updateHidden() {
                                    container.innerHTML = '';

                                    // modul biasa
                                    document.querySelectorAll('.modul-checkbox:not(.checkbox-isi):checked')
                                        .forEach(cb => {
                                            const inp = document.createElement('input');
                                            inp.type = 'hidden';
                                            inp.name = 'modul_ids[]';
                                            inp.value = cb.value;
                                            container.appendChild(inp);
                                        });

                                    // isi grup
                                    document.querySelectorAll('.checkbox-isi:checked')
                                        .forEach(cb => {
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
