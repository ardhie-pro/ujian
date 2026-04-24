<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Register - CIBN</title>
    <link rel="shortcut icon" href="{{ asset('assetts/images/favicon.ico') }}" />
    <style>
        /* RESET & BASE STABILITY */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, sans-serif;
        }

        html, body {
            width: 100%;
            min-height: 100vh;
        }

        body {
            /* Background Gradient: 256BCF & 0E2542 */
            background: linear-gradient(135deg, #256BCF 0%, #0E2542 100%);
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow-x: hidden;
            overflow-y: auto; /* Smart scroll enabled */
            position: relative;
        }

        /* --- BACKGROUND REFLECTION (STAYS BEHIND) --- */
        .bg-reflection-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1;
            pointer-events: none;
            overflow: hidden;
        }

        .reflection-line {
            position: absolute;
            width: 150%;
            height: 3px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transform: rotate(-35deg);
            animation: moveShine 12s linear infinite;
        }

        .line-1 { top: 15%; left: -30%; }
        .line-2 { top: 65%; left: -40%; animation-delay: 6s; opacity: 0.5; }

        @keyframes moveShine {
            0% { transform: translateX(-40%) rotate(-35deg); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateX(40%) rotate(-35deg); opacity: 0; }
        }

        /* --- CRYSTAL CLEAR SEAMLESS GLASS LOGIN BOX --- */
        .container {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 850px;
            
            /* IMPROVED CLEAR GLASS EFFECT */
            background: rgba(255, 255, 255, 0.03); /* Extremely low white opacity */
            backdrop-filter: blur(10px); /* Lighter blur for clarity */
            -webkit-backdrop-filter: blur(10px); /* Lighter blur for iOS */
            
            /* Clean polished glass border highlight */
            border: 1px solid rgba(255, 255, 255, 0.2); 
            border-radius: 40px;
            
            /* Soft shadow for depth, inset shadow for glass edge */
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.3),
                        inset 0 0 10px rgba(255, 255, 255, 0.05);
            
            overflow: hidden;
            position: relative;
            z-index: 10;
            margin: auto;
        }

        /* BRANDING (LEFT) */
        .brand-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px 40px;
            text-align: center;
        }

        .logo-img {
            display: block;
            width: 150px; /* Ukuran diperbesar sesuai permintaan */
            height: auto; /* Menjaga proporsi asli logo */
            margin-bottom: 25px;
            
            /* EFEK CAHAYA MENGIKUTI BENTUK LOGO (Drop Shadow) */
            /* Warna kuning #F4C542 dengan blur 20px */
            filter: drop-shadow(0 0 15px rgba(244, 197, 66, 0.6)) 
                    drop-shadow(0 5px 5px rgba(0, 0, 0, 0.3));
            
            /* Animasi halus agar logo tampak bernafas */
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .logo-img:hover {
            transform: scale(1.05); /* Sedikit membesar saat disentuh */
            filter: drop-shadow(0 0 25px rgba(244, 197, 66, 0.8));
        }

        .brand-section h1 {
            color: #ffffff;
            font-size: 1.8rem;
            letter-spacing: 5px;
            font-weight: 800;
        }

        /* FORM LOGIN (RIGHT) */
        .login-section {
            flex: 1.3;
            padding: 40px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            color: #ffffff;
            margin-bottom: 25px;
            font-size: 1.7rem;
            text-align: center;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .input-group {
            margin-bottom: 15px; /* Adjusted for register form height */
            position: relative;
        }

        .input-group label {
            display: block;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* CLEARER INPUT BOXES */
        .input-group input {
            width: 100%;
            padding: 12px 50px 12px 20px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.15); /* Thinner border */
            background: rgba(255, 255, 255, 0.03); /* Almost fully transparent */
            outline: none;
            color: #ffffff;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, 0.08); /* Minimal focus tint */
            border-color: #F4C542;
            box-shadow: 0 0 15px rgba(244, 197, 66, 0.1);
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        /* PROFESSIONAL EYE ICON (SVG) */
        .eye-toggle {
            position: absolute;
            right: 18px;
            top: 40px; /* Adjusted for label height */
            cursor: pointer;
            color: rgba(255, 255, 255, 0.5);
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .eye-toggle:hover { color: #F4C542; }

        .eye-toggle svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 2; }

        /* CENTERED YELLOW BUTTON */
        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .btn-login {
            background: #F4C542; /* Your Yellow Accent */
            color: #0E2542; /* Your Navy Blue Teks */
            border: none;
            padding: 15px 80px;
            border-radius: 15px;
            font-weight: 800;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            box-shadow: 0 10px 25px rgba(244, 197, 66, 0.3);
            width: 100%;
        }

        .btn-login:hover {
            background: #eab33a;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(244, 197, 66, 0.4);
        }

        .btn-google {
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 12px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-google:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 20px 0;
        }

        .divider hr {
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .divider span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 0 15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            /* To blend with the gradient background at this specific area */
            background: transparent; 
            text-shadow: 0 0 10px #0E2542;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .footer a { color: #F4C542; text-decoration: none; font-weight: bold; transition: color 0.3s; }
        .footer a:hover { color: #ffffff; }

        .text-danger {
            color: #ff6b6b;
            font-size: 0.8rem;
            margin-top: 5px;
            display: block;
        }

        .is-invalid {
            border-color: #ff6b6b !important;
        }

        /* RESPONSIVE MOBILE & LANDSCAPE */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                max-width: 100%;
                border-radius: 30px;
            }
            .brand-section { padding: 40px 20px 10px 20px; }
            .login-section { padding: 25px 30px 50px 30px; }
        }

        /* Stability for landscape/short screens */
        @media (max-height: 580px) {
            body { align-items: flex-start; padding: 40px 20px; }
            .container { margin-top: 0; }
        }
    </style>
</head>
<body>

    <div class="bg-reflection-wrapper">
        <div class="reflection-line line-1"></div>
        <div class="reflection-line line-2"></div>
    </div>

    <div class="container">
        <div class="brand-section">
            <img src="{{ asset('assetts/images/cibn.png') }}" alt="CIBN Logo" class="logo-img">
        </div>

        <div class="login-section">
            <h2>SIGN UP</h2>
            
            @if ($errors->any())
                <div style="background: rgba(255,107,107,0.1); border: 1px solid #ff6b6b; border-radius: 10px; padding: 10px; margin-bottom: 15px; color: #ff6b6b; font-size: 0.85rem;">
                    <ul style="margin-bottom: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="input-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" required autofocus>
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="user@domain.com" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" required>
                </div>
                
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" required>
                    <div class="eye-toggle" id="togglePassword">
                        <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                </div>

                <div class="input-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required>
                </div>
                
                <div class="btn-container">
                    <button type="submit" class="btn-login">Daftar Sekarang</button>
                </div>
            </form>

            <div class="divider">
                <hr>
                <span>atau</span>
            </div>

            <div class="btn-container" style="margin-top: 0;">
                <a href="{{ route('google.login') }}" class="btn-google">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="20" class="me-2" style="margin-right: 10px;" alt="Google">
                    Daftar dengan Google
                </a>
            </div>

            <div class="footer">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Toggle input type
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Highlight yellow when active
            this.style.color = type === 'text' ? '#F4C542' : 'rgba(255, 255, 255, 0.5)';
        });
    </script>
</body>
</html>
