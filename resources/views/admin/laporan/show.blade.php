@extends('layouts.main')

@section('title', 'Laporan Jawaban User')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- Judul Halaman -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">
                                📊 Laporan Jawaban User — <span class="text-primary">Kode: {{ $kode }}</span>
                            </h4>
                        </div>
                        <div class="d-flex gap-2">
                            <button id="btnExportExcel" class="btn btn-success">
                                <i class="mdi mdi-file-excel"></i> Export ke Excel
                            </button>
                            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
                                <i class="mdi mdi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🔍 Filter Modul -->
            @if (count($data) > 1)
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select id="filterModul" class="form-select">
                            <option value="">Tampilkan Semua Modul</option>
                            @foreach ($data as $modul => $detail)
                                <option value="{{ $modul }}">{{ $modul }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif

            <!-- 📘 Laporan Tiap Modul -->
            @forelse ($data as $modul => $detail)
                <div class="card mb-4 laporan-modul" data-modul="{{ $modul }}">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Modul: {{ $modul }}</h5>
                        <span class="badge bg-light text-dark">
                            Total Poin: <strong>{{ $detail['total_poin'] }}</strong>
                        </span>
                    </div>

                    @if (isset($detail['rekap']))
                        <div class="rekap alert alert-info mb-4">
                            <h6 class="mb-3">📋 Rekapitulasi Hasil:</h6>
                            <div class="row text-center">
                                <div class="col-md-3 col-6 mb-2">
                                    <strong>Total Soal:</strong>
                                    <div class="fs-5 total-soal">{{ $detail['rekap']['total_soal'] }}</div>
                                </div>
                                <div class="col-md-3 col-6 mb-2">
                                    <strong>Dijawab:</strong>
                                    <div class="fs-5 dijawab">{{ $detail['rekap']['dijawab'] }}</div>
                                </div>
                                <div class="col-md-3 col-6 mb-2 text-success">
                                    <strong>Benar:</strong>
                                    <div class="fs-5 benar">{{ $detail['rekap']['benar'] }}</div>
                                </div>
                                <div class="col-md-3 col-6 mb-2 text-danger">
                                    <strong>Salah:</strong>
                                    <div class="fs-5 salah">{{ $detail['rekap']['salah'] }}</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0 text-center align-middle laporan-table">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;">No</th>
                                    <th>Jawaban User</th>
                                    <th>Kunci Jawaban</th>
                                    <th style="width: 100px;">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail['soal'] as $row)
                                    <tr>
                                        <td>{{ $row['no'] }}</td>
                                        <td
                                            class="@if ($row['status'] == 'salah') bg-danger text-white
                                            @elseif($row['status'] == 'benar') bg-success text-white @endif">
                                            {{ $row['jawaban_user'] ?? '-' }}
                                        </td>
                                        <td>{{ $row['jawaban_benar'] ?? '-' }}</td>
                                        <td>{{ $row['poin'] ?: '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning mt-4">
                    Tidak ada jawaban yang dapat ditampilkan.
                </div>
            @endforelse
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">📊 Grafik Rekap Semua Modul</h5>
                </div>
                <div class="card-body">
                    <canvas id="chart_global" height="140"></canvas>
                </div>
            </div>


        </div>
    </div>

    <!-- 🧠 Script Filter + Export -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const rekapList = document.querySelectorAll('.rekap');
            const labels = [];
            const dataTotal = [];
            const dataDijawab = [];
            const dataBenar = [];
            const dataSalah = [];

            let index = 1;

            rekapList.forEach(r => {
                labels.push("Modul " + index++);

                dataTotal.push(parseInt(r.querySelector('.total-soal')?.textContent || 0));
                dataDijawab.push(parseInt(r.querySelector('.dijawab')?.textContent || 0));
                dataBenar.push(parseInt(r.querySelector('.benar')?.textContent || 0));
                dataSalah.push(parseInt(r.querySelector('.salah')?.textContent || 0));
            });

            // 🎨 GRAFIK GLOBAL
            const ctx = document.getElementById('chart_global').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Total Soal',
                            data: dataTotal,
                            backgroundColor: 'rgba(0, 0, 0, 0.5)',
                        },
                        {
                            label: 'Dijawab',
                            data: dataDijawab,
                            backgroundColor: 'rgba(0, 123, 255, 0.6)',
                        },
                        {
                            label: 'Benar',
                            data: dataBenar,
                            backgroundColor: 'rgba(40, 167, 69, 0.6)',
                        },
                        {
                            label: 'Salah',
                            data: dataSalah,
                            backgroundColor: 'rgba(220, 53, 69, 0.6)',
                        },
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        });
    </script>

@endsection
