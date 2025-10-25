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
                                    height="40" />
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assetts/images/logo-dark.png') }}" alt="" height="40" />
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



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    <script>
        const modul =
        @json($ambilmodul); // dari controller (string modul atau array tergantung implementasi kamu)
        const kodeLogin = "{{ $kode }}";
        const kunci = @json($kunci); // format: { "1": "A", "2": "B", ... }

        // Jika ambilmodul adalah array nama breadcrumb, biarkan seperti ini.
        // Kalau modul seharusnya string, pastikan value yang dikirim dari controller sesuai.
        // alert(modul); // hapus atau aktifkan untuk debug

        let no = 1;
        const totalSoal = Object.keys(kunci).length || 0;

        // Inisialisasi breadcrumb jika ada ambilModul (opsional; kalau tidak ingin tampil, comment saja)
        (function renderBreadcrumb() {
            try {
                const breadcrumb = document.getElementById("breadcrumb-modul");
                if (!breadcrumb || !Array.isArray(modul)) return;
                breadcrumb.innerHTML = "";
                modul.forEach((m, idx) => {
                    const li = document.createElement("li");
                    li.classList.add("breadcrumb-item");
                    if (idx === modul.length - 1) {
                        li.classList.add("active");
                        li.textContent = m;
                    } else {
                        const a = document.createElement("a");
                        a.href = "javascript:void(0);";
                        a.textContent = m;
                        li.appendChild(a);
                    }
                    breadcrumb.appendChild(li);
                });
            } catch (e) {
                /* ignore if breadcrumb not present */ }
        })();

        // Load soal pertama
        loadSoal(no);

        function loadSoal(nomor) {
            // update nomor global
            no = nomor;

            fetch(`/get-soal/${modul}/${no}`)
                .then(res => {
                    if (!res.ok) {
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

                    // Render HTML soal (utuh, rapi)
                    document.getElementById("area-soal").innerHTML = `
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="card-title mb-0">Soal Nomor ${s.no}</h2>
    <span class="badge bg-primary fs-6">${s.no}</span>
  </div>

  <p class="text-muted mb-4">Pilihlah jawaban yang paling tepat dari soal berikut ini.</p>

  <div class="question-content mt-5 text-center border-1">
    <div class="container"> 
      <div class="table-responsive">
        <h1 class="masuk-soal mt-5 p-2">
          <strong>${kelompok.judul}</strong>
        </h1>

        <table class="table table-bordered soaltabel">
          <tbody>
            <tr>
              ${[1,2,3,4,5].map(i => `
                    <td>
                      ${
                        !kelompok[`soal${i}_text`]
                          ? (kelompok[`soal${i}_img`] ? `<img src="/storage/${kelompok[`soal${i}_img`]}" class="soal-img">` : '')
                          : kelompok[`soal${i}_text`]
                      }
                    </td>
                  `).join('')}
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>A</th><th>B</th><th>C</th><th>D</th><th>E</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    ${
      s.soal2
        ? `<h1 class="fw-bold soal-2 text-primary"><span>${s.soal2}</span></h1>`
        : `
              <div class="container text-center my-3">
                <div class="d-inline-flex flex-wrap justify-content-center align-items-center border border-2 border-dark rounded p-3"
                     style="max-width: 100%; gap: 10px;">
                  ${[s.j1, s.j2, s.j3, s.j4]
                    .filter(src => src)
                    .map(src => `
                  <div style="border: 2px solid #000; border-radius: 6px; padding: 5px; margin-bottom: 20px;">
                    <img src="${src}" alt="Gambar Soal" style="height: 5rem; width: auto; object-fit: contain;" class="img-fluid" />
                  </div>
                `).join('')}
                </div>
              </div>
            `
    }

    <div class="container mb-5">
      <div class="row justify-content-center g-2">
        ${['A','B','C','D','E'].map(h => `
              <div class="col-2">
                <button id="btn-${h}" class="btn-jawab btn btn-outline-primary w-100" onclick="jawab('${h}')">
                  ${h}
                </button>
              </div>
            `).join('')}
      </div>
    </div>

    <div class="d-flex justify-content-between mt-4">
      <button class="btn btn-secondary" id="btn-prev" ${no === 1 ? 'disabled' : ''}>⬅ Sebelumnya</button>
      <button class="btn btn-primary" id="btn-next" ${no === totalSoal ? 'disabled' : ''}>Selanjutnya ➡</button>
    </div>
  </div>
                `;

                    // pasang event nav setelah render
                    document.getElementById('btn-prev').addEventListener('click', () => {
                        if (no > 1) loadSoal(no - 1);
                    });
                    document.getElementById('btn-next').addEventListener('click', () => {
                        if (no < totalSoal) loadSoal(no + 1);
                    });

                    // Setelah render soal, ambil jawaban user untuk soal ini dan tandai tombol
                    getJawabanUser(no);
                })
                .catch(err => {
                    // console.error(err);
                });
        }

        // Ambil semua jawaban user (endpoint yang kamu sediakan) lalu mark untuk nomor soal ini
        function getJawabanUser(noSoal) {
            fetch(`/get-jawaban/${modul}/${kodeLogin}`)
                .then(res => res.json())
                .then(data => {
                    // data = [{ no:1, jawaban: 'A' }, ...]
                    // disable & reset class tombol dulu
                    document.querySelectorAll('.btn-jawab').forEach(b => {
                        b.disabled = false;
                        b.classList.remove('btn-success', 'btn-danger');
                        // pastikan outline class ada (kembali ke default)
                        if (!b.classList.contains('btn-outline-primary')) b.classList.add(
                        'btn-outline-primary');
                    });

                    const item = (Array.isArray(data) ? data.find(d => +d.no === +noSoal) : null);
                    const kunciBenar = kunci[noSoal] || null;

                    if (item && item.jawaban) {
                        const userJawab = item.jawaban.toUpperCase();
                        // disable semua tombol
                        document.querySelectorAll('.btn-jawab').forEach(b => b.disabled = true);

                        // tombol user
                        const btnUser = document.getElementById(`btn-${userJawab}`);
                        // tombol kunci
                        const btnKunci = kunciBenar ? document.getElementById(`btn-${kunciBenar.toUpperCase()}`) : null;

                        if (userJawab === (kunciBenar || '').toUpperCase()) {
                            // jawaban benar: hijau pada tombol user
                            if (btnUser) {
                                btnUser.classList.remove('btn-outline-primary');
                                btnUser.classList.add('btn-success');
                            }
                        } else {
                            // jawaban salah: user -> merah, kunci -> hijau (jika ada)
                            if (btnUser) {
                                btnUser.classList.remove('btn-outline-primary');
                                btnUser.classList.add('btn-danger');
                            }
                            if (btnKunci) {
                                btnKunci.classList.remove('btn-outline-primary');
                                btnKunci.classList.add('btn-success');
                            }
                        }
                    } else {
                        // belum jawab: biarkan tombol aktif (user bisa jawab)
                        // namun jika kamu mau men-disable jawaban setelah waktu atau kondisi tertentu,
                        // tambahkan logika di sini.
                    }
                })
                .catch(err => {
                    // console.error('Gagal ambil jawaban user', err);
                });
        }

        // Simpan jawaban lalu tanda warna (tidak otomatis pindah soal)
        function jawab(huruf) {
            // untuk mencegah klik ganda, disable semua tombol sementara
            document.querySelectorAll('.btn-jawab').forEach(b => b.disabled = true);

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
                        jawaban: huruf
                    })
                })
                .then(res => res.json())
                .then(() => {
                    // setelah sukses simpan, panggil ulang getJawabanUser untuk menandai warna
                    getJawabanUser(no);
                })
                .catch(err => {
                    // kalau error, aktifkan tombol kembali dan log error
                    document.querySelectorAll('.btn-jawab').forEach(b => b.disabled = false);
                    // console.error(err);
                });
        }

        function showSelesai() {
            document.getElementById("area-soal").innerHTML = `
            <div class="text-center mt-5">
                <h3 class="text-success">🎉 Semua soal telah selesai!</h3>
                <p>Terima kasih telah mengerjakan latihan ini.</p>
            </div>
        `;
        }
    </script>



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
