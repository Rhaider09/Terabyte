@extends('admin.layout')

@section('content')

<style>
    /* =========================
       3D DASHBOARD
    ========================== */

    .dashboard-wrapper {
        perspective: 1200px;
    }

    .dashboard-header {
        margin-bottom: 28px;
        animation: fadeDown 0.8s ease both;
    }

    .dashboard-header h1 {
        font-weight: 800;
        letter-spacing: -0.5px;
        color: #101828;
    }

    .dashboard-header p {
        color: #667085;
        margin-bottom: 0;
    }

    /* =========================
       STAT CARDS
    ========================== */

    .stat-card {
        position: relative;
        min-height: 175px;
        padding: 25px;
        overflow: hidden;

        border-radius: 22px;
        border: 1px solid rgba(255,255,255,0.7);

        background:
            linear-gradient(
                145deg,
                rgba(255,255,255,0.98),
                rgba(239,244,248,0.96)
            );

        box-shadow:
            0 15px 30px rgba(15, 23, 42, 0.10),
            inset 0 1px 0 rgba(255,255,255,0.9);

        transform-style: preserve-3d;

        transition:
            transform 0.4s ease,
            box-shadow 0.4s ease;

        animation: cardAppear 0.7s ease both;
    }

    .stat-card:hover {
        transform:
            translateY(-10px)
            rotateX(4deg)
            rotateY(-4deg);

        box-shadow:
            0 25px 45px rgba(15, 23, 42, 0.18),
            0 8px 15px rgba(15, 23, 42, 0.08);
    }

    /* Card animation delays */

    .stat-column:nth-child(1) .stat-card {
        animation-delay: 0.1s;
    }

    .stat-column:nth-child(2) .stat-card {
        animation-delay: 0.2s;
    }

    .stat-column:nth-child(3) .stat-card {
        animation-delay: 0.3s;
    }

    .stat-column:nth-child(4) .stat-card {
        animation-delay: 0.4s;
    }

    /* =========================
       ICON
    ========================== */

    .stat-icon {
        width: 58px;
        height: 58px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 17px;

        color: #fff;
        font-size: 24px;

        box-shadow:
            0 10px 20px rgba(0,0,0,0.15);

        transform: translateZ(35px);

        transition: 0.4s ease;
    }

    .stat-card:hover .stat-icon {
        transform:
            translateZ(55px)
            rotate(-8deg)
            scale(1.08);
    }

    .icon-packages {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
    }

    .icon-orders {
        background: linear-gradient(135deg, #7c3aed, #5b21b6);
    }

    .icon-pending {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .icon-customers {
        background: linear-gradient(135deg, #10b981, #047857);
    }

    /* =========================
       CARD CONTENT
    ========================== */

    .stat-label {
        margin-top: 20px;

        font-size: 14px;
        font-weight: 600;

        color: #667085;

        text-transform: uppercase;
        letter-spacing: 0.8px;

        transform: translateZ(20px);
    }

    .stat-number {
        margin-top: 4px;
        margin-bottom: 0;

        font-size: 38px;
        line-height: 1;

        font-weight: 800;

        color: #101828;

        transform: translateZ(30px);
    }

    /* =========================
       DECORATIVE 3D CIRCLES
    ========================== */

    .card-circle {
        position: absolute;

        width: 130px;
        height: 130px;

        right: -55px;
        bottom: -55px;

        border-radius: 50%;

        border: 15px solid rgba(37, 99, 235, 0.06);

        animation: floatingCircle 5s ease-in-out infinite;
    }

    .card-circle.two {
        width: 85px;
        height: 85px;

        right: 20px;
        bottom: -40px;

        border-width: 8px;

        animation-delay: 1s;
    }

    /* =========================
       DASHBOARD WELCOME CARD
    ========================== */

    .welcome-card {
        position: relative;

        margin-top: 30px;
        padding: 32px;

        overflow: hidden;

        border-radius: 25px;

        color: white;

        background:
            radial-gradient(
                circle at top right,
                rgba(16,185,129,0.35),
                transparent 35%
            ),
            linear-gradient(
                135deg,
                #07111f,
                #0d2438,
                #07111f
            );

        box-shadow:
            0 20px 40px rgba(7,17,31,0.22);

        transform-style: preserve-3d;

        animation: welcomeAppear 0.9s ease both;
    }

    .welcome-card:hover {
        transform: translateY(-4px);
        box-shadow:
            0 28px 50px rgba(7,17,31,0.30);
    }

    .welcome-content {
        position: relative;
        z-index: 5;
        transform: translateZ(30px);
    }

    .welcome-card h3 {
        font-weight: 800;
        margin-bottom: 8px;
    }

    .welcome-card p {
        color: #b8c5d3;
        margin-bottom: 0;
    }

    /* =========================
       NETWORK ANIMATION
    ========================== */

    .network-orb {
        position: absolute;

        width: 180px;
        height: 180px;

        right: 80px;
        top: 50%;

        transform: translateY(-50%);

        border-radius: 50%;

        border: 1px solid rgba(255,255,255,0.12);

        box-shadow:
            0 0 0 20px rgba(255,255,255,0.02),
            0 0 0 40px rgba(255,255,255,0.015);

        animation: orbRotate 12s linear infinite;
    }

    .network-orb::before,
    .network-orb::after {
        content: "";

        position: absolute;

        inset: 25px;

        border-radius: 50%;

        border: 1px dashed rgba(255,255,255,0.15);
    }

    .network-orb::after {
        inset: 50px;
        border-style: solid;
    }

    .network-dot {
        position: absolute;

        width: 10px;
        height: 10px;

        border-radius: 50%;

        background: #20c997;

        box-shadow:
            0 0 15px #20c997;

        animation: dotPulse 2s ease-in-out infinite;
    }

    .dot-1 {
        top: 25px;
        left: 80px;
    }

    .dot-2 {
        top: 80px;
        right: 18px;
        animation-delay: .5s;
    }

    .dot-3 {
        bottom: 25px;
        left: 80px;
        animation-delay: 1s;
    }

    .dot-4 {
        top: 80px;
        left: 18px;
        animation-delay: 1.5s;
    }

    /* =========================
       ANIMATIONS
    ========================== */

    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes cardAppear {
        from {
            opacity: 0;
            transform:
                translateY(40px)
                rotateX(12deg);
        }

        to {
            opacity: 1;
            transform:
                translateY(0)
                rotateX(0);
        }
    }

    @keyframes welcomeAppear {
        from {
            opacity: 0;
            transform:
                translateY(30px)
                rotateX(8deg);
        }

        to {
            opacity: 1;
            transform:
                translateY(0)
                rotateX(0);
        }
    }

    @keyframes floatingCircle {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-12px) rotate(20deg);
        }
    }

    @keyframes orbRotate {
        from {
            transform:
                translateY(-50%)
                rotate(0deg);
        }

        to {
            transform:
                translateY(-50%)
                rotate(360deg);
        }
    }

    @keyframes dotPulse {
        0%, 100% {
            transform: scale(1);
            opacity: .7;
        }

        50% {
            transform: scale(1.7);
            opacity: 1;
        }
    }

    /* =========================
       MOBILE
    ========================== */

    @media (max-width: 767px) {

        .dashboard-header h1 {
            font-size: 28px;
        }

        .stat-card {
            min-height: 160px;
        }

        .stat-number {
            font-size: 32px;
        }

        .welcome-card {
            padding: 25px;
        }

        .network-orb {
            opacity: .25;
            right: -45px;
        }
    }
</style>


<div class="dashboard-wrapper">

    {{-- Header --}}
    <div class="dashboard-header">

        <h1>
            Admin Dashboard
        </h1>

        <p>
            Welcome back! Here's an overview of your Terabyte ISP system.
        </p>

    </div>


    {{-- Statistics --}}
    <div class="row g-4">

        {{-- Packages --}}
        <div class="col-md-6 col-xl-3 stat-column">

            <div class="stat-card">

                <div class="stat-icon icon-packages">
                    <i class="fas fa-wifi"></i>
                </div>

                <div class="stat-label">
                    Packages
                </div>

                <h2 class="stat-number">
                    {{ $packages }}
                </h2>

                <div class="card-circle"></div>
                <div class="card-circle two"></div>

            </div>

        </div>


        {{-- Orders --}}
        <div class="col-md-6 col-xl-3 stat-column">

            <div class="stat-card">

                <div class="stat-icon icon-orders">
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <div class="stat-label">
                    Orders
                </div>

                <h2 class="stat-number">
                    {{ $orders }}
                </h2>

                <div class="card-circle"></div>
                <div class="card-circle two"></div>

            </div>

        </div>


        {{-- Pending --}}
        <div class="col-md-6 col-xl-3 stat-column">

            <div class="stat-card">

                <div class="stat-icon icon-pending">
                    <i class="fas fa-clock"></i>
                </div>

                <div class="stat-label">
                    Pending Orders
                </div>

                <h2 class="stat-number">
                    {{ $pendingOrders }}
                </h2>

                <div class="card-circle"></div>
                <div class="card-circle two"></div>

            </div>

        </div>


        {{-- Customers --}}
        <div class="col-md-6 col-xl-3 stat-column">

            <div class="stat-card">

                <div class="stat-icon icon-customers">
                    <i class="fas fa-users"></i>
                </div>

                <div class="stat-label">
                    Customers
                </div>

                <h2 class="stat-number">
                    {{ $customers }}
                </h2>

                <div class="card-circle"></div>
                <div class="card-circle two"></div>

            </div>

        </div>

    </div>


    {{-- Welcome / Network Card --}}
    <div class="welcome-card">

        <div class="welcome-content">

            <h3>
                Terabyte ISP
            </h3>

            <p>
                Manage your internet packages, customer orders,
                customers and website content from one place.
            </p>

        </div>


        {{-- 3D Network --}}
        <div class="network-orb">

            <span class="network-dot dot-1"></span>
            <span class="network-dot dot-2"></span>
            <span class="network-dot dot-3"></span>
            <span class="network-dot dot-4"></span>

        </div>

    </div>

</div>

@endsection
