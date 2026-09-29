{{-- <!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card p-4 shadow">
                    <h2 class="mb-4">ISP Admin Login</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('admin.login.submit') }}">@csrf<input name="email" type="email" class="form-control mb-3" placeholder="Email" value="admin@terabyte.test" required><input name="password" type="password" class="form-control mb-3" placeholder="Password" required><button class="btn btn-primary w-100">Login</button></form>
                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Terabyte ISP | Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 50% 40%, #103c4b 0%, #06151f 35%, #02080d 75%);
            color: #fff;
        }

        /* =========================
           NETWORK BACKGROUND
        ========================== */

        .network-bg {
            position: fixed;
            inset: 0;
            overflow: hidden;
            z-index: 0;
        }

        .network-bg span {
            position: absolute;
            width: 5px;
            height: 5px;
            background: #00eaff;
            border-radius: 50%;
            box-shadow: 0 0 12px #00eaff;
            animation: floatNode 8s infinite ease-in-out;
        }

        .network-bg span:nth-child(1) {
            left: 10%;
            top: 20%;
        }

        .network-bg span:nth-child(2) {
            left: 25%;
            top: 70%;
            animation-delay: 1s;
        }

        .network-bg span:nth-child(3) {
            left: 75%;
            top: 20%;
            animation-delay: 2s;
        }

        .network-bg span:nth-child(4) {
            left: 90%;
            top: 65%;
            animation-delay: 3s;
        }

        .network-bg span:nth-child(5) {
            left: 55%;
            top: 85%;
            animation-delay: 4s;
        }

        .network-bg span:nth-child(6) {
            left: 45%;
            top: 10%;
            animation-delay: 5s;
        }

        @keyframes floatNode {

            0%,
            100% {
                transform: translate(0, 0);
                opacity: .4;
            }

            50% {
                transform: translate(30px, -40px);
                opacity: 1;
            }
        }

        /* Network lines */

        .line {
            position: absolute;
            height: 1px;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(0, 234, 255, .5),
                    transparent);
            transform-origin: left center;
            animation: linePulse 4s infinite;
        }

        .line1 {
            width: 450px;
            left: 8%;
            top: 25%;
            transform: rotate(18deg);
        }

        .line2 {
            width: 500px;
            right: 5%;
            top: 35%;
            transform: rotate(-25deg);
        }

        .line3 {
            width: 600px;
            left: 15%;
            bottom: 20%;
            transform: rotate(-15deg);
        }

        @keyframes linePulse {

            0%,
            100% {
                opacity: .15;
            }

            50% {
                opacity: .7;
            }
        }

        /* =========================
           MAIN
        ========================== */

        .login-wrapper {
            position: relative;
            z-index: 5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-container {
            width: 950px;
            max-width: 100%;
            min-height: 570px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: rgba(5, 18, 28, .72);
            border: 1px solid rgba(0, 234, 255, .25);
            border-radius: 30px;
            backdrop-filter: blur(20px);
            box-shadow:
                0 30px 80px rgba(0, 0, 0, .55),
                0 0 60px rgba(0, 234, 255, .08);
            overflow: hidden;
        }

        /* =========================
           3D NETWORK SIGN
        ========================== */

        .network-side {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background:
                radial-gradient(circle at center,
                    rgba(0, 234, 255, .16),
                    transparent 60%);
            perspective: 1000px;
        }

        .network-logo {
            position: relative;
            width: 260px;
            height: 260px;
            transform-style: preserve-3d;
            animation: rotateNetwork 12s linear infinite;
        }

        @keyframes rotateNetwork {
            0% {
                transform: rotateY(0deg) rotateX(8deg);
            }

            50% {
                transform: rotateY(180deg) rotateX(-8deg);
            }

            100% {
                transform: rotateY(360deg) rotateX(8deg);
            }
        }

        .network-logo .ring {
            position: absolute;
            inset: 20px;
            border: 2px solid #00eaff;
            border-radius: 50%;
            box-shadow:
                0 0 15px #00eaff,
                inset 0 0 15px rgba(0, 234, 255, .5);
        }

        .network-logo .ring:nth-child(2) {
            transform: rotateX(70deg);
        }

        .network-logo .ring:nth-child(3) {
            transform: rotateY(70deg);
        }

        .network-logo .ring:nth-child(4) {
            transform: rotateX(35deg) rotateY(35deg);
        }

        .core {
            position: absolute;
            width: 90px;
            height: 75px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 22px;
            background: linear-gradient(145deg,
                    #00eaff,
                    #007c9c);
            box-shadow:
                0 0 20px #00eaff,
                0 0 60px rgba(0, 234, 255, .7);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: 900;
            color: #02131b;
        }

        .node {
            position: absolute;
            width: 16px;
            height: 16px;
            background: #fff;
            border-radius: 50%;
            box-shadow:
                0 0 10px #00eaff,
                0 0 25px #00eaff;
        }

        .node1 {
            top: 5px;
            left: 50%;
        }

        .node2 {
            bottom: 15px;
            left: 20px;
        }

        .node3 {
            bottom: 25px;
            right: 10px;
        }

        .node4 {
            top: 55px;
            left: 20px;
        }

        .node5 {
            top: 60px;
            right: 15px;
        }

        .network-title {
            margin-top: 20px;
            font-size: 27px;
            font-weight: 800;
            letter-spacing: 4px;
            text-shadow: 0 0 15px rgba(0, 234, 255, .8);
        }

        .network-subtitle {
            color: #8daab5;
            letter-spacing: 2px;
            font-size: 13px;
        }

        /* =========================
           LOGIN
        ========================== */

        .login-side {
            padding: 65px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #00eaff;
            font-size: 12px;
            letter-spacing: 3px;
            margin-bottom: 15px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #00ff95;
            box-shadow: 0 0 12px #00ff95;
        }

        .login-title {
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .login-description {
            color: #8ca2ad;
            margin-bottom: 35px;
        }

        .form-label {
            color: #b8d2dc;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .form-control {
            height: 53px;
            background: rgba(255, 255, 255, .045);
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 14px;
            color: #fff;
            padding: 0 17px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, .07);
            border-color: #00eaff;
            box-shadow: 0 0 0 3px rgba(0, 234, 255, .08);
            color: #fff;
        }

        .form-control::placeholder {
            color: #617984;
        }

        .login-btn {
            width: 100%;
            height: 54px;
            border: 0;
            border-radius: 14px;
            margin-top: 10px;
            background: linear-gradient(135deg,
                    #00eaff,
                    #007c9c);
            color: #00131a;
            font-weight: 800;
            letter-spacing: 1px;
            transition: .3s;
            box-shadow: 0 10px 30px rgba(0, 234, 255, .18);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow:
                0 15px 40px rgba(0, 234, 255, .35);
        }

        .secure-text {
            text-align: center;
            color: #58717c;
            font-size: 11px;
            margin-top: 22px;
            letter-spacing: 1px;
        }

        /* Error */

        .login-error {
            background: rgba(255, 50, 50, .08);
            border: 1px solid rgba(255, 50, 50, .25);
            color: #ff8e8e;
            border-radius: 10px;
            padding: 10px 13px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 768px) {

            body {
                overflow-y: auto;
            }

            .login-wrapper {
                padding: 15px;
            }

            .login-container {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .network-side {
                padding: 45px 20px 25px;
            }

            .network-logo {
                width: 180px;
                height: 180px;
            }

            .network-title {
                font-size: 21px;
            }

            .login-side {
                padding: 35px 25px 40px;
            }

            .login-title {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <!-- Animated Network Background -->
    <div class="network-bg">

        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>

        <div class="line line1"></div>
        <div class="line line2"></div>
        <div class="line line3"></div>

    </div>


    <div class="login-wrapper">

        <div class="login-container">

            <!-- =========================
                 NETWORK 3D SIGN
            ========================== -->

            <div class="network-side">

                <div class="network-logo">

                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="ring"></div>

                    <div class="node node1"></div>
                    <div class="node node2"></div>
                    <div class="node node3"></div>
                    <div class="node node4"></div>
                    <div class="node node5"></div>

                    <div class="core">
                         {{ $settings['site_name'] ?? 'Terabyte' }}
                    </div>

                </div>

                <div class="network-title">
                    {{ $settings['site_name'] ?? 'Terabyte' }}
                </div>

                <div class="network-subtitle">
                   {{ $settings['site_name_title'] ?? 'IT Network' }}
                </div>

            </div>


            <!-- =========================
                 LOGIN FORM
            ========================== -->

            <div class="login-side">

                <div class="login-badge">
                    <span class="status-dot"></span>
                    SECURE NETWORK
                </div>

                <h1 class="login-title">
                    Admin Login
                </h1>

                <p class="login-description">
                    Sign in to manage your ISP network.
                </p>


                @if ($errors->any())
                    <div class="login-error">
                        {{ $errors->first() }}
                    </div>
                @endif


                <form method="POST" action="{{ route('admin.login') }}">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input type="email" name="email" class="form-control" placeholder="admin@example.com" value="{{ old('email') }}" required autofocus>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Password
                        </label>

                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>

                    </div>


                    <button type="submit" class="login-btn">
                        ACCESS ADMIN PANEL
                    </button>

                </form>


                <div class="secure-text">
                    🔒 ENCRYPTED ADMIN ACCESS
                </div>

            </div>

        </div>

    </div>

</body>

</html>
