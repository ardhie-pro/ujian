<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - CIBN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background: url("{{ asset('assetts/images/wee.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            /* biar full 1 layar */
            min-height: 100vh;
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
            width: 55%;
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
    </style>
</head>

<body>
    <!-- Background Images -->
    {{-- <img src="{{ asset('assetts/images/atas.png') }}" alt="bg top" class="bg-top" />
    <img src="{{ asset('assetts/images/bawah.png') }}" alt="bg bottom" class="bg-bottom" /> --}}

    <!-- Login Box -->
    <div class="login-box">
        <div class="login-left">
            <img src="{{ asset('assetts/images/cibn.png') }}" alt="CIBN Logo" />
        </div>
        <div class="login-right">
            <h4>Selamat Datang</h4>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" placeholder="Masukkan email" required autofocus />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Masukkan password" required />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Remember Me & Forgot Password --}}
                <div class="row mb-3 align-items-center">
                    <div class="col-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember" />
                            <label class="form-check-label" for="remember_me">
                                Ingat saya
                            </label>
                        </div>
                    </div>


                </div>

                {{-- Tombol Login --}}
                <div class="text-end">
                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
