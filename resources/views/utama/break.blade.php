<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kode - CIBN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background: url("{{ asset('assetts/images/weepo.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            /* biar full 1 layar */
            min-height: 100vh;
            position: relative;
            font-family: "Segoe UI", sans-serif;
        }

        /* Background Images */
        .bg-top {
            margin-top: -130px;
            position: absolute;
            top: 0;
            left: 0;
            width: 400px;
            height: auto;
            z-index: 0;
        }

        .bg-bottom {
            margin-right: -330px;
            position: absolute;
            bottom: 0;
            right: 0;
            width: 800px;
            height: auto;
            z-index: 0;
        }

        /* Login Card - GLASS EFFECT */
        .login-box {
            background: rgba(255, 255, 255, 0.094);
            /* kaca */
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            border: 1px solid rgba(11, 75, 139, 0.196);
            /* biru transparan */
            border-radius: 15px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.20);
            max-width: 700px;
            margin: 120px auto;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .login-left {
            width: 45%;
            text-align: center;
            padding: 20px;
            border-right: 5px solid rgba(0, 59, 118, 0.4);
            /* transparan agar cocok dengan efek kaca */
        }

        .login-left img {
            width: 170px;
            margin-bottom: 10px;
        }

        .login-left h5 {
            font-size: 14px;
            color: #555;
            margin-top: 10px;
        }

        .login-right {
            width: 100%;
            padding: 30px 40px;
            background: rgba(255, 255, 255, 0);
            /* sedikit transparan */
            border-radius: 0 15px 15px 0;
            /* mengikuti bentuk card */
        }

        .login-right h4 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }



        .form-control {
            background: rgba(255, 255, 255, 0);
            /* transparan */
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            border: 1px solid rgba(11, 75, 139, 0.242);
            border-radius: 8px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);

            color: #fff;
            /* biar tulisan tetap terlihat */
        }

        .btn-login {
            width: 100%;
            background-color: #007bff;
            color: white;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .forgot {
            display: block;
            text-align: right;
            font-size: 12px;
            color: #007bff;
            text-decoration: none;
            margin-top: 5px;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-box {
                flex-direction: column;
                width: 90%;
            }

            .login-left {
                width: 100%;
                border-right: none;
                border-bottom: 2px solid rgba(11, 75, 139, 0.4);
            }

            .login-right {
                width: 100%;
                border-radius: 0 0 15px 15px;
            }

            .bg-top {
                margin-top: -145px;
                left: 0;
                width: 200px;
            }

            .bg-bottom {
                margin-right: -165px;
                margin-bottom: -200px;
                width: 400px;
            }
        }

        .fab-container {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 9999;
        }

        /* FAB Button tetap di posisi */
        .fab-button {
            width: 55px;
            height: 55px;
            background: #0d6efd;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 26px;
            cursor: pointer;
            position: absolute;
            bottom: 0;
            right: 0;
            transition: 0.3s;
        }

        .fab-button:hover {
            transform: scale(1.1);
        }

        /* FAB Menu harus di posisi absolute di atas tombol */
        .fab-menu {
            position: absolute;
            bottom: 70px;
            /* muncul di atas tombol */
            right: 0;
            display: none;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.25);
        }

        /* Floating Action Button */
        .fab-container {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 9999;
        }

        .fab-button {
            width: 55px;
            height: 55px;
            background: #0d6efd;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 26px;
            cursor: pointer;
            transition: 0.3s;
        }

        .fab-button:hover {
            transform: scale(1.1);
        }

        .fab-menu {
            display: none;
            margin-bottom: 10px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.25);
        }

        .fab-menu a,
        .fab-menu button {
            display: block;
            width: 150px;
            padding: 8px 12px;
            margin-bottom: 6px;
            text-decoration: none;
            background: #0d6efd;
            color: white;
            font-size: 14px;
            border-radius: 6px;
            border: none;
            text-align: center;
            cursor: pointer;
        }

        .fab-menu a:hover,
        .fab-menu button:hover {
            background: #084298;
        }

        .form-control::placeholder {
            color: #f8f9fa !important;
            opacity: 1;
        }
    </style>
</head>

<body>


    <!-- <body data-layout="horizontal" data-topbar="colored"> -->


    <!-- Begin page -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- Bagian Break -->
        <div id="breakSection" class="login-box shadow col-12 text-light col-md-6 text-center p-4">
            <div class="card-body">
                <h3 class="mb-3">Waktu Istirahat Sebentar 😌</h3>
                <p class="lead">
                    Kamu telah menyelesaikan bagian sebelumnya.<br />
                    Silakan gunakan waktu ini untuk beristirahat sebelum lanjut ke soal
                    berikutnya.
                </p>

                <button id="timerButton" width="200" class="btn btn-danger btn-header">
                    Waktu: <span id="liveTimer">00:00:00</span>
                </button>
            </div>
        </div>

        <!-- Bagian Soal Selanjutnya -->

    </div>
    <div class="wrapper-page">
        <div class="text-center">
            <p class="text-light">
                Copyright ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                by CIBN. All Rights Reserved.
            </p>
        </div>
    </div>


    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
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
    <script src="{{ asset('assetts/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assetts/js/app.js') }}"></script>
</body>

</html>
