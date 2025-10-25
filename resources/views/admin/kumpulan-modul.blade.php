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
                            <h4>Input Kumpulan soal</h4>

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
                                                    value="{{ $m->modul }}"
                                                    @if (isset($kumpulanModul) && in_array($m->id, $kumpulanModul->modul_ids ?? [])) checked @endif>
                                                <label class="form-check-label">{{ $m->modul }}</label>
                                            </div>
                                        @endforeach

                                        <!-- tempat input hidden yang dikirim ke server -->
                                        <div id="modul-inputs"></div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const checkboxes = document.querySelectorAll('.modul-checkbox');
                                        const container = document.getElementById('modul-inputs');
                                        let selectedModules = [];

                                        checkboxes.forEach(cb => {
                                            cb.addEventListener('change', function() {
                                                const value = this.value;

                                                if (this.checked) {
                                                    // Tambahkan ke urutan terakhir kalau dicentang
                                                    selectedModules.push(value);
                                                } else {
                                                    // Hapus kalau di-uncheck
                                                    selectedModules = selectedModules.filter(v => v !== value);
                                                }

                                                // Kosongkan hidden inputs sebelumnya
                                                container.innerHTML = '';

                                                // Bikin ulang hidden input sesuai urutan centang
                                                selectedModules.forEach(val => {
                                                    const input = document.createElement('input');
                                                    input.type = 'hidden';
                                                    input.name = 'modul_ids[]';
                                                    input.value = val;
                                                    container.appendChild(input);
                                                });

                                                console.log('Urutan modul:', selectedModules);
                                            });
                                        });
                                    });
                                </script>

                            </div>
                            <!-- End Cardbody -->
                        </div>
                        <!-- End Card-->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->



            </div>
            <!-- End Page-content -->

        </div>
        <!-- Container-Fluid -->
    </div>
@endsection
