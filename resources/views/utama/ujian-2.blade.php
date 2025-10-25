<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        CIBN | Citta Bhakti Nirbaya
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assetts//images/favicon.ico') }}" />
    <style>
        .masuk-soal {
            font-size: 2rem;
            font-weight: bold;
            border: 2px solid black;
        }

        .soal-2 {
            font-size: 5rem;
            margin-bottom: 5rem;
        }

        @media (max-width: 768px) {
            .masuk-soal {
                font-size: 1rem;
                font-weight: bold;
            }

            .soal-2 {
                font-size: 2rem;
            }
        }


        .soaltabel {
            border: 2px solid black;
            table-layout: fixed;
            /* kolom rata */
            width: 100%;
            text-align: center;
        }

        .btn-jawab {
            background-color: white;
            color: black;
            font-size: 1.2rem;
            padding: 12px;
            border: 2px solid #000000;
            width: 100%;
        }

        .btn-jawab:hover {
            background-color: #28a745;
            /* hijau */
            color: white;
            border-color: #f5e400;
        }

        /* Hanya bagian tbody yang hurufnya besar */
        .soaltabel tbody td {
            font-size: 8rem;
            border: 2px solid black;
            width: 20%;
            vertical-align: middle;
        }

        /* Bagian footer (A,B,C,D,E) kecil normal */
        .soaltabel tfoot th {
            font-size: 1rem;
            border: 2px solid black;
            width: 20%;
            vertical-align: middle;
            background-color: #f8f9fa;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .soal-img {
            max-width: 100%;
            height: 8rem;
            object-fit: contain;
            border-radius: 8px;
        }

        /* Responsif di HP */
        @media (max-width: 768px) {
            .soaltabel tbody td {
                font-size: 3rem;
            }

            .soaltabel tfoot th {
                font-size: 0.9rem;
            }

            .soal-img {
                height: 4rem;
            }

        }

        .soal-2 span {
            display: inline-block;
            border: 3px solid black;
            letter-spacing: 40px;
            padding-left: 40px;
        }

        /* nomor soal */
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
                                    height="22" />
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assetts/images/logo-dark.png') }}" alt="" height="24" />
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assetts/images/logo-sm-light.png') }}" alt=""
                                    height="22" />
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assetts/images/logo-light.png') }}" alt="" height="24" />
                            </span>
                        </a>
                    </div>

                    <!-- Menu Icon -->

                    <button type="button" class="btn px-3 font-size-24 header-item waves-effect d-block d-lg-none"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </div>
                <button id="timerButton" width="200" class="btn btn-danger btn-header">
                    Waktu: <span id="liveTimer">00:00:00</span>
                </button>

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


                </div>
            </div>
        </header>
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
                                    <div class="card-body p-4" id="area-soal">
                                        <div class="text-center text-muted">Memuat soal...</div>
                                    </div>
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
                            <span class="d-none d-sm-inline-block">- Crafted with  by
                                Citta Bhakti Nirbaya.</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    <script>
        const ambilModul = @json($ambilmodul); // dari controller

        const breadcrumb = document.getElementById("breadcrumb-modul");
        breadcrumb.innerHTML = ""; // pastikan kosong dulu

        ambilModul.forEach((modul, index) => {
            const li = document.createElement("li");
            li.classList.add("breadcrumb-item");

            if (index === ambilModul.length - 1) {
                // modul terakhir (aktif)
                li.classList.add("active");
                li.textContent = modul;
            } else {
                // modul sebelumnya (bisa klik, tapi sekarang dummy link)
                const a = document.createElement("a");
                a.href = "javascript:void(0);";
                a.textContent = modul;
                li.appendChild(a);
            }

            breadcrumb.appendChild(li);
        });
        const kodeLogin = "{{ session('kode_login') }}";
        let modul = {!! json_encode($modul ?? 'default') !!};
        let no = 1;

        // ambil soal pertama
        loadSoal(no);

        function loadSoal(no) {
            fetch(`/get-soal/${modul}/${no}`)
                .then(res => {
                    if (!res.ok) {
                        // kalau server nggak ada soal lagi (404 / kosong)
                        showSelesai();
                        throw new Error("Selesai");
                    }
                    return res.json();
                })
                .then(data => {
                    if (!data || data.done) {
                        showSelesai();
                        return;
                    }

                    const kelompok = data.kelompok;
                    const s = data.soal;
                    document.getElementById("area-soal").innerHTML = `
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2 class="card-title mb-0">Soal Nomor ${s.no}</h2>
          <span class="badge bg-primary fs-6">${s.no}</span>
        </div>

        <p class="text-muted mb-4">Pilihlah jawaban yang paling tepat dari soal berikut ini.</p>

        <div class="question-content mt-5 text-center border-1">
          
          <div class="container"> 
            <div class="table-responsive">
              <h1 class="masuk-soal mt-5 p-2"><strong>${kelompok.judul}</strong></h1>
              <table class="table table-bordered soaltabel">
                <tbody>
                  <tr>
                    <tr>
                      <td>
                          ${
                              !kelompok.soal1_text
                              ? (kelompok.soal1_img ? `<img src="/storage/${kelompok.soal1_img}" class="soal-img">` : '')
                              : kelompok.soal1_text
                          }
                      </td>
                      <td>
                          ${
                              !kelompok.soal2_text
                              ? (kelompok.soal2_img ? `<img src="/storage/${kelompok.soal2_img}" class="soal-img">` : '')
                              : kelompok.soal2_text
                          }
                      </td>
                      <td>
                          ${
                              !kelompok.soal3_text
                              ? (kelompok.soal3_img ? `<img src="/storage/${kelompok.soal3_img}" class="soal-img">` : '')
                              : kelompok.soal3_text
                          }
                      </td>
                      <td>
                          ${
                              !kelompok.soal4_text
                              ? (kelompok.soal4_img ? `<img src="/storage/${kelompok.soal4_img}" class="soal-img">` : '')
                              : kelompok.soal4_text
                          }
                      </td>
                      <td>
                          ${
                              !kelompok.soal5_text
                              ? (kelompok.soal5_img ? `<img src="/storage/${kelompok.soal5_img}" class="soal-img">` : '')
                              : kelompok.soal5_text
                          }
                      </td>
                  </tr>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            </div>
       ${s.soal2
  ? `<h1 class="fw-bold soal-2 text-primary"><span>${s.soal2}</span></h1>`
  : `
                                                                                                                                                                                                                                        <div class="container text-center my-3">
                                                                                                                                                                                                                                          <div class="d-inline-flex flex-wrap justify-content-center align-items-center border border-2 border-dark rounded p-3" 
                                                                                                                                                                                                                                               style="max-width: 100%; gap: 10px;">
                                                                                                                                                                                                                                            ${[s.j1, s.j2, s.j3, s.j4]
                                                                                                                                                                                                                                              .filter(src => src)
                                                                                                                                                                                                                                              .map(src => `
            <div style="border: 2px solid #000; border-radius: 6px; padding: 5px; margin-bootom: 20px;">
              <img 
                src="${src}" 
                alt="Gambar Soal" 
                style="height: 5rem; width: auto; object-fit: contain;" 
                class="img-fluid"
              />
            </div>
          `).join('')}
                                                                                                                                                                                                                                          </div>
                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                      `
}

          <div class="container mb-5">
            <div class="row justify-content-center g-2">
              ${['A', 'B', 'C', 'D', 'E'].map((huruf) => `
                                                                                                                                                                                                                                                    <div class="col-2">
                                                                                                                                                                                                                                                      <button 
                                                                                                                                                                                                                                                        class="btn-jawab"
                                                                                                                                                                                                                                                        onclick="jawab('${huruf}')">
                                                                                                                                                                                                                                                        ${huruf}
                                                                                                                                                                                                                                                      </button>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                  `).join('')}
            </div>
          </div>
        </div>
      `;
                })
                .catch(() => {}); // biar nggak error di console
        }

        function jawab(j) {
            fetch('/simpan-jawaban', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        modul: modul,
                        kodeLogin: kodeLogin,
                        no: no,
                        jawaban: j
                    })
                })
                .then(res => res.json())
                .then(() => {
                    no++;
                    loadSoal(no);
                }); // jaga-jaga kalau terakhir
        }
    </script>
    @php
        use App\Models\Kode;
        use Carbon\Carbon;

        $kodeLogin = session('kode_login');
        $kodeData = Kode::where('kode', $kodeLogin)->first();

        // waktu selesai dari database (format waktu Jakarta)
        $waktuSelesai = $kodeData ? Carbon::parse($kodeData->waktu, 'Asia/Jakarta')->format('Y-m-d H:i:s') : null;
    @endphp
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const display = document.getElementById("liveTimer");
            if (!display) return;

            // 🕒 Ambil waktu selesai dari session (format: Y-m-d H:i:s)
            const waktuSelesaiString = "{{ $waktuSelesai }}";
            const kodeLogin = "{{ session('kode_login') }}";
            const modul = "{{ $modul }}";

            // ⏰ Parse waktu selesai (anggap format lokal Asia/Jakarta)
            const waktuSelesai = new Date(waktuSelesaiString.replace(" ", "T") + "+07:00");

            const timerInterval = setInterval(updateTimer, 1000);
            updateTimer();

            function updateTimer() {
                const now = new Date();
                const remaining = waktuSelesai - now;

                if (remaining <= 0) {
                    clearInterval(timerInterval);
                    tampilkanWaktuHabis();
                    return;
                }

                const totalSeconds = Math.floor(remaining / 1000);
                const hours = Math.floor(totalSeconds / 3600);
                const minutes = Math.floor((totalSeconds % 3600) / 60);
                const seconds = totalSeconds % 60;

                display.textContent =
                    `${hours.toString().padStart(2,"0")}:${minutes.toString().padStart(2,"0")}:${seconds.toString().padStart(2,"0")}`;
            }

            function tampilkanWaktuHabis() {
                // 🔒 cegah tombol back
                history.pushState(null, null, document.URL);
                window.onpopstate = () => history.pushState(null, null, document.URL);

                // 🌕 overlay full-screen putih
                const overlay = document.createElement("div");
                overlay.style = `
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    `;

                overlay.innerHTML = `
        <style>
            .spinner {
                position: relative;
                width: 120px;
                height: 120px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .spinner::before {
                content: "";
                position: absolute;
                width: 100px;
                height: 100px;
                border: 5px solid #ddd;
                border-top-color: #3498db;
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }
            @keyframes spin {
                to { transform: rotate(360deg); }
            }
        </style>

        <form id="autoNextForm" action="/next-modul" method="POST">
            @csrf
            <input type="hidden" name="kodeLogin" value="${kodeLogin}">
            <input type="hidden" name="modul" value="${modul}">
            <div class="spinner">
                <img src="{{ asset('assetts/images/logo-sm-dark.png') }}" 
                     alt="logo" 
                     style="width: 60px; height: auto; z-index: 2;">
            </div>
        </form>
    `;
                document.body.appendChild(overlay);

                // ⏳ auto-submit setelah 1 detik
                setTimeout(() => {
                    document.getElementById("autoNextForm").submit();
                }, 1000);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // 🔹 Fungsi Logout Otomatis
            function autoLogout() {
                fetch("/logouttest", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                }).then(() => {
                    alert(
                        "Anda terdeteksi melakukan tindakan yang tidak diizinkan. Anda akan logout otomatis."
                    );
                    window.location.href = "/";
                }).catch(() => {
                    window.location.href = "/";
                });
            }

            // 🔹 Cegah klik kanan
            document.addEventListener("contextmenu", e => {
                e.preventDefault();
                alert("Klik kanan dinonaktifkan!");
                autoLogout();
            });

            // 🔹 Cegah shortcut berbahaya
            document.addEventListener("keydown", e => {
                // Kombinasi kunci yang dilarang
                const forbidden = [
                    (e.ctrlKey && e.key === "u"), // View source
                    (e.ctrlKey && e.shiftKey && e.key === "i"), // DevTools
                    (e.key === "F12"), // DevTools
                    (e.ctrlKey && e.key === "c"), // Copy
                    (e.ctrlKey && e.key === "p"), // Print
                    (e.key === "PrintScreen") // Screenshot
                ];
                if (forbidden.some(f => f)) {
                    e.preventDefault();
                    alert("Tindakan ini tidak diizinkan!");
                    try {
                        navigator.clipboard.writeText(""); // Kosongkan clipboard
                    } catch {}
                    autoLogout();
                }
            });

            // 🔹 Jika user berpindah tab atau keluar dari jendela
            window.addEventListener("blur", () => {
                setTimeout(() => {
                    if (!document.hasFocus()) {
                        autoLogout();
                    }
                }, 500);
            });

            // 🔹 Jika mouse keluar dari tab
            document.addEventListener("mouseleave", () => {
                autoLogout();
            });

        });
    </script>


    <style>
        #timerButton {
            font-weight: 600;
            letter-spacing: 0.5px;
        }
    </style>
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
