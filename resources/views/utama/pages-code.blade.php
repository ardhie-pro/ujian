<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - CIBN</title>
    <link rel="shortcut icon" href="{{ asset('assetts/images/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #fff;
            min-height: 100vh;
            height: 100%;
            position: relative;
            overflow: hidden;
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

        /* Login Card */
        .login-box {
            background: #fff;
            border: 2px solid #0b4b8b;
            border-radius: 8px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
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
            border-right: 2px solid #0b4b8b;
        }

        .login-left img {
            width: 160px;
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
        }

        .login-right h4 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-control {
            border-radius: 6px;
            font-size: 14px;
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

        .dropdown-toggle::after {
            display: none !important;
        }

        .dropdown-menu {
            font-size: 14px;
            border-radius: 8px;
        }

        @media (max-width: 1024px) {
            .bg-bottom {
                position: fixed;
                bottom: 0;
                right: 0;
                width: 400px;
                height: auto;
                margin-right: -165px;
                /* tetap sesuai permintaanmu */
                z-index: -1;
            }
        }

        @media (max-width: 768px) {
            .login-box {
                flex-direction: column;
                width: 90%;
            }

            .login-left {
                width: 100%;
                border-right: none;
            }

            .login-right {
                width: 100%;
            }

            .bg-top {
                margin-top: -145px;
                position: absolute;
                top: 0;
                left: 0;
                width: 200px;
                height: auto;
                z-index: -1;
            }

            body {
                height: 100%;
                min-height: 100vh;
                overflow-y: auto;
            }

            .bg-bottom {
                position: fixed;
                bottom: 0;
                right: 0;
                width: 400px;
                height: auto;
                margin-right: -165px;
                /* tetap sesuai permintaanmu */
                z-index: -1;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assetts/css/code.css') }}" />
</head>

<body>
    <div class="header-bar d-flex justify-content-between align-items-center flex-wrap">
        <div class="header-left">
            <img src="{{ asset('assetts/images/logo-dark.png') }}" alt="" />
        </div>

        <!-- Dropdown User -->
        <div class="dropdown mt-2 mt-md-0">
            <button class="btn d-flex align-items-center border-0 bg-transparent dropdown-toggle" type="button"
                id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-avatar me-2"></div>
                <div class="text-end selamat text-md-start">
                    <div class="fw-semibold">Selamat Datang,</div>
                    <small>{{ Auth::user()->name }}</small>
                </div>
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Background Images -->

    <img src="{{ asset('assetts/images/bawah.png') }}" alt="bg bottom" class="bg-bottom" />

    <!-- Login Box -->
    <div class="login-box">
        <div class="login-right">
            <h4 class="mb-5">Masukan Kode Pengerjaan</h4>
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('kode.check') }}" id="loginForm" method="POST">
                @csrf

                <div class="mb-3">
                    <input type="text" name="kode" class="form-control" placeholder="Kode" />
                </div>

                <button type="submit" class="btn btn-login">Mulai</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
