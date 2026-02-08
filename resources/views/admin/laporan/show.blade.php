@extends('layouts.main')

@section('title', 'Laporan Jawaban User')

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

        .btn-danger-sm:hover {
            background: #962d22 !important;
        }

        /* PRINT STYLES (PDF VIEW) */
        @media print {
            body {
                background:white !important;
                font-family: 'Times New Roman', serif; /* Standard font for reports */
            }
            /* Hide UI Elements: Header, Sidebar, Buttons, etc. */
            .btn, button, a.btn, .sidebar, .topbar, .navbar, header, nav, footer, .page-title-box, #btnExportExcel, #btnExportPDF, .mdi, select, .alert {
                display: none !important;
            }
            .wrapper {
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                border: none !important;
                box-shadow: none !important;
            }
            .page-content {
                margin: 0 !important;
                padding: 0 !important;
            }
            body {
                background: white !important;
                padding: 0 !important;
            }
            .card {
                border: none !important;
                box-shadow: none !important;
                page-break-inside: avoid; /* Prevent cutting charts in half */
            }
            .card-header {
                background: #f0f0f0 !important; /* Lighter header print */
                color: black !important;
                border-bottom: 2px solid #000 !important;
            }
            h1, h2, h3, h4, h5 {
                color: #000 !important;
                page-break-after: avoid;
            }
            canvas {
                max-width: 100% !important;
                page-break-inside: avoid;
            }
            /* Ensure charts and tables fit a4 */
            .col-md-4, .col-md-6, .col-12 {
                flex: none !important;
                width: 100% !important;
            }
        }
    </style>
    <div class="page-content">
        <div class="card">

            <!-- Judul Halaman -->
            <div class="row">
                <div class="col-12">

                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">
                            📊 Laporan Jawaban User — <span class="text-primary">Kode: {{ $kode }}</span>
                        </h4>
                    </div>
                    @if (Auth::check() && in_array(Auth::user()->status, ['admin', 'review']))
                        <div class="d-flex gap-2 mt-5">
                            <button id="btnExportExcel" class="btn btn-success">
                                <i class="mdi mdi-file-excel"></i> Export ke Excel
                            </button>
                            <button id="btnExportPDF" class="btn btn-danger">
                                <i class="mdi mdi-file-pdf"></i> Export ke PDF
                            </button>
                            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
                                <i class="mdi mdi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    @else
                        <div class="d-flex gap-2 mt-5">
                            <button id="btnExportPDF" class="btn btn-danger">
                                <i class="mdi mdi-file-pdf"></i> Simpan Sebagai PDF
                            </button>
                        </div>
                    @endif
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
        <!-- 📊 DISC GRAPHS SECTION -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">📊 Grafik DISC (Line 1 - 3)</h5>
            </div>
            <div class="card-body">
                <!-- 📋 TABEL DATA DISC (STYLED) -->
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped table-hover text-center align-middle shadow-sm" style="max-width: 600px; margin: 0 auto; border: 2px solid #343a40;">
                        <thead class="bg-dark text-white text-uppercase" style="letter-spacing: 1px;">
                            <tr>
                                <th class="py-3">Line</th>
                                <th class="py-3" style="background-color: #0d6efd;">D</th>
                                <th class="py-3" style="background-color: #198754;">I</th>
                                <th class="py-3" style="background-color: #ffc107; color: #000;">S</th>
                                <th class="py-3" style="background-color: #dc3545;">C</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-secondary">
                            <tr>
                                <th class="bg-dark text-white">1</th>
                                <td id="val_l1_0">-</td>
                                <td id="val_l1_1">-</td>
                                <td id="val_l1_2">-</td>
                                <td id="val_l1_3">-</td>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">2</th>
                                <td id="val_l2_0">-</td>
                                <td id="val_l2_1">-</td>
                                <td id="val_l2_2">-</td>
                                <td id="val_l2_3">-</td>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">3</th>
                                <td id="val_l3_0">-</td>
                                <td id="val_l3_1">-</td>
                                <td id="val_l3_2">-</td>
                                <td id="val_l3_3">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <!-- Line 1 -->
                    <div class="col-12 mb-5">
                        <h5 class="text-center fw-bold">Line 1</h5>
                        <div style="height: 400px;">
                            <canvas id="chart_line_1"></canvas>
                        </div>
                    </div>
                    <!-- Line 2 -->
                    <div class="col-12 mb-5">
                        <h5 class="text-center fw-bold">Line 2</h5>
                        <div style="height: 400px;">
                            <canvas id="chart_line_2"></canvas>
                        </div>
                    </div>
                    <!-- Line 3 -->
                    <div class="col-12">
                        <h5 class="text-center fw-bold">Line 3</h5>
                        <div style="height: 400px;">
                            <canvas id="chart_line_3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <!-- ⚡ GRAFIK ENERGRAM -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                 <h5 class="mb-0">⚡ Grafik Energram (Poin 1 - 9)</h5>
            </div>
            <div class="card-body">
                 <div style="height: 400px;">
                      <canvas id="chart_energram"></canvas>
                 </div>
            </div>
        </div>

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            /* ============================================================
               🔥  BAGIAN GRAFIK GLOBAL (AUTO AMBIL DATA DARI SETIAP .rekap)
            ============================================================ */
            const rekapList = document.querySelectorAll('.rekap');
            const labels = [];
            const dataTotal = [];
            const dataDijawab = [];
            const dataBenar = [];
            const dataSalah = [];
            
            let index = 1;

            rekapList.forEach((r, i) => {
                const card = r.closest('.laporan-modul');
                const namaModul = card.dataset.modul || `Modul-${i+1}`;
                labels.push(namaModul);

                dataTotal.push(parseInt(r.querySelector('.total-soal')?.textContent || 0));
                dataDijawab.push(parseInt(r.querySelector('.dijawab')?.textContent || 0));
                dataBenar.push(parseInt(r.querySelector('.benar')?.textContent || 0));
                dataSalah.push(parseInt(r.querySelector('.salah')?.textContent || 0));
            });

            if (rekapList.length > 0) {
                const ctx = document.getElementById('chart_global').getContext('2d');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                                label: 'Total Soal',
                                data: dataTotal,
                                backgroundColor: 'rgba(0,0,0,0.5)'
                            },
                            {
                                label: 'Dijawab',
                                data: dataDijawab,
                                backgroundColor: 'rgba(0,123,255,0.6)'
                            },
                            {
                                label: 'Benar',
                                data: dataBenar,
                                backgroundColor: 'rgba(40,167,69,0.6)'
                            },
                            {
                                label: 'Salah',
                                data: dataSalah,
                                backgroundColor: 'rgba(220,53,69,0.6)'
                            }
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
            }

            /* ============================================================
               🔍  FILTER MODUL
            ============================================================ */
            const filter = document.getElementById('filterModul');
            const btnExport = document.getElementById('btnExportExcel');

            if (filter) {
                filter.addEventListener('change', function() {
                    const selected = this.value.toLowerCase();
                    document.querySelectorAll('.laporan-modul').forEach(card => {
                        const modul = card.dataset.modul.toLowerCase();
                        card.style.display = selected === '' || modul === selected ? '' : 'none';
                    });
                });
            }

            /* ============================================================
               📤 EXPORT EXCEL (REKAP + TABEL)
            ============================================================ */
            btnExport.addEventListener('click', function() {
                const allCards = document.querySelectorAll('.laporan-modul');
                if (allCards.length === 0) {
                    alert('⚠️ Tidak ada data untuk diekspor!');
                    return;
                }

                const wb = XLSX.utils.book_new();

                allCards.forEach(card => {
                    const modul = card.dataset.modul || 'Tanpa Modul';
                    const rekapDiv = card.querySelector('.rekap');
                    const table = card.querySelector('table');

                    const rekapData = [];
                    if (rekapDiv) {
                        const total = rekapDiv.querySelector('.total-soal')?.textContent || '-';
                        const dijawab = rekapDiv.querySelector('.dijawab')?.textContent || '-';
                        const benar = rekapDiv.querySelector('.benar')?.textContent || '-';
                        const salah = rekapDiv.querySelector('.salah')?.textContent || '-';
                        rekapData.push(["📋 Rekapitulasi Hasil"]);
                        rekapData.push(["Total Soal", total]);
                        rekapData.push(["Dijawab", dijawab]);
                        rekapData.push(["Benar", benar]);
                        rekapData.push(["Salah", salah]);
                        rekapData.push([]);
                    }

                    const wsRekap = XLSX.utils.aoa_to_sheet(rekapData);
                    const wsTable = XLSX.utils.table_to_sheet(table);
                    XLSX.utils.sheet_add_json(wsRekap, XLSX.utils.sheet_to_json(wsTable, {
                        header: 1
                    }), {
                        origin: -1
                    });

                    XLSX.utils.book_append_sheet(wb, wsRekap, modul.substring(0, 31));
                });

                const tanggal = new Date().toISOString().slice(0, 10);
                const filename = `Laporan_Semua_Modul_{{ $kode }}_${tanggal}.xlsx`;

                XLSX.writeFile(wb, filename);
                alert('✅ Semua tabel + rekap berhasil diekspor ke Excel!');
            });

            /* ============================================================
               📤 EXPORT PDF (ALL CONTENT) -> VIA PRINT PREVIEW
            ============================================================ */
            const btnExportPDF = document.getElementById('btnExportPDF');
            btnExportPDF.addEventListener('click', function() {
                // Konfirmasi user
                if (!confirm('Halaman akan dibuka dalam mode cetak. Silakan pilih "Save to PDF" pada pilihan printer.')) return;
                
                window.print();
            });

            /* ============================================================
               📈 DISC GRAPHS IMPLEMENTATION
            ============================================================ */
            // ---------------- VARIABLES UNTUK INPUT DATA GRAFIK ----------------
            // Silakan ganti nilai array di bawah ini sesuai kebutuhan
            // Format: [D, I, S, C]
            
            const dataLine1 = @json($discData['line1']);
            const dataLine2 = @json($discData['line2']);
            const dataLine3 = @json($discData['line3']);

            // ---------------- KONFIGURASI CHART ----------------
            const labelsDISC = ['D', 'I', 'S', 'C'];

            // Register Plugin DataLabels
            Chart.register(ChartDataLabels);

            // Function helper untuk membuat chart
            function createDISCChart(canvasId, label, dataValues, color) {
                const ctx = document.getElementById(canvasId).getContext('2d');
                new Chart(ctx, {
                    type: 'line', 
                    data: {
                        labels: labelsDISC, // D I S C
                        datasets: [{
                            label: label,
                            data: dataValues,
                            borderColor: color,
                            backgroundColor: color,
                            borderWidth: 3,
                            tension: 0.4, 
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointBackgroundColor: '#fff',
                            pointBorderWidth: 2,
                            // Tampilkan label angka di titik
                            datalabels: {
                                align: 'top',
                                anchor: 'start',
                                font: {
                                    weight: 'bold',
                                    size: 14
                                },
                                color: color, // Warna teks sama dengan garis
                                offset: 8
                            }
                        }]
                    },
                    options: {
                        layout: {
                            padding: {
                                top: 30, // Ruang untuk label
                                bottom: 10,
                                left: 20,
                                right: 20
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false, // Agar bisa diatur tingginya via CSS/Div container
                        scales: {
                            y: {
                                beginAtZero: false, 
                                min: -10, // Range diperkecil agar tidak terlalu luas
                                max: 15,
                                ticks: {
                                    stepSize: 1, // Agar angka presisi per 1 satuan
                                    font: {
                                        weight: 'bold'
                                    }
                                },
                                grid: {
                                    color: (context) => {
                                        if (context.tick.value === 0) return '#000'; 
                                        return 'rgba(0,0,0,0.1)'; 
                                    },
                                    lineWidth: (context) => {
                                        if (context.tick.value === 0) return 2; 
                                        return 1;
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    display: false 
                                },
                                ticks: {
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    },
                                    color: '#000'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false 
                            },
                            // Konfigurasi Datalabels Global untuk chart ini
                            datalabels: {
                                display: true
                            }
                        }
                    }
                });
            }

            // Render 3 Grafik dengan warna yang lebih profesional
            createDISCChart('chart_line_1', 'Line 1', dataLine1, '#0d6efd'); // Blue Bootstrap
            createDISCChart('chart_line_2', 'Line 2', dataLine2, '#198754'); // Green Bootstrap
            createDISCChart('chart_line_3', 'Line 3', dataLine3, '#dc3545'); // Red Bootstrap

            // ---------------- POPULATE TABLE ----------------
            function populateTable(line, data) {
                 // data format [D, I, S, C]
                 document.getElementById(`val_l${line}_0`).textContent = data[0]; // D
                 document.getElementById(`val_l${line}_1`).textContent = data[1]; // I
                 document.getElementById(`val_l${line}_2`).textContent = data[2]; // S
                 document.getElementById(`val_l${line}_3`).textContent = data[3]; // C
            }

            populateTable(1, dataLine1);
            populateTable(2, dataLine2);
            populateTable(3, dataLine3);


            /* ============================================================
               ⚡ ENERGRAM GRAPH IMPLEMENTATION (Poin 1 - 9)
            ============================================================ */
            const totalPoinEnergram = @json($enneagramData);

            // 4. RENDER CHART ENERGRAM
            const ctxEnergram = document.getElementById('chart_energram').getContext('2d');
            new Chart(ctxEnergram, {
                type: 'bar',
                data: {
                    labels: ['Tipe 1', 'Tipe 2', 'Tipe 3', 'Tipe 4', 'Tipe 5', 'Tipe 6', 'Tipe 7', 'Tipe 8', 'Tipe 9'],
                    datasets: [{
                        label: 'Total Skor',
                        data: totalPoinEnergram,
                        backgroundColor: [
                            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', 
                            '#FF9F40', '#E7E9ED', '#71B37C', '#EC932F'
                        ],
                        borderColor: '#333',
                        borderWidth: 1,
                        datalabels: {
                            align: 'top',
                            anchor: 'end',
                            font: { weight: 'bold', size: 14 }
                        }
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0,0,0,0.1)' }
                        },
                        x: {
                            grid: { display: false }
                        }
                    },
                    plugins: {
                        legend: { display: false },
                        datalabels: { display: true }
                    }
                }
            });

        });
    </script>

@endsection
