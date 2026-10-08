@extends('layouts.app')

@section('content')

<style>
    /* Dark Blue Theme Colors */
    :root {
        --dark-blue-primary: #0a1929;
        --dark-blue-secondary: #1e3a6f;
        --dark-blue-accent: #3b82f6;
        --dark-blue-light: #4fc3f7;
        --dark-blue-glow: rgba(59, 130, 246, 0.4);
        --dark-blue-surface: #132f4c;
        --dark-blue-success: #00b09b;
        --dark-blue-danger: #ff6b6b;
    }

    /* Page Background Animation */
    body {
        background: linear-gradient(135deg, #0a1929 0%, #1a3650 50%, #0a1929 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        min-height: 100vh;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Welcome Message Animation */
    .welcome-message {
        text-align: center;
        color: white;
        margin-bottom: 2rem;
        opacity: 0;
        animation: fadeInDown 1s forwards;
    }

    .welcome-message h1 {
        font-size: 2.5rem;
        font-weight: 700;
        text-shadow: 0 0 20px var(--dark-blue-glow);
        animation: glowPulse 3s infinite;
    }

    .welcome-message p {
        font-size: 1.2rem;
        color: var(--dark-blue-light);
        opacity: 0.9;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes glowPulse {
        0%, 100% { text-shadow: 0 0 20px var(--dark-blue-glow); }
        50% { text-shadow: 0 0 40px var(--dark-blue-light), 0 0 60px var(--dark-blue-accent); }
    }

    /* Card Entrance Animation */
    .card {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
        animation: cardEntrance 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        background: linear-gradient(145deg, #102a41, #0b1c2f);
        border: 1px solid var(--dark-blue-accent);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        overflow: hidden;
        position: relative;
        transition: all 0.4s ease;
    }

    @keyframes cardEntrance {
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Glowing Border Effect */
    .card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, 
            var(--dark-blue-accent), 
            var(--dark-blue-light), 
            var(--dark-blue-accent));
        border-radius: 12px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.5s ease;
        animation: borderGlow 3s linear infinite;
    }

    .card:hover::before {
        opacity: 0.5;
    }

    @keyframes borderGlow {
        0%, 100% { filter: blur(5px); }
        50% { filter: blur(10px); }
    }

    /* Card Header Styling */
    .card-header {
        background: linear-gradient(135deg, var(--dark-blue-secondary), var(--dark-blue-primary));
        border-bottom: 2px solid var(--dark-blue-accent);
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .card-header h3 {
        color: white;
        text-shadow: 0 0 10px var(--dark-blue-glow);
        animation: headerPulse 3s ease-in-out infinite;
        position: relative;
        z-index: 1;
        margin: 0;
    }

    @keyframes headerPulse {
        0%, 100% { text-shadow: 0 0 10px var(--dark-blue-glow); }
        50% { text-shadow: 0 0 20px var(--dark-blue-light), 0 0 30px var(--dark-blue-accent); }
    }

    /* Floating Particles Effect */
    .card-header::before {
        content: '⚡';
        position: absolute;
        top: -20px;
        right: -20px;
        font-size: 100px;
        opacity: 0.1;
        transform: rotate(15deg);
        animation: floatParticle 6s linear infinite;
    }

    .card-header::after {
        content: '●';
        position: absolute;
        bottom: -30px;
        left: -30px;
        font-size: 150px;
        opacity: 0.1;
        animation: floatParticle 8s linear infinite reverse;
    }

    @keyframes floatParticle {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(180deg) scale(1.2); }
        100% { transform: rotate(360deg) scale(1); }
    }

    /* Button Styling */
    .btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 600;
        letter-spacing: 1px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        margin: 0 8px;
        min-width: 130px;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .btn-success {
        background: linear-gradient(135deg, #00b09b, #96c93d);
        color: white;
        animation: gentleFloat 3s ease-in-out infinite;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--dark-blue-accent), var(--dark-blue-light));
        color: white;
        animation: gentleFloat 3s ease-in-out infinite 0.5s;
    }

    .btn-danger {
        background: linear-gradient(135deg, #ff6b6b, #ee5253);
        color: white;
        animation: gentleFloat 3s ease-in-out infinite 1s;
    }

    /* Button hover animations */
    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
        z-index: 1;
    }

    .btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn:hover {
        transform: translateY(-5px) scale(1.05);
    }

    .btn-success:hover {
        box-shadow: 0 8px 25px rgba(0, 176, 155, 0.6);
    }

    .btn-primary:hover {
        box-shadow: 0 8px 25px var(--dark-blue-glow);
    }

    .btn-danger:hover {
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.6);
    }

    /* Button icon animations */
    .btn {
        position: relative;
        padding-left: 45px;
    }

    .btn::after {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        transition: transform 0.3s ease;
        z-index: 2;
    }

    .btn-success::after {
        content: '+';
        font-size: 24px;
        font-weight: bold;
    }

    .btn-primary::after {
        content: '👁';
        font-size: 18px;
    }

    .btn-danger::after {
        content: '✎';
        font-size: 18px;
    }

    .btn:hover::after {
        transform: translateY(-50%) scale(1.2);
    }

    .btn-success:hover::after {
        content: '✓';
    }

    .btn-primary:hover::after {
        content: '🔍';
    }

    .btn-danger:hover::after {
        content: '✎';
        animation: pencilWiggle 0.5s ease infinite;
    }

    @keyframes pencilWiggle {
        0%, 100% { transform: translateY(-50%) rotate(0deg); }
        25% { transform: translateY(-50%) rotate(-10deg); }
        75% { transform: translateY(-50%) rotate(10deg); }
    }

    /* Floating animation for buttons */
    @keyframes gentleFloat {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }

    /* Button group container */
    .card-body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    /* Cosmic Background Effect */
    .card-body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(79, 195, 247, 0.1) 0%, transparent 50%);
        pointer-events: none;
        animation: cosmicMove 20s ease-in-out infinite;
    }

    @keyframes cosmicMove {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }

    /* Background pattern animation */
    .container {
        position: relative;
        overflow: hidden;
        padding: 2rem 1rem;
    }

    .container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            transparent 30%,
            rgba(59, 130, 246, 0.03) 50%,
            transparent 70%
        );
        animation: shimmer 8s infinite;
        pointer-events: none;
    }

    @keyframes shimmer {
        0% {
            transform: translate(-30%, -30%) rotate(0deg);
        }
        100% {
            transform: translate(30%, 30%) rotate(180deg);
        }
    }

    /* Task Stats Section (Optional) */
    .stats-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 2rem;
        opacity: 0;
        animation: fadeInUp 1s forwards 0.5s;
    }

    .stat-card {
        background: linear-gradient(135deg, #102a41, #0b1c2f);
        border: 1px solid var(--dark-blue-accent);
        border-radius: 15px;
        padding: 20px;
        min-width: 150px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px var(--dark-blue-glow);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--dark-blue-light);
        margin-bottom: 5px;
    }

    .stat-label {
        color: white;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .welcome-message h1 {
            font-size: 2rem;
        }
        
        .welcome-message p {
            font-size: 1rem;
        }
        
        .btn {
            padding: 10px 20px;
            min-width: 110px;
            font-size: 0.85rem;
            padding-left: 35px;
        }
        
        .btn::after {
            left: 12px;
            font-size: 16px;
        }
        
        .stats-container {
            flex-direction: column;
            align-items: center;
        }
        
        .stat-card {
            width: 100%;
            max-width: 250px;
        }
    }

    /* Click effect */
    .btn:active {
        transform: scale(0.95);
    }

    /* Ripple effect for buttons */
    .btn:active::before {
        width: 400px;
        height: 400px;
    }

    /* Decorative elements */
    .card-body::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--dark-blue-accent), transparent);
        animation: scanline 3s linear infinite;
    }

    @keyframes scanline {
        0% {
            transform: translateX(-100%);
        }
        100% {
            transform: translateX(100%);
        }
    }
</style>

<div class="container">
    <!-- Welcome Message -->
    <div class="welcome-message">
        <h1>
            <i class="fas fa-tasks me-3"></i>
            Task Management Dashboard
        </h1>
        <p>Organize, track, and manage your tasks efficiently</p>
    </div>

    <!-- Optional: Task Statistics (You can uncomment if you have the data) -->
    <!-- 
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-number">12</div>
            <div class="stat-label">Total Tasks</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">8</div>
            <div class="stat-label">Completed</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">4</div>
            <div class="stat-label">Pending</div>
        </div>
    </div>
    -->

    <!-- Manage Task Card -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="text-center">
                        <i class="fas fa-cog me-2"></i>
                        Manage Task
                        <i class="fas fa-tools ms-2"></i>
                    </h3>
                </div>

                <div class="card-body text-center">
                    <a href="/addTask" class="btn btn-success me-2">
                        <i class="fas fa-plus-circle me-2"></i>Add Task
                    </a>
                    <a href="/viewTask" class="btn btn-primary me-2">
                        <i class="fas fa-eye me-2"></i>View Task
                    </a>
                    <a href="/editTask" class="btn btn-danger">
                        <i class="fas fa-edit me-2"></i>Edit Task
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection