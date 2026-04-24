<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sesi Berakhir - CIBN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background: url("{{ asset('assetts/images/wee.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Segoe UI", sans-serif;
            margin: 0;
            padding: 20px;
        }

        .error-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            color: #fff;
        }

        .error-icon {
            font-size: 64px;
            margin-bottom: 20px;
            display: block;
        }

        h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #fff;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
            color: rgba(255, 255, 255, 0.9);
        }

        .btn-login {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        .btn-login:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
            color: white;
        }

        .logo-small {
            width: 120px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="error-box">
        <img src="{{ asset('assetts/images/cibn.png') }}" alt="CIBN Logo" class="logo-small" />
        <span class="error-icon">⏳</span>
        <h1>Sesi Telah Berakhir</h1>
        <p>Maaf anda terlalu lama tidak terhubung dengan web, pastikan untuk login kembali.</p>

        <a href="{{ route('login') }}" class="btn-login">
            Login Kembali
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
