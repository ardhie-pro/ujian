<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>CIBN | Citta Bhakti Nirbaya</title>
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
        <div class="card mb-5">
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
                    <h4 class="text-muted font-size-18 text-center">Masukan Pin Anda</h4>
                    <p class="text-muted text-center">Pastikan Cek Kembali Pin Dan Pastikan Benar.</p>
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('kode.check') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="username">Kode</label>
                            <input type="text" name="kode" class="form-control" id="username"
                                placeholder="Masukan Kode" />
                        </div>

                        <div class="mb-3 row">
                            <div class="col-6">
                                <div class="col-6 text-end">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                        Masuk
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-page">
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
  
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

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
