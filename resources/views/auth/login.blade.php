<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BK Sebelas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #CDE8E5 0%, #EEF7FF 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 12px 40px rgba(77, 134, 156, 0.18);
            border: 1px solid rgba(122, 178, 178, 0.25);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-circle {
            width: 75px;
            height: 75px;
            background: linear-gradient(135deg, #4D869C, #7AB2B2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 34px;
            margin: 0 auto 20px;
            box-shadow: 0 8px 20px rgba(77, 134, 156, 0.25);
        }

        h3 {
            text-align: center;
            font-weight: 700;
            font-size: 26px;
            color: #4D869C;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #7AB2B2;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-control {
            height: 48px;
            border-radius: 12px;
            border: 1px solid #CDE8E5;
        }

        .form-control:focus {
            border-color: #7AB2B2;
            box-shadow: 0 0 0 3px rgba(122,178,178,0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #4D869C 0%, #7AB2B2 100%);
            color: #fff;
            font-weight: 600;
            border-radius: 12px;
            border: none;
            width: 100%;
            height: 48px;
            margin-top: 10px;
            box-shadow: 0 6px 20px rgba(77, 134, 156, 0.25);
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(77, 134, 156, 0.35);
        }

        .footer-text {
            margin-top: 25px;
            text-align: center;
            font-size: 12px;
            color: #7AB2B2;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo-circle">
        <i class="bi bi-mortarboard-fill"></i>
    </div>

    <h3>Login Sistem BK</h3>
    <p class="subtitle">Masuk menggunakan akun Anda</p>

    @if(session('error'))
    <div class="alert alert-danger py-2">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label text-muted">Username</label>
            <input 
                type="text"
                class="form-control"
                name="username"
                required
                placeholder="Masukkan username Anda">
        </div>

        <div class="mb-3">
            <label class="form-label text-muted">Password</label>
            <input 
                type="password"
                class="form-control"
                name="password"
                required
                placeholder="Masukkan password">
        </div>

        <button class="btn-login">
            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
        </button>

    </form>

    <p class="footer-text">BK SMKN 11 Bandung — {{ date('Y') }}</p>

</div>

</body>
</html>
