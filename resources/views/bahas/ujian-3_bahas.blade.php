<!DOCTYPE html>
<html lang="en">

<head>
    {{-- tidak kembali --}}
    <meta charset="utf-8" />
    <title>
        CIBN | Citta Bhakti Nirbaya
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assetts//images/favicon.ico') }}" />

    <!-- Plugins css -->
    <link href="{{ asset('assetts//libs/bootstrap-editable/css/bootstrap-editable.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assetts//css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assetts//css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assetts//css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="colored">
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assetts/images/logo-sm-dark.png') }}" alt=""
                                    height="42" />
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assetts/images/logo-dark.png') }}" alt="" height="44" />
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assetts/images/logo-sm-light.png') }}" alt=""
                                    height="42" />
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assetts/images/logo-light.png') }}" alt="" height="44" />
                            </span>
                        </a>
                    </div>

                    <!-- Menu Icon -->

                    <button type="button" class="btn px-3 font-size-24 header-item waves-effect d-block d-lg-none"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0"></div>
                            </form>
                        </div>
                    </div>

                    <!-- User -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('assetts/images/users/avatar-4.jpg') }}" alt="Header Avatar" />
                        </button>


                    </div>

                    <!-- Setting -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-cog bx-spin"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">


                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Nomor Soal</li>

                        <div class="container-fluid py-2">
                            <div class="row g-2" id="soal-buttons"></div>

                        </div>
                    </ul>

                    <style>
                        .btn-soal {
                            width: 45px;
                            height: 45px;
                            font-weight: 600;
                            font-size: 0.9rem;
                            border-radius: 8px;
                            transition: 0.2s;
                            padding: 0;
                        }

                        .btn-soal:hover {
                            transform: scale(1.08);
                        }

                        .btn-answered {
                            background-color: #00e673;
                            /* biru Bootstrap */
                            color: white;
                        }

                        .btn-unanswered {
                            background-color: #adb5bd;
                            /* abu-abu */
                            color: white;
                        }

                        /* rapikan layout */
                        #side-menu {
                            padding-bottom: 1rem;
                        }

                        .menu-title {
                            font-size: 1rem;
                            font-weight: 700;
                            color: #6c757d;
                            margin-bottom: 0.5rem;
                        }
                    </style>


                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h3 class="mb-0 font-size-18">
                                        <button id="timerButton" class="btn btn-danger btn-header">
                                            Waktu: <span id="liveTimer">00:00:00</span>
                                        </button>
                                    </h3>
                                    <ol class="breadcrumb" id="breadcrumb-modul"></ol>
                                </div>

                                <div class="state-information d-none d-sm-block">
                                    <div class="state-graph"></div>
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

                                    <div class="card-body p-4" id="soal-container">
                                        <div class="text-center text-muted">Memuat soal...</div>
                                    </div>


                                    <script>
                                        function nextQuestion() {
                                            const selected = document.querySelector(
                                                'input[name="jawaban1"]:checked'
                                            );
                                            if (!selected) {
                                                Swal.fire({
                                                    icon: "warning",
                                                    title: "Belum dijawab",
                                                    text: "Silakan pilih salah satu jawaban terlebih dahulu!",
                                                    confirmButtonColor: "#3085d6",
                                                });
                                                return;
                                            }

                                            Swal.fire({
                                                icon: "success",
                                                title: "Jawaban tersimpan!",
                                                text: "Kamu memilih: " + selected.value,
                                                confirmButtonColor: "#3085d6",
                                            });
                                        }
                                    </script>

                                    <!-- Tambahkan SweetAlert2 untuk pop-up yang halus -->
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                    <style>
                                        #vertical-menu-btn {
                                            display: none;
                                        }

                                        @media (max-width: 991px) {
                                            #vertical-menu-btn {
                                                display: inline-block;
                                            }
                                        }

                                        .card {
                                            border-radius: 16px;
                                            background: #ffffff;
                                        }

                                        .card-body {
                                            background-color: #fff;
                                        }

                                        .option-item {
                                            border-radius: 10px;
                                            cursor: pointer;
                                            font-size: 1.05rem;
                                            padding: 12px 15px;
                                            transition: all 0.2s ease-in-out;
                                        }

                                        .option-item:hover {
                                            background-color: #f1f3f5;
                                        }

                                        .option-item input[type="radio"]:checked+span {
                                            font-weight: 600;
                                        }

                                        input[type="radio"]:checked~label,
                                        .option-item input[type="radio"]:checked {
                                            accent-color: #0d6efd;
                                        }

                                        .badge {
                                            border-radius: 8px;
                                        }

                                        @media (max-width: 576px) {
                                            .card-body {
                                                padding: 1.25rem;
                                            }

                                            .fs-5 {
                                                font-size: 1rem !important;
                                            }
                                        }
                                    </style>

                                    <!-- End Cardbody -->
                                </div>
                                <!-- End Card -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Page-content-wrapper -->
                </div>
                <!-- Container-fluid -->
            </div>
            <!-- End Page-content-wrapper -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            © CIBN
                            <span class="d-none d-sm-inline-block">- Crafted with <i
                                    class="mdi mdi-heart text-primary"></i> by
                                Citta Bhakti Nirbaya.</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <!-- ini ujian -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const kunci = @json($kunci);
            const kodeLogin = "{{ $kode }}";
            let modul = "{{ $modul ?? 'default' }}";
            let index = 0;
            let soalList = [];
            let jawabanUser = {};


            // ✅ Fungsi utama: ambil soal + jawaban dari database
            function loadSoal(modul) {
                fetch(`/get-soal-multiple/${modul}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.length === 0) {
                            document.getElementById('soal-container').innerHTML =
                                "<p class='text-center text-danger'>Belum ada soal untuk modul ini.</p>";
                            return;
                        }

                        soalList = data;

                        // 🧠 Ambil jawaban user dari database
                        fetch(`/get-jawaban/${modul}/${kodeLogin}`)
                            .then(res => res.json())
                            .then(jawabDb => {
                                // Masukkan ke objek jawabanUser
                                jawabDb.forEach(item => {
                                    jawabanUser[item.no] = item.jawaban;
                                });

                                // cari nomor terakhir yang dijawab
                                if (jawabDb.length > 0) {
                                    const nomorTerakhir = Math.max(...jawabDb.map(j => j.no));
                                    const idxTerakhir = soalList.findIndex(s => s.no === nomorTerakhir);
                                    if (idxTerakhir !== -1) index = idxTerakhir;
                                }

                                renderSoal(index);
                                renderSidebar();
                            })
                            .catch(err => {
                                console.error("Gagal ambil jawaban user:", err);
                                renderSoal(index);
                                renderSidebar();
                            });
                    })
                    .catch(err => {
                        document.getElementById('soal-container').innerHTML =
                            "<p class='text-center text-danger'>Gagal memuat soal.</p>";
                        console.error(err);
                    });
            }

            // ✅ Simpan jawaban
            window.jawab = function(no, j) {
                jawabanUser[no] = j;

                // fetch('/simpan-jawaban', {
                //         method: 'POST',
                //         headers: {
                //             'Content-Type': 'application/json',
                //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
                //         },
                //         body: JSON.stringify({
                //             modul: modul,
                //             kodeLogin: kodeLogin,
                //             no: no,
                //             jawaban: j
                //         })
                //     })
                //     .then(res => res.json())
                //     .catch(err => console.error("Gagal simpan jawaban:", err));

                // renderSidebar();
            };

            // ✅ Render soal
            function renderSoal(i) {
                const soal = soalList[i];
                const total = soalList.length;
                const noSoal = soal.no;
                const jawabanBenar = kunci[noSoal]; // ambil kunci jawaban

                let jawaban = [{
                        abjad: 'A',
                        text: soal.j1
                    },
                    {
                        abjad: 'B',
                        text: soal.j2
                    },
                    {
                        abjad: 'C',
                        text: soal.j3
                    },
                    {
                        abjad: 'D',
                        text: soal.j4
                    },
                    {
                        abjad: 'E',
                        text: soal.j5
                    }
                ].filter(j => j.text);

                const acakJawaban = jawaban
                    .map(j => ({
                        ...j,
                        sort: Math.random()
                    }))
                    .sort((a, b) => a.sort - b.sort);

                soal.mapping = acakJawaban.map(j => j.abjad);

                let html = `
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title mb-0">Soal Nomor ${noSoal}</h4>
        <span class="badge bg-primary fs-6">${i + 1} / ${total}</span>
    </div>
    <p class="text-muted mb-4">Pilihlah jawaban yang paling tepat.</p>
    <div class="question-content">
        <p class="fs-5">${soal.soal}</p>
        <form id="form-soal-${i}" class="mt-4">
            <div class="list-group">
    `;

                acakJawaban.forEach((j, idx) => {
                    const tampilanAbjad = String.fromCharCode(65 + idx);
                    const checked = jawabanUser[noSoal] === j.abjad ? 'checked' : '';

                    const userAnswer = jawabanUser[noSoal];
                    let bgClass = "";

                    // 🔹 hijau selalu untuk jawaban benar
                    if (j.abjad === jawabanBenar) {
                        bgClass = "bg-success text-white";
                    }

                    // 🔹 merah kalau user pilih salah
                    if (userAnswer && userAnswer !== jawabanBenar && j.abjad === userAnswer) {
                        bgClass = "bg-danger text-white";
                    }

                    html += `
        <label class="list-group-item list-group-item-action option-item ${bgClass}">
            <input class="form-check-input me-2"
                   type="radio"
                   name="jawaban${noSoal}"
                   value="${j.abjad}"
                   ${checked}>
            ${tampilanAbjad}. ${j.text}
        </label>`;
                });

                // ✅ Pembahasan langsung tampil
                html += `
            </div>
            <div class="mt-3 border-left border-info ps-2">
                <strong>Pembahasan:</strong>
                <p>${soal.pembahasan || 'Pembahasan belum tersedia.'}</p>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-outline-secondary"
                        onclick="prevQuestion()" ${i === 0 ? 'disabled' : ''}>
                    ← Sebelumnya
                </button>
                <button type="button" class="btn btn-primary" onclick="nextQuestion()">
                    ${i === total - 1 ? 'Selesai' : 'Selanjutnya →'}
                </button>
            </div>
        </form>
    </div>`;

                document.getElementById('soal-container').innerHTML = html;
            }
            // ✅ Sidebar soal
            function renderSidebar() {
                const sidebar = document.getElementById("soal-buttons");
                if (!sidebar) return;
                sidebar.innerHTML = "";

                soalList.forEach((soal, idx) => {
                    const active = idx === index ? "btn-primary" : "";
                    const sudahJawab = jawabanUser[soal.no] ? "btn-answered" : "btn-unanswered";

                    sidebar.innerHTML += `
    <div class="col-3 d-flex justify-content-center mb-2">
        <button class="btn btn-soal ${sudahJawab} ${active}" onclick="goToQuestion(${idx})">${soal.no}</button>
    </div>`;
                });
            }

            // ✅ Navigasi
            window.nextQuestion = function() {
                if (index < soalList.length - 1) {
                    index++;
                    renderSoal(index);
                    renderSidebar();
                } else {
                    showSelesai();
                }
            };
            window.prevQuestion = function() {
                if (index > 0) {
                    index--;
                    renderSoal(index);
                    renderSidebar();
                }
            };

            window.goToQuestion = function(i) {
                index = i;
                renderSoal(index);
                renderSidebar();
            };

            // ✅ Akhiri modul
            function showSelesai() {
                document.getElementById('soal-container').innerHTML = `
        <div class="text-center p-5">
            <h3 class="text-success mb-3">🎉 Semua soal telah selesai!</h3>
            <p class="text-muted">Terima kasih sudah mengerjakan ujian ini.</p>
           
        </div>`;
            }

            // ✅ Panggil fungsi
            loadSoal(modul);
        });
    </script>








    <!-- akhir ujian -->
    <script src="{{ asset('assetts/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assetts/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assetts/libs/bootstrap-editable/js/index.js') }}"></script>

    <!--form-xeditable Init js-->
    <script src="{{ asset('assetts/js/pages/form-xeditable.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assetts/js/app.js') }}"></script>
</body>

</html>
