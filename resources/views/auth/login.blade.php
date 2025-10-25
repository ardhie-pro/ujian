<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assetts/images/favicon.ico') }}" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assetts/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assetts/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assetts/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="colored">
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Background -->
    <div class="account-pages"></div>
    <!-- Begin page -->
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="auth-logo">
                    <h3 class="text-center">
                        <a href="index.html" class="logo d-block my-4">
                            <img src="{{ asset('assetts/images/logo-sm-dark.png') }}" class="logo-dark mx-auto"
                                height="150" alt="logo-dark" />
                            <img src="{{ asset('assetts/images/logo-light.png') }}" class="logo-light mx-auto"
                                height="30" alt="logo-light" />
                        </a>
                    </h3>
                </div>

                <div class="p-3">
                    <h4 class="text-muted font-size-18 text-center">Login Admin</h4>
                    <p class="text-muted text-center">Selamat Datang Di Page Admin.</p>

                    {{-- Status login (misal "Password salah", "Login berhasil", dll) --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    {{-- Form login Laravel Breeze --}}
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email"
                                required autofocus />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Masukkan password" required />
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

                            <div class="col-6 text-end">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted small">
                                        Lupa password?
                                    </a>
                                @endif
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
        </div>

        <div class="text-center">
     
            <p class="text-muted">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                CIBN. Crafted with  by
                Citta Bhakti Nirbaya
            </p>
        </div>
    </div>





    <!-- JAVASCRIPT -->
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
