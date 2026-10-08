

<?php $__env->startSection('content'); ?>

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
        --dark-blue-warning: #ffd700;
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

    .card-header h3 {
        color: white;
        text-shadow: 0 0 10px var(--dark-blue-glow);
        animation: headerPulse 3s ease-in-out infinite;
        position: relative;
        z-index: 1;
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

    /* Success message animation */
    .alert-success {
        background: linear-gradient(135deg, #00b09b, #96c93d) !important;
        border: none;
        color: white;
        animation: slideDown 0.5s ease-out, glowPulse 2s infinite;
        box-shadow: 0 0 20px rgba(0, 176, 155, 0.5);
    }

    @keyframes glowPulse {
        0%, 100% { box-shadow: 0 0 20px rgba(0, 176, 155, 0.5); }
        50% { box-shadow: 0 0 30px rgba(0, 176, 155, 0.8); }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Form Label Styling */
    .form-label {
        color: var(--dark-blue-light);
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .form-group:hover .form-label {
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

    /* Staggered animation for form groups */
    .form-group-1 {
        animation: slideUp 0.5s forwards 0.2s;
        opacity: 0;
    }

    .form-group-2 {
        animation: slideUp 0.5s forwards 0.4s;
        opacity: 0;
    }

    .form-group-3 {
        animation: slideUp 0.5s forwards 0.6s;
        opacity: 0;
    }

    .button-group {
        animation: slideUp 0.5s forwards 0.8s;
        opacity: 0;
    }

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

    /* Button hover animations - Updated for dark theme */
    .btn-success, .btn-warning {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: none;
        font-weight: 600;
        letter-spacing: 1px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .btn-success {
        background: linear-gradient(135deg, #00b09b, #96c93d);
        color: white;
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--dark-blue-secondary), var(--dark-blue-primary));
        border: 2px solid var(--dark-blue-accent);
        color: white;
    }

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

    /* Floating animation for save button */
    @keyframes gentleFloat {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-3px);
        }
    }

    .btn-success {
        animation: gentleFloat 3s ease-in-out infinite;
    }

    /* Back button specific animation */
    .btn-warning {
        position: relative;
    }

    .btn-warning::after {
        content: '←';
        position: absolute;
        left: 20px;
        opacity: 0;
        transition: opacity 0.3s ease, left 0.3s ease;
    }

    .btn-warning:hover {
        padding-left: 45px;
    }

    .btn-warning:hover::after {
        opacity: 1;
        left: 15px;
    }

    /* Background pattern animation */
    .container {
        position: relative;
        overflow: hidden;
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

    /* Icon colors */
    .text-success {
        color: var(--dark-blue-light) !important;
    }

    /* Date and Time input specific styling */
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator {
        filter: invert(0.8);
        cursor: pointer;
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

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .btn-success, .btn-warning {
            padding: 10px 25px !important;
            font-size: 0.9rem;
        }
        
        .card-header h3 {
            font-size: 1.5rem;
        }
    }

    /* Form group hover effect */
    .form-group {
        position: relative;
        z-index: 1;
    }

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
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">

                <div class="card-header text-center">
                    <h3><i class="fas fa-tasks me-2"></i>Manage Task</h3>
                    <?php if(session('message')): ?>
                        <div class="alert alert-success mt-2">
                            <i class="fas fa-check-circle me-2"></i>
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <form action="/storeTask" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Task Name -->
                        <div class="mb-3 form-group form-group-1">
                            <label class="form-label fw-bold">
                                <i class="fas fa-pencil-alt me-2" style="color: var(--dark-blue-light);"></i>Task Name
                            </label>
                            <input type="text" 
                                   name="taskName" 
                                   class="form-control" 
                                   placeholder="Enter your task..." 
                                   required>
                        </div>

                        <!-- Task Date -->
                        <div class="mb-3 form-group form-group-2">
                            <label class="form-label fw-bold">
                                <i class="fas fa-calendar-alt me-2" style="color: var(--dark-blue-light);"></i>Task Date
                            </label>
                            <input type="date" 
                                   name="taskDate" 
                                   class="form-control" 
                                   required>
                        </div>

                        <!-- Task Time -->
                        <div class="mb-3 form-group form-group-3">
                            <label class="form-label fw-bold">
                                <i class="fas fa-clock me-2" style="color: var(--dark-blue-light);"></i>Task Time
                            </label>
                            <input type="time" 
                                   name="taskTime" 
                                   class="form-control" 
                                   required>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4 button-group">
                            <a href="/home" class="btn btn-warning btn-lg px-5">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>

                            <button type="submit" class="btn btn-success btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Save
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel_project\myApp\resources\views/myTask/addmyTask.blade.php ENDPATH**/ ?>