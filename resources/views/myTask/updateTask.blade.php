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

    .card-header h4 {
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

    /* Form Label Styling */
    .form-group label {
        color: var(--dark-blue-light);
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-block;
        margin-bottom: 0.5rem;
        font-size: 1rem;
        letter-spacing: 0.5px;
    }

    .form-group:hover label {
        transform: translateX(5px);
        color: var(--dark-blue-accent);
        text-shadow: 0 0 8px var(--dark-blue-glow);
    }

    /* Input field styling with dark theme */
    .form-control {
        background: rgba(10, 25, 41, 0.8);
        border: 2px solid var(--dark-blue-secondary);
        color: white;
        transition: all 0.4s ease;
        padding: 12px 15px;
        border-radius: 8px;
        backdrop-filter: blur(5px);
        font-size: 1rem;
    }

    .form-control:focus {
        background: rgba(10, 25, 41, 0.95);
        border-color: var(--dark-blue-accent) !important;
        box-shadow: 0 0 0 0.25rem var(--dark-blue-glow) !important;
        transform: scale(1.02);
        color: white;
    }

    .form-control::placeholder {
        color: rgba(79, 195, 247, 0.5);
    }

    /* Input field animation - ripple effect */
    .form-control {
        position: relative;
        background: linear-gradient(90deg, #132f4c 50%, #0a1929 50%);
        background-size: 200% 100%;
        background-position: right bottom;
        transition: all 0.5s ease;
    }

    .form-control:focus {
        background-position: left bottom;
    }

    /* Form group animations */
    .form-group {
        opacity: 0;
        animation: slideUp 0.5s forwards;
        position: relative;
        z-index: 1;
    }

    .form-group:nth-child(1) { animation-delay: 0.2s; }
    .form-group:nth-child(2) { animation-delay: 0.4s; }
    .form-group:nth-child(3) { animation-delay: 0.6s; }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Form group hover effect */
    .form-group::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--dark-blue-accent), transparent);
        transform: scaleX(0);
        transition: transform 0.3s ease;
        z-index: -1;
    }

    .form-group:hover::after {
        transform: scaleX(1);
    }

    /* Button styling */
    .btn-success, .btn-warning {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 600;
        letter-spacing: 1px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        margin: 0 5px;
        min-width: 120px;
    }

    .btn-success {
        background: linear-gradient(135deg, #00b09b, #96c93d);
        color: white;
        animation: gentleFloat 3s ease-in-out infinite;
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--dark-blue-secondary), var(--dark-blue-primary));
        border: 2px solid var(--dark-blue-accent);
        color: white;
    }

    /* Button hover animations */
    .btn-success::before, .btn-warning::before {
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
    }

    .btn-success:hover::before, .btn-warning:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-success:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 20px rgba(0, 176, 155, 0.5);
    }

    .btn-warning:hover {
        transform: translateY(-3px);
        background: linear-gradient(135deg, var(--dark-blue-accent), var(--dark-blue-light));
        border-color: white;
        box-shadow: 0 4px 20px var(--dark-blue-glow);
    }

    /* Floating animation for update button */
    @keyframes gentleFloat {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-3px);
        }
    }

    /* Button icon animations */
    .btn-success {
        position: relative;
        padding-left: 45px;
    }

    .btn-success::after {
        content: '✓';
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .btn-success:hover::after {
        transform: translateY(-50%) scale(1.2);
    }

    .btn-warning {
        position: relative;
        padding-left: 45px;
    }

    .btn-warning::after {
        content: '✕';
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .btn-warning:hover::after {
        transform: translateY(-50%) rotate(90deg);
    }

    /* Background pattern animation */
    .container, .row {
        position: relative;
    }

    .col-md-6 {
        position: relative;
    }

    .col-md-6::before {
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
        z-index: -1;
    }

    @keyframes shimmer {
        0% {
            transform: translate(-30%, -30%) rotate(0deg);
        }
        100% {
            transform: translate(30%, 30%) rotate(180deg);
        }
    }

    /* Cosmic Background Effect */
    .card-body {
        position: relative;
        overflow: hidden;
    }

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

    /* Date and Time input specific styling */
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator {
        filter: invert(0.8);
        cursor: pointer;
        transition: filter 0.3s ease;
    }

    input[type="date"]::-webkit-calendar-picker-indicator:hover,
    input[type="time"]::-webkit-calendar-picker-indicator:hover {
        filter: invert(1);
    }

    /* Value display animation */
    input[type="text"], input[type="date"], input[type="time"] {
        position: relative;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card {
            margin: 15px;
        }
        
        .btn-success, .btn-warning {
            padding: 10px 20px;
            font-size: 0.9rem;
            min-width: 100px;
            margin: 5px;
        }
        
        .btn-success {
            padding-left: 35px;
        }
        
        .btn-warning {
            padding-left: 35px;
        }
        
        .btn-success::after, .btn-warning::after {
            left: 12px;
            font-size: 16px;
        }
        
        .card-header h4 {
            font-size: 1.3rem;
        }
    }

    /* Button container styling */
    .card-body form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    /* Form group spacing */
    .form-group {
        width: 100%;
        margin-bottom: 1.5rem !important;
    }

    /* Focus state for better accessibility */
    .form-control:focus-visible {
        outline: none;
    }

    /* Animation for form submission feedback */
    .btn-success:active {
        transform: scale(0.95);
    }

    /* Cancel button specific hover */
    .btn-warning:hover {
        color: white;
    }

    /* Update button specific hover */
    .btn-success:hover {
        color: white;
    }

    /* Loading animation for form submission (optional) */
    .btn-success.submitting {
        pointer-events: none;
        opacity: 0.7;
    }

    .btn-success.submitting::after {
        content: '↻';
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: translateY(-50%) rotate(0deg); }
        to { transform: translateY(-50%) rotate(360deg); }
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                <h4 class="text-center">
                    <i class="fas fa-pen-alt me-2"></i>Update Task
                    <i class="fas fa-tasks ms-2"></i>
                </h4>
            </div>

            <div class="card-body shadow">

                <form action="/updateTask/{{ $data->id }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label>
                            <i class="fas fa-pencil-alt me-2" style="color: var(--dark-blue-light);"></i>
                            Task Name
                        </label>
                        <input type="text" name="taskName" 
                               value="{{ $data->task_name }}" 
                               class="form-control" 
                               placeholder="Enter task name..."
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label>
                            <i class="fas fa-calendar-alt me-2" style="color: var(--dark-blue-light);"></i>
                            Date
                        </label>
                        <input type="date" name="taskDate" 
                               value="{{ $data->task_date }}" 
                               class="form-control" 
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label>
                            <i class="fas fa-clock me-2" style="color: var(--dark-blue-light);"></i>
                            Time
                        </label>
                        <input type="time" name="taskTime" 
                               value="{{ $data->task_time }}" 
                               class="form-control" 
                               required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Update Task
                    </button>

                    <a href="/editTask" class="btn btn-warning">
                        Cancel
                    </a>

                </form>

            </div>
        </div>

    </div>
</div>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection